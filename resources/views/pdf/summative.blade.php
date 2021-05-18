<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sumative.css">
    <title>Summative Test</title>
</head>
<body>
    
        
    <section class="container">
        <header>          
                <img src="img/logo2.png" alt="image" style="height: 100px; width:auto;" class="img">                
        </header>
        <div class="d-flex justify-content-center">
            <p class="text-center text-bold"> EMERALDFIELD SCHOOLS <br> SUMMATIVE TEST RESULT</p>
        </div>

        <div class="col-12 pt-5 col-md-8 p-0">
            <table class="details-table table-sm table-bordered">
                <tr>
                    <th>SESSION:</th>
                    <td>
                        <ul>
                            <li >{{$data['term']->session}}</li>
                            <li >{{$data['term']->name}}</li>
                            
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th>NAME:</th>
                    <td>
                        <ul>
                        <li style="text-align:left">{{$data['student']->name}}  {{$data['student']->oname}} {{$data['student']->surname}}</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th>CLASS:</th>
                    <td>
                        <ul>
                        <li style="text-align:left">{{$data['class_']->name}} {{$data['class_']->description}}</li>
                        </ul>
                    </td>
                </tr>
            </table>

        </div>
        <div class="fill col-12">
            <div class="table-responsive">
                <table class="table-sm table table-bordered table-hover main-result-table text-nowrap ">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>SUBJECT</th>
                            <th>SCORE ({{$SMT_score}})</th>
                            <th>SUBJECT MAX SCORE ({{$SMT_score}})</th>
                            <th>SUBJECT AVERAGE SCORE ({{$SMT_score}})</th>
                        </tr>
                    </thead>
                    @php
                    $total = 0;
                    $sum_total = 0;
                
                    
                    @endphp  
                    <tbody>
                        @foreach ($data['scores'] as $key=> $item)
                        <tr>
                        <td>{{$key + 1}}</td>
                        <td>
                            {{$item->subname}}</td>
                        
                        <td>{{$item->summative_test}}</td>
                        @php
                            $total += $item->summative_test;
                        @endphp 
                        
                            <td>{{App\Student::max_score($item->subject_id,$data['class_']->id,$data['term']->id)}}</td>
                        <td>{{App\Student::average(App\Student::subject_total($item->subject_id,$data['class_']->id,$data['term']->id),$data['users']->count())}}</td>
                        </tr> 
                        @endforeach
                        <tr class="average">
                            <td></td>
                            <td>Total</td>
                            <td>{{$total}}</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="average">
                            <td></td>
                            <td>average</td>
                            <td>{{App\Student::average($total,$data['scores']->count())}}</td>
                            @php
                                $avg = App\Student::average($total,$data['scores']->count());
                            @endphp
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="average">
                            <td></td>
                            <td>average (100%)</td>
                            <td>{{App\Student::averPer($avg,$SMT_score)}}</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="remarks">
                            <td></td>

                            <td>remarks</td>
                            <td>{{App\Student::grade(App\Student::averPer($avg,$SMT_score),$data['grades'])}}</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="key">
                            <td></td>
                            <td class="text-left">key</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="text-left"><span>a+ (95 - 100%)</span> <span class="pl-3">a (90 - 94%)</span></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="text-left">b+ <span>(85 - 89%)</span> <span class="pl-3">b (80 - 84%)</span></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="text-left"><span>c+ (75 - 79%)</span> <span class="pl-3">c (61 - 74%)</span></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="text-left">d (50 - 60%)</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2" class="text-left">needs improvement (49% & below) </td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <footer class="card-footer">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
            <span>Copyright &copy; EmeraldField Schools {{date('Y')}}</span>
            </div>
        </div>
    </footer>
</body>
</html>