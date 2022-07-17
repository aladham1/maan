<?php

namespace App\Http\Requests;

use App\Rules\IdNumber;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AccountRequest extends FormRequest
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
        $id = $this->route('account');

        $id_number = $this->request->get('id_number');
        $password = $this->request->get('password');
        $email = $this->request->get('email');
        $mobile = $this->request->get('mobile');
        $user_name = $this->request->get('user_name');
        $circle_id = $this->request->get('circle_id');



//        if(!empty($id_number) && empty($password) && empty($email) && empty($mobile) && empty($user_name)
//            && empty($circle_id) ){
//            return [
//                'id_number' => [\Illuminate\Validation\Rule::unique('accounts')->ignore($id)],
//            ];
//            return false;
//
//        }

        if(!empty($id) && empty($password)){
            return [
                'user_name' => ['required','max:100', \Illuminate\Validation\Rule::unique('accounts')->ignore($id)],
                'mobile' => 'required|digits:10',
                'email' => ['email','required',\Illuminate\Validation\Rule::unique('accounts')->ignore($id)],
                'circle_id' => 'required',
                'private' => 'required',
                'id_number' => [new IdNumber(),\Illuminate\Validation\Rule::unique('accounts')->ignore($id)],
            ];

        }else{
            return [
                'user_name' => ['required','max:100', \Illuminate\Validation\Rule::unique('accounts')->ignore($id)],
                'mobile' => 'required|digits:10',
                'email' => ['email','required',\Illuminate\Validation\Rule::unique('accounts')->ignore($id)],
                'password' => 'required|min:6',
                'circle_id' => 'required',
                'private' => 'required',
                'id_number' => [new IdNumber(),\Illuminate\Validation\Rule::unique('accounts')->ignore($id)],
            ];
        }

    }

    public function messages()
    {
        return [
            'user_name.required' => 'يرجى إدخال اسم المستخدم.',
            'email.required' => 'البريد الإلكتروني خطأ، يرجى إدخال بريد إلكتروني صحيح وفعال.',
            'email.email' => 'البريد الإلكتروني خطأ، يرجى إدخال بريد إلكتروني صحيح وفعال.',
            'email.unique' => 'البريد الإلكتروني موجود مسبقاً، يرجى إدخال بريد إلكتروني جديد.',
            'mobile.required' => 'رقم المحمول خطأ، يرجى إدخال رقم محمول صحيح وفعال.',
            'password.required' => 'يرجى إدخال كلمة المرور.',
            'password.min' => 'يجب أن لا تقل كلمة المرور عن 6 خانات.',
            'mobile.digits' => 'رقم المحمول خطأ، يرجى إدخال رقم محمول صحيح وفعال.',
            'id_number.required' => 'رقم الهوية خطأ، يرجى إدخال رقم هوية صحيح.',
            'circle_id.required' => 'يرجى اختيار المستوى الإداري.',
            'private.required' => 'يرجى تحديد مدى إمكانية تعامل المستخدم مع الاقتراحات والشكاوى التي يرغب مقدمها بإخفاء معلوماته الأساسية خلال معالجتها.',
            'id_number.unique' => 'رقم الهوية مدرج مسبقاً في النظام.',
            'user_name.unique' => 'اسم المستخدم موجود مسبقاً , يرجى إدخال اسم مستخدم مختلف.',
        ];
    }
}
