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
            'student' => Student::where('id', $this->student_id)->first()->surname.' '. Student::where('id', $this->student_id)->first()->name,
            's5_class_id' => S5Class::where('id',$this->s5_class_id)->first()->name.''.S5Class::where('id',$this->s5_class_id)->first()->description,    
            'term' =>  Term::where('id',$this->term_id)->first()->name.''.Term::where('id',$this->term_id)->first()->description,
           ];
    }
}
