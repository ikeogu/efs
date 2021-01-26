@extends('layouts.dashboard')

@section('title', 'Student Result SUMMATIVE TEST')

@section('style')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/sumative.css')}}">

@endsection  
@section('content')

        <section class="container my-5">
            <div class="d-flex justify-content-end">
            <!--<a href="{{route('dcat1',[$student->id,$term->id,$class_->id])}}" type="hidden" class="btn btn-outline-success"><i class="fa fa-download" aria-hidden="true"></i>Download</a>-->
            </div>
            <div class="d-flex justify-content-center "><img src="{{asset('img/logo2.png')}}" height="80" width="auto"></div>
            <strong class="d-flex justify-content-center">EMERALDFIELD SCHOOLS</strong>
            <strong class="d-flex justify-content-center ">CONTINUOUS ASSESSMENT TEST I</strong>
    
            <div class="col-12 col-md-8 p-0">
                <table class="details-table table-sm">
                    <tr>
                        <th>SESSION:</th>
                        <td>
                            <ul>
                            <li>{{$term->session}}</li>
                                <li>Term:</li>
                              <li>@if($term->name === 'Term I')
                                    I
                                @elseif($term->name === 'Term II')
                                    II
                                @else
                                    III
                                @endif</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th>NAME:</th>
                        <td>
                            <ul>
                            <li>{{$student->name}} {{$student->oname}} {{$student->surname}}</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th>CLASS:</th>
                        <td>
                            <ul>
                            <li>{{$class_->name}} {{$class_->description}}</li>
                            </ul>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- main result table -->
            <div class="col-12 col-md-12 my-4 mx-auto p-0">
                <div class="table-responsive">
                    
                  @if($class_->status =='Junior High School')
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
                        $cnt = 0;
                        $emp = 0;
                        
                        @endphp  
                        <tbody>
                            @foreach ($scores as $key=> $item)
                             
                            <tr>
                               
                            @if($item->term_id == $term->id && $item->s5_class_id == $class_->id)
                           
                                 @if(!in_array($item->status,$status))
                                       @php
                                         $sum = App\SubjectMark::where('term_id',$term->id)->where('s5_class_id',$class_->id)->where('student_id',$student->id)->where('status',$item->status)->sum('CAT1');
                                         array_push($status,$item->status);
                                          
                                        @endphp
                                    
                                    @if($item->status ==1 )
                                        <td>5</td>
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
                                    
                                        <td>4</td>
                                        <td class="">NATIONAL VALUES</td>
                            
                                        <td> {{round($sum/2)}}</td>
                                         @php
                                         $total_sum =round($sum/2);
                                         
                                         @endphp
                                    @endif
                                    @if($item->status ==5)
                                        <td>{{$key}}</td>
                                            <td class="">CULTURAL & CREATIVE ART</td>
                            
                                        <td> {{round($sum/3)}}</td>
                                         @php
                                         $total_sum =round($sum/3);
                                         
                                         @endphp
                                    @endif
                                    
                                    @if($item->status ==6)
                                        <td>3</td>
                                        <td class="">BUSINESS STUDIES</td>
                            
                                        <td> {{$item->CAT1}}</td>
                                         @php
                                         $total_sum =$item->CAT1;
                                         
                                         @endphp
                                    @endif
                                     @if($item->status ==7)
                                        <td>{{$key}}</td>
                                        <td class="">FRENCH</td>
                            
                                        <td> {{$item->CAT1}}</td>
                                         @php
                                         $total_sum =$item->CAT1;
                                         
                                         @endphp
                                    @endif
                                    @if($item->status ==8)
                                        <td>{{$key - 3}}</td>
                                            <td class="">MATHEMATICS</td>
                            
                                        <td> {{$item->CAT1}}</td>
                                         @php
                                         $total_sum =$item->CAT1;
                                         
                                         @endphp
                                    @endif
                                     @if($item->status ==9)
                                            
                                            <td>{{$key -6}}</td>
                                            <td class="">RELIGIOUS STUDIES</td>
                                
                                            <td> {{$item->CAT1}}</td>
                                             @php
                                             $total_sum =$item->CAT1;
                                             if($item->CAT1 == null)
                                                $emp = 1;
                                             
                                             @endphp
                                    @endif
                                     @if($item->status ==10)    
                                        @if($class_->name =='JSS 3') 
                                        <td>{{$key - 9}}</td>
                                        @else
                                        <td>{{$key - 6}}</td>
                                        @endif
                                        <td>HANDWRITING</td>
                                        
                                        <td> {{$item->CAT1}}</td>
                                         @php
                                         $total_sum =$item->CAT1;
                                         
                                         @endphp
                                    @endif
                                    
                                    @php
                                    $total += $total_sum;
                                          
                                     
                                    
                                    if($emp == 1){
                                        $cnt =count($status) - 1;
                                    }else{
                                        $cnt = count($status);
                                    }
                                    @endphp
                                
                                 <td>{{round(App\Student::c1_jmax_score($item->status,$class_->id,$term->id))}}</td> 
                                <td>{{App\Student::average(App\Student::jsubAver($item->status,$class_->id,$term->id),$users->count())}}</td>

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
                                <td>{{App\Student::h_grade(App\Student::averPer($avg,$TCA_score),$grades)}}</td>
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
                            @foreach ($scores as $key=> $item)
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

                             <td>{{App\Student::c1_max_score($item->subject_id,$class_->id,$term->id)}}</td> 
                            <td>{{App\Student::average(App\Student::subAver($item->subject_id,$class_->id,$term->id),$users->count())}}</td>
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
                                <td>{{App\Student::h_grade(App\Student::averPer($avg,$TCA_score),$grades)}}</td>
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
@endsection