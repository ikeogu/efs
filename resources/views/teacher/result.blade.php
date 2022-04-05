<!DOCTYPE html>
<html lang="en">

	<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/result.css')}}">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
<style>
    body{
        padding: 0;
        margin:0;
    }
    td{
        font-size: 10px !important;
    }
    td,p,th{
        color: black !important;
    }
</style>

</head>
<body>

    
    
    <!-- top-left table -->
{{--    
    <div class="">
        <button onclick="goBack()" class=" btn btn-warning text-white btn-block btn-sm">Go Back</button>
        <a href="{{route('dr',[$student->id,$term->id,$class_->id])}}" type="button" class="btn btn-outline-success"><i class="fa fa-download" aria-hidden="true"></i>Download</a>
    </div> --}}
    <div class="container ">
        
        <header >
            <div class="row">
                <div class="col-8 yellow ">
                  <img src="/img/header.png" height="120" width="650" class="img img-responsive">
                </div>
                <div class="col-4 yellow" >
                    
                    <strong class="text-dark font-weight-bold">{{$class_->name}}</strong><br>
                    <strong class="text-dark font-weight-bold">REPORT CARD</strong><br>
                    <strong class="text-danger font-weight-bold text-uppercase ">TERM 

                        @if($term->name === 'Term I')
                                I
                            @elseif($term->name === 'Term II')
                                II
                            @else
                                III
                            @endif
                    </strong>
                   
                </div>
            </div>
        </header>
        <div class="row top-section">
            
            <div class="col-sm-8 col-md-8 col-lg-7 p-0 left-col">
                <!-- table heading -->
                <h6 class="lt-heading text-uppercase font-weight-bold">pupil's data</h6>
                <hr>
                <!-- table card -->
                <div class="left-table-card">
                    <!-- make table responsive -->
                    <div class="table-responsive text-nowrap">
                        <!-- main table -->
                        <table class="left-table">
                            <tbody>
                                <!-- pupil name -->
                                <tr class="table-row pupil-name">
                                    <th>CHILD'S NAME</th>
                                    <td class="pl-3">{{$student->name}} {{$student->oname}} {{$student->surname}}</td>
                                </tr>
                                <!-- date of birth -->
                                <tr class="table-row pupil-dob">
                                    <th>DATE OF BIRTH</th>
                                    <td class="pl-2">
                                        <ul>
                                            <li>{{date("jS F, Y",strtotime($student->dob))}}</li>
                                            <li class="gender">gender</li>
                                        <li>
                                            @if ($student->gender ==1 )
                                            <strong>M</strong>
                                            @else
                                            <strong>F</strong>
                                            @endif
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <!-- class -->
                                <tr class="table-row pupil-class">
                                    <th>CLASS</th>
                                <td class="pl-3"><strong>{{$class_->name}} {{$class_->description}}</strong></td>
                                </tr>
                                <!-- school year -->
                                <tr class="table-row sch-year">
                                    <th>SCHOOL YEAR</th>
                                    <td class="pl-3">{{$term->session}}</td>
                                </tr>
                                <!-- class teacher -->
                                <tr class="table-row class-teacher">
                                    <th>TEACHER</th>
                                <td class="pl-3">{{$classTeacher->teacher->name}}</td>
                                </tr>
                                <!-- date of birth -->
                                <tr class="table-row">
                                    <th>ATTENDANCE</th>
                                    <td class="pl-2">
                                        <ul>
                                            <li>days present</li>
                                            @if ($attend != null)
                                            <li class="present"><strong>{{$attend->dp}}</strong></li> 
                                            @else
                                            <li class="days"><strong></strong></li>
                                            @endif
                                            
                                            <li>days absent</li>
                                            @if ($attend != null)
                                            <li class="absent"><strong>{{$attend->da}}</strong></li>
                                            @else
                                            <li class="days"><strong></strong></li>
                                            @endif
                                            
                                            <li>Tardy days</li>
                                            @if ($attend != null)
                                             <li class="days"><strong>{{$attend->tar}}</strong></li> 
                                            @else
                                            <li class="days"><strong></strong></li>
                                            @endif
                                           
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class=" bottom-left-col 0">
                    <h6 class="assessment-heading text-uppercase text-success font-weight-bold text-sm-center pt-sm-5">Continuous ASSESSMENT AND OBSERVATION SUMMARY</h6>
                    <div class="bottom-left-card">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="text-black" style="background:green !important; color:white !important;">
                                    <tr>
                                        <th scope="col">SUBJECT</th>
                                        <th scope="col">CONTINUOUS ASSESSMENT 50%</th>
                                        <th scope="col">EXAMINATION 50%</th>
                                        <th scope="col">GRAND TOTAL 100%</th>
                                        <th scope="col">GRADE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $total = 0;
                                    @endphp
                                    
                                    @foreach ($scores->sortBy('subname') as $item)
                                        <tr scope="row">
                                        <td><strong>{{$item->subname}} </strong></td>
                                        <td>{{$item->TCA}}</td>
                                        <td>{{$item->Exam}}</td>
                                        <td>{{$item->GT}}</td>
    
                                        <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                    </tr> 
                                    @endforeach
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="summary d-flex justify-content-between mb-4">
                        <ul class="list-group left-list my-2">
                            <li class="list-group-item d-flex justify-content-between">
                                <h5>Highest Average:</h5>
                                <span>{{App\Student::h_aver($class_->id,$term->id)}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <h5>Child's Average:</h5>
                                <span>{{number_format(App\Average::child_average($student->id,$term->id,$class_->id))}}</span>
                            </li>
                        </ul>
                        <ul class="list-group right-list my-2">
                            <li class="list-group-item d-flex justify-content-between">
                                <h5>Class Average:</h5>
                                <span>{{App\Student::total_GT($class_->id,$term->id)}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                            <h5>Grade:</h5>
                            <span>{{App\Student::grade(App\Average::child_average($student->id,$term->id,$class_->id),$grades)}}</span>
                            </li>
                        </ul>
                    </div>
                      <div class="summary d-flex justify-content-between mb-4 text-black">
                        @if($term->name == 'Term III')
                            <ul class="list-group left-list my-2">
                            <li class="list-group-item d-flex justify-content-between">
                                <p class="text-success text-bold">Term I Average:</p>
                                <span>{{App\Student::get_average($class_->id,$term->status,$student->id,1)}}</span>
                            </li>
                            
                        </ul>
                        <ul class="list-group right-list my-2">
                            <li class="list-group-item d-flex justify-content-between">
                                <p class="text-success text-bold">Term II Average:</p>
                                <span>{{App\Student::get_average($class_->id,$term->status,$student->id,2)}}</span>
                            </li>
                            
                        </ul>
                        <ul class="list-group right-list my-2">
                            <li class="list-group-item d-flex justify-content-between">
                                <p class="text-success text-bold">Overal Average:</p>
                                <span>{{App\Student::overAll($class_->id,$term->status,$student->id)}}</span>
                            </li>
                            
                        </ul>
                            
                        @endif
                        
                    </div>
                </div>
            </div>
            <!-- top right table -->
            <div class="col-sm-4 col-md-4 col-lg-5 p-3 right-col">
                <h6 class="rt-heading text-center font-weight-bold">Pupil's Exam Result Status</h6>
                <hr>
                <small class="px-1">Tick the appropriate columns</small>
                <div class="right-table-card">
                    <div class="">
                        <table class="table table-bordered table-sm right-table table-condensed">
                            <thead class="thead-light" >
                                <tr>
                                    <th scope="col">Development</th>
                                    <th scope="col">Outstanding</th>
                                    <th scope="col">Very Good</th>
                                    <th scope="col">Good</th>
                                    <th scope="col">Needs Improvement</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($behave != null)
                                <tr>
                                    <td scope="row">Participates in Class</td>
                                     {{App\Student::behave($behave->pic)}}
                           
                                </tr>
                                <tr>
                                    <td scope="row">Listens Attentively</td>
                                    {{App\Student::behave($behave->la)}}
                                </tr>
                                <tr>
                                    <td scope="row">Follows Instructions First Time </td>
                                    {{App\Student::behave($behave->fift)}}
                                </tr>
                                <tr>
                                    <td scope="row">Completes Work on Time</td>
                                    {{App\Student::behave($behave->cwot)}}
                                </tr>
                                <tr>
                                    <td scope="row">Accepts New Challenges and Persists with Activities </td>
                                    {{App\Student::behave($behave->anc)}}
                                </tr>
                                <tr>
                                    <td scope="row">Expresses Feelings and Opinions Articulately. </td>
                                    {{App\Student::behave($behave->efao)}}
                                </tr>
                                <tr>
                                    <td scope="row">Shows Respect and Kindness to All </td>
                                    {{App\Student::behave($behave->srk)}}
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class=" bottom-right p-0 ">
                    <div class="bottom-right-card">
                        <div class="">
                            <table class="table  bottom-right-table table-bordered text-center" style="background:green !important; color:white !important;">
                                <thead>
                                    <tr>
                                        <th colspan="4">GRADE KEY</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>A+</td>
                                        <td>95 - 100%</td>
                                        <td>C+</td>
                                        <td>75 - 79%</td>
                                    </tr>
                                    <tr>
                                        <td>A</td>
                                        <td>90 - 94%</td>
                                        <td>C</td>
                                        <td>61 - 74%</td>
                                    </tr>
                                    <tr>
                                        <td>B+</td>
                                        <td>85 - 89%</td>
                                        <td>D</td>
                                        <td>50 - 60%</td>
                                    </tr>
                                    <tr>
                                        <td>B</td>
                                        <td>80 - 84%</td>
                                        <td>Needs Improvement</td>
                                        <td>49% below</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- teacher remarks -->
                        <div class="remarks-box teacher-remarks p-0">
                            <span class="remarks-heading d-block ">class teacher's remarks</span>
                            
                                @if ($comment != null)
                                <p>{{$comment->comment}}</p>
                                @endif
                                
                            
                        </div>
                        <!-- class register remark -->
                        <div class="remarks-box register-remarks p-0">
                            <span class="remarks-heading d-block">head academic's remarks</span>
                            
                                @if ($comment != null)
                                <p>{{$comment->hcomment}}</p>
    
                                @endif
    
                        
                        </div>
                        <!-- resumption date -->
                        <div class="remarks-box resumption-date p-0">
                            <span class="remarks-heading d-block">school resumption date</span>
                            <p>{{date('l, jS F, Y',strtotime($term->resumption_date))}}</p>
                        </div>
                        <!-- school fees -->
                        <div class="remarks-box school-fees">
                            <span class="remarks-heading d-block">school fees amount</span>
                            <p> ₦
                                    @if($class_->name == 'YEAR 1' )
                                    {{number_format($term->y1)}}
                                    @elseif($class_->name == 'YEAR 2' )
                                    {{number_format($term->y2)}}
                                    @elseif($class_->name == 'YEAR 3' )
                                    {{number_format($term->y3)}}
                                    @elseif($class_->name == 'YEAR 4' )
                                    {{number_format($term->y4)}}
                                    @elseif($class_->name == 'YEAR 5' )
                                    {{number_format($term->y5)}}
                                    @elseif($class_->name == 'YEAR 6' )
                                    {{number_format($term->y6)}}
                            
                                    @endif
                            </p>
                            <img src="/img/logo2.png" height="50">
                        </div>
                       
                    </div>
                       
                </div>
            </div>
>
        </div>
        <div class="row bottom-section">
            <img src="/img/footer.png" height="40" width="1080">
        </div>
    </div>

 <script>
    function goBack() {
        window.history.back();
    }
</script>

</body>
</html>