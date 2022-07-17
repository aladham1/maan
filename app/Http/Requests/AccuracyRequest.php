<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AccuracyRequest extends FormRequest
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
       return
            [
                'question1' => 'required',
                'question2' => ['required_if:question1,==,1'],
                'question3' => ['required_if:question1,==,1'],
                'question4' => ['required_if:question1,==,1'],
                'question5' => ['required_if:question1,==,1'],
                'question6' => ['required_if:question1,==,1'],
                'question7' => ['required_if:question1,==,1'],
                'question8' => ['required_if:question1,==,2','required_if:question4,==,2' ],
                'question1_note'=> 'required_if:question1,==,2',
                'question2_note'=> 'required_if:question2,==,2',
                'question3_note'=> 'required_if:question3,==,1',
                'question4_note'=> 'required_if:question4,==,2',
                'question5_note'=> 'required_if:question5,==,2',
                'question6_note'=> 'required_if:question6,==,1',
                'question7_note'=> 'required_if:question7,==,2',

            ];
    }

    public function messages()
    {
        return [
            'question1.required' => 'يرجى الإجابة عن السؤال.',
            'question2.required_if' => 'يرجى الإجابة عن السؤال.',
            'question3.required_if' => 'يرجى الإجابة عن السؤال.',
            'question4.required_if' => 'يرجى الإجابة عن السؤال.',
            'question5.required_if' => 'يرجى الإجابة عن السؤال.',
            'question6.required_if' => 'يرجى الإجابة عن السؤال.',
            'question7.required_if' => 'يرجى الإجابة عن السؤال.',
            'question8.required_if' => 'يرجى الإجابة عن السؤال.',
            'question1_note.required_if' => 'يرجى الإجابة عن السؤال.',
            'question2_note.required_if' => 'يرجى الإجابة عن السؤال.',
            'question3_note.required_if' => 'يرجى الإجابة عن السؤال.',
            'question4_note.required_if' => 'يرجى الإجابة عن السؤال.',
            'question5_note.required_if' => 'يرجى الإجابة عن السؤال.',
            'question6_note.required_if' => 'يرجى الإجابة عن السؤال.',
            'question7_note.required_if' => 'يرجى الإجابة عن السؤال.',
        ];
    }
}