<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNutritionRequest extends FormRequest
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
            'name' => 'required|string',
            'description' => 'required|string',
            'recommendedTime' => 'required|string',
            'ingredients' => 'required|string',
            'prepTime' => 'required|string',
            'mealType' => 'required|string',
            'recipe' => 'required|string',
            'difficulty' => 'required|string',
            'benefits' => 'required|string',
            'servingSize' => 'required|string',
            'image' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
