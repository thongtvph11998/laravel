<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;

class StoreRequest extends FormRequest
{

    public function authorize()
    {

        return true;
    }


    public function rules()
    {
        return [
           'name'=>'required|max:100',
           'email'=>'required|email|unique:users,email',
           'password'=>'required|min:8|max:100',
           'address'=>'required',
           'role'=>'required|in:'. implode(',',config('common.user.role')),
           'gender'=>'required|in:'. implode(',',config('common.user.gender')),
        ];
    }
    public function messages(){
        return [
           'required'=>' :attribute  khong duoc de trong',
            // 'name.required'=>'Ho ten khong duoc de trong',
            //  'address.required'=>'dia chi khong duoc de trong',
            //  'email.required'=>'Email khong duoc de trong',
            'name.max'=>'Ho ten khong duoc vuot qua 100 ky tu',
            'email.unique'=>'email da ton tai',
            'email.email'=>'sai dinh dang email',

        ];
    }
    public function attributes()
    {
        return[
            'name'=>'Ho ten',
            'email'=>'Email',
            'password'=>'Mat khau',
            'address'=>'Dia chi',
            'role'=>'Tai khoan',
            'gender'=>'Gioi tinh',
        ];
    }

}
