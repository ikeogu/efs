<?php

namespace App\Http\Resources;

use App\S5Class;
use App\Term;
use App\Subject;
use Illuminate\Http\Resources\Json\JsonResource;

class SubjCommentCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
            'class_' => S5Class::where('id', $this->s5_class_id)->first()->name,
            'term' => Term::where('id', $this->term_id)->first()->name,
            'subject' => Subject::where('id', $this->subject_id)->first()->name,
            's5_class_id' => $this->s5_class_id,
            'term_id' => $this->term_id
        ];
    }
}
