<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements JWTSubject, CanResetPassword, MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Scope a query to only include users.
     */
    public function scopeUsers($query)
    {
        return $query->whereHas('roles', function (Builder $query) {
            $query->where('name', 'user');
        });
    }

    /**
     * Scope a query to only include admins.
     */
    public function scopeAdmins($query)
    {
        return $query->whereHas('roles', function (Builder $query) {
            $query->where('name', 'admin');
        });
    }

    /**
     * Scope a query to search an user.
     */
    public function scopeSearch(Builder $query, $request)
    {
        return $query->when($request, function (Builder $query, $request) {
            $query->where(function (Builder $query) use ($request) {
                $query->when($request->search, fn(Builder $query, $search) => $query->where('name', 'like', '%' . $search . '%'))
                    ->when($request->search, fn(Builder $query, $search) => $query->orWhere('email', 'like', '%' . $search . '%'))
                    ->when($request->search, fn(Builder $query, $search) => $query->orWhere('phone', 'like', '%' . $search . '%'));
            });
        });
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

     /**
     * Check if the user has a role.
     *
     * @param string $role
     * @return bool
     */
    public function hasRole($role)
    {
        return $this->roles->contains('name', $role);
    }

    /**
     * Função para esquecer senha.
     *
     */
    public function sendPasswordResetNotification($token)
    {
        $client_url = env('APP_FRONTENDURL') . '/reset-password' . '/';
        $url =  $client_url . $token;
        // $this->notify(new ResetPasswordNotification($url));
    }

    public function gym()
    {
        return $this->hasOne(Gym::class);
    }

    public function gyms()
    {
        return $this->hasMany(Gym::class, 'user_id'); // Academias administradas
    }

    public function physicalEvaluations()
    {
        return $this->hasMany(PhysicalEvaluation::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class, 'user_id', 'id');
    }
    // relacionamento com o modelo de Nutrition
    public function nutritions()
    {
        return $this->hasMany(Nutrition::class);
    }
}
