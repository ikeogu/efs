@extends('layouts.dashboard')

@section('title', 'Student Result SUMMATIVE TEST I')

@section('content')


<div class="container-fluid" > 
    <div class="d-flex justify-content-end">
        <form>
            <input type = "button" value = "Print" onclick = "window.print()" id="printPageButton"  class="btn btn-success btn-block btn-sm"/>
        </form>
    </div>
   <div class="card">
        <div class="card-header bg-success text-white">SUMMATIVE TEST I {{$class_->name}}| {{$class_->description}}     {{$term->name}} ||  {{$term->session}}</div>
        <div class="card-body">
            <div class="col-12 table-responsive">
                <table  class="table table-striped table-bordered  text-default">
                <thead class="header">
                    <th class="rotate">S/No</th>
                    <th >Name</th>
                    
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
                <tbody>  
                     @php
                        $total = 0;
                        $sum_total = 0;
                        $min_t = 0;
                        $min_t_per = 0;
                        
                    @endphp                       
                    @foreach ($students as $key =>$student)
                    
                    <tr>
                        
                        <td>{{$key + 1}}</td>
                        <td> {{$student->name}}  {{$student->oname}} {{$student->surname}}</td>                   
                        @foreach ($student->subjectMark->sortBy('subname') as $key=>  $item)
                            @if($item->term_id == $term->id && $item->s5_class_id == $class_->id) 
                                
                               <td>{{$item->summative_1}}</td>
                                @php
                                $total += $item->summative_1;
                               @endphp 
                            @endif
                             
                        @endforeach
                        <td>{{$total}}</td>

                        <td>{{App\Student::average($total,$subject->count())}}</td>
                        @php
                            $sum_total += $total;
                            
                            $avg = App\Student::average($total,$subject->count());
                            $avgPer = App\Student::averPer($avg,$SMT_1);
                            $total = 0;
                            $min_t +=$avg; 
                            $min_t_per +=$avgPer; 
                        @endphp
                        <td>{{App\Student::averPer($avg,$SMT_1)}} </td>
                        <td>{{App\Student::grade($avgPer,$grades)}}  </td>
                       
                        
                    </tr>
                    
                    @endforeach
                    
                     <tr>
                        <th></th>
                    </tr> 
                   
                     <tr>
                        <td></td>
                        <th>Total</th>
                        @foreach ($subject->sortBy('name') as $item)
                        <td>{{App\Student::subject_total($item->id,$class_->id,$term->id)}} </td>
                        @endforeach
                        <td>{{$sum_total}}</td>
                        <td>{{$min_t}}</td>
                        <td>{{$min_t_per}}</td>
                        
                    </tr>
                    <tr>
                        <td></td>
                        <th>Max Score</th>
                        @foreach ($subject->sortBy('name') as $item)
                        <td>{{App\Student::max_score($item->id,$class_->id,$term->id)}}</td>
                        @endforeach
                        
                    </tr>
                    <tr>
                        <td></td>
                        <th>Min Score</th>
                        @foreach ($subject->sortBy('name') as $item)
                             <td>{{App\Student::min_score($item->id,$class_->id,$term->id)}}</td>
                        @endforeach
                        
                    </tr> 
                    <tr>
                        <td></td>
                        <th>Subject Average</th>
                        @foreach ($subject->sortBy('name') as $item)
                        <td>{{App\Student::average(App\Student::subject_total($item->id,$class_->id,$term->id),App\Student::checkNoStudent($term->id,$class_->id,$item->id,1))}}</td>
                        @endforeach
                        
                       
                    </tr> 
                    <tr>
                        <td></td>
                        <th>Subject Average (%)</th>
                        @foreach ($subject->sortBy('name') as $item)
                        <td>{{round(App\Student::average_per(App\Student::subject_total($item->id,$class_->id,$term->id),($SMT_1 * App\Student::checkNoStudent($term->id,$class_->id,$item->id,1))))}}</td>
                        @endforeach
                        
                       
                        
                    </tr> 
                    <tr>
                        <td></td>
                        <th>Remarks</th>
                        @foreach ($subject->sortBy('name') as $item)
                        <td>{{App\Student::grade(App\Student::average_per(App\Student::subject_total($item->id,$class_->id,$term->id),($SMT_1 * App\Student::checkNoStudent($term->id,$class_->id,$item->id,1))),$grades)}}</td>
                        @endforeach
                        
                        
                    </tr>   
                    
                </tbody>
                
                </table>
            </div>
        </div>
    </div> 
{{-- <summative-test :students="{{$students}}" :subject="{{$subject}}" :grades="{{$grades}}" :SMT_1="{{$SMT_1}}"></summative-test> --}}

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