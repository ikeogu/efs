<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LockTeacher extends Model
{
    //
    protected $fillable = ['teacher_id','term_id','status'];

    public function teachers(){
        return $this->belongsTo(Teacher::class);
    }

    public function term(){
        return $this->belongsTo(Term::class);
    }
}
