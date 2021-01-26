<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    //
    protected $fillable = [
        'student_id','term_id','s5_class_id','da','dp','tar'
    ];
}
