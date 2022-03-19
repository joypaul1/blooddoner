<?php

namespace App\Http\Requests\Subcategories;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_id' => 'required|numeric',
            'name' => [
                'required',
                'string',
                Rule::unique('sub_categories')
                    ->ignore($this->subCategory->id)
                    ->where(function ($query){
                        return $query
                            ->where('name', $this->title)
                            ->where('category_id', $this->category_id);
                    })
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => "Name is required.",
            'name.string'       => "Name must be string.",
            'name.unique'       => "Name has already been taken.",
            'category_id.required'  => "Category is required.",
            'category_id.numeric'   => "Invalid category.",
        ];
    }
}
