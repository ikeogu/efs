<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    //

    protected $fillable = ['title','instruction','body','file','s5_class_id','subject_id','teacher_id','dead_line','status','term_id'];
    public function teachers(){
        return $this->hasMany(Teacher::class);
    }

    public function students(){
        return $this->belongsTo(Student::class);
    }
    public function subjects(){
        return $this->belongsTo(Subject::class);
    }
}