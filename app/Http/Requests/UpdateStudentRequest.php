<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'faculty_id' => 'required',
            'degree_id' => 'required',
            'admissiontype_id' => 'required',
            'frmno' => 'required',
            'ENTS' => 'required',
            'N1' => 'required',
            'N2' => 'required',
            'N3' => 'required',
            'N4' => 'required',
        ];
    }
    public function messages()
    {
        return [

            'faculty_id.required' =>'يجب اختيار الكلية',
            'degree_id.required' =>'يجب اختيار البرنامج',
            'admissiontype_id.required' =>'يجب اختيار نوع القبول',
            'frmno.required' =>'يجب ادخال الرقم الجامعي',
            'ENTS.required' =>'يجب اختيار عام القبول',
            'N1.required' =>'يجب ادخال الاسم الاول',
            'N2.required' =>'يجب ادخال الاسم الثاني',
            'N3.required' =>'يجب ادخال الاسم الثالث',
            'N4.required' =>'يجب ادخال الاسم الرابع',
           
        ];
    }


}
