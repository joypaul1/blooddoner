<?php

namespace App\Http\Requests\Admins;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|unique:admins,email,' . $this->admin->id,
            'image' => 'nullable|image|dimensions:min_width=100,min_height=100',
            'password' => 'nullable|min:6|confirmed',
            'password_confirmation' => 'nullable|min:6',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Name is required.",
            'name.string' => 'Name must be string.',
            'name.unique' => 'Name has already been taken.',
            'image.image' => 'Invalid image.',
            'image.dimensions' => 'Invalid image dimension.',
        ];
    }
}
