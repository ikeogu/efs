@extends('layouts.dashboard')

@section('title', 'CAT 2 BROADSHEET')

@section('content')

<div class="container-fluid">
    <div class="card">
    <div class="card-header bg-success text-capitalize text-white">C.A.T 2 {{$class_->name}}|   {{$class_->description}}  | {{$term->name}}|  {{$term->session}}</div>
        <div class="card-body">
            <div class="col-12 table-responsive">
                 @if ($class_->status == 'Junior High School')
                    <table  class="table table-striped table-bordered m-0  text-default" style="width:100%">
                       
                       <thead class="header">
                        <th class="rotate">S/No</th>
                        <th >Name</th>
                        @php
                            $total = 0;
                            $sum_total = 0;
                            $min_t = 0;
                            $min_t_per = 0;
                            $cl_av = 0;
                            $no_of_subject = 0;
                            $total_sum = 0;
                            $h = 0;
                            $status = array();
                             asort($subject_status);
                        @endphp
                        @foreach($subject_status as $sta)
                        @if($sta == 1)
                         <th class='rotate text-capitalize'>
                            <div>ENGLISH STUDIES</div>
                        </th>
                        
                        @elseif($sta == 2)
                         <th class='rotate text-capitalize'>
                            <div>BASIC SCIENCE AND TECH</div>
                        </th>
                        
                        @elseif($sta == 3)
                         <th class='rotate text-capitalize'>
                            <div>PREVOCATIONAL STUDIES</div>
                        </th>
                        
                        @elseif($sta == 4)
                         <th class='rotate text-capitalize'>
                            <div>NATIONAL VALUES</div>
                        </th>
                        
                        @elseif($sta == 5)
                        <th class='rotate text-capitalize'>
                            <div>C.C.A</div>
                        </th>
                        
                        @elseif($sta == 6)
                         <th class='rotate text-capitalize'>
                            <div>BUSINESS STUDIES</div>
                        </th>
                        
                        @elseif($sta == 7)
                        <th class='rotate text-capitalize'>
                            <div>FRENCH</div>
                        </th>
                        
                        @elseif($sta == 8)
                        <th class='rotate text-capitalize'>
                            <div>MATHEMATICS</div>
                        </th>
                        @endif
                         @if($sta == 9)
                        <th class='rotate text-capitalize'>
                            <div>RELIGIOUS STUDIES</div>
                        </th>
                        
                         @elseif($sta == 10)
                        <th class='rotate text-capitalize'>
                            <div>HANDWRITING</div>
                        </th>
                        @endif
                        @endforeach
                        <th class="rotate">Total</th>
                        <th class="rotate">Average</th>  
                        <th class="rotate">Average(%)</th> 
                        <th class="rotate">Remarks</th> 
                    </thead>
                                     
                    @foreach ($students as $key =>$student)
                    
                    <tr>
                        
                        <td>{{$key + 1}}</td>
                        <td>{{$student->name}} {{$student->oname}}  {{$student->surname}}</td>                    
                        @foreach ($student->subjectMark->sortBy('status') as  $key => $item)
                        @if($item->term_id == $term->id && $item->s5_class_id == $class_->id)
                           @if(!in_array($item->status,$status))
                               @php
                                 $sum = App\SubjectMark::where('term_id',$term->id)->where('s5_class_id',$class_->id)->where('student_id',$student->id)->where('status',$item->status)->sum('CAT2');
                                 array_push($status,$item->status);
                                  
                                @endphp
                                  
                                    @if($item->status == 1)
                                    <td>{{round($sum/2)}}</td>
                                        @php
                                         $total_sum =round($sum/2);
                                         
                                         @endphp
                                    @endif
                                    @if($item->status == 2)
                                         <td>{{round($sum/4)}}</td>
                                         @php
                                         $total_sum =round($sum/4);
                                         
                                         @endphp
                                    @endif
                                    @if($item->status == 3)
                                         <td>{{round($sum/2)}}</td>
                                         @php
                                         $total_sum =round($sum/2);
                                         
                                         @endphp
                                    @endif
                                    @if($item->status == 4)
                                        <td> {{round($sum/2)}}</td>
                                         @php
                                         $total_sum =round($sum/2);
                                         
                                         @endphp
                                    @endif
                                    @if($item->status ==5)
                                        <td> {{round($sum/3)}}</td>
                                         @php
                                         $total_sum =round($sum/3);
                                         
                                         @endphp
                                    @endif
                                    
                                    @if($item->status ==6)
                                        <td> {{$item->CAT2}}</td>
                                         @php
                                         $total_sum =$item->CAT2;
                                         
                                         @endphp
                                    @endif
                                     @if($item->status ==7)
                                        <td> {{$item->CAT2}}</td>
                                         @php
                                         $total_sum =$item->CAT2;
                                         
                                         @endphp
                                    @endif
                                    @if($item->status ==8)
                                        <td> {{$item->CAT2}}</td>
                                         @php
                                         $total_sum =$item->CAT2;
                                         
                                         @endphp
                                    @endif
                                     @if($item->status ==9)
                                        <td> {{$item->CAT2}}</td>
                                         @php
                                         $total_sum =$item->CAT2;
                                         if($item->CAT2 == null){
                                           $h  = 2;
                                         }
                                         @endphp
                                    @endif
                                     @if($item->status ==10)
                                        <td> {{$item->CAT2}}</td>
                                         @php
                                         $total_sum =$item->CAT2;
                                         
                                         @endphp
                                    @endif
                                
                                    
                                    
                                
                                @php
                                    $total += $total_sum;
                                   
                                @endphp 
                                @endif
                            @endif
                        @endforeach
                        @php
                            if($h == 2){
                                $cnt = 9;
                            }else{
                                 $cnt = count($status);
                            }
                           
                        @endphp
                        <td>{{$total}}</td>
                        <td>{{App\Student::average($total,$cnt)}}</td>
                        @php
                          
                            $sum_total += $total;
                            $avg = App\Student::average($total,$cnt);
                            $avgPer = App\Student::averPer($avg,$TCA_score);
                            $total = 0;
                            
                            $status = array();
                            $h = 0;
                        @endphp
                        <td>{{App\Student::averPer($avg,$TCA_score)}} </td>
                        <td>{{App\Student::h_grade($avgPer,$grades)}}  </td>
                    </tr>  
                    @endforeach
                    <tr>
                        <th></th>
                    </tr> 
                   
                     <tr>
                        <td></td>
                        <th>Total</th>
                        @for ($i = 1; $i <= $cnt; $i++)
                        <td>{{ round(App\Student::subject_total_jcat2($i,$class_->id,$term->id))}} </td>
                        @endfor
                        <td>{{$sum_total}}</td>
                        <td>{{$min_t}}</td>
                        <td>{{$min_t_per}}</td>
                        
                    </tr>
                    <tr>
                        <td></td>
                        <th>Max Score</th>
                        @for ($i = 1; $i <= $cnt; $i++)
                        <td>{{round(App\Student::max_score_jcat2($i,$class_->id,$term->id))}}</td>
                        @endfor
                        
                    </tr>
                    <tr>
                        <td></td>
                        <th>Min Score</th>
                        @for ($i = 1; $i <= $cnt; $i++)
                             <td>{{round(App\Student::min_score_jcat2($i,$class_->id,$term->id))}}</td>
                        @endfor
                        
                    </tr> 
                    <tr>
                        <td></td>
                        <th>Class Average</th>
                        @for ($i = 1; $i <= $cnt; $i++)
                        <td>{{App\Student::average(App\Student::subject_total_jcat2($i,$class_->id,$term->id),App\Student::checkNoStudent($term->id,$class_->id,$item->id,2))}}</td>
                        @endfor
                        
                       
                    </tr> 
                    <tr>
                        <td></td>
                        <th>Class Performance (%)</th>
                        @for ($i = 1; $i <= $cnt; $i++)
                        <td>{{round(App\Student::average_per(App\Student::subject_total_jcat2($i,$class_->id,$term->id),($TCA_score * App\Student::checkNoStudent($term->id,$class_->id,$item->id,2))))}}</td>
                        @php
                            $cl_av += App\Student::average_per(App\Student::subject_total_jcat2($item->id,$class_->id,$term->id),($TCA_score * App\Student::checkNoStudent($term->id,$class_->id,$item->id,2)))
                        @endphp
                        @endfor
                        {{-- <td>{{App\Student::average($cl_av,$subject->count())}}</td>
                        <td>Class Average</td> --}}
                       
                        
                    </tr> 
                    <tr>
                        <td></td>
                        <th>Remarks</th>
                        @for ($i = 1; $i <= $cnt; $i++)
                        <td>{{App\Student::h_grade(App\Student::average_per(App\Student::subject_total_jcat2($i,$class_->id,$term->id),($TCA_score * App\Student::checkNoStudent($term->id,$class_->id,$item->id,2))),$grades)}}</td>
                        @endfor
                        
                        
                    </tr>   
                  </tbody>
                </table>
                @else
                <table  class="table table-striped table-bordered m-0  text-default" style="width:100%">
                    <thead class="header">
                        <th class="rotate">S/No</th>
                        <th >Name</th>
                        @php
                        $total = 0;
                        $sum_total = 0;
                        $min_t = 0;
                        $min_t_per = 0;
                        $cl_av = 0;
                        $no_of_subject = 0;
                        @endphp     
                        @foreach ($subject->sortBy('name') as  $key => $item)
                        <th class="rotate text-capitalize ">
                            <div>{{$item->name}}</div>
                        </th>  
                        @endforeach
                        <th class="rotate">Total</th>
                        <th class="rotate">Average</th>  
                        <th class="rotate">Average(%)</th> 
                        <th class="rotate">Remarks</th> 
                    </thead>
                                     
                    @foreach ($students as $key =>$student)
                    
                    <tr>
                        
                        <td>{{$key + 1}}</td>
                        <td>{{$student->name}} {{$student->oname}}  {{$student->surname}}</td>                    
                        @foreach ($student->subjectMark->sortBy('subname') as  $key => $item)
                        @if($item->term_id == $term->id && $item->s5_class_id == $class_->id)                 
                            <td>{{$item->CAT2}}</td>
                            @php
                                $total += $item->CAT2;
                                if($item->CAT2 != null){
                                    $no_of_subject += 1;
                                }
                            @endphp  
                        @endif
                        @endforeach
                        <td>{{$total}}</td>
                        <td>{{App\Student::average($total,$no_of_subject)}}</td>
                        @php
                            $sum_total += $total;
                            $avg = App\Student::average($total,$no_of_subject);
                            $avgPer = App\Student::averPer($avg,$TCA_score);
                            $total = 0;
                            $no_of_subject =0;
                        @endphp
                        <td>{{App\Student::averPer($avg,$TCA_score)}} </td>
                        <td>{{App\Student::h_grade($avgPer,$grades)}}  </td>
                       
                        
                    </tr>
                    
                    @endforeach
                    <tr>
                        <th></th>
                    </tr> 
                   
                     <tr>
                        <td></td>
                        <th>Total</th>
                        @foreach ($subject->sortBy('name') as $item)
                        <td>{{App\Student::subject_total_cat2($item->id,$class_->id,$term->id)}} </td>
                        @endforeach
                        <td>{{$sum_total}}</td>
                        <td>{{$min_t}}</td>
                        <td>{{$min_t_per}}</td>
                        
                    </tr>
                    <tr>
                        <td></td>
                        <th>Max Score</th>
                        @foreach ($subject->sortBy('name') as $item)
                        <td>{{App\Student::max_score_cat2($item->id,$class_->id,$term->id)}}</td>
                        @endforeach
                        
                    </tr>
                    <tr>
                        <td></td>
                        <th>Min Score</th>
                        @foreach ($subject->sortBy('name') as $item)
                             <td>{{App\Student::min_score_cat2($item->id,$class_->id,$term->id)}}</td>
                        @endforeach
                        
                    </tr> 
                    <tr>
                        <td></td>
                        <th>Class Average</th>
                        @foreach ($subject->sortBy('name') as $item)
                        <td>{{App\Student::average_(App\Student::subject_total_cat2($item->id,$class_->id,$term->id),$term->id,$class_->id,$item->id,4)}}</td>
                        @endforeach
                        
                       
                    </tr> 
                    <tr>
                        <td></td>
                        <th>Class Performance (%)</th>
                        @foreach ($subject->sortBy('name') as $item)
                        <td>{{round(App\Student::average_per(App\Student::subject_total_cat2($item->id,$class_->id,$term->id),($TCA_score  * App\Student::checkNoStudent($term->id,$class_->id,$item->id,4))))}}</td>
                        @php
                            $cl_av += App\Student::average_per(App\Student::subject_total_cat2($item->id,$class_->id,$term->id),($TCA_score  * App\Student::checkNoStudent($term->id,$class_->id,$item->id,4)));
                        @endphp
                        @endforeach
                        {{-- <td>{{App\Student::average($cl_av,$subject->count())}}</td>
                        <td>Class Average</td> --}}
                       
                        
                    </tr> 
                    <tr>
                        <td></td>
                        <th>Remarks</th>
                        @foreach ($subject->sortBy('name') as $item)
                        <td>{{App\Student::h_grade(App\Student::average_per(App\Student::subject_total_cat2($item->id,$class_->id,$term->id),($TCA_score  * App\Student::checkNoStudent($term->id,$class_->id,$item->id,4))),$grades)}}</td>
                        @endforeach
                        
                        
                    </tr> 
                  </tbody>
                </table>
                @endif
                
            </div>
        </div>
    </div>
</div>
@endsection
<style>
   td {
    border: 1px black solid;
    padding: 5px;
}
.rotate {
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  width: 1.5em;
}
.rotate div {
     -moz-transform: rotate(-90.0deg);  /* FF3.5+ */
       -o-transform: rotate(-90.0deg);  /* Opera 10.5 */
  -webkit-transform: rotate(-90.0deg);  /* Saf3.1+, Chrome */
             filter:  progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083);  /* IE6,IE7 */
         -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083)"; /* IE8 */
         margin-left: -10em;
         margin-right: -10em;
}
.table { font-size: 1rem; }

@media (min-width: 576px) {
    .table { font-size: 1.25rem; }
}
/* @media (min-width: 768px) {
    .table { font-size: 1.5rem; }
}
@media (min-width: 992px) {
    .table { font-size: 1.75rem; }
}
@media (min-width: 1200px) {
    .table { font-size: 2rem; }
} */ 
.header th {
              line-height: 180px;
              font-size: 12px;
    }
th, td{
    font-size: 12px;
}
.word th{
    word-break: break-word;
}
</style>
<script>


//Trim and re-trim only when necessary (prevent re-trim when string is shorted than maxLength, it causes last word cut) 
function shorten(text,max) {
    return text && text.length > max ? text.slice(0,max).split('/ (.*)/').slice(0, -1).join(' ') : text
}
    
</script>