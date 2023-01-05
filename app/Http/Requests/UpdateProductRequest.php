<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1023',
            'sku' => 'nullable|string|max:32',
            'tags' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'category' => 'required|exists:categories,name',
        ];
    }
}
