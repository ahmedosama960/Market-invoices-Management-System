<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productValidation extends FormRequest
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

    public function rules(){
        return [
            "name"=>"required|max:255|unique:products,name->ar,$this->id",
            "name_en"=>"required|max:255|unique:products,name->en,$this->id",
            "notes"=>"max:800"
        ];
    }

    public function messages()
    {
        return
        [
            "name.required"=>"حقل الاسم باللغة العربيه يجب ادخاله",
            "name_en.required"=>"name field in english must be entered",
            "notes"=>"لقد تخطيت الحد الاقصي | you've reached the size limatation"
        ];
    }
}
