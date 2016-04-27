<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'tittle' => 'required|min:3',
            'description' => 'required|min:20',
            //'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'price' => 'required|numeric',
           // 'image' => 'required|mimes:jpg,jpeg,png,gif,bmp'
        ];
    }
}
