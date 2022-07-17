<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'name' => 'required|max:191',
            'code' => 'required|max:50',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ];
    }

    public function messages()
    {
        return [
            'code.required'=>'رمز المشروع غير مدخل، يرجى إدخال الرمز بالشكل الصحيح.',
            'name.required'=>'اسم المشروع غير مدخل، يرجى إدخال الاسم بالشكل الصحيح.',
            'start_date.required'=>'تاريخ بداية المشروع غير مدخل، يرجى إدخال التاريخ بالشكل الصحيح.',
            'end_date.required'=>'تاريخ نهاية المشروع غير مدخل، يرجى إدخال التاريخ بالشكل الصحيح.',
            'end_date.after_or_equal'=>'تاريخ نهاية المشروع متعارض مع تاريخ البداية، يرجى إدخال التاريخ بالشكل الصحيح',
        ];
    }
}
