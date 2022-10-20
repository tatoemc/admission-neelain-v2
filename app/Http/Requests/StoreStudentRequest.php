<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'file' => 'required|mimes:xls,xlsx|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'file.required' =>'يرجي اختيار الملف ',
            'file.mimes' =>'يجب ان يكون نوع الملف اكسل',
            'file.max' =>'حجم الملف كبير',
        ];
    }
}
