<?php

namespace App\Http\Requests\Admin\User;

use App\Rules\RuleEmailUniqueOnUpdateUser;
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
           'name'=>'required|max:100',
           'email'=>[
               'required',
               'email',
               new RuleEmailUniqueOnUpdateUser(),
            ],
           'address'=>'required',
           'role'=>'required|in:'. implode(',',config('common.user.role')),
           'gender'=>'required|in:'. implode(',',config('common.user.gender')),
        ];
    }
     public function messages(){
        return [
           'required'=>' :attributes khong duoc de trong',
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
