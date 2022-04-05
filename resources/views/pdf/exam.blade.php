<!doctype html>
<html>
<head>
       <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

 <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <style>
   
     body{
         
         padding :0 ;
         margin:0 auto;
     }
   
    th, td{
         font-size:14.5px;
         font-weight:bold;
         
         
     }

    th.rotated {
        /* height: 140px; */
        white-space: nowrap;
        padding: 0 !important;
        font-size:14.5px;
        
    }

    th.rotated > div {
        transform:
            translate(13px, 0px)
            rotate(-90deg);
            text-align:center;
            /* line-height: 16px; */
        /* width: 30px; */
    }

    th.rotated > div > span {
        /* padding: 5px 10px; */
    }
    table {
        
            table-layout : auto;
            width:100%;
            border-collapse:separate; 
            border-spacing:0.1em
        }
    </style>
<body>

    <div class=" bg-success text-capitalize text-white">Exam broadSheet {{$data['class_']->name}}|   {{$data['class_']->description}}  | {{$data['term']->name}}|  {{$data['term']->session}}</div>
    @if ($data['class_']->status == 'Junior High School')
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
                    asort($data['subject_status']);
               @endphp
        <table  class="table-striped table-bordered table-condensed">
                <thead class="membership-tiers">
                <tr>
                    <th scope="col">#</th>
                    <th class="rotate" scope="col"><div><span>Name</span></div></th>
                    @foreach($data['subject_status'] as $sta)
                        @if($sta == 1)
                            <th class="rotate" scope="col"><div><span>ENGLISH STUDIES</span></div></th>
                         @elseif($sta == 2)
                            <th class="rotate" scope="col"><div><span>BASIC SCIENCE AND TECH</span></div></th>
                        @elseif($sta == 3)
                            <th class="rotate" scope="col"><div><span>PREVOCATIONAL STUDIES</span></div></th>
                         @elseif($sta == 4)
                            <th class="rotate" scope="col"><div><span>NATIONAL VALUES</span></div></th>
                         @elseif($sta == 5)
                            <th class="rotated" scope="col"><div><span>C.C.A</span></div></th>
                        @elseif($sta == 6)
                            <th class="rotate" scope="col"><div><span>BUSINESS STUDIES</span></div></th>
                         @elseif($sta == 7)
                            <th class="rotate" scope="col"><div><span>FRENCH</span></div></th>
                        @elseif($sta == 8)
                            <th class="rotate" scope="col"><div><span>MATHEMATICS</span></div></th>
                        @elseif($sta == 9)
                             <th class="rotate" scope="col"><div><span>RELIGIOUS STUDIES</span></div></th>
                        @elseif($sta == 10)
                            <th class="rotate" scope="col"><div><span>HANDWRITING</span></div></th>
                        
                        @endif
                    @endforeach
                     <th class="rotated" scope="col"><div><span>Total</span></div></th>
                      <th class="rotated" scope="col"><div><span>Average</span></div></th>
                       <th class="rotated" scope="col"><div><span>Average(%)</span></div></th>
                        <th class="rotated" scope="col"><div><span>Remarks</span></div></th>
                                        
                </tr>
           
          <tbody>
                @foreach ($data['students'] as $key =>$student)
                
                <tr>
                    
                        <td>
                            <p>{{$key + 1}} </p> </td>
                    <td>{{$student->name}} {{$student->oname}}  {{$student->surname}}</td>                    
                    @foreach ($student->subjectMark->sortBy('status') as  $key => $item)
                    @if($item->term_id == $data['term']->id && $item->s5_class_id == $data['class_']->id)
                        @if(!in_array($item->status,$status))
                            @php
                                $sum = App\SubjectMark::where('term_id',$data['term']->id)->where('s5_class_id',$data['class_']->id)->where('student_id',$student->id)->where('status',$item->status)->sum('Exam');
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
                                    <td> {{$item->Exam}}</td>
                                        @php
                                        $total_sum =$item->Exam;
                                        
                                        @endphp
                                @endif
                                    @if($item->status ==7)
                                    <td> {{$item->Exam}}</td>
                                        @php
                                        $total_sum =$item->Exam;
                                        
                                        @endphp
                                @endif
                                @if($item->status ==8)
                                    <td> {{$item->Exam}}</td>
                                        @php
                                        $total_sum =$item->Exam;
                                        
                                        @endphp
                                @endif
                                    @if($item->status ==9)
                                    <td> {{$item->Exam}}</td>
                                        @php
                                        $total_sum =$item->Exam;
                                        if($item->Exam == null){
                                        $h  = 2;
                                        }
                                        @endphp
                                @endif
                                    @if($item->status ==10)
                                    <td> {{$item->Exam}}</td>
                                        @php
                                        $total_sum =$item->Exam;
                                        
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
                        $avgPer = App\Student::averPer($avg,$TCA_score );
                        $total = 0;
                        
                        $status = array();
                        $h = 0;
                    @endphp
                    <td>{{App\Student::averPer($avg,$TCA_score )}} </td>
                    <td>{{App\Student::h_grade($avgPer,$data['grades'])}}  </td>
                </tr>  
                @endforeach
                <tr>
                    <th></th>
                </tr> 
                
                    <tr>
                    <td></td>
                    <td>Total</td>
                    @for ($i = 1; $i <= 10; $i++)
                    <td>{{ round(App\Student::subject_total_jExam($i,$data['class_']->id,$data['term']->id))}} </td>
                    @endfor
                    <td>{{$sum_total}}</td>
                    <td>{{$min_t}}</td>
                    <td>{{$min_t_per}}</td>
                    
                </tr>
                <tr>
                    <td></td>
                    <td>Max Score</td>
                    @for ($i = 1; $i <= 10; $i++)
                    <td>{{round(App\Student::max_score_jExam($i,$data['term']->id,$data['class_']->id))}}</td>
                    @endfor
                    
                </tr>
                <tr>
                    <td></td>
                    <td>Min Score</td>
                    @for ($i = 1; $i <= 10; $i++)
                            <td>{{round(App\Student::min_score_jExam($i,$data['term']->id,$data['class_']->id))}}</td>
                    @endfor
                    
                </tr> 
                <tr>
                    <td></td>
                    <td>Class Average</td>
                    @for ($i = 1; $i <= 10; $i++)
                    <td>{{App\Student::average(App\Student::subject_total_jExam($i,$data['class_']->id,$data['term']->id),App\Student::checkNoJStudent($i,$data['term']->id,$data['class_']->id,6))}}</td>
                    @endfor
                    
                    
                </tr> 
                <tr>
                    <td></td>
                    <td>Class Performance (%)</td>
                    @for ($i = 1; $i <= $cnt; $i++)
                    <td>{{round(App\Student::average_per(App\Student::subject_total_jExam($i,$data['class_']->id,$data['term']->id),($TCA_score  * App\Student::checkNoJStudent($i,$data['term']->id,$data['class_']->id,6))))}}</td>
                    @php
                        $cl_av += App\Student::average_per(App\Student::subject_total_jExam($item->id,$data['class_']->id,$data['term']->id),($TCA_score  * App\Student::checkNoJStudent($i,$data['term']->id,$data['class_']->id,6)));
                    @endphp
                    @endfor
                    <td>{{App\Student::average($cl_av, App\Student::checkNoJStudent($i,$data['term']->id,$data['class_']->id,6))}}</td>
                        
                    
                    
                </tr> 
                <tr>
                    <td></td>
                    <td>Remarks</td>
                    @for ($i = 1; $i <= $cnt; $i++)
                    <td>{{App\Student::h_grade(App\Student::average_per(App\Student::subject_total_jExam($i,$data['class_']->id,$data['term']->id),($TCA_score  * App\Student::checkNoJStudent($i,$data['term']->id,$data['class_']->id,6))),$data['grades'])}}</td>
                    @endfor
                    
                    
                </tr>   
          </tbody>
       </table>

       @else
             @php
               $total = 0;
               $sum_total = 0;
               $min_t = 0;
               $min_t_per = 0;
               $cl_av = 0;
               $no_of_subject = 0;
            @endphp   
       <table  class="table-striped table-bordered m-0 table-condensed">
           <thead class="header">
               <tr>
                    <th scope="col">#</th>
                    <th class="rotate" scope="col"><div><span>Name</span></div></th>
                 
                    @foreach ($data['subject']->sortBy('name') as  $key => $item)
                        
                    <th class="rotate" scope="col"><div><span>{{$item->name}}<</span></div></th>
                    @endforeach
                    <th class="rotate">Total</th>
                    <th class="rotate">Average</th>  
                    <th class="rotate">Average(%)</th> 
                    <th class="rotate">Remarks</th> 
               </tr>
           </thead>
                            
           @foreach ($data['students'] as $key =>$student)
           
           <tr>
               
               <td>{{$key + 1}}</td>
               <td>{{$student->name}} {{$student->oname}}  {{$student->surname}}</td>                    
               @foreach ($student->subjectMark->sortBy('subname') as  $key => $item)
               @if($item->term_id == $data['term']->id && $item->s5_class_id == $data['class_']->id)                 
                   <td>{{$item->Exam}}</td>
                   @php
                       $total += $item->Exam;
                       if($item->Exam != null){
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
                   $avgPer = App\Student::averPer($avg,$TCA_score );
                   $total = 0;
                   $no_of_subject =0;
               @endphp
               <td>{{App\Student::averPer($avg,$TCA_score )}} </td>
               <td>{{App\Student::grade($avgPer,$data['grades'])}}  </td>
              
               
           </tr>
           
           @endforeach
           <tr>
               <th></th>
           </tr> 
          
            <tr>
               <td></td>
               <td>Total</td>
               @foreach ($data['subject']->sortBy('name') as $item)
               <td>{{App\Student::subject_total_Exam($item->id,$data['class_']->id,$data['term']->id)}} </td>
               @endforeach
               <td>{{$sum_total}}</td>
               <td>{{$min_t}}</td>
               <td>{{$min_t_per}}</td>
               
           </tr>
           <tr>
               <td></td>
               <td>Max Score</td>
               @foreach ($data['subject']->sortBy('name') as $item)
               <td>{{App\Student::max_score_Exam($item->id,$data['class_']->id,$data['term']->id)}}</td>
               @endforeach
               
           </tr>
           <tr>
               <td></td>
               <td>Min Score</td>
               @foreach ($data['subject']->sortBy('name') as $item)
                    <td>{{App\Student::min_score_Exam($item->id,$data['class_']->id,$data['term']->id)}}</td>
               @endforeach
               
           </tr> 
          <tr>
                        <td></td>
                        <td>Class Average</td>
                        @foreach ($data['subject']->sortBy('name') as $item)
                        <td>{{App\Student::average_(App\Student::subject_total_Exam($item->id,$data['class_']->id,$data['term']->id),$data['term']->id,$data['class_']->id,$item->id,6)}}</td>
                        @endforeach
                        
                       
                    </tr> 
                    <tr>
                        <td></td>
                        <td>Class Performance (%)</td>
                        @foreach ($data['subject']->sortBy('name') as $item)
                        <td>{{round(App\Student::average_per(App\Student::subject_total_Exam($item->id,$data['class_']->id,$data['term']->id),($TCA_score  * App\Student::checkNoStudent($data['term']->id,$data['class_']->id,$item->id,6))))}}</td>
                        @php
                            $cl_av += App\Student::average_per(App\Student::subject_total_Exam($item->id,$data['class_']->id,$data['term']->id),($TCA_score  * App\Student::checkNoStudent($data['term']->id,$data['class_']->id,$item->id,6)));
                        @endphp
                        @endforeach
                        {{-- <td>{{App\Student::average($cl_av,$data['subject']->count())}}</td>
                        <td>Class Average</td> --}}
                       
                        
                    </tr> 
                    <tr>
                        <td></td>
                        <td>Remarks</td>
                        @foreach ($data['subject']->sortBy('name') as $item)
                        <td>{{App\Student::grade(App\Student::average_per(App\Student::subject_total_Exam($item->id,$data['class_']->id,$data['term']->id),($TCA_score  * App\Student::checkNoStudent($data['term']->id,$data['class_']->id,$item->id,6))),$data['grades'])}}</td>
                        @endforeach
                        
                        
                    </tr> 
         </tbody>
       </table>
       @endif
       
     </div>
         
    </div>

</body>
</html>
