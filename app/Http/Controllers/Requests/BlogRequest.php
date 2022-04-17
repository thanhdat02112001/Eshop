<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title' => "required",
            'description' => "required",
            'image' => "required"
        ];
    }
    public function messages()
    {
        return[
            "title.required" => "Không được để trống !",
            "description.required" => "Không được để trống !",
            "image.required" => "Không được để trống !"
        ];
    }
}
