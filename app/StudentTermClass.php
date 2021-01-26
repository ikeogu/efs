<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentTermClass extends Model
{
    //
    protected $table = 'student_term_classes';
    protected $fillable = ['student_id','s5_class_id','term_id'];

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function term(){
        return $this->belongsTo(Term::class);
    }

    public function s5class(){
        return $this->belongsTo(S5Class::class);
    }
    // linking students to there subjects
    
}
