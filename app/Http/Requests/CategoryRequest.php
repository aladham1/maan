<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CategoryRequest extends FormRequest
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
            'name' => 'required',
            'is_complaint' => 'required',
            'main_category_id' => 'required',
            'benefic_show' => 'required_without:citizen_show',
            'parent_id' => 'sometimes|nullable',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'الفئة الفرعية غير محددة، يرجى تحديدها بالشكل الصحيح.',
            'is_complaint.required' => 'نوع الفئة غير محدد، يرجى تحديده بالشكل الصحيح.',
            'main_category_id.required' => 'الفئة الرئيسية غير محددة، يرجى تحديدها بالشكل الصحيح.',
            'benefic_show.required_without' => 'فئة مقدم الاقتراح/ الشكوى غير محددة، يرجى تحديدها بالشكل الصحيح.',
        ];
    }
}
