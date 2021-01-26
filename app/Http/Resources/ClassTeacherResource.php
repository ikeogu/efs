<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\S5Class;
use App\Term;

class ClassTeacherResource extends JsonResource
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
            'teacher_id' => $this->teacher_id,
            's5_class_id' => $this->s5_class_id,
            'term_id'=>$this->term_id,
            'myclass'=> S5Class::where('id', $this->s5_class_id)->first()->name .' '.S5Class::where('id', $this->s5_class_id)->first()->description,
            'term_'=>Term::where('id', $this->term_id)->first()->name.' '.Term::where('id', $this->term_id)->first()->session,
        ];
    }
}
