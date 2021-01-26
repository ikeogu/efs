<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubSubject extends Model
{
    public $timestamps = false;
    protected $fillable =[
        'name',
        
        'student_id',
        's5_class_id',
        'term_id',
         'name',
         'level','cat_1','cat_2','exam'
        
    ];

    public function subject(){
        return $this->belongsToMany(Subject::class);
    }
     public function student(){
        return $this->belongsToMany(Student::class);
    }
}
