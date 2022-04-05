<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TermResource extends JsonResource
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
            'status' => $this->status,
            'session' => $this->session,
            'ss1' =>$this->ss1,
            'ss2' => $this->ss2,
            'ss3' => $this->ss3,
            'jss1' =>$this->jss1,
            'jss2' =>$this->jss2,
            'jss3' =>$this->jss3,
            'y1' =>$this->y1,
            'y2' => $this->y2,
            'y3' => $this->y3,
            'y4' => $this->y4,
            'y5' => $this->y5,
            'y6' => $this->y6,
            'tulip' =>$this->tulip,
            'prekin' =>$this->prekin,
            'kinda' => $this->kinda,
            'resumption_date' =>$this->resumption_date,
            'y_summative' =>$this->y_summative,
            'e_summative' =>$this->e_summative,
            'h_cat1' =>$this->h_cat1,
            'h_cat2' =>$this->h_cat2,
            'msc' =>$this->msc,
            
            ];
    }
}