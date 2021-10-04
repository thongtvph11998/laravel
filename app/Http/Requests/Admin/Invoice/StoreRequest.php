<?php

namespace App\Http\Requests\Admin\Invoice;

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
            'user_id'=>'required',
            'number'=>'required',
            'address'=>'required',
            'total_price'=>'required',
            'status'=>'required',
        ];
    }
    public function messages()
    {
        return[
         'required'=>' :attribute  khong duoc de trong',
        ];
    }
    public function attributes()
    {
        return[
           'user_id'=>'ID nguoi mua hang',
            'number'=>'So dien thoai',
            'address'=>'Dia chi',
            'total_price'=>'Don gia',
            'status'=>'Trang thai don hang',
        ];
    }
}
