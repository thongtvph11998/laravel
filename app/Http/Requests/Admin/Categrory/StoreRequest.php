<?php

namespace App\Http\Requests\Admin\Categrory;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'=>'required|max:100|unique:categories,name',
        ];
    }
    public function messages()
    {
        return[
            'name.required'=>'chua nhap danh muc ',
            'name.unique'=>'danh muc da ton tai',
            'name.max'=>'danh muc khong duoc vuot qua 100 ky tu',
        ];
    }
}
