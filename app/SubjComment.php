<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjComment extends Model
{
    //
    protected $fillable = [
        'description',
         'subject_id',
         'term_id',
         's5_class_id',
         'acquired',
         'emerge'
    ];

    public function term(){
        return $this->belongsTo(Term::class);
    }
    public function s5_class(){
        return $this->belongsTo(S5Class::class);
    }
    public function subjectMark(){
        return $this->hasMany(SubjectMark::class);
    }
    
}
