<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingExercise extends Model
{
    use HasFactory;
    // 'user_id' => 1,
    //             'name' => 'Dumbbell Shoulder Press',
    //             'sets' => 3,
    //             'reps' => '8-10',
    //             'weight' => 40,
    //             'image' => 'dumbbell_shoulder_press.jpg',
    protected $fillable = ['train_id', 'name', 'sets', 'reps', 'weight', 'image'];
    public function training()
    {
        return $this->belongsTo(Training::class, 'train_id');
    }
}
