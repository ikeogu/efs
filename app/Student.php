<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $guarded = [];
    protected $fillable = [
       'name',
       'email',
       'surname',
        'roll_no',
        'reg_no',
        'oname',
        'dob',
        'gender',
       'p_email',
       'identification_mark',
       'contact',
       'address',
       's_class',
       'p_fee'
    ];
   
    // public function setGenderAttribute($gender)
    // {
    //     return $this->attributes['gender'] = ($gender === 1) ? 'male' : 'female';
    // }

    // /**
    //  * Returns the gender with an uppercase.
    //  *
    //  * @return string
    //  */
    // public function getGenderAttribute()
    // {
    //     return ucfirst($this->attributes['gender']);
    // }


    /**
     * subjects that belong to the student.
     */
    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    public function s5Class(){
        return $this->belongsToMany(S5Class::class);
    }

    public function term()
    {
        return $this->belongsToMany(Term::class)->withTimestamps();
    }
    public function studentTerm()
    {
        return $this->hasMany(StudentTerm::class);
    }
    
    public function comment(){
        return $this->hasMany(Comment::class);
    }
    
    public function subjectMark(){
        return $this->belongsToMany(SubjectMark::class);
    }

    public function user(){
        return $this->belongsToMany(User::class);
    }

    public function behaviour(){
        return $this->hasOne(BehaviourChart::class);
    }
     public function subsubject(){
        return $this->belongsToMany(SubSubject::class);
    }
    
    public static function grade($val,$grades){
        $remarks = '';
        $per = (int) ($val);
         if($val){
            foreach($grades as $grade) {
                if($grade->status == 'Year School'){
                    $arr = explode('-', $grade->percentage);
                    if ($per >= $arr[0] && $per <= $arr[1]) {
                    return $remarks = $grade->grade;
                    }
                }
            }
         }
        
    }
    public static function h_grade($val,$grades){
        $remarks = '';
        $per = (int) ($val);
        if($val){
            foreach($grades as $grade) {
                if($grade->status == 'High School'){
                    $arr = explode('-', $grade->percentage);
                    if ($per >= $arr[0] && $per <= $arr[1]) {
                    return $remarks = $grade->grade;
                    }
                }
            }
        }
        
    }
    public static function average($total,$object){
        
        if($total && $object !=0){
            return number_format(($total/$object),1) ;
        }
        
    }
    public static function average_($total,$term,$class_id,$subject_id,$status){
        $recieved = static::checkNull($term,$class_id,$subject_id,$status);
        if($total){
            return  number_format(($total/$recieved),1) ?? '';
        }
        
    }
    private static function checkNull($term_id,$class_id,$subject_id,$status){
        if($status == 1){
            return  count(SubjectMark::where('term_id','=',$term_id)->where('s5_class_id','=',$class_id)->where('subject_id',$subject_id)->where('Summative_test','!=',null)->distinct()->get());
        }elseif($status == 2){
            return  count(SubjectMark::where('term_id','=',$term_id)->where('s5_class_id','=',$class_id)->where('subject_id',$subject_id)->where('CAT1','!=',null)->distinct()->get());
        }elseif($status == 3){
            return  count(SubjectMark::where('term_id','=',$term_id)->where('s5_class_id','=',$class_id)->where('subject_id',$subject_id)->where('CAT2','!=',null)->distinct()->get());
        }elseif($status == 4){
            return  count(SubjectMark::where('term_id','=',$term_id)->where('s5_class_id','=',$class_id)->where('subject_id',$subject_id)->where('TCA','!=',null)->distinct()->get());
        }elseif($status == 5 ){
            return  count(SubjectMark::where('term_id','=',$term_id)->where('s5_class_id','=',$class_id)->where('subject_id',$subject_id)->where('MSC','!=',null)->distinct()->get());
        }elseif($status == 6){
           return count(SubjectMark::where('term_id','=',$term_id)->where('s5_class_id','=',$class_id)->where('subject_id',$subject_id)->where('Exam','!=',null)->distinct()->get());
        }
        elseif($status == 7){
            return  count(SubjectMark::where('term_id','=',$term_id)->where('s5_class_id','=',$class_id)->where('subject_id',$subject_id)->where('GT','!=',null)->distinct()->get());
        }
    }
    public static function checkNoStudent($term_id,$class_id,$subject_id,$status){
        if($status == 1){
            return  count(SubjectMark::where('term_id','=',$term_id)->where('s5_class_id','=',$class_id)->where('subject_id',$subject_id)->where('Summative_test','!=',null)->distinct()->get());
        }elseif($status == 2){
            return  count(SubjectMark::where('term_id','=',$term_id)->where('s5_class_id','=',$class_id)->where('subject_id',$subject_id)->where('CAT1','!=',null)->distinct()->get());
        }elseif($status == 3){
            return  count(SubjectMark::where('term_id','=',$term_id)->where('s5_class_id','=',$class_id)->where('subject_id',$subject_id)->where('CAT2','!=',null)->distinct()->get());
        }elseif($status == 4){
            return  count(SubjectMark::where('term_id','=',$term_id)->where('s5_class_id','=',$class_id)->where('subject_id',$subject_id)->where('TCA','!=',null)->distinct()->get());
        }elseif($status == 5 ){
            return  count(SubjectMark::where('term_id','=',$term_id)->where('s5_class_id','=',$class_id)->where('subject_id',$subject_id)->where('MSC','!=',null)->distinct()->get());
        }elseif($status == 6){
           return count(SubjectMark::where('term_id','=',$term_id)->where('s5_class_id','=',$class_id)->where('subject_id',$subject_id)->where('Exam','!=',null)->distinct()->get());
        }
        elseif($status == 7){
            return  count(SubjectMark::where('term_id','=',$term_id)->where('s5_class_id','=',$class_id)->where('subject_id',$subject_id)->where('GT','!=',null)->distinct()->get());
        }
    }
 public static function checkNoJStudent($i,$term_id,$class_id,$status){
        if($status == 1){
            return  static::iterate(SubjectMark::where('term_id','=',$term_id)->where('s5_class_id','=',$class_id)->where('Summative_test','!=',null)->where('status',$i)->distinct()->get());
        }elseif($status == 2){
            return  static::iterate(SubjectMark::where('term_id','=',$term_id)->where('s5_class_id','=',$class_id)->where('CAT1','!=',null)->where('status',$i)->distinct()->get());
        }elseif($status == 3){
            return  static::iterate(SubjectMark::where('term_id','=',$term_id)->where('s5_class_id','=',$class_id)->where('status',$i)->where('CAT2','!=',null)->distinct()->get());
        }elseif($status == 4){
            return  static::iterate(SubjectMark::where('term_id','=',$term_id)->where('s5_class_id','=',$class_id)->where('status',$i)->where('TCA','!=',null)->distinct()->get());
        }elseif($status == 5 ){
            return  static::iterate(SubjectMark::where('term_id','=',$term_id)->where('s5_class_id','=',$class_id)->where('status',$i)->where('MSC','!=',null)->distinct()->get());
        }elseif($status == 6){
          return static::iterate(SubjectMark::where('term_id','=',$term_id)->where('s5_class_id',$class_id)->where('status',$i)->where('Exam','!=',0)->distinct()->get());
        }
        elseif($status == 7){
            return  static::iterate(SubjectMark::where('term_id','=',$term_id)->where('s5_class_id','=',$class_id)->where('status',$i)->where('GT','!=',null)->distinct()->get());
        }
    }

 private static function iterate($objects){
     $newArray = [];
     foreach($objects as $obj){
         if(!in_array($obj->student_id,$newArray)){
             array_push($newArray,$obj->student_id);
         }
     }
     return count($newArray);
     
 }

    public static function averPer($avg,$scores){
        if($avg && $scores !=0){
            return number_format((($avg/$scores) *100),1);
        }
    }
          
    
    public static function min_score($id,$class_id,$term_id){
        return SubjectMark::where('subject_id',$id)->where('term_id',$term_id)->where('s5_class_id',$class_id)->min('summative_test');
       
    }
    
    public static function max_score($id,$class_id,$term_id){
        return SubjectMark::where('subject_id',$id)->where('term_id',$term_id)->where('s5_class_id',$class_id)->max('summative_test');
       
    }
    public static function c1_max_score($id,$class_id,$term_id){
        return SubjectMark::where('subject_id',$id)->where('term_id',$term_id)->where('s5_class_id',$class_id)->max('CAT1');
        
    }
     public static function c1_jmax_score($id,$class_id,$term_id){
         $scores = SubjectMark::where('status',$id)->where('term_id',$term_id)->where('s5_class_id',$class_id)->get();
        $students =[];
        $score_list = [];
        $sum = 0;
        foreach ($scores as  $value) {
            # code...
            array_push($students,$value->student_id);
        }
        $class_students= Student::whereIn('id',$students)->get();
        foreach($class_students as $student){
            $sum = SubjectMark::where('status',$id)->where('term_id',$term_id)->where('student_id',$student->id)->where('s5_class_id',$class_id)->sum('CAT1');
            if ($id ==1){
                array_push($score_list,$sum/2);
            }
            elseif ($id == 2){
                array_push($score_list,$sum/4);
            }
            elseif ($id ==3){
                array_push($score_list, $sum/2);
            }
            elseif ($id ==4){
               array_push($score_list,$sum/2);
            }
            elseif ($id == 5){
                array_push($score_list, $sum/3);
            }else{
                array_push($score_list,$sum);
            }
        
            
        }
        if(count($score_list) > 1){
          return max($score_list) ; 
        }
        
    }
    // create for CAT2
    public static function c2_max_score($id,$class_id,$term_id){
        $scores = SubjectMark::where('subject_id',$id)->where('term_id',$term_id)->where('s5_class_id',$class_id)->get();
        $score_list = [];
        foreach ($scores as  $value) {
            # code...
          array_push($score_list,$value->CAT2);
        }
    
        return max($score_list);
    }
     
    public static function total_GT($class_id,$term_id){
        $scores = SubjectMark::where('term_id',$term_id)->where('s5_class_id',$class_id)->get();
        $cnt = $scores->count();
        $sum=0;
        foreach ($scores as $key => $value) {
            # code...
            $sum +=$value->GT;
        }
        return number_format(($sum/$cnt),1);
    }
    public static function h_aver($class, $term){
       $num = Average::where('s5_class_id',$class)->where('term_id',$term)->get();
        $array = [];
        if($num){
            foreach ($num as  $value) {
                # code...
                array_push($array,$value->aver_);
            }
            if($array != null)
             return number_format(max($array));
        }
        return '';
       
       
    }

    public static function subject_total($subject_id,$class_id,$term_id){
        return SubjectMark::where('subject_id',$subject_id)->where('term_id',$term_id)->where('s5_class_id',$class_id)->sum('summative_test');
       
    }

    public static function subAver($subject_id,$class_id,$term_id){
        return SubjectMark::where('subject_id',$subject_id)->where('term_id',$term_id)->where('s5_class_id',$class_id)->sum('CAT1');
    }
    public static function jsubAver($status,$class_id,$term_id){
        $sum = SubjectMark::where('status',$status)->where('term_id',$term_id)->where('s5_class_id',$class_id)->sum('CAT1');
        return  static::checking($status,$sum);
    
    }
    public static function subAver2($subject_id,$class_id,$term_id){
        $scores = SubjectMark::where('subject_id',$subject_id)->where('term_id',$term_id)->where('s5_class_id',$class_id)->sum('CAT2');
        return $scores;
      
    }

    public static function average_per($sum,$n){
        if($sum !=0 && $n != 0){
        return ($sum / $n) * 100;
        }
    }
    // Calculations For Examination
    public static function subject_total_Exam($subject_id,$class_id,$term_id){
        return SubjectMark::where('subject_id',$subject_id)->where('term_id',$term_id)->where('s5_class_id',$class_id)->where('Exam','!=',null)->sum('Exam');
        
    }
    public static function max_score_Exam($id,$class_id,$term_id){
        return SubjectMark::where('subject_id',$id)->where('term_id',$term_id)->where('s5_class_id',$class_id)->max('Exam');
       
    }
    public static function min_score_Exam($id,$class_id,$term_id){
        return SubjectMark::where('subject_id',$id)->where('term_id',$term_id)->where('s5_class_id',$class_id)->min('Exam');
       
    }

    public static function subject_total_TCA($subject_id,$class_id,$term_id){
        return SubjectMark::where('subject_id',$subject_id)->where('term_id',$term_id)->where('s5_class_id',$class_id)->sum('TCA');
        
    }
    public static function max_score_TCA($id,$class_id,$term_id){
        return SubjectMark::where('subject_id',$id)->where('term_id',$term_id)->where('s5_class_id',$class_id)->max('TCA');
        
    }
    public static function min_score_TCA($id,$class_id,$term_id){
        return SubjectMark::where('subject_id',$id)->where('term_id',$term_id)->where('s5_class_id',$class_id)->min('TCA');
    }

    public static function subject_total_GT($subject_id,$class_id,$term_id){
        return SubjectMark::where('subject_id',$subject_id)->where('term_id',$term_id)->where('s5_class_id',$class_id)->sum('GT');
       
    }
    public static function max_score_GT($id,$class_id,$term_id){
        return SubjectMark::where('subject_id',$id)->where('term_id',$term_id)->where('s5_class_id',$class_id)->max('GT');
    }
    public static function min_score_GT($id,$class_id,$term_id){
        return SubjectMark::where('subject_id',$id)->where('term_id',$term_id)->where('s5_class_id',$class_id)->min('GT');
    }

    public static function subject_total_cat1($subject_id,$class_id,$term_id){
        return SubjectMark::where('subject_id',$subject_id)->where('term_id',$term_id)->where('s5_class_id',$class_id)->sum('CAT1');
    }
    
     public static function subject_total_jcat1($status,$class_id,$term_id){
        $sum= SubjectMark::where('status',$status)->where('term_id',$term_id)->where('s5_class_id',$class_id)->sum('CAT1');
       return static::checking($status,$sum); 
        
    }
     public static function subject_total_jcat2($status,$class_id,$term_id){
        $sum= SubjectMark::where('status',$status)->where('term_id',$term_id)->where('s5_class_id',$class_id)->sum('CAT2');
        return static::checking($status,$sum);
        
    }
    public static function subject_total_jMSC($status,$class_id,$term_id){
        $sum= SubjectMark::where('status',$status)->where('term_id',$term_id)->where('s5_class_id',$class_id)->sum('MSC');
        return  static::checking($status,$sum);
        
    }
    public static function subject_total_jExam($status,$class_id,$term_id){
        $sum= SubjectMark::where('status',$status)->where('term_id',$term_id)->where('s5_class_id',$class_id)->sum('Exam');
        return  static::checking($status,$sum);
        
    }
    public static function subject_total_jTCA($status,$class_id,$term_id){
        $sum= SubjectMark::where('status',$status)->where('term_id',$term_id)->where('s5_class_id',$class_id)->sum('TCA');
        return  static::checking($status,$sum);
        
    }
    public static function subject_total_jGT($status,$class_id,$term_id){
        $sum= SubjectMark::where('status',$status)->where('term_id',$term_id)->where('s5_class_id',$class_id)->sum('GT');
        return  static::checking($status,$sum);
        
    }
    private static function checking($status,$sum){
        if ($status == 1){
            return $sum/2;
        }
        elseif ($status == 2){
            return $sum/4;
        }
        elseif ($status == 3){
            return $sum/2;
        }
        elseif ($status == 4){
            return $sum/2;
        }
        elseif ($status == 5){
            return $sum/3;
        }else{
             return $sum;
        }
    }
    // for Senior High School
    public static function max_score_cat1($id,$class_id,$term_id){
        return SubjectMark::where('subject_id',$id)->where('term_id',$term_id)->where('s5_class_id',$class_id)->max('CAT1');

    }
    public static function min_score_cat1($id,$class_id,$term_id){
        return SubjectMark::where('subject_id',$id)->where('term_id',$term_id)->where('s5_class_id',$class_id)->min('CAT1');

    }
    // for junior high school
    public static function max_score_jcat1($id,$class_id,$term_id){
        $wtc = 'CAT1';
        $arr = static::jcheck($id,$term_id,$class_id,$wtc);
        
        if(count($arr) > 1){
          return max($arr) ; 
        }
               
    }
    public static function min_score_jcat1($id,$class_id,$term_id){
        $wtc = 'CAT1';
        $arr = static::jcheck($id,$term_id,$class_id,$wtc);
        
        if(count($arr) > 1){
          return min($arr) ; 
        }
        
    }
    public static function max_score_jcat2($id,$class_id,$term_id){
        $wtc = 'CAT2';
        $arr = static::jcheck($id,$term_id,$class_id,$wtc);
        
        if(count($arr) > 1){
          return max($arr) ; 
        }
               
    }
    public static function min_score_jcat2($id,$class_id,$term_id){
        $wtc = 'CAT2';
        $arr = static::jcheck($id,$term_id,$class_id,$wtc);
        
        if(count($arr) > 1){
          return min($arr) ; 
        }
        
    }
    public static function max_score_jMSC($id,$class_id,$term_id){
        
        $wtc = 'MSC';
        $arr = static::jcheck($id,$term_id,$class_id,$wtc);
        
        if(count($arr) > 1){
          return max($arr) ; 
        }   
            
    }
    public static function min_score_jMSC($id,$class_id,$term_id){
        $wtc = 'MSC';
        $arr = static::jcheck($id,$term_id,$class_id,$wtc);
        
        if(count($arr) > 1){
          return min($arr) ; 
        }
        
    }
    public static function min_score_jExam($id,$class_id,$term_id){
        $wtc = 'Exam';
        $arr = static::jcheck($id,$term_id,$class_id,$wtc);
        
        if(count($arr) > 1){
          return min($arr) ; 
        }
        
    }
    public static function max_score_jExam($id,$class_id,$term_id){
        
        $wtc = 'Exam';
        $arr = static::jcheck($id,$term_id,$class_id,$wtc);
        
        if(count($arr) > 1){
          return max($arr) ; 
        }   
            
    }
    public static function max_score_jTCA($id,$class_id,$term_id){
        
        $wtc = 'TCA';
        $arr = static::jcheck($id,$term_id,$class_id,$wtc);
        
        if(count($arr) > 1){
          return max($arr) ; 
        }   
            
    }
    public static function min_score_jTCA($id,$class_id,$term_id){
        $wtc = 'TCA';
        $arr = static::jcheck($id,$term_id,$class_id,$wtc);
        
        if(count($arr) > 1){
          return min($arr) ; 
        }
        
    }
    public static function min_score_jGT($id,$term_id,$class_id){
        $wtc = 'GT';
        $arr = static::jcheck($id,$term_id,$class_id,$wtc);
        
        if(count($arr) > 1){
        
          return min($arr) ; 
        }
        
    }
    public static function max_score_jGT($id,$term_id,$class_id){
        
        $wtc = 'GT';
        $arr = static::jcheck($id,$term_id,$class_id,$wtc);
        
        if(count($arr) > 1){
          return max($arr) ; 
        }   
            
    }
    private static function jcheck($id,$term_id,$class_id,$wtc){
        $scores = SubjectMark::where('status',$id)->where('term_id',$term_id)->where('s5_class_id',$class_id)->get();
        $students =[];
        $score_list = [];
        
        foreach ($scores as  $value) {
            # code...
            array_push($students,$value->student_id);
        }
         $class_students= Student::whereIn('id',$students)->get();
        foreach($class_students as $student){
            $sum = SubjectMark::where('status',$id)->where('term_id',$term_id)->where('student_id',$student->id)->where('s5_class_id',$class_id)->where('GT','!=',null)->sum($wtc);
            if ($id == 1){
                array_push($score_list,$sum/2);
            }
            elseif ($id == 2){
                array_push($score_list,$sum/4);
            }
            elseif ($id == 3){
                array_push($score_list, $sum/2);
            }
            elseif ($id == 4){
               array_push($score_list,$sum/2);
            }
            elseif ($id == 5){
                array_push($score_list, $sum/3);
            }else{
                array_push($score_list,$sum);
            }
        
            
        }
        return $score_list;
    }

    public static function subject_total_cat2($subject_id,$class_id,$term_id){
        return  SubjectMark::where('subject_id',$subject_id)->where('term_id',$term_id)->where('s5_class_id',$class_id)->sum('CAT2');
     
    }
    public static function max_score_cat2($id,$class_id,$term_id){
        $scores = SubjectMark::where('subject_id',$id)->where('term_id',$term_id)->where('s5_class_id',$class_id)->max('CAT2');
        
        return $scores;
    }
    public static function min_score_cat2($id,$class_id,$term_id){
        return SubjectMark::where('subject_id',$id)->where('term_id',$term_id)->where('s5_class_id',$class_id)->min('CAT2');
       
    }
    public static function subject_total_msc($subject_id,$class_id,$term_id){
        return SubjectMark::where('subject_id',$subject_id)->where('term_id',$term_id)->where('s5_class_id',$class_id)->sum('MSC');

    }
    public static function max_score_msc($id,$class_id,$term_id){
        return SubjectMark::where('subject_id',$id)->where('term_id',$term_id)->where('s5_class_id',$class_id)->max('MSC');
        
    }
    public static function min_score_msc($id,$class_id,$term_id){
        return SubjectMark::where('subject_id',$id)->where('term_id',$term_id)->where('s5_class_id',$class_id)->min('MSC');
    }

    public static function behave($behave){
        if ($behave == 1){
         echo " <td><i class='fa fa-check'></i></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>";
        }    
        elseif($behave == 2){
            echo " <td></td>
            <td><i class='fa fa-check'></i></td>
            <td></td>
            <td></td>
            <td></td>";
        }    
        elseif($behave == 3){
        echo " <td></td>
            <td></td>
            <td><i class='fa fa-check'></i></td>
            <td></td>";
        }
        elseif($behave == 4){      
        echo " <td></td>
            <td></td>
            <td></td>
            <td><i class='fa fa-check'></i></td>";
        }
    }
    public static function h_behave($behave){
        if ($behave == 1){
            echo " <td>
                            <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-dot' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                            <path fill-rule='evenodd' d='M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z'/>
                        </svg>
                    </td>
                   <td ></td>
                   <td ></td>
                   <td ></td>";
           }    
           elseif($behave == 2){
               echo " <td></td>
               <td >
               <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-dot' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
               <path fill-rule='evenodd' d='M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z'/>
           </svg>
               </td>
               <td ></td>
               <td ></td>";
           }    
           elseif($behave == 3){
           echo "<td></td>
                <td ></td>
                <td >
                <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-dot' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                <path fill-rule='evenodd' d='M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z'/>
            </svg>
                </td>
                <td ></td>";
           }
           elseif($behave == 4){      
           echo "<td>.</td>
           <td ></td>
           <td ></td>
           <td >
           <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-dot' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
           <path fill-rule='evenodd' d='M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z'/>
            </svg>
           </td>";
           } 
    }

    public static function h_min_score($id,$class_id,$term_id){
        return SubjectMark::where('subject_id',$id)->where('term_id',$term_id)->where('s5_class_id',$class_id)->min('GT');
    
    }
    
    public static function h_max_score($id,$class_id,$term_id){
        return SubjectMark::where('subject_id',$id)->where('term_id',$term_id)->where('s5_class_id',$class_id)->max('GT');
    }
    
    public static function getStudentsInClass($id,$class_id){
        $term = Term::find($id);
        $class_T = S5Class::find($class_id);
        $student_id = StudentTerm::where('s5_class_id', $class_id)->where('term_id',$id)->get();
        $ids = array();
        foreach($student_id as $id){
          array_push($ids,$id->student_id);
        } 
        $students = Student::whereIn('id',$ids)->orderBy('name', 'ASC')->get();
        return ['term'=>$term,'class_T'=>$class_T,'students'=>$students];
      }
}
