<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\S5Class;
use Illuminate\Http\Request;
use App\Http\Requests\S5ClassRequest;
use App\Http\Resources\S5ClassResource;
use App\Http\Resources\TermResourceCollection;
use App\Http\Resources\S5ClassResourceCollection;
use App\StudentsClass;
use App\Student;
use App\StudentTerm;
use App\Term;
use App\Http\Resources\TermResource;

class S5ClassController extends Controller
{   

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return new S5ClassResourceCollection(S5Class::all());
    }
    public function all_class()
    {
        //
        return new S5ClassResourceCollection(S5Class::all());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(S5ClassRequest $request)
    {
        //
        $s5Class = $request->isMethod('put') ? S5Class::findOrFail($request->schclass_id) : new S5Class;

        $s5Class->name = $request->name;
        $s5Class->description = $request->description;
        $s5Class->status = $request->status;
        $s5Class->no_of_students = $request->no_of_students;
        if($s5Class->save()){
            return new S5ClassResource($s5Class);
 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\S5Class  $s5Class
     * @return \Illuminate\Http\Response
     */
    public function show( $s5Class)
    {
        //
        $class = S5Class::findOrFail($s5Class);
        return new S5ClassResource($class);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\S5Class  $s5Class
     * @return \Illuminate\Http\Response
     */
    public function edit(S5Class $s5Class)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\S5Class  $s5Class
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,S5Class $s5Class)
    {
        //
        $data = $request->all();
        $s5Class->update($data);

        return new S5ClassResource($s5Class);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\S5Class  $s5Class
     * @return \Illuminate\Http\Response
     */
    public function destroy($s5Class)
    {
        //
        $class = S5Class::findOrFail($s5Class);
        $class->delete();
        return new S5ClassResource($s5Class);
    }

    public function terms_class($id,$student){
       $class_term = StudentTerm::select('term_id')->where('s5_class_id',$id)->where('student_id',$student)->get()->pluck('term_id')->unique();
    
        $class_ = Term::whereIn('id',$class_term)->get();
       
         return  TermResource::collection($class_);
    }


    public function term_class($id){
        $class_ = S5Class::findOrFail($id);
        
        return  view('class/terms',['terms'=>json_encode($class_->term), 'class_T'=>$class_]);
    }

    public function stud_classes($id){

        $studs = Student::where('s_class','=',$id)->get();
        $class = S5Class::find($id);     
        
        return  view('class/studentClass',['students'=>json_encode($studs),'class'=>$class]);
    }
}
