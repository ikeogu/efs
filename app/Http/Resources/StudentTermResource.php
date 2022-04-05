<?php

namespace App\Http\Resources;

use App\S5Class;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Student;
use App\Term;

class StudentTermResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'student' => (Student::find($this->student_id))? (Student::find($this->student_id)->surname ?? ''.' '. Student::find($this->student_id)->name ?? ''): '',
            's5_class_id' => S5Class::find($this->s5_class_id)->name.''.S5Class::find($this->s5_class_id)->description,    
            'term' =>  Term::find($this->term_id)->name.''.Term::find($this->term_id)->description,
           ];
    }
}
