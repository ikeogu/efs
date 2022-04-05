<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Average;
use App\BehaviourChart;
use App\ClassTeacher;
use App\Comment;
use Illuminate\Http\Request;
use App\Student;
use App\Subject;
use App\SubSubject;
use App\User;
use App\StudentTerm;
use App\Term;
use App\S5Class;
use App\SubjectMark;
use App\GradeSetting;
use PDF;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    //
    public function dashboard(){
        $stud =Student::find(Auth::user()->student_id);
        if($stud && Auth::user()->vr == 1){
        
            return view('students/biodata',['stud'=>$stud]);
        }
        return redirect(route('login'));
    }
    
       public function lockallh(){
      $stud=  Student::where('level','Junior High School')->orwhere('level','Senior High School')->get();
       foreach($stud as $it){
          User::where('student_id', $it->id)->update(array('vr' => 2)) ;
       }
       return back()->with('success','High School Students Locked');
        
    }
    public function unlockallh(){
         $stud=  Student::where('level','Junior High School')->orwhere('level','Senior High School')->get();
           foreach($stud as $it){
              User::where('student_id', $it->id)->update(array('vr' => 1)) ;
           }
        
        
             return back()->with('success','High School Students unLocked');
        
    }
     public function lockally(){
        $stud=  Student::where('level','Year School')->get();
       foreach($stud as $it){
          User::where('student_id', $it->id)->update(array('vr' => 2)) ;
       }
             return back()->with('success','Year School Students Locked');
        
    }
    public function unlockally(){
         $stud=  Student::where('level','Year School')->get();
       foreach($stud as $it){
          User::where('student_id', $it->id)->update(array('vr' => 1)) ;
       }
             return back()->with('success','Year School Students unLocked');
        
    }
     public function lockalle(){
       $stud=  Student::where('level','Early Years')->get();
       foreach($stud as $it){
          User::where('student_id', $it->id)->update(array('vr' => 2)) ;
       }
             return back()->with('success',' Early years Students Locked');
        
    }
    public function unlockalle(){
         $stud=  Student::where('level','Early Years')->get();
       foreach($stud as $it){
          User::where('student_id', $it->id)->update(array('vr' => 1)) ;
       }
             return back()->with('success','Early years Students unLocked');
        
    }
    public function no_result(){
        return view('no_result_yet');
    }
    public function hschool(){
        $h = Student::where('level','=','Senior School')->get();
        return view('students/hschool',['h'=>$h]);
    }
    public function jhschool(){
        $h = Student::where('level','=','Junior High School')->get();
        return view('students/jhschool',['h'=>$h]);
    }
    public function yschool(){
        $h = Student::where('level','=','Year School')->get();
        return view('students/yschool',['h'=>$h]);
    }
    public function eschool(){
        $h = Student::where('level','=','Early Years')->get();
        return view('students/eschool',['h'=>$h]);
    }
    public function grade($val,$grades){
        $remarks = '';
        $per = (int) ($val);
        if($per){
            foreach($grades as $grade) {
                $arr = explode('-', $grade->percentage);
                if ($per >= $arr[0] && $per <= $arr[1]) {
                 return $remarks = $grade->grade;
                }
            }
        }
           
        
    }
    public function average($total,$object){
        if($total){
            return number_format(($total/$object),1);
        }
        
    }
    public function averPer($avg,$scores){
        
        if($avg){
            return number_format((($avg/$scores) *100),1);
        }
    }
    
    public function summative($term_id,$class_1){
        $dets = $this->details($term_id,$class_1);
       
        if($dets['class_']->status == 'Year School') {
            $SMT_score = $dets['term']->y_summative;
            
            return view('results.summative',['students'=>$dets['students'], 'subject'=>$dets['subject'],
            'SMT_score'=>$SMT_score,'grades'=>$dets['grades'],'term'=>$dets['term'],'class_'=>$dets['class_']]);
       
        } 
        if($dets['class_']->status == 'Early Years') {
            $SMT_score = $dets['term']->e_summative;
        return view('results.summative',['students'=>$dets['students'], 'subject'=>$dets['subject'],'SMT_score'=>$SMT_score,
        'grades'=>$dets['grades'],'term'=>$dets['term'],'class_'=>$dets['class_']]);
        }  
        return back()->with('success', 'No class'); 
        
    }
    public function summative_1($term_id,$class_1){
        $dets = $this->details($term_id,$class_1);
       
        if($dets['class_']->status == 'Year School') {
             $SMT_1 = $dets['term']->y_summative1;
            
            return view('results.summative1',['students'=>$dets['students'], 'subject'=>$dets['subject'],
            'SMT_1'=>$SMT_1,'grades'=>$dets['grades'],'term'=>$dets['term'],'class_'=>$dets['class_']]);
       
        }
        
        return back()->with('success', 'No class'); 
        
    }
    
    public function exam($term_id,$class_1){
        $dets = $this->details($term_id,$class_1);
        $EXAM_score = 50;   
        return view('results.exam',['students'=>$dets['students'], 'subject'=>$dets['subject'],'EXAM_score'=>$EXAM_score,'grades'=>$dets['grades'],'term'=>$dets['term'],'class_'=>$dets['class_'],'subject_status'=>$dets['subject_status']]);
    }
    public function grandTotal($term_id,$class_1){
        $dets = $this->details($term_id,$class_1);
        $GT_score =100;             
        return view('results.gt',['students'=>$dets['students'], 'subject'=>$dets['subject'],'GT_score'=>$GT_score,'grades'=>$dets['grades'],'term'=>$dets['term'],'class_'=>$dets['class_'],'subject_status'=>$dets['subject_status']]);
    }
    public function tca($term_id,$class_1){
        $dets = $this->details($term_id,$class_1);
        $TCA_score = 50;
        return view('results.tca',['students'=>$dets['students'], 'subject'=>$dets['subject'],'TCA_score'=>$TCA_score,'grades'=>$dets['grades'],'term'=>$dets['term'],'class_'=>$dets['class_'],'subject_status'=>$dets['subject_status']]);
    }
    public function cat1s($term_id,$class_1){
        $dets = $this->details($term_id,$class_1);
        $TCA_score = $dets['term']->h_cat1;
        return view('results.cat1_broadsheet',['students'=>$dets['students'], 'subject'=>$dets['subject'],'TCA_score'=>$TCA_score,'grades'=>$dets['grades'],'term'=>$dets['term'],'class_'=>$dets['class_'],'subject_status'=>$dets['subject_status']]);
    }
    public function cat2s($term_id,$class_1){
        $dets = $this->details($term_id,$class_1);
        $TCA_score = $dets['term']->h_cat2;
        return view('results.cat2_broadsheet',['students'=>$dets['students'], 'subject'=>$dets['subject'],'TCA_score'=>$TCA_score,'grades'=>$dets['grades'],'term'=>$dets['term'],'class_'=>$dets['class_'],'subject_status'=>$dets['subject_status']]);
    }
    public function msc($term_id,$class_1){
        $dets = $this->details($term_id,$class_1);
        $TCA_score = 20;
        return view('results.msc',['students'=>$dets['students'], 'subject'=>$dets['subject'],'TCA_score'=>$TCA_score,'grades'=>$dets['grades'],'term'=>$dets['term'],'class_'=>$dets['class_'],'subject_status'=>$dets['subject_status']]);
    }
    public function summative_sheet($student_id,$term_id,$class_id){
        $dets = $this->det($student_id,$term_id,$class_id);
        
        if($dets['class_']->status == 'Year School'){
            $SMT_score = $dets['term']->y_summative;
            
            return view('results.summative_sheet',['student'=>$dets['student'],'term'=>$dets['term'],'class_'=>$dets['class_'],
            'scores'=>$dets['scores'],'users'=>$dets['users'],'SMT_score'=>$SMT_score,
            'grades'=>$dets['grades']]);
        }
        if($dets['class_']->status == 'Early Years'){
            $SMT_score = $dets['term']->e_summative;
            return view('results.summative_sheet',['student'=>$dets['student'],'term'=>$dets['term'],'class_'=>$dets['class_'],
            'scores'=>$dets['scores'],'users'=>$dets['users'],'SMT_score'=>$SMT_score,
            'grades'=>$dets['grades']]);
        }
       
        
    }
    public function summative_sheet1($student_id,$term_id,$class_id){
        $dets = $this->det($student_id,$term_id,$class_id);
        
        if($dets['class_']->status == 'Year School'){
            $SMT_score = $dets['term']->y_summative1;
            
            return view('results.summative-1',['student'=>$dets['student'],'term'=>$dets['term'],'class_'=>$dets['class_'],
            'scores'=>$dets['scores'],'users'=>$dets['users'],'SMT_1'=>$SMT_score,
            'grades'=>$dets['grades']]);
        }
        
       
        
    }
    
    public function cat1($student_id,$term_id,$class_id){
         
        if(Auth::check()){
        $dets = $this->det($student_id,$term_id,$class_id);
        $TCA_score = $dets['term']->h_cat1;
        
            return view('results.cat1',['student'=>$dets['student'],'term'=>$dets['term'],'class_'=>$dets['class_'],'scores'=>$dets['scores'],'users'=>$dets['users'],
        'grades'=>$dets['grades'], 'TCA_score'=>$TCA_score]);

      }
        
    }
    public function cat2($student_id,$term_id,$class_id){
        if(Auth::check()){
            $dets = $this->det($student_id,$term_id,$class_id);
            $TCA_score = $dets['term']->h_cat1;
        
            
                return view('results.cat2',['student'=>$dets['student'],'term'=>$dets['term'],'class_'=>$dets['class_'],'scores'=>$dets['scores'],'users'=>$dets['users'],
            'grades'=>$dets['grades'], 'TCA_score'=>$TCA_score]);
        }
    }
    
    public function result_sheet($student_id,$term_id,$class_id){
        $dets = $this->det($student_id,$term_id,$class_id);
        $CAT1 = $dets['term']->h_cat1;
        $CAT2 = $dets['term']->h_cat2;
        $MSC = 10;
        $exam = 50;
        if ($dets['class_']->status == 'Year School') {
            # code...
            return view('results.result',['student'=>$dets['student'],'term'=>$dets['term'],'class_'=>$dets['class_'],'scores'=>$dets['scores'],'users'=>$dets['users'],
        'grades'=>$dets['grades'],'classTeacher'=>$dets['te'],'comment'=>$dets['comment'],'behave'=>$dets['behave'],'attend'=>$dets['attend']]);
        }
        if ($dets['class_']->status == 'Early Years') {
            # code...
            return view('results.e_years',['student'=>$dets['student'],'term'=>$dets['term'],'class_'=>$dets['class_'],'scores'=>$dets['scores'],'users'=>$dets['users'],
        'grades'=>$dets['grades'],'classTeacher'=>$dets['te'],'comment'=>$dets['comment'],'behave'=>$dets['behave'],'attend'=>$dets['attend']]);

        }
         if($dets['class_']->id == 9){
             return view('results.sstermii',['student'=>$dets['student'],'term'=>$dets['term'],'class_'=>$dets['class_'],'scores'=>$dets['scores'],'users'=>$dets['users'],
        'grades'=>$dets['grades'],'classTeacher'=>$dets['te'],'comment'=>$dets['comment'],'behave'=>$dets['behave'],'attend'=>$dets['attend'],'cat1'=>$CAT1,'cat2'=>$CAT2,
        'msc'=>$MSC,'exam'=>$exam]);
        }
        return view('results.h_result',['student'=>$dets['student'],'term'=>$dets['term'],'class_'=>$dets['class_'],'scores'=>$dets['scores'],'users'=>$dets['users'],
        'grades'=>$dets['grades'],'classTeacher'=>$dets['te'],'comment'=>$dets['comment'],'behave'=>$dets['behave'],'attend'=>$dets['attend'],'cat1'=>$CAT1,'cat2'=>$CAT2,
        'msc'=>$MSC,'exam'=>$exam]);

    }
    // job worker that feeeds other functions
    private function det($student_id,$term_id, $class_id){
        $term = Term::find($term_id);
        $class_ = S5Class::find($class_id);
        $student = Student::find($student_id);
        $grades = GradeSetting::all();
        $scores = SubjectMark::with('subjectcomment')->where('student_id',$student->id)->where('term_id',$term->id)
        ->where('s5_class_id',$class_->id)->get();
        
        $users = SubjectMark::select('student_id')->where('term_id',$term->id)
        ->where('s5_class_id',$class_->id)->distinct()->get();
        $te = ClassTeacher::with('teacher')->where('term_id',$term->id)->where('s5_class_id',$class_->id)->first();
        $behave = BehaviourChart::where('term_id',$term->id)->where('s5_class_id',$class_->id)->where('student_id',$student->id)->first();
        $attend = Attendance::where('term_id',$term->id)->where('s5_class_id',$class_->id)->where('student_id',$student->id)->first();
        $comment = Comment::where('student_id',$student->id)->where('term_id',$term->id)
        ->where('s5_class_id',$class_->id)->first();
        return ['term'=>$term,'class_'=>$class_,'student'=>$student,'grades'=>$grades,'scores'=>$scores,'users'=>$users,'te'=>$te,'behave'=>$behave,'attend'=>$attend,'comment'=>$comment];
    }

    private function details($term_id,$class_1){
        $term = Term::find($term_id);
        $class_= S5Class::find($class_1);
        $grades = GradeSetting::all();
        $scores = SubjectMark::where('term_id',$term->id)->where('s5_class_id','=',$class_->id)->distinct()->get();
                         
        $ids = [];
        $sub_id = [];
        $j_sub = [];
        foreach($scores as $stu){
            array_push($ids, $stu->student_id);
            array_push($sub_id, $stu->subject_id);
            if(!in_array($stu->status,$j_sub)){
                array_push($j_sub,$stu->status);
            }
        }
        $class_std = Student::whereIn('id',$ids)->with('subjectMark','subjects')->get();
        $subject = Subject::whereIn('id',$sub_id)->get(); 
        $subject_status = $j_sub;
       
        return ['students'=>$class_std, 'subject'=>$subject,'grades'=>$grades,'term'=>$term,'class_'=>$class_,'subject_status'=>$subject_status];
    }
    
    private function checkNull($term_id,$class_id,$subject_id,$status){
        if($status == 1){
            return  SubjectMark::where('term_id','=',$term_id)->where('s5_class_id','=',$class_id)->where('Summative_test','!=',null)->distinct()->count();
        }elseif($status == 2){
            return  SubjectMark::where('term_id','=',$term_id)->where('s5_class_id','=',$class_id)->where('CAT1','!=',null)->distinct()->count();
        }elseif($status == 3){
            return  SubjectMark::where('term_id','=',$term_id)->where('s5_class_id','=',$class_id)->where('CAT2','!=',null)->distinct()->count();
        }elseif($status == 4){
            return  SubjectMark::where('term_id','=',$term_id)->where('s5_class_id','=',$class_id)->where('TCA','!=',null)->distinct()->count();
        }elseif($status == 5 ){
            return  SubjectMark::where('term_id','=',$term_id)->where('s5_class_id','=',$class_id)->where('MSC','!=',null)->distinct()->count();
        }elseif($status == 6){
            return  SubjectMark::where('term_id','=',$term_id)->where('s5_class_id','=',$class_id)->where('Exam','!=',null)->distinct()->count();
        }
        elseif($status == 7){
            return  SubjectMark::where('term_id','=',$term_id)->where('s5_class_id','=',$class_id)->where('Exam','!=',null)->distinct()->count();
        }
    }


    // class Teacher Function
    public function summative_ct($term_id,$class_1){
        $dets = $this->details($term_id,$class_1);
        if($dets['class_']->status == 'Year School') {
            $SMT_score = $dets['term']->y_summative;
            return view('teacher.summative',['students'=>$dets['students'], 'subject'=>$dets['subject'],
            'SMT_score'=>$SMT_score,'grades'=>$dets['grades'],'term'=>$dets['term'],'class_'=>$dets['class_']]);
       
        } 
        if($dets['class_']->status == 'Early Years') {
            $SMT_score = $dets['term']->e_summative;
        return view('teacher.summative',['students'=>$dets['students'], 'subject'=>$dets['subject'],'SMT_score'=>$SMT_score,
        'grades'=>$dets['grades'],'term'=>$dets['term'],'class_'=>$dets['class_']]);
        }   
        
    }
    public function summative1_ct($term_id,$class_1){
        $dets = $this->details($term_id,$class_1);
        if($dets['class_']->status == 'Year School') {
             $SMT_score = $dets['term']->y_summative1;
            return view('teacher.summative1',['students'=>$dets['students'], 'subject'=>$dets['subject'],
            'SMT_1'=>$SMT_score,'grades'=>$dets['grades'],'term'=>$dets['term'],'class_'=>$dets['class_']]);
       
        }
        
        
    }
    
    public function exam_ct($term_id,$class_1){
        $dets = $this->details($term_id,$class_1);
        $EXAM_score = 50;     
        return view('teacher.exam',['students'=>$dets['students'], 'subject'=>$dets['subject'],'EXAM_score'=>$EXAM_score,'grades'=>$dets['grades'],'term'=>$dets['term'],'class_'=>$dets['class_'],'subject_status'=>$dets['subject_status']]);
    }
    public function grandTotal_ct($term_id,$class_1){
        $dets = $this->details($term_id,$class_1);
        $GT_score =100;             
        return view('teacher.gt',['students'=>$dets['students'], 'subject'=>$dets['subject'],'GT_score'=>$GT_score,'grades'=>$dets['grades'],'term'=>$dets['term'],'class_'=>$dets['class_'],'subject_status'=>$dets['subject_status']]);
    }
    public function tca_ct($term_id,$class_1){
        $dets = $this->details($term_id,$class_1);
        $TCA_score = 50;
        return view('teacher.tca',['students'=>$dets['students'], 'subject'=>$dets['subject'],'TCA_score'=>$TCA_score,'grades'=>$dets['grades'],'term'=>$dets['term'],'class_'=>$dets['class_'],'subject_status'=>$dets['subject_status']]);
    }
    public function cat1s_ct($term_id,$class_1){
        $dets = $this->details($term_id,$class_1);
        $TCA_score = $dets['term']->h_cat1;
        return view('teacher.cat1_broadsheet',['students'=>$dets['students'], 'subject'=>$dets['subject'],'TCA_score'=>$TCA_score,'grades'=>$dets['grades'],'term'=>$dets['term'],'class_'=>$dets['class_'],'subject_status'=>$dets['subject_status']]);
    }
    public function cat2s_ct($term_id,$class_1){
        $dets = $this->details($term_id,$class_1);
        $TCA_score = $dets['term']->h_cat2;
        return view('teacher.cat2_broadsheet',['students'=>$dets['students'], 'subject'=>$dets['subject'],'TCA_score'=>$TCA_score,'grades'=>$dets['grades'],'term'=>$dets['term'],'class_'=>$dets['class_'],'subject_status'=>$dets['subject_status']]);
    }
    public function msc_ct($term_id,$class_1){
        $dets = $this->details($term_id,$class_1);
        $TCA_score = 20;
        return view('teacher.msc',['students'=>$dets['students'], 'subject'=>$dets['subject'],'TCA_score'=>$TCA_score,'grades'=>$dets['grades'],'term'=>$dets['term'],'class_'=>$dets['class_'],'subject_status'=>$dets['subject_status']]);
    }
    public function summative_sheet_ct($student_id,$term_id,$class_id){
        $dets = $this->det($student_id,$term_id,$class_id);
        if($dets['class_']->status == 'Year School'){
            $SMT_score = $dets['term']->y_summative;
            return view('teacher.summative_sheet',['student'=>$dets['student'],'term'=>$dets['term'],'class_'=>$dets['class_'],
            'scores'=>$dets['scores'],'users'=>$dets['users'],'SMT_score'=>$SMT_score,
            'grades'=>$dets['grades']]);
        }
        if($dets['class_']->status == 'Early Years'){
            $SMT_score = $dets['term']->e_summative;
            return view('teacher.summative_sheet',['student'=>$dets['student'],'term'=>$dets['term'],'class_'=>$dets['class_'],
            'scores'=>$dets['scores'],'users'=>$dets['users'],'SMT_score'=>$SMT_score,
            'grades'=>$dets['grades']]);
        }
       

    }
    public function summative_sheet1_ct($student_id,$term_id,$class_id){
        $dets = $this->det($student_id,$term_id,$class_id);
        if($dets['class_']->status == 'Year School'){
             $SMT_score = $dets['term']->y_summative1;
            return view('teacher.summative-1',['student'=>$dets['student'],'term'=>$dets['term'],'class_'=>$dets['class_'],
            'scores'=>$dets['scores'],'users'=>$dets['users'],'SMT_1'=>$SMT_score,
            'grades'=>$dets['grades']]);
        }
        
        
       

    }
    
    public function cat1_ct($student_id,$term_id,$class_id){
        $dets = $this->det($student_id,$term_id,$class_id);
        $TCA_score = $dets['term']->h_cat1;
        return view('teacher.cat1',['student'=>$dets['student'],'term'=>$dets['term'],'class_'=>$dets['class_'],'scores'=>$dets['scores'],'users'=>$dets['users'],
        'grades'=>$dets['grades'],'TCA_score'=>$TCA_score] );

    }
    public function cat2_ct($student_id,$term_id,$class_id){
        $dets = $this->det($student_id,$term_id,$class_id);
        $TCA_score = $dets['term']->h_cat2;
        return view('teacher.cat2',['student'=>$dets['student'],'term'=>$dets['term'],'class_'=>$dets['class_'],'scores'=>$dets['scores'],'users'=>$dets['users'],
        'grades'=>$dets['grades'],'TCA_score'=>$TCA_score]);

    }
    
    

    
    public function result_sheet_ct($student_id,$term_id,$class_id){
        $dets = $this->det($student_id,$term_id,$class_id);
        $CAT1 = $dets['term']->h_cat1;
        $CAT2 = $dets['term']->h_cat2;
        $MSC = 10;
        $exam = 50;
        
        if ($dets['class_']->status == 'Year School') {
            # code...
            return view('teacher.result',['student'=>$dets['student'],'term'=>$dets['term'],'class_'=>$dets['class_'],'scores'=>$dets['scores'],'users'=>$dets['users'],
        'grades'=>$dets['grades'],'classTeacher'=>$dets['te'],'comment'=>$dets['comment'],'behave'=>$dets['behave'],'attend'=>$dets['attend']]);
        }
        if ($dets['class_']->status == 'Early Years') {
            # code...
            return view('teacher.e_years',['student'=>$dets['student'],'term'=>$dets['term'],'class_'=>$dets['class_'],'scores'=>$dets['scores'],'users'=>$dets['users'],
        'grades'=>$dets['grades'],'classTeacher'=>$dets['te'],'comment'=>$dets['comment'],'behave'=>$dets['behave'],'attend'=>$dets['attend']]);

        }
        
        if($dets['class_']->id == 9){
             return view('results.sstermii',['student'=>$dets['student'],'term'=>$dets['term'],'class_'=>$dets['class_'],'scores'=>$dets['scores'],'users'=>$dets['users'],
        'grades'=>$dets['grades'],'classTeacher'=>$dets['te'],'comment'=>$dets['comment'],'behave'=>$dets['behave'],'attend'=>$dets['attend'],'cat1'=>$CAT1,'cat2'=>$CAT2,
        'msc'=>$MSC,'exam'=>$exam]);
        }
        return view('results.h_result',['student'=>$dets['student'],'term'=>$dets['term'],'class_'=>$dets['class_'],'scores'=>$dets['scores'],'users'=>$dets['users'],
        'grades'=>$dets['grades'],'classTeacher'=>$dets['te'],'comment'=>$dets['comment'],'behave'=>$dets['behave'],'attend'=>$dets['attend'],'cat1'=>$CAT1,'cat2'=>$CAT2,
        'msc'=>$MSC,'exam'=>$exam]);

    }
//    download functions
    public function download_cat1($student_id,$term_id,$class_1){
        $data =$this->det($student_id,$term_id,$class_1);
        
        $dets = $this->det($student_id,$term_id,$class_1);
        $TCA_score = $dets['term']->h_cat1;
        
        
        $pdf = PDF::loadView('pdf.cat1',['data'=>$this->det($student_id,$term_id,$class_1),'TCA_score'=>$TCA_score]);        
        return $pdf->download($data['student']->surname.'_'.$data['student']->name.'_'.$data['term']->name.'_'.$data['class_']->name.'_CAT1.pdf');
    }
    public function download_cat2($student_id,$term_id,$class_1){
        $data =$this->det($student_id,$term_id,$class_1);
        $dets = $this->det($student_id,$term_id,$class_1);
        $TCA_score = $dets['term']->h_cat2;
          
        $pdf = PDF::loadView('pdf.cat2',['data'=>$this->det($student_id,$term_id,$class_1),'TCA_score'=>$TCA_score]);        
        return $pdf->download($data['student']->surname.'_'.$data['student']->name.'_'.$data['term']->name.'_'.$data['class_']->name.'_CAT2.pdf');
    }
    public function download_summative($student_id,$term_id,$class_1){
        $data =$this->det($student_id,$term_id,$class_1);
         if($data['class_']->status == 'Year School') {
            $SMT_score = $data['term']->y_summative;
        $pdf = PDF::loadView('pdf.summative',['data'=>$this->det($student_id,$term_id,$class_1),'SMT_score'=>$SMT_score]);        
        return $pdf->download($data['student']->surname.'_'.$data['student']->name.'_'.$data['term']->name.'_'.$data['class_']->name.'.pdf');
         }
          if($data['class_']->status == 'Early Years') {
            $SMT_score = $data['term']->e_summative;
            $pdf = PDF::loadView('pdf.summative',['data'=>$this->det($student_id,$term_id,$class_1),'SMT_score'=>$SMT_score]);        
             return $pdf->download($data['student']->surname.'_'.$data['student']->name.'_'.$data['term']->name.'_'.$data['class_']->name.'.pdf');
          }
    }

    public function download_result($student_id,$term_id,$class_1){
        $dets = $this->det($student_id,$term_id,$class_1);
        $CAT1 = $dets['term']->h_cat1;
        $CAT2 = $dets['term']->h_cat2;
        $MSC = 20;
        $exam = 50;
        if ($dets['class_']->status == 'Year School') {
            # code...
         $pdf = PDF::loadView('pdf.y_result',['student'=>$dets['student'],'term'=>$dets['term'],'class_'=>$dets['class_'],'scores'=>$dets['scores'],'users'=>$dets['users'],
        'grades'=>$dets['grades'],'classTeacher'=>$dets['te'],'comment'=>$dets['comment'],'behave'=>$dets['behave'],'attend'=>$dets['attend']])->setPaper('a4', 'landscape');
        return $pdf->download($dets['student']->surname.'_'.$dets['student']->name.'_'.$dets['term']->name.'_'.$dets['class_']->name.'.pdf');

        }
        if ($dets['class_']->status == 'Early Years') {
            # code...
         $pdf = PDF::loadView('pdf.e_years',['student'=>$dets['student'],'term'=>$dets['term'],'class_'=>$dets['class_'],'scores'=>$dets['scores'],'users'=>$dets['users'],'grades'=>$dets['grades'],'classTeacher'=>$dets['te'],'comment'=>$dets['comment'],'behave'=>$dets['behave'],'attend'=>$dets['attend']])->setPaper('a4', 'landscape');
        return $pdf->download($dets['student']->surname.'_'.$dets['student']->name.'_'.$dets['term']->name.'_'.$dets['class_']->name.'.pdf');

        }
        $pdf = PDF::loadView('pdf.h_result',['student'=>$dets['student'],'term'=>$dets['term'],'class_'=>$dets['class_'],'scores'=>$dets['scores'],'users'=>$dets['users'],
        'grades'=>$dets['grades'],'classTeacher'=>$dets['te'],'comment'=>$dets['comment'],'behave'=>$dets['behave'],'attend'=>$dets['attend'],
        'cat1'=>$CAT1,'cat2'=>$CAT2,
        'msc'=>$MSC,'exam'=>$exam])->setPaper('a4', 'landscape');
        return $pdf->download($dets['student']->surname.'_'.$dets['student']->name.'_'.$dets['term']->name.'_'.$dets['class_']->name.'.pdf');

    }

    public function download_summative_sheet($term_id, $class_id){
        $dets = $this->details($term_id,$class_id);
        if($dets['class_']->status == 'Year School') {
            $SMT_score = $dets['term']->y_summative1;
            $pdf = PDF::loadView('pdf.summative_sheet',['data'=>$this->details($term_id,$class_id),'SMT_score'=>$SMT_score])->setPaper('a4', 'landscape');        
            return $pdf->download($dets['class_']->name.'_'.$dets['term']->name.'_'.$dets['term']->session.'.pdf');
        } 
        if($dets['class_']->status == 'Early Years') {
            $SMT_score = $dets['term']->e_summative;
            $pdf = PDF::loadView('pdf.summative_sheet',['data'=>$this->details($term_id,$class_id),'SMT_score'=>$SMT_score])->setPaper('a4', 'landscape');        
            return $pdf->download($dets['class_']->name.'_'.$dets['term']->name.'_'.$dets['term']->session.'.pdf');
        }   
    }
    public function download_summative_sheet2($term_id, $class_id)
    {
        $dets = $this->details($term_id, $class_id);
        if ($dets['class_']->status == 'Year School') {
            $SMT_score = $dets['term']->y_summative;
            $pdf = PDF::loadView('pdf.summative_sheet2', ['data' => $this->details($term_id, $class_id), 'SMT_score' => $SMT_score])->setPaper('a4', 'landscape');
            return $pdf->download($dets['class_']->name . '_' . $dets['term']->name . '_' . $dets['term']->session . '.pdf');
        }
       
    }
    
    public function download_cat1_broadsheet($term_id, $class_id){
         $dets = $this->details($term_id,$class_id);
         $TCA_score = $dets['term']->h_cat1;
         $pdf = PDF::loadView('pdf.cat1_broadsheet',['data'=>$this->details($term_id,$class_id),'TCA_score'=>$TCA_score])->setPaper('a4', 'landscape');
        return $pdf->download($dets['class_']->name.'_'.$dets['term']->name.'_'.$dets['term']->session.'CAT-1_BroadSheet.pdf');
        
    }
    public function download_cat2_broadsheet($term_id, $class_id){
         $dets = $this->details($term_id,$class_id);
         $TCA_score = $dets['term']->h_cat2;
         $pdf = PDF::loadView('pdf.cat2_broadsheet',['data'=>$this->details($term_id,$class_id),'TCA_score'=>$TCA_score])->setPaper('a4', 'landscape');
        return $pdf->download($dets['class_']->name.'_'.$dets['term']->name.'_'.$dets['term']->session.'CAT-2_BroadSheet.pdf');
        
    }
    public function download_exambroadsheet($term_id, $class_id)
    {
        $dets = $this->details($term_id, $class_id);
        $TCA_score = 50;
        $pdf = PDF::loadView('pdf.exam', ['data' => $this->details($term_id, $class_id), 'TCA_score' => $TCA_score])->setPaper('a4', 'landscape');
        return $pdf->download($dets['class_']->name . '_' . $dets['term']->name . '_' . $dets['term']->session . 'EXAM_BroadSheet.pdf');
    }
    public function download_GTbroadsheet($term_id, $class_id){
         $dets = $this->details($term_id,$class_id);
         $TCA_score = 100;
         $pdf = PDF::loadView('pdf.grandTotal',['data'=>$this->details($term_id,$class_id),'TCA_score'=>$TCA_score])->setPaper('a4', 'landscape');
        return $pdf->download($dets['class_']->name.'_'.$dets['term']->name.'_'.$dets['term']->session.'GT_BroadSheet.pdf');
        
    }
    
    // check any broadsheet
    public function allbroadsheet(Request $request){
        
        $bdsht = $request->broadsheet;
        //dd($bdsht);
        if($bdsht == 1 ){
           return $this->cat1s_ct($request->term, $request->class_);
        }elseif($bdsht == 2){
           return  $this->cat2s_ct($request->term, $request->class_);
        }elseif($bdsht == 3){
           return  $this->exam_ct($request->term, $request->class_);
        }elseif($bdsht == 4){
           return $this->summative_ct($request->term, $request->class_);
        }elseif($bdsht == 5){
          return  $this->tca_ct($request->term, $request->class_);
        }elseif($bdsht == 6){
           return  $this->msc_ct($request->term, $request->class_);
        }elseif($bdsht == 7){
           return  $this->grandTotal_ct($request->term, $request->class_);
        }
        elseif($bdsht == 8){
            return  $this->summative1_ct($request->term, $request->class_);
         }
       
        
    }
     public function broadsheet2(Request $request){
        
        $bdsht = $request->broadsheet;
        //dd($bdsht);
        if($bdsht == 1 ){
           return $this->cat1s($request->term, $request->class_);
        }elseif($bdsht == 2){
           return  $this->cat2s($request->term, $request->class_);
        }elseif($bdsht == 3){
           return  $this->exam($request->term, $request->class_);
        }elseif($bdsht == 4){
           return $this->summative($request->term, $request->class_);
        }elseif($bdsht == 5){
          return  $this->tca($request->term, $request->class_);
        }elseif($bdsht == 6){
           return  $this->msc($request->term, $request->class_);
        }elseif($bdsht == 7){
           return  $this->grandTotal($request->term, $request->class_);
        }
        elseif($bdsht == 8){
            return  $this->summative_1($request->term, $request->class_);
         }
       
        
    }
    public function i(){
        $terms = Term::all();
        $class_ = S5Class::all();

        return view('individual',['terms'=>$terms,'class_'=>$class_]);
    }
    public function class_student(Request $request){
        $t = Term::find($request->term);
        $c = S5Class::find($request->class_);
          $students = StudentTerm::where('term_id',$t->id)->where('s5_class_id',$c->id)->distinct()->get();
        $ids = [];
        
        foreach ($students as $stud) {
            array_push($ids, $stud->student_id);
          }
          
        $studs = Student::whereIn('id', $ids)->get();
        return view('ind_students',['students'=>$studs,'term'=>$t,'class_'=>$c]);
    }
    public function import_(){
        $terms = Term::all();
        $class_ = S5Class::all();
        return view('students.import',['terms'=>$terms,'class_'=>$class_]);
    }
    public function sub_point(){
         $terms = Term::all();
        $class_ = S5Class::all();
        $subjects = Subject::all();

        return view('subject_point',['terms'=>$terms,'class_'=>$class_,'subjects'=>$subjects]);
    }
    public function subject_point(Request $request){
        $t = Term::find($request->term);
        $c = S5Class::find($request->class_);
        $s = Subject::find($request->subject);
        $ids = [];
         $scores = SubjectMark::with('student')->where('term_id',$t->id)->where('s5_class_id',$c->id)->where('subject_id',$s->id)->get();
        if($scores !=null){
           foreach ($scores as $item) {
            $item->HW = round($item->summative_test * $request->mark) - $item->summative_test;
            $item->TCA += $item->HW ;
            $item->GT = $item->Exam + $item->TCA;
            $item->save();
          } 
        return view('spo',['term'=>$t,'class_'=>$c,'scores'=>$scores]);
        }
       
          

    }
    
    public function fetch_comment(Request $request){
        $term = Term::all();
        $class_ = S5Class::all();
        
        $comments = Comment::with('s5_class','term')->where('s5_class_id',$request->class_)->where('term_id',$request->term)->get();
        $c= S5Class::find($request->class_);
        $t= Term::find($request->term);
        return view('check_comment',['comments'=>$comments,'term'=>$term, 'class_'=>$class_,'t'=>$t,'c'=>$c]);
    }
    
    public function comments(){
        $term = Term::all();
        $class_ = S5Class::all();
        $c = array();
        $t= array();
        
        return view('check_comment',['term'=>$term, 'class_'=>$class_,'t'=>$t,'c'=>$c]);
    }
    
    public function DC($c,$t){
         $comments = Comment::with('s5_class','term')->where('s5_class_id',$c)->where('term_id',$t)->get();
        $C= S5Class::find($c);
        $T= Term::find($t);
        
        $pdf = PDF::loadView('pdf.comments',['comments'=>$comments,'T'=>$T, 'C'=>$C]);        
        return $pdf->download($C->name.'_'.$C->description.'_'.$T->name.'_comment.pdf');
    }
     public function DBGT($term_id,$class_1){
        $dets = $this->details($term_id,$class_1);
        $GT_score =100; 
          $C= S5Class::find($class_1);
        $T= Term::find($term_id);
         $pdf = PDF::loadView('pdf.broadsheet',['students'=>$dets['students'], 'subject'=>$dets['subject'],'GT_score'=>$GT_score,'grades'=>$dets['grades'],'term'=>$dets['term'],'class_'=>$dets['class_'],'subject_status'=>$dets['subject_status']])->setPaper('a4', 'landscape');        
        return $pdf->download($C->name.'_'.$C->description.'_'.$T->name.'_GrandTotalBroadSheet.pdf');
     }

     public function userDetails(){
        $users = User::where('isAdmin', 4)->latest()->get();
        $pdf = PDF::loadView('pdf.users',['users'=>$users]);        
        return $pdf->download('student-User-details'.'.pdf');

        
        
    }
    public function commentBank()
    {
        return view('commentBank');
    }
     public function updateExam(){
        $scores = SubjectMark::where('term_id',6)->where('Exam',0)->get();
        foreach($scores as $i){
            $i->Exam = null;
            $i->save();
        }
    }
    public function resetScore(){
        $scores = SubjectMark::where('status',null)->get();
         foreach($scores as $i){
           switch ($i->subname) {
               
              case 'ENGLISH LANGUAGE':
                $i->status = 1;
                $i->save();
                break;
              case 'LITERATURE IN ENG.':
                $i->status = 1;
                $i->save();
                break;
             
              case 'BASIC SCIENCE':
                $i->status = 2;
                $i->save();
                break;
              case 'BASIC TECHNOLOGY':
                $i->status = 2;
                $i->save();
                break;
             case 'P. H. E':
                $i->status = 2;
                $i->save();
                break;
             case 'I.C.T':
                $i->status = 2;
                $i->save();
                break;
                
             case 'AGRIC SCIENCE':
                $i->status = 3;
                $i->save();
                break;
                
             case 'HOME ECONOMICS':
                $i->status = 3;
                $i->save();
                break;
                
             case 'CIVIC EDUCATION':
                $i->status = 4;
                $i->save();
                break;
                
             case 'FINE ART':
                $i->status = 5;
                $i->save();
                break;
             case 'DANCE & DRAMA':
                $i->status = 5;
                $i->save();
                break;
             case 'MUSIC':
                $i->status = 5;
                $i->save();
                break;
                
             case 'BUSINESS STUDIES':
                $i->status = 6;
                $i->save();
                break;
                
             case 'FRENCH':
                $i->status = 7;
                $i->save();
                break;
                
             case 'MATHEMATICS':
                $i->status = 8;
                $i->save();
                break;
            case 'RELIGIOUS STUDIES':
                $i->status = 9;
                $i->save();
                break;
            case 'HANDWRITING':
                $i->status = 10;
                $i->save();
                break;
            
            
              default:
                
            }
        }
        return back()->with('success','Subject has been reset');
    }


}