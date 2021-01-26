<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LockTeacherResource extends JsonResource
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
            'status'=>$this->status,
            'teacher_id'=>$this->teacher_id,
            'term_id'=>$this->term_id
        ];
    }
}
