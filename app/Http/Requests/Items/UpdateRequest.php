<?php

namespace App\Http\Requests\Items;

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
            'unit_id' => 'nullable|numeric',
            'brand_id' => 'nullable|numeric',
            'origin_id' => 'nullable|numeric',
            'category_id' => 'required|numeric',
            'subcategory_id' => 'required|numeric',
            'childcategory_id' => 'required|numeric',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric|required_with:discount_type',
            'discount_type' => 'nullable|in:percent,amount|required_with:discount',
            'opening_balance' => 'required|numeric',
            'name' => 'required|string|unique:items,name,' . $this->item->id,
            'feature_image' => 'nullable|image|dimensions:min_width=100,min_height=100',
            'images.*' => 'nullable|image|dimensions:min_width=100,min_height=100',
        ];
    }

    public function messages()
    {
        return [
            'unit_id.required' => "Unit is required.",
            'unit_id.numeric' => "Invalid unit.",
            'brand_id.required' => "Brand is required.",
            'brand_id.numeric' => "Invalid brand.",
            'origin_id.required' => "Origin is required.",
            'origin_id.numeric' => "Invalid origin.",
            'category_id.required' => "Category is required.",
            'category_id.string' => "Invalid category.",

            'price.required' => "Price is required.",
            'price.numeric' => "Invalid price.",
            'discount.numeric' => "Invalid discount.",
            'discount.required_with' => "Discount is required.",
            'discount_type.required_with' => "Discount type is required.",
            'opening_balance.required' => "Opening balance is required.",
            'opening_balance.numeric' => "Invalid opening balance.",
            'name' => ['required', 'string',
                Rule::unique('items')
                    ->ignore($this->item->id)
                    ->where(function ($query) {
                        return $query
                            ->where('name', $this->name)
                            ->where('category_id', $this->category_id)
                            ->where('category_id', $this->subcategory_id)
                            ->where('category_id', $this->childcategory_id)
                            ->where('brand_id', $this->brand_id);
                    })],
            'name.string' => 'Name must be string.',
            'name.unique' => 'Name has already been taken.',
            'feature_image.image' => 'Invalid image.',
            'feature_image.dimensions' => 'Invalid image dimension.',
            'images.*.image' => 'Each one must be a valid image.',
            'images.*.dimensions' => 'Each one must meet required dimension.',
        ];
    }
}
