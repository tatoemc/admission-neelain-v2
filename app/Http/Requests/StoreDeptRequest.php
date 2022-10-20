<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeptRequest extends FormRequest
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
            'name' => 'required',
            'faculty_id' => 'required',
        ];
    }
    public function messages()
    {
        return [

            'name.required' =>'يرجي ادخال  اسم القسم ',
            'faculty_id.required' =>'يرجى ادخال اسم الكلية'
        ];
    }


}
