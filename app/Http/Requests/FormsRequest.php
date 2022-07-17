<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormsRequest extends FormRequest
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
            'type' => 'required|integer|max:50',
            'sent_type' => 'required|numeric|digits_between:1,10',
            'project_id' => 'required|numeric|digits_between:1,10',
            'citizen_id' => 'required_if:hide_data,==,1|numeric|digits_between:1,10',
            'category_id' => 'required|numeric|digits_between:1,10',
            'content' => 'required|max:1000',
            'datee' => auth()->check() ? 'required' : '',
            'type_of_followup_visit' => 'required_if:sent_type,==,4',
            'box_place' => 'required_if:sent_type,==,5',
            'number_of_open_box' => 'required_if:sent_type,==,5',
            'date_open_box' => 'required_if:sent_type,==,5',
        ];
    }

    public function messages()
    {
        return [
            'sent_type.required' => 'آلية الاستقبال غير محددة، يرجى تحديدها بالشكل الصحيح.',
            'type_of_followup_visit.required_if' => 'نوع زيارة المتابعة غير مدخل، يرجى إدخال النوع بالشكل الصحيح.',
            'content.required' => 'المحتوى غير مدخل، يرجى إدخال المحتوى بالشكل الصحيح.',
//            'title.required' => 'الموضوع غير مدخل، يرجى إدخال الموضوع بالشكل الصحيح.',
            'category_id.required' => 'الفئة غير محددة، يرجى تحديدها بالشكل الصحيح.',
            'datee.required' => 'التاريخ غير محدد، يرجى تحديده بالشكل الصحيح.',
            'box_place.required_if' => 'المكان غير مدخل، يرجى إدخال المكان بالشكل الصحيح.',
            'number_of_open_box.required_if' => 'رقم الاجتماع غير مدخل، يرجى إدخال الرقم بالشكل الصحيح.',
            'date_open_box.required_if' => 'التاريخ غير محدد، يرجى تحديده بالشكل الصحيح.',

        ];
    }
}
