<?php

namespace App\Http\Controllers\Api;

use App\SubjComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubjCommentCollection;
use App\Http\Resources\SubjCommentDes;
use App\Student;
use App\Subject;
use App\SubjectMark;
use App\SubjectMarkComment;

class SubjCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return new SubjCommentCollection(SubjComment::paginate(15));
        
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
    public function store(Request $request)
    {
        //
        $subjComment =  new SubjComment();

        $subjComment->description = $request->description;
        $subjComment->subject_id = $request->subject_id;
        $subjComment->term_id = $request->term_id;
        $subjComment->s5_class_id = $request->s5_class_id;
        $subjComment->save();
        return new SubjCommentCollection($subjComment);
            
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubjComment  $subjComment
     * @return \Illuminate\Http\Response
     */
    public function show($subjComment)
    {
        //
     ;
        return new SubjCommentCollection(SubjComment::find($subjComment));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubjComment  $subjComment
     * @return \Illuminate\Http\Response
     */
    public function edit(SubjComment $subjComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubjComment  $subjComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $subjComment)
    {
        //    
       $sub = SubjComment::whereId($subjComment)->update($request->except(['id']));
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubjComment  $subjComment
     * @return \Illuminate\Http\Response
     */
    public function destroy($subjComment)
    {
       $s = SubjComment::find( $subjComment);
        $s->delete();
        
    }
   
    public function term_class_des($class_id,$term_id){
        $subj = SubjComment::where('term_id', $term_id)->where('s5_class_id', $class_id)->get();
        
        return SubjCommentCollection::collection($subj);
    }

    public function fetchDescription($class,$term_id){
        $mt = SubjectMark::with('subjectcomment')->where('term_id', $term_id)->where('s5_class_id', $class)->get();
        $data = [];
        foreach($mt as $m){
        
            foreach($m->subjectcomment as $i){
            
                
                     $data[] = array(
                   'student'=> Student::find($m->student_id)->name . ' ' . Student::find($m->student_id)->surname,
                   'subject'=> Subject::find($m->subject_id)->name,
                    'description'=> $i->description,
                    'acquired'=> $i->pivot->acquired, 
                    'emerging'=> $i->pivot->emerging,
                     'table_id' => SubjectMarkComment::where('subj_comment_id',$i->id)->where('subject_mark_id',$i->pivot->subject_mark_id)->first()->id
                    );    
                
                       
            }
        }
        // print_r($data);
      return $data;
    
    }
    public function updateSubjCommentMark(Request $request){
        
        foreach($request->emerging as $r){
           $m = explode("_", $r);
            $id = $m[0];
            $emerging = $m[2];
             $k = SubjectMarkComment::find($id);
            if($emerging == 1){
                $k->emerging = 1;
            }else{
                $k->acquired = 2;
            }
            $k->save();
        }
        
      
        
    }
}
