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
    public static function converter($alp){
        switch ($alp) {
            case  1:
                # code...
                return 'A';
                break;
            case 2:
                # code...
                return 'B';
                break;
            case 3:
                # code...
                return 'C';
                break;
            case 4:
                # code...
                return 'D';
                break;
            case 5:
                # code...
                return 'E';
                break;
            
            default:
                # code...
                return '';
                break;
        }
    }
}