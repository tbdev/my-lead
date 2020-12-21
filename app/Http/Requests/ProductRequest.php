<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Lang;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    protected array $queryParametersToValidate = [];

    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'max:20',
                'min:5',
                Rule::unique('App\Models\Shop\Product'),
            ],
            'description' => [
                'required',
                'max:1499',
                'min:10'            
            ],
            'prices' => [
                'required',
                'array'
            ],
        ];
    }

    public function messages()
    {
        return [
            'prices.array' => 'Select one price at least!',
        ];
    }        
}
