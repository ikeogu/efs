<?php

namespace App\Http\Resources;

use App\Student;
use Illuminate\Http\Resources\Json\JsonResource;

class BehaviourChartResource extends JsonResource
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
            'id' =>$this->id,
            'pic' => $this->pic,
            'la'=>$this->la,
            'fift'=>$this->fift,
            'cwot'=>$this->cwot,
            'anc' =>$this->anc,
            'efao'=>$this->efao,
            'srk' =>$this->srk,
            'hwc' =>$this->hwc,
            'catt'=>$this->catt,
            'care' =>$this->care,
            'res' =>$this->res,
            'Hon'=>$this->Hon,
            'init'=>$this->init,
            'lead'=>$this->lead,
            'dressc' =>$this->dressc,
            'obey'=>$this->obey,
            'pol' =>$this->pol,
            'team' =>$this->team,
            'soc'=>$this->soc,
            'psy' =>$this->psy,
            'sport' =>$this->sport,
            'notec' =>$this->notec,
            'spoken' =>$this->spoken, 
            'mus' =>$this->mus,
            'craft'=>$this->craft,
            'student'=>Student::where('id',$this->student_id)->first()->name.' '.
            Student::where('id',$this->student_id)->first()->oname.' '.Student::where('id',$this->student_id)->first()->surname,
        ];
    }
}
