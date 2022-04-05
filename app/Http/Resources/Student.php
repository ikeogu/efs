<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Subject as SubjectResource;
use App\User;

class Student extends JsonResource
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
            'oname' => $this->oname,
            'email' => $this->email,
            'p_email' => $this->p_email,
            'surname' => $this->surname,
            'reg_no' => $this->reg_no,
            'gender' => $this->gender,
            'contact' => $this->contact,
            'photo' =>$this->photo,
            'dob' => $this->dob,
            'keep_track' => User::where('student_id',$this->id)->first()->keep_track ?? '',
            'address' => $this->address,
            'identification_mark'=> $this->identification_mark,
            'subjects' => SubjectResource::collection($this->whenLoaded('subjects')),
        ];
    }
}