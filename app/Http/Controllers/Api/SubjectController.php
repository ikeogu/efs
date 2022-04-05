<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Subject;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Resources\Subject as SubjectResource;
use App\Http\Resources\SubjectCollection;
use App\Http\Resources\StudentCollection;
use DB;
use App\SubjectMark;
use App\Marks;
use App\S5Class;
use App\Term;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as FacadesDB;

class SubjectController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new SubjectCollection(Subject::paginate(70));
    }
    // attached terms and class IDs to subejct assignment
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $subject = new Subject();

        $subject->name = $request->name;
        $subject->description = $request->description;
        $subject->level = $request->level;



        $subject->save();

        return new SubjectResource($subject);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        return new SubjectResource($subject);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        Subject::whereId($request->subject_id)->update($request->except(['_method', '_token', 'subject_id']));

        // return new SubjectResource($subject);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();

        return new SubjectResource($subject);
    }

    public function subjectList()
    {
        $data = DB::select('SELECT subjects.id, subjects.name FROM `subjects` ORDER BY subjects.name ASC');
        return json_encode(array('data' => $data));
    }

    public function subjectStudents(Subject $subject)
    {
        // return new StudentCollection($subject->students);
        $marks = [];
        foreach ($subject->students as $student) {
            $m = new \stdClass();
            $m->student_id = $student->id;
            $m->student_name = $student->name;
            $m->student_roll_no = $student->roll_no;
            $m->subject_id = $subject->id;
            $r = Marks::where(['student_id' => $student->id, 'subject_id' => $subject->id])->first();
            if (!empty($r)) {
                $m->total_marks = $r->total_marks;
                $m->obtain_marks = $r->obtain_marks;
            } else {
                $m->total_marks = '';
                $m->obtain_marks = '';
            }
            array_push($marks, $m);
        }
        return $marks;
    }
    // functions return to students in class then opens their sheet.
    public function studentsubjects($id, $term_id, $class_id)
    {

        $marks = SubjectMark::where('student_id', '=', $id)->where('s5_class_id', $class_id)->where('term_id', '=', $term_id)->with('subject')
            ->get();
        $student = Student::find($id);
        $term = Term::find($term_id);
        $class_T = S5Class::find($class_id);

        return  view('students/sheet', ['student' => $student, 'data' => json_encode($marks), 'term' => $term, 'class_T' => $class_T]);
    }
    public function studentsubjects_ct($id, $term_id, $class_id)
    {

        $marks = SubjectMark::where('student_id', '=', $id)->where('s5_class_id', $class_id)->where('term_id', '=', $term_id)->with('subject')
            ->get();
        $student = Student::find($id);
        $term = Term::find($term_id);
        $class_T = S5Class::find($class_id);
        return  view('teacher/sheet', ['student' => $student, 'data' => json_encode($marks), 'term' => $term, 'class_T' => $class_T]);
    }

    public function my_subjects($id, $term_id, $class_id)
    {

        $marks = SubjectMark::where('student_id', '=', $id)->where('term_id', '=', $term_id)->where('s5_class_id', '=', $class_id)->with('subject')
            ->get();
        return  $marks;
    }
    public function early_years_subject()
    {
        return Subject::where('level', '=', 'Early Years')->get();
    }
}
