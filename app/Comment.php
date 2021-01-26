<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'teacher_id',
        's5_class_id',
        'term_id',
        'student_id',
        'comment',
        'hcomment'
    ];

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function s5_class(){
        return $this->belongsTo(S5Class::class);
    }

    public function term(){
        return $this->belongsTo(Term::class);
    }
}
