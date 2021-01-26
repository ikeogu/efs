<?php

namespace App\Http\Controllers\Api;

use App\SubjComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubjCommentCollection;

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
        $subjComment = $request->isMethod('put') ? SubjComment::findOrFail($request->schclass_id) : new SubjComment;

        $subjComment->name = $request->name;
        $subjComment->f = $request->f;
        $subjComment->s = $request->s;
        $subjComment->th = $request->th;
        $subjComment->fr = $request->fr;
        $subjComment->six = $request->six;
        $subjComment->sev = $request->sev;
        $subjComment->term_id = $request->term_id;
        $subjComment->s5_class_id = $request->s5_class_id;
        if($subjComment->save()){
            return new SubjComment($subjComment);
 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubjComment  $subjComment
     * @return \Illuminate\Http\Response
     */
    public function show(SubjComment $subjComment)
    {
        //
        $Sub = SubjComment::findOrFail($subjComment);
        return new SubjComment($Sub);
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
    public function update(Request $request, SubjComment $subjComment)
    {
        //
        $data = $request->all();
        $subjComment->update($data);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubjComment  $subjComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubjComment $subjComment)
    {
        //
        $Sub = SubjComment::findOrFail($subjComment);
        $Sub->delete();
        return new SubjComment($Sub);
    }
    public function class_subj($term_id, $class_id){
        $subj = SubjComment::where('term_id',$term_id)->where('s5_class_id',$class_id)->first();
        return new SubjComment($subj);
    }
}
