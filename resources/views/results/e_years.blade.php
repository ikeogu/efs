
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
        font-size: 8px !important;
    }
    td,p,th{
        color: black !important;
    },
    tr{ font-family: "Comic Sans MS", "Comic Sans", cursive;}
    @media print {
      #printPageButton,#back {
        display: none;
      }
    }
</style>

</head>
<body>

    
    <!-- top-left table -->
        <!-- details table -->
	<div class="d-flex justify-content-end">
        <button onclick="goBack()" class=" btn btn-warning text-white btn-block btn-sm"id="back"> Go Back</button>
        <form>
         <input type = "button" value = "Print" onclick = "window.print()" id="printPageButton"  class="btn btn-success btn-block btn-sm"/>
      </form>   
    </div>
    <div class="container mt-3 P-3">
       
        <header >
            <div class="row ">
                <div class="col-lg-8 col-md-4 yellow ">
                  <img src="/img/header.png" height="120" width="650">
                </div>
                <div class="col-md-4 col-lg-4 yellow" >
                    
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
            
            <div class="col-12 col-md-12 col-lg-7 p-3 left-col">
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
                                    <td class="pl-3">{{$student->name}}  {{$student->oname}} {{$student->surname}}</td>
                                </tr>
                                <!-- date of birth -->
                                <tr class="table-row pupil-dob">
                                    <th>DATE OF BIRTH</th>
                                    <td class="pl-2">
                                        <ul>
                                            <li>{{date("jS F, Y",strtotime($student->dob))}}</li>
                                            <li class="gender">gender</li>
                                        <li>
                                            @if($student->gender == 1)
                                            <strong>M</strong></li>
                                            @else
                                                <strong>F</strong></li>
                                            @endif
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
            <div class="col-12 col-md-12 col-lg-5 p-3 right-col">
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
                                    <th scope="col">GOOD</th>
                                    <th scope="col">NEEDS IMPROVEMENT</th>
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
                                    <td scope="row">Follows instruction First time </td>
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
            <div class="col-12 col-md-12 col-lg-7 bottom-left-col p-3">
                <h6 class="assessment-heading text-uppercase text-success font-weight-bold">Continuous ASSESSMENT AND OBSERVATION SUMMARY</h6>
                <div class="bottom-left-card">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="bg-success text-light">
                                <tr>
                                    <th scope="col">SUBJECTS</th>
                                    <th scope="col">CONTINUOUS <br> ASSESSMENT <br> 50%</th>
                                    <th scope="col">EXAMINATION 50%</th>
                                    <th scope="col">GRAND TOTAL <br> 100%</th>
                                    <th scope="col">GRADE</th>
                                </tr>
                            </thead>
                            @if($class_->name == 'PLAYGROUP' && $term->name === 'Term I')
                            <tbody>
                                @php
                                $total = 0;
                                @endphp
                             {{--figure out for early years result  --}}
                                @foreach ($scores->sortBy('subname') as $key=> $item)
                                
                                     @if ($item->subname == 'COGNITIVE SKILLS')
                                        <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 

                                    
                                    @elseif ($item->subname == 'CREATIVE ART')
                                        <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                        <tr>
                                            <td>•	Enjoys making prints with colours. E. g Palm print, foot print etc. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                •	Can match shapes to similar pictures.
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Able to complete a craft. E.g Santa face mask.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 

                                        
                                    @elseif ($item->subname == 'DISCOVERY SCIENCE')
                                        <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                        <tr>
                                            <td>•	Able to identify living and non-living things.
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> •	Can identify some items used in cleaning the environment.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Able to link some animals to their homes. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                            <td>•	Can identify his/her gender in a picture. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>•	Imitates some animal sounds </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         <tr>
                                            <td>•	Able to identify some body parts. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         
                                   @elseif($item->subname == 'LANGUAGE ART')
                                    <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                •	Links sounds to more than one picture. E.g, /a/ as in; axe, ant, apple.
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> •	Identifies sounds /a/ - /g/ amongst other sounds.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Enjoys singing the jolly phonics songs and doing actions for the sounds /a/ - /g/.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> •	Attempts to trace sounds /a/ - /g/ by joining the dotted lines.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                   @elseif($item->subname == 'NUMBER WORK')
                                        <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                •	Recognizes numbers 1-10 amongst other numbers.

                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Rote counts numbers 1-30.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Understands how numbers are formed e.g, number 2 says; a curve and a dash. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         <tr>
                                            <td>•	Recognizes basic shapes (circle, square, triangle) and colours (red, yellow, blue).</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>•	Attempts to trace numbers 1-10 by joining the dotted lines.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                         
                                  @endif 
                                  
                                @endforeach
                               </tbody>
                            @elseif($class_->name == 'KINDERGARTEN'&& $term->name === 'Term I')
                            <tbody>
                                @php
                                $total = 0;
                                @endphp
                             {{--figure out for early years result  --}}
                                @foreach ($scores->sortBy('subname') as $key=> $item)
                                
                                     @if ($item->subname == 'COGNITIVE SKILLS')
                                        <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                                                            
                                    
                                    @elseif ($item->subname == 'CREATIVE ART')
                                        <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                        <tr>
                                            <td>•	Recognizes colours of a traffic light and what each represents. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                •	Recognizes the Nigerian flag and can mention the colours.
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Mention simple parts of a plant. (e.g. sunflower)</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                         <tr>
                                            <td>•	Expresses self through craft. (Using poster colours to beautify a beach ball).</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 

                                        
                                    @elseif ($item->subname == 'DISCOVERY SCIENCE')
                                        <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                        <tr>
                                            <td>•	Able to give examples of health disorder and their causes.
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> •	Understands some safety measures.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Recognizes items found in a first aid box. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                            <td>•	Defines Environment and Surrounding. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>•	Recognizes different cultures in Nigeria.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         
                                         
                                   @elseif($item->subname == 'LANGUAGE ART')
                                    <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                •	Able to spell and write some sight words e.g was, more, have, live, over and you.
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> •	Form different words using sounds, consonant blends and digraphs.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Link up digraphs to pictures.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> •	Begins to read simple sentences.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> •	Recognizes digraph oa, ai, ee, or, ch, ngoi, ie and sh.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                   @elseif($item->subname == 'NUMBER WORK')
                                        <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                •	Can count and writes numbers 1-100 from memory.

                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Recognizes Less than and Greater than sign (<, >)</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Able to add and subtract numbers with and without pictures horizontally. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         <tr>
                                            <td>•	Spells and writes number names One- Ten.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>•	Can identify and write ordinal numbers 1st – 10th in their correct position.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                         
                                  @endif 
                                  
                                @endforeach
                               </tbody>
                             @elseif($class_->name == 'PRE-KINDERGARTEN' && $term->name === 'Term I')
                            <tbody>
                                @php
                                $total = 0;
                                @endphp
                             {{--figure out for early years result  --}}
                                @foreach ($scores->sortBy('subname') as $key=> $item)
                                
                                     @if ($item->subname == 'COGNITIVE SKILLS')
                                        <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                                                        
                                    
                                    @elseif ($item->subname == 'CREATIVE ART')
                                        <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                        <tr>
                                            <td>•	Expresses self through craft e.g Watermelon collage.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                •		Able to identify simple shapes in pictures
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Able to trace and draw shapes e.g circle, square etc.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 

                                      

                                        
                                    @elseif ($item->subname == 'DISCOVERY SCIENCE')
                                        <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                        <tr>
                                            





                                            <td>•	Able to identify members of a family
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Recognizes fruits and vegetables.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Able to identify healthy food. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                            <td>•	Able to differentiate  pets and farm animals </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>•	Attempts to identify different environment. e.g Hospital, Market, School, etc.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>•	Able to identify the five sense organs and their uses.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         
                                         
                                   @elseif($item->subname == 'LANGUAGE ART')
                                    <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                •	Able to recognize sounds /a/-/z/
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> •	Attempt to put two sounds together to form words e.g am,in etc.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Able to demonstrate the action for some digraphs e.g i.e, ee, or etc.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> •	Able to trace and write sounds /a/-/z/</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> •	 Able to associate sounds /a/-/z/ to object.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td> •	Can identify some consonant blends e.g fl, pr, fr etc.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                   @elseif($item->subname == 'NUMBER WORK')
                                        <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                •	Able to recite numbers in order to 50.

                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Able to trace and write numbers 1- 50.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Able to match numeral and quantity correctly. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         <tr>
                                            <td>•	Attempts to order objects based on length, size etc.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>•	Recites 0-time table.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Recognizes even numbers from 2-10.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         
                                  @endif 
                                  
                                @endforeach
                               </tbody>
                            @elseif($class_->name == 'PLAYGROUP' && $term->name === 'Term II')
                            <tbody>
                                @php
                                $total = 0;
                                @endphp
                             {{--figure out for early years result  --}}
                                @foreach ($scores->sortBy('subname') as $key=> $item)
                                
                                     @if ($item->subname == 'COGNITIVE SKILLS')
                                        <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 

                                    
                                    @elseif ($item->subname == 'CREATIVE ART')
                                        <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                        <tr>
                                            <td>• Can make beautiful collages using beads and shredded cardboard paper. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                •	Able to make beautiful print using poster colours.
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                      
                                    @elseif ($item->subname == 'DISCOVERY SCIENCE')
                                        <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                        <tr>
                                            <td>•	Identifies some birds (owl, dove, chicken, pigeon and vulture)
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> •	Can mention some water animals (octopus, hippopotamus, crocodile, fish, frog) etc.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Identifies sinking and floating objects</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                            <td>• Can identify and mention some objects used to care for our body and space.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                       
                                   @elseif($item->subname == 'LANGUAGE ART')
                                    <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                •	Rote sounds single sounds /a/-/u/.
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> •	Able to sing Jolly Phonics songs and do actions for sounds /a/-/u/.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Recites sound formations/ a/ -/u/</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> •	Identifies objects associated with sounds /a/-/u/.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                   @elseif($item->subname == 'NUMBER WORK')
                                        <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                •	Rote counts numbers 1-50

                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Able to trace  numbers  1-20</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Identifies some basic shapes and colors </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         <tr>
                                            <td>•	Can differentiate objects (big and small, fat and thin, tall and short) etc.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>•	Attempt to write numbers 1-4.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         <tr>
                                            <td>•	Identifies numbers 1-5 in and out of sequence.  </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         
                                  @endif 
                                  
                                @endforeach
                               </tbody>
                            @elseif($class_->name == 'KINDERGARTEN'&& $term->name === 'Term II')
                            <tbody>
                                @php
                                $total = 0;
                                @endphp
                             {{--figure out for early years result  --}}
                                @foreach ($scores->sortBy('subname') as $key=> $item)
                                
                                     @if ($item->subname == 'COGNITIVE SKILLS')
                                        <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                                                            
                                    
                                    @elseif ($item->subname == 'CREATIVE ART')
                                        <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                        <tr>
                                            <td>•	Able to draw and colour neatly Free Arts Expression </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                •	Recognizes craft works. e.g Strawberry craft, Umbrella craft etc
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Can mention items needed in making a craft/collage</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                         <tr>
                                            <td>•	Attempts making some craft using Art materials.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        

                                        
                                    @elseif ($item->subname == 'DISCOVERY SCIENCE')
                                        <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                        <tr>
                                            <td>•	Recognizes and differentiates tools used in professions. 
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Can identify the different stages in growth of a butterfly </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Able to mention planets in their order (1st – 8th) </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                            <td>•	Can differentiate between softcopy and hardcopy documents. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                         
                                   @elseif($item->subname == 'LANGUAGE ART')
                                    <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                •	Writes uppercase and lowercase alphabets Aa-Bb.
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> •	Able to say the meaning of Nouns, Verbs, Pronouns, Adjectives and Prepositions.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Punctuates sentences correctly, using capital letters, full stop(.) and question mark(?).</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> •	Can blend words and reads simple sentences.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        
                                   @elseif($item->subname == 'NUMBER WORK')
                                        <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                •	Able to count and write numbers 1-200 from memory

                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Can identify, read, spell and write number names One – Fifteen</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Ability to subtract numbers horizontally using number line </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         <tr>
                                            <td>•	Can differentiate between 2/3 dimensional shapes.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                       
                                  @endif 
                                  
                                @endforeach
                               </tbody>
                             @elseif($class_->name == 'PRE-KINDERGARTEN' && $term->name === 'Term II')
                            <tbody>
                                @php
                                $total = 0;
                                @endphp
                             {{--figure out for early years result  --}}
                                @foreach ($scores->sortBy('subname') as $key=> $item)
                                
                                     @if ($item->subname == 'COGNITIVE SKILLS')
                                        <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                                                            
                                    
                                    @elseif ($item->subname == 'CREATIVE ART')
                                        <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                        <tr>
                                            <td>•	Attempts making an umbrella craft using cardboard and carton. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                •	Can attempt making a “Fish Bone” craft using cotton bud and cardboard.
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Able to make a sand collage, using different colours of sand.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                         <tr>
                                            <td>•	Able to use tissue cylinder in making circle shape, triangle shape, star shape and heart shape.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                         <tr>
                                            <td>•	Able to colour sunflower using rainbow colours.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                         <tr>
                                            <td>•	Attempts making a paper jewelry (Bracelet) Using paper beads and strings.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 

                                        
                                    @elseif ($item->subname == 'DISCOVERY SCIENCE')
                                        <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                        <tr>
                                            <td>•	Able to Describes a Butterfly
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Able to identify some Insects and Birds</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Recognizes an Astronaut </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                            <td>•	Able to identify Harmful Objects and Substances </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>•	Attempts to say the Life Cycle of a Chicken</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>•	Can identify and name parts of a computer.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         
                                         
                                   @elseif($item->subname == 'LANGUAGE ART')
                                    <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                •	Reads two (2) letter words e.g am, an, if etc.
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> •	Attempts to read three (3) letter words with vowel sounds /a/ and /e/ e.g pat, pen, cat e.t.c</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Reads digraphs with actions e.g sh, ch, th, e.t.c.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> •	Able to read some sight words e.g the, our, she e.t.c</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> •	Able to associate lower case to upper case Alphabets.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                   @elseif($item->subname == 'NUMBER WORK')
                                        <tr scope="row">
                                            <td><strong>{{$item->subname}} </strong></td>
                                            <td>{{$item->TCA}}</td>
                                            <td>{{$item->Exam}}</td>
                                            <td>{{$item->GT}}</td>

                                            <td>{{App\Student::grade($item->GT,$grades)}}</td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                •	Able to add simple sums with and without pictures

                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Attempts solving simple subtraction with pictures</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Attempts to spell number names one - five. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         <tr>
                                            <td>•	Can identify basic number work signs e.g +, =, >, <, _ etc.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>•	Able to count and identify numbers 1-100.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                         <tr>
                                            <td>•	Can independently write numbers 1-100.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                         
                                  @endif 
                                  
                                @endforeach
                               </tbody>
                            @endif
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
            </div>
            <div class="col-12 col-md-12 col-lg-5 bottom-right p-3">
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
                        <span class="remarks-heading d-block"> head academics remarks</span>
                        <p>
                            @if ($comment != null)
                            {{$comment->hcomment}}

                            @endif

                        </p>
                    </div>
                    <!-- resumption date -->
                    <div class="remarks-box resumption-date">
                        <span class="remarks-heading d-block">school resumption date</span>
                        <p>{{date('l, jS F, Y',strtotime($term->resumption_date))}}</p>
                    </div>
                    <!-- school fees -->
                    <div class="remarks-box school-fees">
                        <span class="remarks-heading d-block">school fees amount</span>
                        <p>₦ 
                            @if($class_->name == 'KINDERGARTEN'|| $class_->name == 'KINDERGARTEN')
                                115,000
                            @else
                            {{number_format($term->fee_e)}}
                            @endif
                        </p>
                    </div>
                    <div class="py-4 mb-2 d-flex justify-content-center">
                      <img src="/img/logo2.png" height="60" width="auto">
                    </div>
                </div>
                   
            </div>
            <div class="row">
                <div class="">
                    <img src="/img/footer.png" height="30" width="800">
                    </div>
                </div>
            </div> 
        </div>

    </div>
</div> 
    
<script>
    function goBack() {
        window.history.back();
    }
</script>

</body>
</html>
