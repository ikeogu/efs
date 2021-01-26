<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GradeSetting extends Model
{
    //
    protected $guarded = [];
    protected $fillable = ['percentage','grade','description','status'];

    protected $table = 'grade_settings';
}
