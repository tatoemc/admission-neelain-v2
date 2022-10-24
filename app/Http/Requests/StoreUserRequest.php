<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
         'email' => 'required|unique:users',
         'password' => 'required|same:confirm-password',
         'roles_name' => 'required'
        ];
    }
    public function messages()
    {
        return [
        'name.required' =>'يرجي ادخال اسم المستخدم',
        'email.required' =>'يرجى ادخال البريد الألكتروني ',
        'email.unique' =>' البريد الألكتروني مستخدم بالفعل ',
        'password.required' =>'يرجى ادخال كلمة المرور ',
        'password.same' =>'كلمة المرور غير متطابقة ',
        'faculty_id.required' =>'يجب اختيار الكلية ',
        'roles_name.required' =>'يجب اختيار صلاحية المستخدم ',
        ];
    }

}
