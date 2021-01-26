<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentTerm extends Model
{
    //
    protected $table = 'student_term';

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function term(){
        return $this->belongsTo(Term::class);
    }

    public function s5class(){
        return $this->belongsTo(S5Class::class);
    }
}
