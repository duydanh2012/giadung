<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePassRequest extends FormRequest
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
            'password'              => 'required',
            'password_new'          => 'required|different:password',
            'password_confirm'      => 'required|same:password_new',
        ];
    }

    public function messages()
    {
        return [
            'password.required'              => 'Vui lòng nhập password',
            'password_new.required'          => 'Vui lòng nhập mật khẩu mới',
            'password_new.different'         => 'Mật khẩu mới phải khác mật khẩu cũ',
            'password_confirm.same'          => 'Nhập lại mật khẩu không trùng khớp',
        ];
    }
}
