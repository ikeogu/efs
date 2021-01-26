<?php

namespace App\Http\Resources;

use App\Student;
use App\Teacher;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'id'=>$this->id,
            'teacher_id'=>  $this->teacher_id,
            'term_id'=> $this->term_id,
            's5_class_id'=> $this->s5_class_id,
            'student_id'=> $this->student_id,
            'comment'=> $this->comment,
            'hcomment'=> $this->hcomment,
            'created_at'=>$this->created_at,
            'teacher' => Teacher::where('id',$this->teacher_id)->first()->name ?? '',
            'student' => Student::where('id',$this->student_id)->first()->name.' '.Student::where('id',$this->student_id)->first()->oname.' '.Student::where('id',$this->student_id)->first()->surname,
        ];
    }
}
