<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDegreeRequest extends FormRequest
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
            'name' => 'required|unique:degrees',
        ];
    }
    public function messages()
    {
        return [

            'name.required' =>'يرجي ادخال  اسم القسم ',
            'name.unique' =>'اسم البرنامج موجود بالفعل'
        ];
    }
}
