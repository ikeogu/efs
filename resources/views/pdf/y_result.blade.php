<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://emerald-field-school.herokuapp.com/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://emerald-field-school.herokuapp.com/css/result.css">
    
    <title>Student Result</title>
</head>
<body>
    
    <!-- top-left table -->
    <div class="container mt-5">
        <div class="row top-section">
            
            <div class="col-12 col-md-12 col-lg-7 p-0 left-col">
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
                                    <td class="pl-3">{{$student->name}} {{$student->surname}}</td>
                                </tr>
                                <!-- date of birth -->
                                <tr class="table-row pupil-dob">
                                    <th>DATE OF BIRTH</th>
                                    <td class="pl-2">
                                        <ul>
                                            <li>{{date("j F, Y",strtotime($student->dob))}}</li>
                                            <li class="gender">gender</li>
                                        <li><strong>{{$student->gender}}</strong></li>
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
            </div>
            <!-- top right table -->
            <div class="col-12 col-md-12 col-lg-5 p-0 right-col">
                <h6 class="rt-heading text-uppercase text-center font-weight-bold">pupil's exam result status</h6>
                <hr>
                <small class="px-1">Tick the appropriate columns</small>
                <div class="right-table-card">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm right-table">
                            <thead class="thead-light" >
                                <tr>
                                    <th scope="col">DEVELOPMENT</th>
                                    <th scope="col">OUTSTANDING</th>
                                    <th scope="col">VERY GOOD</th>
                                    <th scope="col">GRADE</th>
                                    <th scope="col">PERFORMANCE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($behave != null)
                                <tr>
                                    <td scope="row">Participates in class</td>
                                     {{App\Student::behave($behave->pic)}}
                           
                                </tr>
                                <tr>
                                    <td scope="row">Listens Attentively</td>
                                    {{App\Student::behave($behave->la)}}
                                </tr>
                                <tr>
                                    <td scope="row">Follows instrunction First time </td>
                                    {{App\Student::behave($behave->fift)}}
                                </tr>
                                <tr>
                                    <td scope="row">Completes work on time</td>
                                    {{App\Student::behave($behave->cwot)}}
                                </tr>
                                <tr>
                                    <td scope="row">Accepts new Challenges and persist with activities </td>
                                    {{App\Student::behave($behave->anc)}}
                                </tr>
                                <tr>
                                    <td scope="row">Expresses feelings and Opinions </td>
                                    {{App\Student::behave($behave->efao)}}
                                </tr>
                                <tr>
                                    <td scope="row">Shows respect and Kidness to all </td>
                                    {{App\Student::behave($behave->srk)}}
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row bottom-section">
            <div class="col-12 col-md-12 col-lg-7 bottom-left-col p-0">
                <h6 class="assessment-heading text-uppercase text-success font-weight-bold">ASSESSMENT AND OBSERVATION SUMMARY</h6>
                <div class="bottom-left-card">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="bg-success text-light">
                                <tr>
                                    <th scope="col">SUBJECT</th>
                                    <th scope="col">CONTINUOS ASSESSMENT 50%</th>
                                    <th scope="col">EXAMINATION 50%</th>
                                    <th scope="col">GRAND TOTAL 100%</th>
                                    <th scope="col">GRADE</th>
                                </tr>
                            </thead>
                            <tbody>
                              @php
                                $total = 0;
                              @endphp
                                
                                @foreach ($scores as $item)
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
                         <span>{{number_format(App\Average::where('student_id',$student->id)->where('s5_class_id',$class_->id)->where('term_id',$term->id)->first()->aver_)}}</span>
                       </li>
                    </ul>
                    <ul class="list-group right-list my-2">
                        <li class="list-group-item d-flex justify-content-between">
                            <h5>Class Average:</h5>
                            <span>{{App\Student::total_GT($class_->id,$term->id)}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                        <h5>Grade:</h5>
                        <span>{{App\Student::grade(number_format(App\Average::where('student_id',$student->id)->where('s5_class_id',$class_->id)->where('term_id',$term->id)->first()->aver_),$grades)}}</span>
                     </li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-5 bottom-right p-0">
                <div class="bottom-right-card">
                    <div class="table-responsive">
                        <table class="table  bottom-right-table table-bordered bg-success text-light text-center">
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
                    <div class="remarks-box teacher-remarks">
                        <span class="remarks-heading d-block">class teacher remarks</span>
                        <p>
                            @if ($comment != null)
                            {{$comment->comment}}
                            @endif
                            
                        </p>
                    </div>
                    <!-- class register remark -->
                    <div class="remarks-box register-remarks">
                        <span class="remarks-heading d-block">class master remarks</span>
                        <p>
                            @if ($comment != null)
                            {{$comment->hcomment}}

                            @endif

                        </p>
                    </div>
                    <!-- resumption date -->
                    <div class="remarks-box resumption-date">
                        <span class="remarks-heading d-block">school resumption date</span>
                        <p>{{date('j F, Y',strtotime($term->resumption_date))}}</p>
                    </div>
                    <!-- school fees -->
                    <div class="remarks-box school-fees">
                        <span class="remarks-heading d-block">school fees amount</span>
                        <p>{{$term->fee_}}</p>
                    </div>
                    <div class="py-4 mb-2 d-flex justify-content-center">
                    <img src="/img/logo2.png" height="190" width="auto">
                    </div>
                </div>
                
            </div>
               
        </div>
        <footer class="row">
            <div class="">
                <img src="img/footer.png" height="30" width="1090">
              </div>
            </div>
        </footer>
    </div>
    
</body>
</html>
