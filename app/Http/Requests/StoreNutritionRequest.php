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
            'name' => 'required|string|min:3|max:100|alpha',
            'description' => 'nullable|string|max:255',
            'recommendedTime' => 'required|string|min:1|max:50|alpha_num',
            'ingredients' => 'required|string|min:3|max:500',
            'prepTime' => 'required|string|min:1|max:50',
            'mealType' => 'required|string|min:3|max:50|alpha',
            'recipe' => 'nullable|string|max:1000',
            'difficulty' => 'required|string|min:3|max:50|alpha',
            'benefits' => 'nullable|string|max:500',
            'servingSize' => 'required|string|min:1|max:50',
            'image' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
