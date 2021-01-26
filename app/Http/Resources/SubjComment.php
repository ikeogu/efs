<?php

namespace App\Http\Resources;

use App\S5Class;
use App\Term;
use Illuminate\Http\Resources\Json\JsonResource;

class SubjComment extends JsonResource
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
            'f' => $this->f,
            's' => $this->s,
            'th' => $this->th,
            'fr' => $this->fr,
            'fif' => $this->fif,
            'six' => $this->six,
            'sev' => $this->sev,
            'class_' => S5Class::where('id',$this->s5_class_id)->first(),
            'term' => Term::where('id',$this->term_id)->first(),
            's5_class_id' =>$this->s5_class_id,
            'term_id' =>$this->term_id
        ];
    }
}
