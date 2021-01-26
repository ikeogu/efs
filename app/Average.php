<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SubjectMark;

class Average extends Model
{
    //
    protected $fillable = ['student_id','aver_','term_id','s5_class_id'];

    public static function child_average($student, $term, $class){
        $scores = SubjectMark::where('student_id',$student)->where('term_id',$term)->where('s5_class_id',$class)->sum('GT');
        $cnt = count(SubjectMark::where('student_id',$student)->where('term_id',$term)->where('s5_class_id',$class)->get('GT'));
        $avg = Average::where('student_id', $student)->where('term_id',$term)->where('s5_class_id',$class)->first();
        if($avg){
            $avg->aver_ = round($scores/$cnt);
            $avg->save();
        }else{
           try{
                $avg = new Average();
            $avg->student_id = $student;
            $avg->term_id = $term;
            $avg->s5_class_id = $class;
            if($cnt!=0){
              $avg->aver_ = round($scores/$cnt); 
              $avg->save();
            }
            
           }catch(Exception $e) {
            	echo 'Message: ' . $e->getMessage();
            }
        }
        if($cnt!=0)
            return round($scores/$cnt);
    }
}
