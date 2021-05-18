<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/style.css">
    
    <title>Summative Test</title>
    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body{
            font-family: 'Nunito sans', sans-serif;
        }

        header{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        header p{
            line-height: 0.4;
            font-size: 0.9em;
            font-weight: 600;
        }

        .details-table{
            width: 100%;
        }

        .details-table th{
            width: 60px;  
        }

        .details-table ul{
            border: 1px solid #ccc;
            height: 40px;
            display: flex;
            justify-content: space-between;
            margin: 0;
        }

        .details-table ul li{
            list-style: none;
            line-height: 2.5;
            padding: 0 10px;
            text-transform: uppercase;
        }

        .details-table ul li:nth-child(2){
            border-left: 1px solid #ccc;
            border-right: 1px solid #ccc;
            /* padding: 0 20px; */
            text-align: center;
        }

        .main-result-table th{
            text-transform: uppercase;
           
        }
        .main-result-table td{
            text-transform: uppercase;
            width: 100%;
        }

        .main-result-table td:nth-child(1){
            width: 40%;
            text-align: center;
        }

        .main-result-table td:nth-child(3){
            text-align: center;
        }

        .main-result-table td:nth-child(4){
            text-align: center;
        }

        .main-result-table td:nth-child(5){
            text-align: center;
        }

        .average td:nth-child(1){
            text-align: left;
        }

        .average td:nth-child(2){
            text-align: center;
        }

        .remarks td:nth-child(1){
            text-align: left;
        }

        .remarks td:nth-child(2){
            text-align: center;
        }
        th, td{
            font-size: 12px;
            display: table-cell;
            white-space:nowrap;
        }
    </style>
</head>
<body>
    
     <div class="card">
        <div class="card-header bg-success text-white">SUMMATIVE TEST {{$data['class_']->name}}| {{$data['class_']->description}}     {{$data['term']->name}} ||  {{$data['term']->session}}</div>
        <div class="card-body">
            <div class="col-12 table-responsive">
                <table  class="table table-striped table-bordered  text-default">
                <thead class="header">
                    <th class="rotate">S/No</th>
                    <th >Name</th>
                    
                    @foreach ($data['subject']->sortBy('name') as  $key => $item)
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
        </div>
    </div> 
</body>
</html>