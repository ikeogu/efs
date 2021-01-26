<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class S5Class extends Model
{
    //
    protected $fillable = ['name','no_of_students','description','status'];


    public function student(){
        return $this->belongsToMany(Student::class);
    }

    public function term()
    {
        return $this->belongsToMany(Term::class);
    }
    public function subjectMark()
    {
        return $this->hasMany(SubjectMark::class);
    }
    public function classTeacher(){
        return $this->hasOne(ClassTeacher::class);
    }
    public function studentTerm()
    {
        return $this->hasMany(StudentTerm::class);
    }
    public function comment(){
        return $this->hasMany(Comment::class);
    }
    public function subjComment(){
        return $this->hasOne(SubjComment::class);
    }
}
