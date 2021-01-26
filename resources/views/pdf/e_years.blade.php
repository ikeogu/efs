<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://emerald-field-school.herokuapp.com/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://emerald-field-school.herokuapp.com/css/result.css">
    
    <title>Early Years Result</title>
</head>
<body>
    
    <div class="d-flex justify-content-end">
        <a href="{{route('dr',[$student->id,$term->id,$class_->id])}}" type="button" class="btn btn-outline-success"><i class="fa fa-download" aria-hidden="true"></i>Download</a>
    </div>
    
    <!-- top-left table -->
    <div class="container mt-5">
        <header >
            <div class="row">
                <div class="col-8 yellow ">
                  <img src="img/header.png" height="120" width="650">
                </div>
                <div class="col-4 yellow" >
                    
                        <strong class="text-dark font-weight-bold">YEAR CLASSES</strong><br>
                        <strong class="text-dark font-weight-bold">REPORT CARD</strong><br>
                    <strong class="text-danger font-weight-bold text-uppercase "> {{$term->name}}</strong>
                   
                  </div>
            </div>
        </header>
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
                             {{--figure out for early years result  --}}
                                @foreach ($scores as $key=> $item)
                                 @if($class_->name == 'ZINNIA A' || 'ZINNIA B')
                                    @if ($key == 0)
                                        <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                        <tr>
                                            <td>Can mention some examples of animals and their young ones.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Able to identify National Symbols.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Can differentiate between Amphibians and Reptiles</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Ability to carry out simple experiments</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Can mention the types of weather in Nigeria</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Can differentiate between Natural and Man-made Light.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endif
                                    @if ($key == 1)
                                        <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                        <tr>
                                            <td>• Able to count and write numbers 1-300.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Understands the concept of time telling (0’ clock and half past)</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Can differentiate between two and three dimensional shapes</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Can differentiate between capacity and weight</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Can  identify, read and spell number names (one - twenty)</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 

                                    @endif
                                    @if ($key == 2)
                                        <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                        <tr>
                                            <td>•Can read and write upper and lower case sounds and letters. /A-Z/, / a- z/</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Can identify blends and digraphs.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Able to read simple sentences.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Can read and spell some sight words.

                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                   @endif
                                  @endif  
                                  @if($class_->name == 'BLUEBELL A' || 'BLUEBELL B')
                                    @if ($key == 0)
                                        <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                        <tr>
                                            <td> • Able to carry out some simple experiment using specific items.  e.g magnet, oranges,  oil and water etc.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Able to define water and water cycle</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Can describe the life cycle of a frog</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Can identify some musical instruments and their uses.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> Able to  mention some traffic rules</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        
                                    @endif
                                    @if ($key == 1)
                                        <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                        <tr>
                                            <td>• Able to identify some Nigerian Currencies (₦5, ₦10)</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                • Able to write numbers from 1 – 150 independently<br>
                                                •Able to subtract numbers  horizontally <br>
                                                • Able to add numbers  horizontally <br>

                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Able to add numbers  horizontally </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Can identify numbers that come before and after a given number</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        

                                    @endif
                                    @if ($key == 2)
                                        <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                        <tr>
                                            <td>• Able to read (3) three letter words with the vowel sounds. e.g cat, peg.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> • Able to write the upper case and lower case letters of the alphabet. ( Aa – Zz)</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Able to identify digraphs. e. g ai, ie, ee, or, etc.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                         
                                   @endif
                                  @endif 
                                  @if($class_->name == 'TULIP A' || 'TULIP B')
                                    @if ($key == 0)
                                        <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                        <tr>
                                            <td> • Ability to say short meaning of some words e.g water, soil ,plants e.t.c. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Ability to differentiate domestic animals from wild animals.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> • Able to make a bubble machine using specific materials. e.g straw, disposable cup,e.t.c</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•  Ability to recognize some sounds. e.g bang, whisper,scream.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>                                       
                                    @endif
                                    @if ($key == 1)
                                        <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                        <tr>
                                            <td>•Able to rote count numbers 1 -60 </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                • Can identify numbers 1 -25
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Able to identify plain shapes and colours.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Able to write numbers 1 -5 .</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Able to sequence number 1-5.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Can recite number formations from number 1- 10.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Abiliy to identify things that are in their half measure and in the full measure.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         
                                        

                                    @endif
                                    @if ($key == 2)
                                        <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                • Ability to rote count numbers 1 -60.<br>
                                                • Can associate sounds to pictures.
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> • Able to identify vowel sounds .</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Can write sounds /a/ - /e/.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                         
                                   @endif
                                  @endif 
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
                <img src="/img/footer.png" height="30" width="1090">
                </div>
            </div>
        </footer>
    </div>
   
</body>
</html>

