<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://emerald-field-school.herokuapp.com/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://emerald-field-school.herokuapp.com/css/font-awesome.css">
    <title>Continuous Assessment Test</title>
    <style>
            @import url("https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;600;800&display=swap");

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
            font-size: 0.9em;
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
    </style>
</head>
<body>
    
        <section class="container-fluid">
            <div class="d-flex justify-content-center "><img src="/img/logo2.png" height="80" width="auto"></div>
            <strong class="d-flex justify-content-center" style="text-align: center">EMERALD FIELD SCHOOLS</strong>
            <strong class="d-flex justify-content-center " style="text-align: center">CONTINUOUS ASSESSMENT TEST II</strong>
            <div class="col-12 col-md-8 p-0">
                <table class="details-table table-sm">
                    <tr>
                        <th>SESSION:</th>
                        <td>
                            <ul>
                            <li style="border: 1px solid black; text-align:left">{{$data['term']->session}}</li>
                            <li style="border: 1px solid black; text-align:center">Term:</li>
                            <li style="border: 1px solid black; text-align:right">{{$data['term']->name}}</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th>NAME:</th>
                        <td>
                            <ul>
                            <li style="border: 1px solid black; text-align:left">{{$data['student']->name}} {{$data['student']->surname}}</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th>CLASS:</th>
                        <td>
                            <ul>
                            <li style="border: 1px solid black; text-align:left">{{$data['class_']->name}} {{$data['class_']->description}}</li>
                            </ul>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- main result table -->
            <div class="col-12 col-md-12 my-4 mx-auto p-0">
                <div class="table-responsive">
                    <table class="table-sm table table-bordered table-hover main-result-table text-nowrap">
                        <thead>
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">SUBJECT</th>
                                <th scope="col">SCORE (20)</th>
                                <th scope="col">SUBJECT<br> MAX SCORE<br> (20)</th>
                                <th scope="col">SUBJECT <br>AVERAGE <br>SCORE (20)</th>
                            </tr>
                        </thead>
                        @php
                        $total = 0;
                        $sum_total = 0;
                        $SMT_score = 20;
                        
                        
                    @endphp  
                        <tbody>
                            @foreach ($data['scores'] as $key=> $item)
                            <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$item->subname}}</td>
                            
                            <td>{{$item->CAT2}}</td>
                            @php
                                $total += $item->CAT2;
                            @endphp 
                            
                             <td>{{App\Student::c2_max_score($item->subject_id,$data['class_']->id,$data['term']->id)}}</td>
                            <td>{{App\Student::average(App\Student::subAver($item->subject_id,$data['class_']->id,$data['term']->id),$data['users']->count())}}</td>
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
                                <td>average (100%)</td>
                                <td>{{App\Student::averPer(App\Student::average($total,$data['scores']->count()),20)}}</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr class="remarks">
                                <td></td>

                                <td>remarks</td>
                                <td>{{App\Student::h_grade(App\Student::averPer(App\Student::average($total,$data['scores']->count()),20),$data['grades'])}}</td>
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
                                <td class="text-left"><span>a1 (86 - 100%)</span> <span class="pl-3">b2 (80 - 85%)</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-left">b3 <span>(76 - 79%)</span> <span class="pl-3">c4 (70 - 75%)</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-left"><span>c5 (66 - 69%)</span> <span class="pl-3">c6 (60 - 65%)</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-left"><span>d7 (46 - 59%) <span class="pl-3">e8 (40 - 45%)</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2" class="text-left">f9 (0 - 39%) </td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
