<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nutrition extends Model
{
    use HasFactory;
    protected $filable = [
        'name',
        'description',
        'ingredients',
        'prepTime',
        'mealType',
        'recipe',
        'difficulty',
        'benefits',
        'servingSize',
        'image',
    ];
}
