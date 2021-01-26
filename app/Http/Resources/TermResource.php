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
            'fee_h' =>$this->fee_h,
            'fee_y' =>$this->fee_y,
            'fee_e' =>$this->fee_e,
            'resumption_date' =>$this->resumption_date,
            'y_summative' =>$this->y_summative,
            'e_summative' =>$this->e_summative,
            'h_cat1' =>$this->h_cat1,
            'h_cat2' =>$this->h_cat2,
            
            ];
    }
}
