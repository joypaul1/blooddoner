<?php

namespace App\Http\Requests\Quickpage;

use Illuminate\Foundation\Http\FormRequest;

class QuickpageUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'          => 'required|string|unique:quick_pages',
            'short_desc'    => 'required',

        ];
    }

    public function messages()
    {
        return [
            'name.required'         => "name is required.",
            'short_desc.required'   => "Description is required.",
            'name.string'           => 'name must be string.',
            'name.unique'           => 'name has already been taken.',
        ];
    }
}
