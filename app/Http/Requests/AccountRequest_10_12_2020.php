<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'circle_id' => 'required|numeric|digits_between:1,10',
            'user_name' => "required|max:50",
             'mobile' => 'digits:10',
            'email' => 'required',
            'full_name' => 'required',
         //   'type' => "required|max:50",
        ];
    }
}
