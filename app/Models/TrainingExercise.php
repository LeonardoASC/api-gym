<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingExercise extends Model
{
    use HasFactory;

    protected $fillable = ['training_id', 'name', 'sets', 'reps', 'weight', 'image'];
    public function training()
    {
        return $this->belongsTo(Training::class, 'training_id');
    }
}
