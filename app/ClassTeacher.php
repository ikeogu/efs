<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Teacher;
class ClassTeacher extends Model
{
    //
    protected $fillable = [
        'teacher_id','s5_class_id','term_id'
    ];

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
    public function term(){
        return $this->belongsTo(Term::class);
    }
    public function s5_class(){
        return $this->belongsTo(S5Class::class);
    }
    // public  static function class_teacher($tercher, $class){
    //     dd($tercher,$class);
    //     $teaacher_id = ClassTeacher::with('teacher')->where('teacher_id',$tercher)->where('s5_class_id',$class)->first();
    //     return $teaacher_id->teacher;

    // }
}
