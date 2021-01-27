<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\TermController;
use App\Http\Requests\StudentRequest;
use App\Http\Resources\S5ClassResource;
use App\Http\Resources\Student as StudentResource;
use App\Http\Resources\StudentCollection;
use App\Http\Resources\s5ClassResourceCollection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Student;
use App\Subject;
use App\StudentsClass;
use App\SubjectMark;
use App\StudentTermClass;
use App\User;
use App\Term;
use App\S5Class;
use App\StudentSubject;
use App\StudentTerm;
use DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class StudentController extends Controller
{

  protected $TermController;
    public function __construct(TermController $TermController)
    {
        $this->TermController = $TermController;
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new StudentCollection(Student::paginate(100));
    }
    public function index2()
    {
      $students = Student::all();
      return response()->json($students);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
      $student = $request->isMethod('put') ? Student::findOrFail($request->student_id) : new Student;
      
      $student->name = $request->name;
      $student->oname = $request->oname;
      $student->surname = $request->surname;
      $student->roll_no = Student::max('id') + 1;
      $student->reg_no = $request->reg_no;
      $student->email = strtolower($student->name[0].str_ireplace (' ', '', $student->surname)).$student->roll_no.'@efa.sch.ng';
      $student->dob = $request->dob;
      $student->p_email = $request->p_email;
      $student->gender = $request->gender;
      $student->contact = $request->contact;
      $student->address = $request->address;
      $student->s_class = $request->s_class; 
       $class = s5Class::find($request->s_class);
      
       $student->level = $class->status;
      $student->identification_mark = $request->identification_mark;
      if($student->save()){
        $pass = Str::random(8);
        $class->student()->attach($student);
        $user = new User();
        $user->name = $student->name.'.'.$student->surname;
        $user->email = $student->email;
        $user->keep_track = $pass;
        $user->password = Hash::make($pass);
        $user->isAdmin = 4;
        $user->student_id =$student->id;
        $user->save();
        // StudentClass 
        $class = S5Class::find($student->s_class);
        $sess = Term::find($request->term_id);
        
        $class->session = null;
        $class->student()->attach($student->id);

        $stc = new StudentTermClass();
        $stc->student_id = $student->id;
        $stc->term_id = $sess->id;
        $stc->s5_class_id = $class->id;
        
        $stc->save();

        return new StudentResource($student);
      }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return new StudentResource($student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $STUD=Student::whereId($request->student_id)->update($request->except(['_method','_token','student_id']));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return new StudentResource($student);
    }

        public function unassignedSubjects(Student $student,$class_id,Term $term)
        {
          $ids = [];
          $marks = SubjectMark::where('student_id','=',$student->id)->where('term_id','=',$term->id)->where('s5_class_id',$class_id)
          ->get();
          $class = S5Class::find($class_id);
          foreach ($marks as $subject) {
            array_push($ids, $subject->subject_id);
          }
          $subjects = Subject::whereNotIn('id', $ids)->where('level','=',$class->status)->get();

          return $subjects;

        }

        public function assignedSubjects(Student $student,$class_id, Term $term)
        {
          $ids = [];
          
          $mark = SubjectMark::where('student_id','=',$student->id)->where('term_id','=',$term->id)->where('s5_class_id',$class_id)
           ->get();
          
          foreach ($mark as $subject) {
            array_push($ids, $subject->subject_id);
          }
          
            $subjects = Subject::whereIn('id', $ids)->get();
            
         return $subjects;
        }

      public function assignSubject(Student $student, Subject $subject,$s5class,Term $term)
      {
        $class_ = S5Class::find($s5class);
        return $this->subject_fix($student,$class_->id,$term->id,$subject); 
      }
      // assign subjects to all my student.
      public function assignSubjectToMyStudent($term, $s5class)
      {
        $data = Student::getStudentsInClass($term,$s5class);
        $subjects = Subject::where('level',$data['class_T']->status)->get();
        foreach($data['students'] as $student){
          
          foreach($subjects->sortBy('name') as $subject){
            $studentterm = StudentTerm::where('student_id',$student->id)->where('term_id',$data['term']->id)->
            where('s5_class_id',$data['class_T']->id)->where('subject_id',$subject->id)->first();
            if($studentterm == null){
              return $this->subject_fix($student->id,$data['class_T']->id,$data['term']->id,$subject->id);
            }
           
          }
                      
        }
         
      }
      public function removeSubjectToMyStudent($term, $s5class)
      {
        $data = Student::getStudentsInClass($term,$s5class);
        $subjects = Subject::where('level',$data['class_T']->status)->get();
        foreach($data['students'] as $student){
          
          foreach($subjects as $subject){
              $data['term']->subject()->detach($subject->id,array('student_id' => $student->id,'s5_class_id'=>$data['class_T']->id));
              $student->subjects()->detach($subject->id,array('term_id' => $data['term']->id,'s5_class_id'=>$data['class_T']->id));
              // $mark = SubjectMark::where('student_id',$student->id)->where('term_id',$term->id)
              // ->where('s5_class_id',$data['class_T']->id)->where('subject_id',$subject->id)->first();
              //   $mark->delete();
                      
          }    
                                 
        }
         
      }
      public function deleteSubject(Student $student, Subject $subject,$class_id, Term $term)
      {
        $class_ = S5Class::find($class_id);
        $term->subject()->detach($subject->id,array('student_id' => $student->id,'s5_class_id'=>$class_->id));
        
        $student->subjects()->detach($subject->id,array('term_id' => $term->id,'s5_class_id'=>$class_->id));

        $mark = SubjectMark::where('student_id',$student->id)->where('term_id',$term->id)
        ->where('s5_class_id',$class_id)->where('subject_id',$subject->id)->first();
          $mark->delete();
                
      }
      

      public function new_class($s5class,$student){
        $class = S5Class::find($s5class);
        $stud = Student::findOrFail($student);
        $class->student()->attach($stud->id);
        return new StudentResource($class);
      }
      public function myClasses($id){
        $imstudent = Student::find($id);
        
        $stc = DB::table('student_term_classes')->where('student_id',$imstudent->id)->get();

        
        $arr = [];
        foreach($stc as $class){
          array_push($arr,$class->s5_class_id);
        }
        $myclass = S5Class::whereIn('id',$arr)->get();
        return  S5ClassResource::collection($myclass);
      }

      public function search(Request $request){
         $qry = $request->input('query');
        $users = DB::table('students')
        ->where('name','like','%'.$qry.'%')
        ->orWhere('oname','like','%'.$qry.'%')->
        orWhere('surname','like','%'.$qry.'%')->get();
        if($users){
          return response()->json($users);
        }
        $msg = 'Not Found!';
        return response()->json($msg);
      }

      public function my_record($id, $class_id, $term_id){
        
        $student = Student::find($id);
        $term = Term::find($term_id);
        $class = S5Class::find($class_id);
        if(auth()->check() && auth()->user()->isAdmin == 1){
          return  view('students/term_sheet',['student'=>$student ,'class_T'=>$class, 'term'=>$term]);
        }
        return  view('students/term_sheet2',['student'=>$student ,'class_T'=>$class, 'term'=>$term]);  
        
      }
      public function block_student($id){
        $student = Student::find($id);
        $student->p_fee = 1;
        $student->save();
        return new StudentCollection(Student::paginate(100));

      }
      public function unblock_student($id){
        $student = Student::find($id);
        $student->p_fee = 0;
        $student->save();
        return new StudentCollection(Student::paginate(100));

      }
      // imports students from previous term and assigns subjects to them.
      public function import_students(Request $request){
        $t = Term::find($request->term);
        $c = S5Class::find($request->sclass);
        $new_term = $request->term_to;
        $students = StudentTermClass::where('5s_class_id',$c->id)->where('term_id',$t->id)->get();
        foreach($students as $student){
          // add students to class
          $this->TermController->add_student_term($student, $new_term, $c->id);
          // assigns subjects to them
          $subjects = $this->assignedSubjects($student,$c->id,$t->id);
          $studentterm = StudentTerm::where('student_id',$student->id)->where('term_id',$new_term)->
            where('s5_class_id',$c->id)->first();

            if($studentterm == null){
              foreach($subjects->sortBy('name') as $subject){
                return $this->subject_fix($student->id,$c->id,$new_term,$subject->id);
              }
            }
        } 
      }

     
      private function subject_fix($student_id,$class_id,$term_id,$subject_id){
        $student = Student::find($student_id);
        $term = Term::find($term_id);
        $subject = Subject::find($subject_id);
        $class_ = S5Class::find($class_id);

        $term->subject()->attach($subject->id,array('student_id' => $student->id,'s5_class_id'=>$class_id));
        $student->subjects()->attach($subject->id,array('term_id' => $term->id,'s5_class_id'=>$class_->id));
                
        $mark = new SubjectMark();
        $mark->student_id = $student->id;
        $mark->subject_id = $subject->id;
        $mark->subname = $subject->name;
        $mark->term_id = $term->id;
        $mark->s5_class_id= $class_id;
        if($mark->subname == 'ENGLISH LANGUAGE' || $mark->subname == 'LITERATURE' && $subject->status =='Junior High School'){
          $mark->status = 1;
        }elseif($mark->subname == 'BASIC SCIENCE' || $mark->subname == 'BASIC TECHNOLOGY' || $mark->subname == 'P.H.E' || $mark->subname == 'I.C.T' && $subject->status =='Junior High School'){
          $mark->status = 2;
        }
        elseif($mark->subname == 'HOME ECONOMICS' || $mark->subname == 'AGRIC SCIENCE'  && $subject->status =='Junior High School'){
          $mark->status = 3;
        }
        elseif($mark->subname == 'SOCIAL STUDIES' || $mark->subname == 'CIVIC EDUCATION'  && $subject->status =='Junior High School'){
          $mark->status = 4;
        }elseif($mark->subname == 'DANCE & DRAMA' || $mark->subname == 'MUSIC' || $mark->subname == 'FINE ART' && $subject->status =='Junior High School'){
          $mark->status = 5;
        }elseif($mark->subname == 'BUSINESS STUDIES' && $subject->status =='Junior High School'){
          $mark->status = 6;
        }
        elseif($mark->subname == 'FRENCH' && $subject->status =='Junior High School'){
          $mark->status = 7;
        }
          
        elseif($mark->subname == 'MATHEMATICS' && $subject->status =='Junior High School'){
          $mark->status = 8;
        }
        elseif($mark->subname == 'RELIGIOUS STUDIES' && $subject->status =='Junior High School'){
          $mark->status = 9;
        }
        elseif($mark->subname == 'HANDWRITING' && $subject->status =='Junior High School'){
          $mark->status = 10;
        }
        else{
          $mark->status = null;
        }
        $student->subjectMark()->save($mark);
        $subject->subjectMark()->save($mark);
        $class_->subjectMark()->save($mark); 
      }
}

