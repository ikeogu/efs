<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;


use App\Comment;
use Illuminate\Http\Request;
use App\Http\Resources\CommentResource;
use App\Http\Resources\CommentResourceCollection;

class CommentController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return new CommentResourceCollection(Comment::all());
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
        $this->validate(request(),[
            'comment' => 'required'
        ]);
        
        $comment = new Comment();
        $comment->term_id = $request->term_id;
        $comment->s5_class_id = $request->s5_class_id;
        $comment->student_id = $request->student_id;
        $comment->teacher_id = $request->teacher_id;
        $comment->comment = $request->comment;
        $comment->save();
        return new CommentResource($comment);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
        return new CommentResource($comment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //        
         Comment::whereId($request->comment_id)->update($request->except(['_method','_token','comment_id']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
        $comment->delete();
        return new CommentResource($comment);
    }

    public function my_class_comment($class_id, $term_id){
        return  CommentResource::collection(Comment::where('term_id',$term_id)->
        where('s5_class_id',$class_id)->get());
    }
}
