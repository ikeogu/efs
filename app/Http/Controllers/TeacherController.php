<?php

namespace App\Http\Controllers;

use App\ClassTeacher;
use App\Http\Resources\ClassTeacherResource;
use App\LockTeacher;
use App\S5Class;
use Illuminate\Http\Request;
use App\Teacher;
use App\Term;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    //

    public function dashboard(){
         
        if(Auth::check()){
            $stud = Teacher::find(Auth::user()->teacher_id);
            $subjects = $stud->subjects;
            return view('teacher/dashboard',['teacher'=>$stud,'subjects'=>$subjects]);
        }
        return redirect(route('login'));
    }

    public function my_subject_student(){

        if(Auth::check()){
            if( $stud = Teacher::find(Auth::user()->teacher_id)){
                $subjects = $stud->subjects;
                return view('teacher/dashboard',['teacher'=>$stud,'subjects'=>$subjects]);
            }
        }
        return redirect(route('login'));
    }

    public function sub_class(){
        return view('teacher/student_in_class');
    }
    // fix you later
    public function classt($id){
        $te = Teacher::find($id);
        return view('teacher.classteacher',['classt'=>$te->classTeacher ]);
    }
    
    public function allbroadsheet($id){
        $te = Teacher::find($id);
        if($te->cord ==1){
            $term = Term::all();
            $class_ = S5Class::all();
            return view('teacher.allbroadsheet',['term'=>$term, 'class_'=>$class_]);
        }
        return back()->with('success','Oops!! Not a Cordinator!');
    }
     public function allbroadsheet2(){
    
        if(auth()->user()->isAdmin==1){
            $term = Term::all();
            $class_ = S5Class::all();
            return view('allbroadsheet',['term'=>$term, 'class_'=>$class_]);
        }
        
     }
}
