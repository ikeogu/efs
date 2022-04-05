<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\ClassTeacher;
use App\Http\Resources\ClassTeacherResource;
use App\LockTeacher;
use App\S5Class;
use App\Student;
use App\StudentTerm;
use App\Subject;
use Illuminate\Http\Request;
use App\Teacher;
use App\Term;
use DB;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    //

    public function dashboard()
    {

        if (Auth::check()) {
            $stud = Teacher::find(Auth::user()->teacher_id);
            $subjects = $stud->subjects;
            return view('teacher/dashboard', ['teacher' => $stud, 'subjects' => $subjects]);
        }
        return redirect(route('login'));
    }

    public function my_subject_student()
    {

        if (Auth::check()) {
            if ($stud = Teacher::find(Auth::user()->teacher_id)) {
                $subjects = $stud->subjects;
                return view('teacher/dashboard', ['teacher' => $stud, 'subjects' => $subjects]);
            }
        }
        return redirect(route('login'));
    }

    public function sub_class()
    {
        return view('teacher/student_in_class');
    }
    // fix you later
    public function classt($id)
    {
        $te = Teacher::find($id);
        return view('teacher.classteacher', ['classt' => $te->classTeacher]);
    }

    public function allbroadsheet($id)
    {
        $te = Teacher::find($id);
        if ($te->cord == 1) {
            $term = Term::all();
            $class_ = S5Class::all();
            return view('teacher.allbroadsheet', ['term' => $term, 'class_' => $class_]);
        }
        return back()->with('success', 'Oops!! Not a Cordinator!');
    }
    public function allbroadsheet2()
    {

        if (auth()->user()->isAdmin == 1) {
            $term = Term::all();
            $class_ = S5Class::all();
            return view('allbroadsheet', ['term' => $term, 'class_' => $class_]);
        }
    }
    public function assignment()
    {
        $teacher = Teacher::find(auth()->user()->teacher_id);
        $term = Term::all();
        $class_ = S5Class::all();
        $subjects = $teacher->subjects;
        return view('assignment.p_assignment', ['term' => $term, 'class_' => $class_, 'subjects' => $subjects]);
    }
    public function postAssignment(Request $request)
    {
        $class_ = S5Class::find($request->class_);
        $term = Term::find($request->term);

        $assignment = Assignment::where('title', $request->title)->where('s5_class_id', $request->s5_class_id)->first();
        if (empty($assignment)) {
            $assignment = new Assignment();
            $assignment->title = $request->title;
            $assignment->s5_class_id = $class_->id;
            $assignment->term_id = $request->term;
            $assignment->subject_id = $request->subject_id;
            $assignment->teacher_id = auth()->user()->teacher_id;
            $assignment->instruction = $request->instruction;
            $assignment->body = $request->body;
            $assignment->dead_line = $request->dead_line;
            $assignment->status = 1;
            if ($request->hasFile('file')) {
                $image = $request->file('file');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = storage_path('/assignment/' . $class_->name . '_' . $class_->description . '_' . $term->name . '_' . $term->session);
                $image->move($destinationPath, $imageName);
            } else {
                $imageName = 'no Image';
            }

            $assignment->file = $imageName;
            $assignment->save();
            return back()->with('success', 'Assignment has been Posted.');
        }
        return back()->with('success', 'Assignment Already Exists!.');
    }
    public function updateASSG(Request $request, $id)
    {
        $class_ = S5Class::find($request->class_);
        $term = Term::find($request->term);

        $assignment = Assignment::find($id);

        $assignment->title = $request->title;
        $assignment->s5_class_id = $class_->id;
        $assignment->term_id = $request->term;
        $assignment->subject_id = $request->subject_id;
        $assignment->teacher_id = auth()->user()->teacher_id;
        $assignment->instruction = $request->instruction;
        $assignment->body = $request->body;
        $assignment->dead_line = $request->dead_line;
        $assignment->status = 1;
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = storage_path('/assignment/' . $class_->name . '_' . $class_->description . '_' . $term->name . '_' . $term->session);
            $image->move($destinationPath, $imageName);
        } else {
            $imageName = 'no Image';
        }

        $assignment->file = $imageName;
        $assignment->save();
        return back()->with('success', 'Assignment has been Posted.');
    }
    public function myAssignments()
    {
        $teacher = Teacher::find(auth()->user()->teacher_id);
        $term = Term::all();
        $class_ = S5Class::all();
        $subjects = $teacher->subjects;
        $teacher  = Teacher::find(auth()->user()->teacher_id);
        return view('assignment.l_assignment', ['assignment' => $teacher->assignment, 'term' => $term, 'class_' => $class_, 'subjects' => $subjects]);
    }

    public function studentASS()
    {
        $student = StudentTerm::where('student_id', auth()->user()->student_id)->latest()->first();
        $arr  = [];
        $term =[];
        $assignment = [];
        
        // foreach ($student as $i) {
        //     array_push($arr, $i->s5_class_id);
        //     array_push($term,$i->term_id);
        // }

         $ass =   Assignment::where('s5_class_id',$student->s5_class_id)->where('term_id',$student->term_id)->get();
        return view('assignment.student', ['assignments' => $ass]);
    }
    public function viewAss(Request $request)
    {
        $student = StudentTerm::where('student_id', auth()->user()->student_id)->get();
        $arr  = [];
        foreach ($student as $i) {
            array_push($arr, $i->s5_class_id);
        }
        $terms = Term::all();
        $class_ = S5Class::whereIn('id', $arr)->get();
        $ass = Assignment::where('s5_class_id', $request->class_)->where('term_id', $request->term)->get();
        return view('assignment.student', ['assignment' => $ass, 'class_' => $class_, 'terms' => $terms]);
    }
    public function assSingle($id)
    {
        $ass = Assignment::find($id);
        return view('assignment.show', ['ass' => $ass]);
    }
    public function downloadAss($id)
    {
        
    
        $assignment = Assignment::find($id);
        $class_ = S5Class::find($assignment->s5_class_id);
        $term = Term::find($assignment->term_id);
        $path = 'assignment/' . $class_->name . '_' . $class_->description . '_' . $term->name . '_' . $term->session . '/';
        $file_path = storage_path($path . $assignment->file);
        if(file_exists($file_path)){
             $assignment->views += 1;
        $assignment->save();
        return response()->download($file_path);
        }else{
            return back()->withErrors($file_path);
        }
       
    }
    public function adminAss()
    {
        $ass = Assignment::latest()->get();
        return view('assignment.index', ['ass' => $ass]);
    }
    
    public function destroyAss($id){
        
     $ass = Assignment::find($id);
     $ass->delete();
     return back()->with('success','Deleted');
    }
}