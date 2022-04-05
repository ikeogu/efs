<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectMarkComment extends Model
{
    //
    protected $table = 'subj_comment_subject_mark';
    
    protected $fillable =[
        'subj_comment_id',
        'subject_mark_id',
        'acquired',
        'emerging',
        'student_id'
    ];
}
