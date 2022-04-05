<?php

namespace App\Http\Resources;

use App\Student;
use App\BehaviourChart;
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
            'id' => $this->id,
            'pic' => BehaviourChart::converter($this->pic),
            'la'=> BehaviourChart::converter($this->la),
            'fift'=> BehaviourChart::converter($this->fift),
            'cwot'=> BehaviourChart::converter( $this->cwot),
            'anc' => BehaviourChart::converter($this->anc),
            'efao'=> BehaviourChart::converter($this->efao),
            'srk' => BehaviourChart::converter($this->srk),
            'hwc' => BehaviourChart::converter($this->hwc),
            'catt'=> BehaviourChart::converter( $this->catt),
            'care' =>BehaviourChart::converter($this->care),
            'res' => BehaviourChart::converter($this->res),
            'Hon'=> BehaviourChart::converter($this->Hon),
            'init'=> BehaviourChart::converter($this->init),
            'lead'=> BehaviourChart::converter($this->lead),
            'dressc' => BehaviourChart::converter($this->dressc),
            'obey'=> BehaviourChart::converter($this->obey),
            'pol' => BehaviourChart::converter($this->pol),
            'team' => BehaviourChart::converter($this->team),
            'soc'=> BehaviourChart::converter($this->soc),
            'psy' => BehaviourChart::converter($this->psy),
            'sport' => BehaviourChart::converter($this->sport),
            'notec' => BehaviourChart::converter($this->notec),
            'spoken' => BehaviourChart::converter($this->spoken), 
            'mus' => BehaviourChart::converter($this->mus) ,
            'craft'=> BehaviourChart::converter($this->craft),
            'student'=>Student::where('id',$this->student_id)->first()->name.' '.
            Student::where('id',$this->student_id)->first()->oname.' '.Student::where('id',$this->student_id)->first()->surname,
        ];
    }
}