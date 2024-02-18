<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicalEvaluation extends Model
{
    use HasFactory;
    

    protected $fillable = [ 'goals', 'weight', 'height', 'bmi', 'evaluation_date', 'evaluator_name'];
    // protected $fillable = ['weight', 'height', 'imc', 'fatPercentage', 'muscleMass', 'waist', 'chest', 'hip', 'forearm', 'thigh', 'calf', 'user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
