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

    th.rotated-text {
    
        white-space: nowrap;
        padding: 0 !important;
        font-size:11.5px;
        
    }

    th.rotated-text > div {
        transform:
            translate(13px, 0px)
            rotate(-90deg);
            text-align:center;
            line-height: -160px;
        /* width: 30px; */
    }

    th.rotated-text > div > span {
        /* padding: 5px 10px; */
    }
    table {
        
            table-layout : auto;
            width:98%;
            border-collapse:separate; 
            border-spacing:0.1em;
            padding:2px;
            margin: 2px;
        }
    </style>
</head>
<body>
    
        <div class="bg-success text-white">SUMMATIVE TEST 1 {{$data['class_']->name}}| {{$data['class_']->description}}     {{$data['term']->name}} ||  {{$data['term']->session}}</div>

            <table  class="table-striped table-bordered">
                <thead class="">
                    <tr>
                            <th scope="col">#</th>
                            <th class="rotated" scope="col"><div><span>Name</span></div></th>
                        
                            @foreach ($data['subject']->sortBy('name') as  $key => $item)
                                
                            <th class="rotated" scope="col"><div><span>{{$item->name}}<</span></div></th>
                            @endforeach
                            <th class="rotate">Total</th>
                            <th class="rotate">Average</th>  
                            <th class="rotate">Average(%)</th> 
                            <th class="rotate">Remarks</th> 
                    </tr>
                </thead>
                <tbody>  
                    @php
                        $total = 0;
                        $sum_total = 0;
                        $min_t = 0;
                        $min_t_per = 0;
                        
                    @endphp                       
                    @foreach ($data['students'] as $key =>$student)
                    
                    <tr>
                        
                        <td>{{$key + 1}}</td>
                        <td> {{$student->name}}  {{$student->oname}} {{$student->surname}}</td>                   
                        @foreach ($student->subjectMark as $key=>  $item)
                            @if($item->term_id == $data['term']->id && $item->s5_class_id == $data['class_']->id)                  
                            <td>{{$item->summative_test}}</td>              
                        
                            @php
                                $total += $item->summative_test;
                            @endphp  
                            @endif
                        @endforeach
                        <td>{{$total}}</td>

                        <td>{{App\Student::average($total,$data['subject']->count())}}</td>
                        @php
                            $sum_total += $total;
                            
                            $avg = App\Student::average($total,$data['subject']->count());
                            $avgPer = App\Student::averPer($avg,$SMT_score);
                            $total = 0;
                            $min_t +=$avg; 
                            $min_t_per +=$avgPer; 
                        @endphp
                        <td>{{App\Student::averPer($avg,$SMT_score)}} </td>
                        <td>{{App\Student::grade($avgPer,$data['grades'])}}  </td>
                    
                        
                    </tr>
                    
                    @endforeach
                    
                    <tr>
                        <th></th>
                    </tr> 
                
                    <tr>
                        <td></td>
                        <th>Total</th>
                        @foreach ($data['subject']->sortBy('name') as $item)
                        <td>{{App\Student::subject_total($item->id,$data['class_']->id,$data['term']->id)}} </td>
                        @endforeach
                        <td>{{$sum_total}}</td>
                        <td>{{$min_t}}</td>
                        <td>{{$min_t_per}}</td>
                        
                    </tr>
                    <tr>
                        <td></td>
                        <th>Max Score</th>
                        @foreach ($data['subject']->sortBy('name') as $item)
                        <td>{{App\Student::max_score($item->id,$data['class_']->id,$data['term']->id)}}</td>
                        @endforeach
                        
                    </tr>
                    <tr>
                        <td></td>
                        <th>Min Score</th>
                        @foreach ($data['subject']->sortBy('name') as $item)
                            <td>{{App\Student::min_score($item->id,$data['class_']->id,$data['term']->id)}}</td>
                        @endforeach
                        
                    </tr> 
                    <tr>
                        <td></td>
                        <th>Subject Average</th>
                        @foreach ($data['subject']->sortBy('name') as $item)
                        <td>{{App\Student::average(App\Student::subject_total($item->id,$data['class_']->id,$data['term']->id),$data['students']->count())}}</td>
                        @endforeach
                        
                    
                    </tr> 
                    <tr>
                        <td></td>
                        <th>Subject Average (%)</th>
                        @foreach ($data['subject']->sortBy('name') as $item)
                        <td>{{round(App\Student::average_per(App\Student::subject_total($item->id,$data['class_']->id,$data['term']->id),($SMT_score * $data['students']->count())))}}</td>
                        @endforeach
                        
                    
                        
                    </tr> 
                    <tr>
                        <td></td>
                        <th>Remarks</th>
                        @foreach ($data['subject']->sortBy('name') as $item)
                        <td>{{App\Student::grade(App\Student::average_per(App\Student::subject_total($item->id,$data['class_']->id,$data['term']->id),($SMT_score * $data['students']->count())),$data['grades'])}}</td>
                        @endforeach
                        
                        
                    </tr>   
                    
                </tbody>
                
            </table>
         
        </div> 
</body>
</html>