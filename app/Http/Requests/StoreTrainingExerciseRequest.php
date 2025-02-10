<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrainingExerciseRequest extends FormRequest
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
        // return [
        //     'training_id' => 'required|exists:trainings,id',
        //     'name' => 'required|string',
        //     'sets' => 'required|numeric',
        //     'reps' => 'required|numeric',
        //     'weight' => 'required|numeric',
        //     'image' => 'nullable|file|mimes:png,jpg,jpeg|max:2048',
        // ];
        return [
            'training_id' => 'required|exists:trainings,id',
            'exercises' => 'required|array',
            'exercises.*.name' => 'required|string',
            'exercises.*.sets' => 'required|integer',
            'exercises.*.reps' => 'required|integer',
            'exercises.*.weight' => 'nullable|numeric',
            'exercises.*.image' => 'nullable|file|mimes:png,jpg,jpeg|max:2048',
        ];
    }
}
