<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nutrition extends Model
{
    use HasFactory;
    protected $table = 'nutritions';
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'recommendedTime',
        'ingredients',
        'prepTime',
        'mealType',
        'recipe',
        'difficulty',
        'benefits',
        'servingSize',
        'image',
    ];
    // relacionamento com user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
