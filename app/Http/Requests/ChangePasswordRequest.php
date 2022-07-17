<?php

namespace App\Http\Requests;

use App\Rules\MatchOldPassword;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'old_password' => ['required', new MatchOldPassword()],
            'password' => 'required|max:50',
            'password_confirmation' => 'required|max:50|same:password'
        ];

    }

    public function messages()
    {
        return[
            'old_password.required' => 'كلمة المرور غير مدخلة، يرجى إدخال كلمة المرور بالشكل الصحيح',
            'password.required' => 'كلمة المرور غير مدخلة، يرجى إدخال كلمة المرور بالشكل الصحيح',
            'password_confirmation.required' => 'كلمة المرور غير مدخلة، يرجى إدخال كلمة المرور بالشكل الصحيح',
            'password_confirmation.same' => 'كلمة المرور غير صحيحة، يرجى إدخال كلمة المرور الصحيحة',
        ];
    }
}