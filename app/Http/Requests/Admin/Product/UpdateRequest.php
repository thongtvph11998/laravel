<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name'=>'required|unique:products,name',
            'price'=>'required',
            'quantity'=>'required',
            'category_id'=>'required',
            'image'=>'required',
        ];
    }
    public function messages()
    {
        return[
            'required'=>' :attribute khong duoc de trong',
            'name.unique'=>'San pham bi trung ten',
        ];
    }
    public function attributes()
    {
        return[
            'name'=>'Ten san pham',
            'price'=>'Gia san pham',
            'quantity'=>'So luong',
            'category_id'=>'Danh muc san pham',
            'image'=>'Anh san pham',
        ];
    }
}
