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
            'mealName' => 'required|string|min:1|max:100', 
            'mealTime' => 'required|date_format:H:i', 
            'ingredients' => 'required|string|min:1|max:500', 
            'mealType' => 'required|string|min:1|max:50', 
            'portionSize' => 'required|string|min:1|max:50', 
            
            'description' => 'nullable|string|max:255',
            'prepTime' => 'nullable|integer|min:1|max:1440',
            'recipe' => 'nullable|string|max:1000',
            'difficulty' => 'nullable|string|min:3|max:50', 
            'benefits' => 'nullable|string|max:500',
            'image' => 'nullable',
        ];
    }
}
