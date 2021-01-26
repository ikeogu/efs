<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectMarkRequest extends FormRequest
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
            'student_id'=> 'required|integer',
        'subject_id'=> 'required|integer',
        'HW'=> 'nullable|integer',
        'CW'=> 'nullable|integer',
        'FT'=> 'nullable|integer',
        'HA'=> 'nullable|integer',
        'Summative_test'=> 'nullable|integer',
        'Exam'=> 'nullable|integer',
        'MSC'=> 'nullable|integer',
        'GT'=> 'nullable|integer',
        'CAT1'=> 'nullable|integer',
        'CAT2'=> 'nullable|integer',
        ];
    }
}
