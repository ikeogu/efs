<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Subject as SubjectResource;
use App\Http\Resources\Student as StudentResource;
use App\Student;
use App\Subject;

class SubjectMarkResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
     {
    //     $student =StudentResource::collection($this->whenLoaded('student'));
    //     $sub = SubjectResource::collection($this->whenLoaded('subject'));
        return [
            
        'student' => (Student::find($this->student_id)) ? (Student::find($this->student_id)->surname.' '. Student::find($this->student_id)->name) : '',
         'subject' => Subject::where('id', $this->subject_id)->first()->name,
       
            'id'=>$this->id,
            'student_id' => $this->student_id,
            'subject_id' => $this->subject_id,
            'TCA' => $this->TCA,
            
            'HW'=>$this->HW,
            'CW'=>$this->CW,
            'FT' =>$this->FT,
            'HA' =>$this->HA,
            'summative_test' =>$this->summative_test,
            'summative_1'=>$this->summative_1,
            'Exam' =>$this->Exam,
            'MSC' =>$this->MSC,
            'GT'=>$this->GT,
            'CAT1' =>$this->CAT1,
            'CAT2'=>$this->CAT2,
        ];
    }
}
