<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    //
    protected $fillable = [
        'name',
        'session',
        'description',
        'status',
        'fee_h',
        'fee_y',
        'fee_e',
        'resumption_date',
        'h_cat1',
        'h_cat2',
        'y_summative',
        'e_summative',
        'fee_1_2',
        'fee_3',
        'fee_s1',
        'fee_s3'
    ];

    public function classes(){
        return $this->belongsToMany(S5Class::class);
    }
    public function student(){
        return $this->belongsToMany(Student::class)->withPivot('subject_id')->withTimestamps();
    }

    public function subject(){
        return $this->belongsToMany(Subject::class);
    } 

    public function teacher(){
        return $this->belongsToMany(Teacher::class);
    }
    public function comment(){
        return $this->hasMany(Comment::class);
    }
    public function studentTerm()
    {
        return $this->hasMany(StudentTerm::class);
    }
    public function behaviour(){
        return $this->hasMany(BehaviourChart::class);
    }
    public function subjComment(){
        return $this->hasOne(SubjComment::class);
    }
    public function lockTeacher(){
        return $this->hasOne(LockTeacher::class);
    }
}
