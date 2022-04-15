<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email'                 => 'required|max:60|min:6|email|unique:users',
            'password'              => 'required|min:6',
            'password_confirm'      => 'required|same:password',
            'name'                  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required'                 => 'Vui lòng nhập email',
            'email.max'                      => 'Email tối đa 60 ký tự',
            'email.min'                      => 'Email tối thiểu 60 ký tự',
            'email.email'                    => 'Email không hợp lệ',
            'email.unique'                   => 'Email đã tồn tại',
            'password.required'              => 'Vui lòng nhập password',
            'password.min'                   => 'Mật khẩu tối thiểu 6 ký tự',
            'password_confirm.required'      => 'Vui lòng nhập password',
            'password_confirm.same'          => 'Nhập lại mật khẩu không trùng khớp',
            'name.required'                  => 'Vui lòng nhập họ tên',                         
        ];
    }
}
