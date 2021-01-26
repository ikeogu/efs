<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Subject as SubjectResource;
use App\Http\Resources\ClassTeacherResource;
use App\User;

class Teacher extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'start_year' => $this->start_year,
            'status' => $this->status,
            'level' => $this->level,
             'track' => User::where('teacher_id',$this->id)->first()->keep_track ?? '',
            'subjects' => SubjectResource::collection($this->whenLoaded('subjects')),
            'class_teacher' => ClassTeacherResource::collection($this->whenLoaded('classTeacher')),
            ];
    }
}
