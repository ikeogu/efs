<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            //
            'name' => 'required|string|between:3,255',
          'surname' => 'required|string|between:3,255',
          
          'dob' => 'nullable|date',
          'gender' => 'nullable|integer|between:1,3',
        //   'cnic' => 'nullable|regex:[^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$]',
          'identification_mark' => 'nullable|string',
          // 'contact' => 'required|between:10,20|regex:[^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$]',
          // 'address' => 'required|string',
        ];
    }
}
