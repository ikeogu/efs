<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SubjectMark;
use App\SubSubject;
use App\Student;
use App\S5Class;
class Subject extends Model
{
    //
    protected $guarded = [];
    protected $fillable = ['name','description','home_work','class_work','friday_test',
    'holiday_assignment','level','summative_test','cat_1','cat_2','exam','status'];

    /**
     * students that belong to the subject.
     */
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
    public function subjectMark(){
        return $this->belongsToMany(SubjectMark::class);
    }

    public function term(){
        return $this->belongsToMany(Term::class);
    }
    public function teacher(){
        return $this->belongsToMany(Teacher::class);
    }
    public function subsubject(){
        return $this->hasMany(SubSubject::class);
    }
    public function assignment()
    {
        return $this->hasMany(Assignment::class);
    }
   public static function findClass($id){
       return  S5Class::find($id)->name;
   }
   public static function findTerm($id){
       return Term::find($id)->name;
   }
}