<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'training_id',
        'user_id',
        'stated_at',
        'finished_at',
        'duration_minutes',
        'notes',
    ];
}
