<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    protected $fillable=['name','email','status','start_year','level','keep_track','cord'];

   

        public function user(){
            return $this->belongsTo(User::class);
        }

        public function term(){
            return $this->belongsToMany(Term::class)->withPivot('subject_id')->withTimestamps();
        }
        
        public function subjects(){
            return $this->belongsToMany(Subject::class);
        }
        public function classTeacher(){
            return $this->hasMany(ClassTeacher::class);
        }
        public function comment(){
            return $this->hasMany(Comment::class);
        }
        public function lockTeacher(){
            return $this->hasOne(LockTeacher::class);
        }

        public function assignment(){
            return $this->hasMany(Assignment::class);
        }
}