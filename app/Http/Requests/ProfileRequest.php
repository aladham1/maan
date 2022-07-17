<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
        return [
            'user_name' => ['required','max:100'],
            'mobile' => ['required','digits:10','regex:/(059|056)[0-9]{7}/'],
            'email' => ['email','required'],

        ];
    }

    public function messages()
    {
        return [
            'user_name.required' => 'يرجى إدخال اسم المستخدم.',
            'email.required' => 'البريد الإلكتروني خطأ، يرجى إدخال بريد إلكتروني صحيح وفعال.',
            'email.email' => 'البريد الإلكتروني خطأ، يرجى إدخال بريد إلكتروني صحيح وفعال.',
            'mobile.required' => 'رقم المحمول خطأ، يرجى إدخال رقم محمول صحيح وفعال.',
            'mobile.digits' => 'رقم المحمول خطأ، يرجى إدخال رقم محمول صحيح وفعال.',
            'mobile.regex' => 'رقم التواصل خطأ، يرجى إدخال رقم تواصل صحيح وفعال.',

        ];
    }
}
