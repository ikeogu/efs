<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class S5ClassResource extends JsonResource
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
            'status' => $this->status,
            'description' => $this->description,
            'no_of_students'=> $this->no_of_students
        ];
    }
}
