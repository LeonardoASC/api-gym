<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrainingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'typeExercises' => 'required|min:1|max:50',
            'resumeExercises' => 'required|min:1|max:50',
            'image' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',

            'training_exercises' => 'required|array|min:1', 
            'training_exercises.*.name' => 'required|string',
            'training_exercises.*.sets' => 'required|string',
            'training_exercises.*.reps' => 'required|string',
            'training_exercises.*.weight' => 'required|string',
            'training_exercises.*.exerciseImage' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
        ];
    }
}
