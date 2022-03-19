<?php

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|unique:categories,name',
            'display_on_home' => 'nullable',
            'image' => 'nullable|image|dimensions:min_width=100,min_height=100',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Title is required.",
            'name.string' => 'Title must be string',
            'image.image' => 'Invalid image',
            'image.dimensions' => 'Invalid image dimension',
        ];
    }
}
