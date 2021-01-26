<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BehaviourChart extends Model
{
    //
    protected $fillable = [
        'pic','la','fift','cwot','anc','efao','srk','hwc','catt','care','res','Hon','init','lead','dressc','obey',
        'pol','team','soc','psy','sport','notec','spoken','mus','craft','student_id','term_id','s5_class_id'
    ];

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function term(){
        return $this->belongsTo(Term::class);
    }
    public function s5_class(){
        return $this->belongsTo(S5Class::class);
    }
}
