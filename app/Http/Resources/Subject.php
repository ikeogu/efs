<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Student as StudentResource;
class Subject extends JsonResource
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
            'description' => $this->description,
            'class_work' => $this->class_work,
            'home_work' => $this->home_work,
            'level' => $this->level,
            'holiday_assignment' => $this->holiday_assignment,
            'summative_test' => $this->summative_test,
            'cat_1' => $this->cat_1,
            'cat_2' => $this->cat_2,
            'exam' => $this->exam,
            'students' => StudentResource::collection($this->whenLoaded('students')),
        ];
    }
}
