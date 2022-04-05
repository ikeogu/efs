<?php

namespace App\Http\Resources;

use App\Student;
use App\SubjComment;
use App\SubjectMark;
use App\SubjectMarkComment;
use Illuminate\Http\Resources\Json\JsonResource;

class SubjCommentDes extends JsonResource
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
        'student' => Student::find($this[0])->name . ' '. Student::find($this[0])->surname,
        'description' => SubjComment::find($this[1])->description,
        'acquired'=> $this[2],
        'emerging'=>$this[3]
        ];
    }
}
