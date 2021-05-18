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
    <title>Continuous Assessment Test</title>
 
</head>
<body>
    
        <section class="container">
            <header>          
                    <img src="img/logo2.png" alt="image" style="height: 100px; width:auto;" class="img">                
            </header>
            <div class="d-flex justify-content-center">
                <p class="text-center text-bold"> EMERALDFIELD SCHOOLS <br> CONTINUOUS ASSESSMENT TEST 1</p>
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
        
            <!-- main result table -->
            <div class="col-12 col-md-12 my-4 mx-auto p-0">
                <div class="table-responsive">
                    @if($data['class_']->status =='Junior High School')
                    <table class="table-sm table table-bordered table-hover main-result-table text-nowrap">
                        <thead>
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">SUBJECT</th>
                                <th scope="col">SCORE ({{$TCA_score}})</th>
                                <th scope="col">SUBJECT MAX SCORE ({{$TCA_score}})</th>
                                <th scope="col">SUBJECT AVERAGE SCORE ({{$TCA_score}})</th>
                            </tr>
                        </thead>
                        @php
                        $total = 0;
                        $sum_total = 0; 
                        $no_of_subject = 0;
                        $sum = 0;
                        $status = array();
                        $total_sum = 0;
                        $cnt = 1;
                    
                        @endphp  
                        <tbody>
                            @foreach ($data['scores'] as $key=> $item)
                             
                            <tr>
                               
                            @if($item->term_id == $data['term']->id && $item->s5_class_id == $data['class_']->id)
                           
                                 @if(!in_array($item->status,$status))
                                       @php
                                         $sum = App\SubjectMark::where('term_id',$data['term']->id)->where('s5_class_id',$data['class_']->id)->where('student_id',$data['student']->id)->where('status',$item->status)->sum('CAT1');
                                         array_push($status,$item->status);
                                          
                                        @endphp
                                    
                                    @if($item->status ==1 )
                                        <td>{{$key +1}}</td>
                                        <td class="">ENGLISH STUDIES</td>
                            
                                    <td>{{round($sum/2)}}</td>
                                        @php
                                         $total_sum =round($sum/2);
                                         
                                         @endphp
                                    @endif
                                    @if($item->status == 2)
                                        <td>{{$key +1}}</td>
                                         <td class="">BASIC SCIENCE AND TECH</td>
                            
                                         <td>{{round($sum/4)}}</td>
                                         @php
                                         $total_sum =round($sum/4);
                                         
                                         @endphp
                                    @endif
                                    @if($item->status == 3)
                                            <td>{{$key +1}}</td>
                                            <td class="">PREVOCATIONAL STUDIES</td>
                            
                                         <td>{{round($sum/2)}}</td>
                                         @php
                                         $total_sum =round($sum/2);
                                         
                                         @endphp
                                    @endif
                                    @if($item->status == 4)
                                    
                                        <td>{{$key +1}}</td>
                                        <td class="">NATIONAL VALUES</td>
                            
                                        <td> {{round($sum/2)}}</td>
                                         @php
                                         $total_sum =round($sum/2);
                                         
                                         @endphp
                                    @endif
                                    @if($item->status ==5)
                                        <td>{{$key +1}}</td>
                                            <td class="">C.C.A</td>
                            
                                        <td> {{round($sum/2)}}</td>
                                         @php
                                         $total_sum =round($sum/2);
                                         
                                         @endphp
                                    @endif
                                    
                                    @if($item->status ==6)
                                        <td>{{$key +1}}</td>
                                        <td class="">BUSINESS STUDIES</td>
                            
                                        <td> {{$item->CAT1}}</td>
                                         @php
                                         $total_sum =$item->CAT1;
                                         
                                         @endphp
                                    @endif
                                     @if($item->status ==7)
                                        <td>{{$key +1}}</td>
                                        <td class="">FRENCH</td>
                            
                                        <td> {{$item->CAT1}}</td>
                                         @php
                                         $total_sum =$item->CAT1;
                                         
                                         @endphp
                                    @endif
                                    @if($item->status ==8)
                                        <td>{{$key -2 }}</td>
                                            <td class="">MATHEMATICS</td>
                            
                                        <td> {{$item->CAT1}}</td>
                                         @php
                                         $total_sum =$item->CAT1;
                                         
                                         @endphp
                                    @endif
                                     @if($item->status ==9)
                                        <td>{{$key -5}}</td>
                                        <td class="">RELIGIOUS STUDIES</td>
                            
                                        <td> {{$item->CAT1}}</td>
                                         @php
                                         $total_sum =$item->CAT1;
                                         
                                         @endphp
                                    @endif
                                     @if($item->status ==10)    
                                        @if($data['class_']->name =='JSS 3') 
                                        <td>{{$key - 9}}</td>
                                        @else
                                        <td>{{$key - 5}}</td>
                                        @endif
                                        <td>HANDWRITING</td>
                                        
                                        <td> {{$item->CAT1}}</td>
                                         @php
                                         $total_sum =$item->CAT1;
                                         
                                         @endphp
                                    @endif
                                    
                                    @php
                                    $total += $total_sum;
                                           
                                    $cnt = count($status);
                                    
                                    @endphp
                                
                                 <td>{{round(App\Student::c1_jmax_score($item->status,$data['class_']->id,$data['term']->id))}}</td> 
                                <td>{{App\Student::average(App\Student::jsubAver($item->status,$data['class_']->id,$data['term']->id),$data['users']->count())}}</td>

                            @endif
                             
                            
                           
                            </tr> 
                             @endif
                            
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
                                <td>{{App\Student::average($total,$cnt)}}</td>
                                @php
                                    $avg = App\Student::average($total,$cnt);
                                @endphp
                                <td></td>
                                <td></td>
                            </tr>
                            <tr class="average">
                                <td></td>
                                <td>average (100%)</td>
                                <td>{{App\Student::averPer($avg,$TCA_score)}}</td>
                                <td></td>
                                <td></td>
                            </tr>
                           
                            <tr class="remarks">
                                <td></td>

                                <td>remarks</td>
                                <td>{{App\Student::h_grade(App\Student::averPer($avg,$TCA_score),$data['grades'])}}</td>
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
                  @else
                    <table class="table-sm table table-bordered table-hover main-result-table text-nowrap">
                        <thead>
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">SUBJECT</th>
                                <th scope="col">SCORE ({{$TCA_score}})</th>
                                <th scope="col">SUBJECT MAX SCORE ({{$TCA_score}})</th>
                                <th scope="col">SUBJECT AVERAGE SCORE ({{$TCA_score}})</th>
                            </tr>
                        </thead>
                        @php
                        $total = 0;
                        $sum_total = 0; 
                        $no_of_subject = 0;
                        
                        @endphp  
                        <tbody>
                            @foreach ($data['scores'] as $key=> $item)
                            <tr>
                            
                            @if($item->CAT1 != null)
                            <td>{{$key + 1}}</td>
                            <td class="">{{$item->subname}}</td>
                            
                            <td>{{$item->CAT1}}</td>
                            
                            @php
                                $total += $item->CAT1;
                                if($item->CAT1 != null){
                                    $no_of_subject += 1;
                                }
                            @endphp 

                             <td>{{App\Student::c1_max_score($item->subject_id,$data['class_']->id,$data['term']->id)}}</td> 
                            <td>{{App\Student::average(App\Student::subAver($item->subject_id,$data['class_']->id,$data['term']->id),$data['users']->count())}}</td>
                            </tr> 
                             @endif
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
                                <td>{{App\Student::average($total,$no_of_subject)}}</td>
                                @php
                                    $avg = App\Student::average($total,$no_of_subject);
                                @endphp
                                <td></td>
                                <td></td>
                            </tr>
                            <tr class="average">
                                <td></td>
                                <td>average (100%)</td>
                                <td>{{App\Student::averPer($avg,$TCA_score)}}</td>
                                <td></td>
                                <td></td>
                            </tr>
                           
                            <tr class="remarks">
                                <td></td>

                                <td>remarks</td>
                                <td>{{App\Student::h_grade(App\Student::averPer($avg,$TCA_score),$data['grades'])}}</td>
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
                    @endif
                </div>
               
            </div>
        </section>
    </main>
</body>
</html>
