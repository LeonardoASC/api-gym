<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'cnpj',
        'phone',
        'address',
        'city',
        'state',
        'zip_code',
        'logo',
        'status',
        'is_complete',
    ];
    public function admin()
    {
        return $this->belongsTo(User::class, 'user_id'); // Administrador da academia
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
