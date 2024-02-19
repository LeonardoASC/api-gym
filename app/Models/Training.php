<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    protected $fillable = ['amountExercises', 'typeExercises', 'resumeExercises'];

     public function trainingExercises()
    {
        return $this->hasMany(TrainingExercise::class, 'train_id');
    }
}
