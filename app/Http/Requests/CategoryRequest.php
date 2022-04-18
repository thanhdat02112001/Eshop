<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => "required|unique:categories,category_name,".$this->id,
            'description' => "required",
        ];
    }
    public function messages()
    {
        return[
            "name.unique" => "Danh mục đã tồn tại !",
            "name.required" => "Không được để trống !"
        ];
    }
}
