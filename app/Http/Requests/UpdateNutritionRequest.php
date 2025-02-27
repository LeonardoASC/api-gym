<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNutritionRequest extends FormRequest
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
            'mealName' => 'string',
            'description' => 'string',
            'mealTime' => 'string',
            'ingredients' => 'string',
            'prepTime' => 'string',
            'mealType' => 'string',
            'recipe' => 'string',
            'difficulty' => 'string',
            'benefits' => 'string',
            'portionSize' => 'string',
            'image' => 'file|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
