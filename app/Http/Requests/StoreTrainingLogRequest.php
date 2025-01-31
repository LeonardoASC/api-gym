<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrainingLogRequest extends FormRequest
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
            'training_id' => 'required|integer|exists:trainings,id',
            'user_id' => 'required|integer|exists:users,id',
            'started_at' => 'required|date',
            'finished_at' => 'required|date',
            'duration_minutes' => 'required|integer',
            'notes' => 'nullable|string',
        ];
    }
}
