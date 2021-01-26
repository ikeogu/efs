<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjComment extends Model
{
    //
    protected $fillable = [
        'name', 'f','s','th','fr','fif','six','sev','term_id','s5_class_id'
    ];

    public function term(){
        return $this->belongsTo(Term::class);
    }
    public function s5_class(){
        return $this->belongsTo(S5Class::class);
    }
    public function assimiliate(){
        return $this->hasMany(Assimililate::class);
    }
}
