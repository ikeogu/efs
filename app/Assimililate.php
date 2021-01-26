<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assimililate extends Model
{
    //0
    protected $fillable = [
        'student_id','subjComment_id','term_id','s5_class_id','assimiliate'
    ];

    public function subjComment(){
        return $this->belongsTo(SubjComment::class);
    }
}
