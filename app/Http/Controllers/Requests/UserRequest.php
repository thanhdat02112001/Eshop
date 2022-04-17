<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            "email"=>"required|email|unique:users,email,".$this->id,
            "fullname" => "required",
            "password" => "required|min:6|max:30",
            "phone" => "required|numeric",
            "address" => "required",
            "birthday" => "required",
            'gender' => "required",
        ];
    }

    public function messages(){
        return [
            "email.unique" => "Email đã tồn tại!",
            "email.required" => "Email không được để trống !",
            "email.email" => "Email không hợp lệ !",
            "password.required" => "Mật khẩu không được để trống",
            "password.min" => "Mật khẩu tối thiểu 6 ký tự",
            "password.max" => "Mật khẩu tối đa 30 ký tự",
            "fullname.required" => "Tên không được để trống",
            "phone.required" => "Số điện thoại không được để trống",
            "phone.numeric" => "Số điện thoại phải ở dạng số",
            "address.required" => "Địa chỉ không được để trống",
            "gender.required" => "Giới tính không được để trống",
            "birthday.required" => "Sinh nhật không được để trống",
        ];

    }
}
