
<html lang="en">

	<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/result.css')); ?>">
    <link href="<?php echo e(asset('css/sb-admin-2.min.css')); ?>" rel="stylesheet">
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
    @media  print {
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
                    
                        <strong class="text-dark font-weight-bold"><?php echo e($class_->name); ?></strong><br>
                        <strong class="text-dark font-weight-bold">REPORT CARD</strong><br>
                        <strong class="text-danger font-weight-bold text-uppercase ">TERM 

                            <?php if($term->name === 'Term I'): ?>
                                    I
                                <?php elseif($term->name === 'Term II'): ?>
                                    II
                                <?php else: ?>
                                    III
                                <?php endif; ?>
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
                                    <td class="pl-3"><?php echo e($student->name); ?>  <?php echo e($student->oname); ?> <?php echo e($student->surname); ?></td>
                                </tr>
                                <!-- date of birth -->
                                <tr class="table-row pupil-dob">
                                    <th>DATE OF BIRTH</th>
                                    <td class="pl-2">
                                        <ul>
                                            <li><?php echo e(date("jS F, Y",strtotime($student->dob))); ?></li>
                                            <li class="gender">gender</li>
                                        <li>
                                            <?php if($student->gender == 1): ?>
                                            <strong>M</strong></li>
                                            <?php else: ?>
                                                <strong>F</strong></li>
                                            <?php endif; ?>
                                        </ul>
                                    </td>
                                </tr>
                                <!-- class -->
                                <tr class="table-row pupil-class">
                                    <th>CLASS</th>
                                <td class="pl-3"><strong><?php echo e($class_->name); ?> <?php echo e($class_->description); ?></strong></td>
                                </tr>
                                <!-- school year -->
                                <tr class="table-row sch-year">
                                    <th>SCHOOL YEAR</th>
                                    <td class="pl-3"><?php echo e($term->session); ?></td>
                                </tr>
                                <!-- class teacher -->
                                <tr class="table-row class-teacher">
                                    <th>TEACHER</th>
                                <td class="pl-3"><?php echo e($classTeacher->teacher->name); ?></td>
                                </tr>
                                <!-- date of birth -->
                                <tr class="table-row">
                                    <th>ATTENDANCE</th>
                                    <td class="pl-2">
                                        <ul>
                                            <li>days present</li>
                                            <?php if($attend != null): ?>
                                            <li class="present"><strong><?php echo e($attend->dp); ?></strong></li> 
                                            <?php else: ?>
                                            <li class="days"><strong></strong></li>
                                            <?php endif; ?>
                                            
                                            <li>days absent</li>
                                            <?php if($attend != null): ?>
                                            <li class="absent"><strong><?php echo e($attend->da); ?></strong></li>
                                            <?php else: ?>
                                            <li class="days"><strong></strong></li>
                                            <?php endif; ?>
                                            
                                            <li>Tardy days</li>
                                            <?php if($attend != null): ?>
                                             <li class="days"><strong><?php echo e($attend->tar); ?></strong></li> 
                                            <?php else: ?>
                                            <li class="days"><strong></strong></li>
                                            <?php endif; ?>
                                           
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
                                <?php if($behave != null): ?>
                                <tr>
                                    <td scope="row">Participates in class</td>
                                     <?php echo e(App\Student::behave($behave->pic)); ?>

                           
                                </tr>
                                <tr>
                                    <td scope="row">Listens Attentively</td>
                                    <?php echo e(App\Student::behave($behave->la)); ?>

                                </tr>
                                <tr>
                                    <td scope="row">Follows instruction First time </td>
                                    <?php echo e(App\Student::behave($behave->fift)); ?>

                                </tr>
                                <tr>
                                    <td scope="row">Completes work on time</td>
                                    <?php echo e(App\Student::behave($behave->cwot)); ?>

                                </tr>
                                <tr>
                                    <td scope="row">Accepts new Challenges and persist with activities </td>
                                    <?php echo e(App\Student::behave($behave->anc)); ?>

                                </tr>
                                <tr>
                                    <td scope="row">Expresses feelings and Opinions </td>
                                    <?php echo e(App\Student::behave($behave->efao)); ?>

                                </tr>
                                <tr>
                                    <td scope="row">Shows respect and Kidness to all </td>
                                    <?php echo e(App\Student::behave($behave->srk)); ?>

                                </tr>
                                <?php endif; ?>
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
                            <?php if($class_->name == 'PLAYGROUP' && $term->name === 'Term I' && $term->session=='2020/2021'): ?>
                            <tbody>
                                <?php
                                $total = 0;
                                ?>
                             
                                <?php $__currentLoopData = $scores->sortBy('subname'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                     <?php if($item->subname == 'COGNITIVE SKILLS'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                        </tr> 

                                    
                                    <?php elseif($item->subname == 'CREATIVE ART'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
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

                                        
                                    <?php elseif($item->subname == 'DISCOVERY SCIENCE'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
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
                                         
                                   <?php elseif($item->subname == 'LANGUAGE ART'): ?>
                                    <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
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
                                   <?php elseif($item->subname == 'NUMBER WORK'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
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
                                         
                                  <?php endif; ?> 
                                  
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               </tbody>
                            <?php elseif($class_->name == 'KINDERGARTEN'&& $term->name === 'Term I' && $term->session=='2020/2021'): ?>
                            <tbody>
                                <?php
                                $total = 0;
                                ?>
                             
                                <?php $__currentLoopData = $scores->sortBy('subname'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                     <?php if($item->subname == 'COGNITIVE SKILLS'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                        </tr> 
                                                                            
                                    
                                    <?php elseif($item->subname == 'CREATIVE ART'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
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

                                        
                                    <?php elseif($item->subname == 'DISCOVERY SCIENCE'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
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
                                         
                                         
                                   <?php elseif($item->subname == 'LANGUAGE ART'): ?>
                                    <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
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
                                   <?php elseif($item->subname == 'NUMBER WORK'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
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
                                         
                                  <?php endif; ?> 
                                  
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               </tbody>
                             <?php elseif($class_->name == 'PRE-KINDERGARTEN' && $term->name === 'Term I' && $term->session=='2020/2021'): ?>
                            <tbody>
                                <?php
                                $total = 0;
                                ?>
                             
                                <?php $__currentLoopData = $scores->sortBy('subname'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                     <?php if($item->subname == 'COGNITIVE SKILLS'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                        </tr> 
                                                                        
                                    
                                    <?php elseif($item->subname == 'CREATIVE ART'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
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

                                      

                                        
                                    <?php elseif($item->subname == 'DISCOVERY SCIENCE'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
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
                                         
                                         
                                   <?php elseif($item->subname == 'LANGUAGE ART'): ?>
                                    <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
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
                                   <?php elseif($item->subname == 'NUMBER WORK'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
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
                                         
                                  <?php endif; ?> 
                                  
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               </tbody>
                            <?php elseif($class_->name == 'PLAYGROUP' && $term->name === 'Term II'): ?>
                            <tbody>
                                <?php
                                $total = 0;
                                ?>
                             
                                <?php $__currentLoopData = $scores->sortBy('subname'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                     <?php if($item->subname == 'COGNITIVE SKILLS'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                        </tr> 

                                    
                                    <?php elseif($item->subname == 'CREATIVE ART'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
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
                                      
                                    <?php elseif($item->subname == 'DISCOVERY SCIENCE'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
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
                                       
                                   <?php elseif($item->subname == 'LANGUAGE ART'): ?>
                                    <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
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
                                   <?php elseif($item->subname == 'NUMBER WORK'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
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
                                         
                                  <?php endif; ?> 
                                  
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               </tbody>
                            <?php elseif($class_->name == 'KINDERGARTEN'&& $term->name === 'Term II'): ?>
                             <tbody>
                                <?php
                                $total = 0;
                                ?>
                             
                                <?php $__currentLoopData = $scores->sortBy('subname'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                     <?php if($item->subname == 'COGNITIVE SKILLS'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                        </tr> 
                                                                            
                                    
                                    <?php elseif($item->subname == 'CREATIVE ART'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
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
                                        

                                        
                                    <?php elseif($item->subname == 'DISCOVERY SCIENCE'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
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

                                         
                                   <?php elseif($item->subname == 'LANGUAGE ART'): ?>
                                    <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
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
                                        
                                   <?php elseif($item->subname == 'NUMBER WORK'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
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
                                       
                                  <?php endif; ?> 
                                  
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <?php elseif($class_->name == 'PRE-KINDERGARTEN' && $term->name === 'Term II'): ?>
                             <tbody>
                                <?php
                                $total = 0;
                                ?>
                             
                                <?php $__currentLoopData = $scores->sortBy('subname'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                     <?php if($item->subname == 'COGNITIVE SKILLS'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                        </tr> 
                                                                            
                                    
                                    <?php elseif($item->subname == 'CREATIVE ART'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
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

                                        
                                    <?php elseif($item->subname == 'DISCOVERY SCIENCE'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
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
                                         
                                         
                                   <?php elseif($item->subname == 'LANGUAGE ART'): ?>
                                    <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
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
                                   <?php elseif($item->subname == 'NUMBER WORK'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
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
                                         
                                  <?php endif; ?> 
                                  
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             </tbody>
                            <?php elseif($class_->name == 'PLAYGROUP' && $term->name === 'Term III'): ?>
                                <tbody>
                                <?php
                                $total = 0;
                                ?>
                             
                                <?php $__currentLoopData = $scores->sortBy('subname'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                     <?php if($item->subname == 'COGNITIVE SKILLS'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                        </tr> 

                                      <tr>
                                            <td>•	Obeys simple instructions. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Completes simple exercises without assistance eg ribbon pull game, sieving exercise. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Attempt to complete specific tasks at first prompt. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Can identify objects and match them to other objects that go with them eg; socks and shoes, plate and spoon.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Attempt to form shapes using building blocks.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Able to sort objects by colour and size. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                    <?php elseif($item->subname == 'CREATIVE ART'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Can make beautiful collages using beads and shredded cardboard paper. </td>
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
                                        <tr>
                                            <td>•	Can identify basic colours.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 

                                        
                                    <?php elseif($item->subname == 'DISCOVERY SCIENCE'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Identifies some means of transportation.
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> •	Can mention some farm animals (duck, sheep, horse, pig, chicken) etc.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Identifies and mentions the five sense organs and say their uses. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                            <td>•	Able to identify the three types of soil. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>•	Recognizes and makes different sounds (whisper, bang, and scream).  </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         <tr>
                                            <td>•	Can mention some uses of water. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr> <td>•	Can say what the colours of the traffic light stands for. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         <tr> <td>•	Identifies and mentions some living and non-living things. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         
                                   <?php elseif($item->subname == 'LANGUAGE ART'): ?>
                                    <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                •	Rote sounds single sounds in and out of sequence /a/-/z/.
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> •	Able to Sing Jolly Phonics songs and do actions for sounds /a/-/z/.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Identifies objects associated with sounds /a/-/z/.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> •	Can write sounds /a/-/v/.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                   <?php elseif($item->subname == 'NUMBER WORK'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                • Rote counts numbers in and out of sequence <strong>1 - 70</strong>

                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Able to write numbers  <strong>1- 10</strong></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Identifies some basic shapes. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         <tr>
                                            <td>•	Can differentiate objects (big and small, fat and thin, tall and short, long, heavy and light) etc.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>• Identifies numbers <strong>1-25</strong> in and out of sequence.  </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                         <tr>
                                            <td>• Fills in missing numbers <strong>1-5</strong> </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                         <tr>
                                            <td>• Identifies some naira notes <strong>(N5, N20, 10, 50)</strong> etc.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                         
                                  <?php endif; ?> 
                                  
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               </tbody>
                            <?php elseif($class_->name == 'KINDERGARTEN'&& $term->name === 'Term III'): ?>
                                 <tbody>
                                    <?php
                                    $total = 0;
                                    ?>
                                
                                    <?php $__currentLoopData = $scores->sortBy('subname'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                        <?php if($item->subname == 'COGNITIVE SKILLS'): ?>
                                            <tr scope="row">
                                                <td><strong><?php echo e($item->subname); ?> </strong></td>
                                                <td><?php echo e($item->TCA); ?></td>
                                                <td><?php echo e($item->Exam); ?></td>
                                                <td><?php echo e($item->GT); ?></td>

                                                <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                            </tr> 
                                            <tr>
                                                <td>•	Imitates movement in response to music </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                            <tr>
                                                <td>•	Can identify items used in cleaning the environment and use them effectively. </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                            <tr>
                                                <td>•Can sing and demonstrate the action of some rhymes introduced.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                                                                
                                        
                                        <?php elseif($item->subname == 'CREATIVE ART'): ?>
                                            <tr scope="row">
                                                <td><strong><?php echo e($item->subname); ?> </strong></td>
                                                <td><?php echo e($item->TCA); ?></td>
                                                <td><?php echo e($item->Exam); ?></td>
                                                <td><?php echo e($item->GT); ?></td>

                                                <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                            </tr> 
                                            <tr>
                                                <td>•	Skillful in free arts expression  </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                            <tr>
                                                <td>
                                                    •	Recognizes craft works. e.g Beaded Jewelry, weaved mats etc
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                            <tr>
                                                <td>• Attempts making beautiful crafts</td>
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
                                                <td>•	Explores colours and can make beautiful designs with them</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                            

                                            
                                        <?php elseif($item->subname == 'DISCOVERY SCIENCE'): ?>
                                            <tr scope="row">
                                                <td><strong><?php echo e($item->subname); ?> </strong></td>
                                                <td><?php echo e($item->TCA); ?></td>
                                                <td><?php echo e($item->Exam); ?></td>
                                                <td><?php echo e($item->GT); ?></td>

                                                <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                            </tr> 
                                            <tr>
                                                <td>•	Able to mention the six classes of food and give examples of each. 
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                            <tr>
                                                <td>•	Understands the different seasons we have in Nigeria and gives examples of clothes worn during each season. </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                            <tr>
                                                <td>•	Recognizes traffic signals and what they represent.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                                <td>•	Can differentiate types of light, their sources and give proper examples. </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>

                                            
                                    <?php elseif($item->subname == 'LANGUAGE ART'): ?>
                                        <tr scope="row">
                                                <td><strong><?php echo e($item->subname); ?> </strong></td>
                                                <td><?php echo e($item->TCA); ?></td>
                                                <td><?php echo e($item->Exam); ?></td>
                                                <td><?php echo e($item->GT); ?></td>

                                                <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                            </tr> 
                                            <tr>
                                                <td>
                                                    •	Able to give the plural forms of some singular words.
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                            <tr>
                                                <td> •	Gives examples of Nouns, Verbs, Pronouns, Adjectives and Prepositions.</td>
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
                                                <td> •	Can use pictures to make simple sentences.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                            
                                    <?php elseif($item->subname == 'NUMBER WORK'): ?>
                                            <tr scope="row">
                                                <td><strong><?php echo e($item->subname); ?> </strong></td>
                                                <td><?php echo e($item->TCA); ?></td>
                                                <td><?php echo e($item->Exam); ?></td>
                                                <td><?php echo e($item->GT); ?></td>

                                                <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                            </tr> 
                                            <tr>
                                                <td>
                                                    •	Able to count and write numbers 1-300 from memory

                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                            <tr>
                                                <td>•	Can identify, read, spell and write number names One – twenty</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                            <tr>
                                                <td>•	Ability to recite and write roman numerals  1- 10 (i - x) </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>• Can differentiate between weight and capacity.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <?php elseif($item->subname == 'RELIGIOUS STUDIES'): ?>
                                            <tr scope="row">
                                                <td><strong><?php echo e($item->subname); ?> </strong></td>
                                                <td><?php echo e($item->TCA); ?></td>
                                                <td><?php echo e($item->Exam); ?></td>
                                                <td><?php echo e($item->GT); ?></td>

                                                <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                            </tr> 
                                            <tr>
                                                <td>
                                                    •	Can recall names of characters in a story

                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                            <tr>
                                                <td>•	Able to re-tell stories using pictures</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                            <tr>
                                                <td>•	Can answer questions related to stories. </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>• Able to recall and re-tell stories from memory</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>• Can pick and explain morals from stories told.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>• Able to act out morals of stories told.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>• Able to act out morals of stories in daily activities and interactions.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                    <?php endif; ?> 
                                    
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </tbody>
                            <?php elseif($class_->name == 'PRE-KINDERGARTEN' && $term->name === 'Term III'): ?>
                                <tbody>
                                    <?php
                                    $total = 0;
                                    ?>
                             
                                <?php $__currentLoopData = $scores->sortBy('subname'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                     <?php if($item->subname == 'COGNITIVE SKILLS'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                        </tr> 
                                                                            
                                        <tr>
                                            <td>•Able to obey simple commands. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>  
                                        <tr>
                                            <td>•	Able to sing rhymes. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•Can act out characters in the rhyme. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                       
                                        
                                    <?php elseif($item->subname == 'CREATIVE ART'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Attempts making a fish bone collage. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                •	Can attempt making a tree using hand prints.
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Able to express self through free art expression (Drawing any picture).</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                         <tr>
                                            <td>•	Attempt drawing a 3D shape (Cone shape).</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                         <tr>
                                            <td>• Able to make a flower collage. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                         <tr>
                                            <td>•	Attempts making a paper bracelet.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 

                                        
                                    <?php elseif($item->subname == 'DISCOVERY SCIENCE'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Able to say the stages in the life circle of a frog.
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Recognizes a magnet and its uses.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Able to say the sources and uses of water.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                            <td>•	Can identify traffic rules.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>•	Attempts to explain water cycle.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>•	Able to recognize healthy and unhealthy food.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         <tr>
                                            <td>•	Able to identify farm animals amongst other animals e.g Cow, Bee. Hen, Goat etc.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         
                                         
                                   <?php elseif($item->subname == 'LANGUAGE ART'): ?>
                                    <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                •	Attempts to read simple sentences.
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> •	Able to identify rhyming words e.g fat, cat, sat etc </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Can spell and read sight words.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> •	Ability to blend and read three letter words.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> •	Recognizes digraphs and the friends of the digraphs.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         <tr>
                                            <td> •	  Can identify beginning and ending sounds in a words. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         <tr>
                                            <td> • Able to form and read words with sounds.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         <tr>
                                            <td> •	Can write uppercase letters and sounds Aa-Zz.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                      <?php elseif($item->subname == 'NUMBER WORK'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                •	Able to identify some Nigerian currencies (₦5, ₦10, ₦20 etc).

                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Attempt to say the time in O’clock</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Can say the multiplication table (zero and one) </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         <tr>
                                            <td>•	Able to differentiate objects base on weight (heavier or lighter)</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>•	Can identify a fraction.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                         <tr>
                                            <td>• Able to add simple sums using the horizontal and vertical method.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        
                                         <tr>
                                            <td>• Able to subtract single digits using the horizontal and vertical method.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        
                                         <tr>
                                            <td>• Can count and identify numbers 1-200</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                          <tr>
                                            <td>• Can independently write numbers 180. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <?php elseif($item->subname == 'RELIGIOUS STUDIES'): ?>
                                            <tr scope="row">
                                                <td><strong><?php echo e($item->subname); ?> </strong></td>
                                                <td><?php echo e($item->TCA); ?></td>
                                                <td><?php echo e($item->Exam); ?></td>
                                                <td><?php echo e($item->GT); ?></td>
    
                                                <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                            </tr> 
                                            <tr>
                                                <td>
                                                    •	Can recall names of characters in a story.
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                              <tr>
                                                <td>
                                                    •	Able to re-tell stories using pictures.
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                              <tr>
                                                <td>
                                                    •	Able to re-call and re-tell stories from memory.
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                              <tr>
                                                <td>
                                                    •	Can pick and explain morals from stories told. 
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                            <tr>
                                                <td>
                                                    •	Able to act out morals of stories in daily activities and interactions.
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                        <?php endif; ?>
                                   
                                         
                                 
                                  
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               </tbody>

                            <?php elseif($class_->name == 'PLAYGROUP' && $term->name === 'Term I' && $term->session =='2021/2022'): ?>
                                <tbody>
                                <?php
                                $total = 0;
                                ?>
                             
                                <?php $__currentLoopData = $scores->sortBy('subname'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                     <?php if($item->subname == 'COGNITIVE SKILLS'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                        </tr> 

                                      <tr>
                                            <td>•	Obeys simple instructions. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Completes simple exercises without assistance eg ribbon pull game, sieving exercise. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Attempt to complete specific tasks at first prompt. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Can identify objects and match them to other objects that go with them eg; socks and shoes, plate and spoon.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Attempt to form shapes using building blocks.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Able to sort objects by colour and size. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                    <?php elseif($item->subname == 'CREATIVE ART'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Enjoys making prints and designs with poster colours. E.g, palm print, footprint, balloon splatter. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                •	Enjoys making crafts.
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Appreciates colours and enjoys colouring.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 

                                        
                                    <?php elseif($item->subname == 'DISCOVERY SCIENCE'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Able to identify and differentiate living things from non-living things.
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> • Can identify some items found around the school, home and hospital.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Identifies and mentions the five sense organs and say their uses. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                            <td>•	Identifies animals and links them with their sounds.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>•	Able to identify and mention some fruits and vegetables.  </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         <tr>
                                            <td>• Identifies some internal and external parts of the body. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr> <td>•	Identifies sense organs amongst other parts of the body </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         
                                         
                                   <?php elseif($item->subname == 'LANGUAGE ART'): ?>
                                    <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                •	Rote sounds and identifies sounds /a/-/g/.
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> •	Associates the sounds to more than one object.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Enjoys singing the jolly phonics song /a/ - /g/.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> • Demonstrates actions for sounds /a/ - /g/.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                             <td> • Attempts to trace sounds /a/ - /g/.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                   <?php elseif($item->subname == 'NUMBER WORK'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                • recognizes numbers 1-10 amongst other numbers.

                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Rote counts numbers 1-30.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Appreciates how numbers are formed by reciting them. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         <tr>
                                            <td>•	Identifies basic shapes and colours.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>• Attempts to trace numbers 1-5.  </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        
                                         
                                  <?php endif; ?> 
                                  
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               </tbody>   
                            <?php elseif($class_->name == 'PRE-KINDERGARTEN' && $term->name === 'Term I' && $term->session =='2021/2022'): ?>
                                 <tbody>
                                    <?php
                                    $total = 0;
                                    ?>
                             
                                <?php $__currentLoopData = $scores->sortBy('subname'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                     <?php if($item->subname == 'SOCIAL NORMS'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                        </tr> 
                                                                            
                                        <tr>
                                            <td>•Able to say the name of his/her school </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>  
                                        <tr>
                                            <td>•	Recognizes some places found in the home. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•Able to identify members of their family. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         <tr>
                                            <td>•Recognizes places and objects used for worship. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>•Able to identify some cultural groups in Nigeria </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>•Recognizes some National Symbols. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    
                                       
                                        
                                    <?php elseif($item->subname == 'CREATIVE ART'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                        </tr> 
                                        <tr>
                                            <td>•Skillful in free Arts expression  </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                • Attempts making beautiful origami crafts.
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Can use different shapes in making a shapes house craft</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                         <tr>
                                            <td>•	Can identify shapes used in making shapes house craft</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                         <tr>
                                            <td>• Attempts making a watermelon craft  </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                         <tr>
                                            <td>• Able to use tissue cylinder in making beautiful flower </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                         <tr>
                                            <td>• Able to make a beautiful crumbled artwork  </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 


                                        
                                    <?php elseif($item->subname == 'DISCOVERY SCIENCE'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Able to identify some animals and their young ones.                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Able to identify some animals’ homes </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Able to name parts of a plant.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                            <td>•	Attempts to say the life cycle of a plant.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>•	Attempts to name some common diseases.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>•	Can identify common accidents.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         <tr>
                                            <td>•	Able to identify an astronaut and a space ship.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         <tr>
                                            <td>• Able to say who an Astronaut is.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         
                                         
                                   <?php elseif($item->subname == 'LANGUAGE ART'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                •	Able to recognize sounds /a/ -/z/
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> •	Able to trace and write sounds /a/ -/z/ </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Able to associate sounds with objects</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> •	Can identify some consonant blends e.g br,pl,fr, nd etc..</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> •	Able to demonstrate actions for some digraphs e.g ‘ai’, ‘oa’, ‘ie’ etc.</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         <tr>
                                            <td> •	 Can blend and read two letter words. </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         
                                    <?php elseif($item->subname == 'NUMBER WORK'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                •	Able to count numbers in order from 1-100.

                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Able to trace and write numbers 1-50</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>•	Can identify objects based on height, size </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         <tr>
                                            <td>•	Recognizes even numbers from 2-10</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>•	Recites 0 Time table</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                         <tr>
                                            <td>• Able to count numbers backward (10-1)</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        
                                         <tr>
                                            <td>• Recognizes shapes e.g Oval, Rhombus, Crescent etc</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        

                                        <?php elseif($item->subname == 'RELIGIOUS STUDIES'): ?>
                                            <tr scope="row">
                                                <td><strong><?php echo e($item->subname); ?> </strong></td>
                                                <td><?php echo e($item->TCA); ?></td>
                                                <td><?php echo e($item->Exam); ?></td>
                                                <td><?php echo e($item->GT); ?></td>
    
                                                <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                            </tr> 
                                            <tr>
                                                <td>
                                                    •	Can recall names of characters in a story.
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                              <tr>
                                                <td>
                                                    •	Able to re-tell stories using pictures.
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                              <tr>
                                                <td>
                                                    •	Able to re-call and re-tell stories from memory.
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                              <tr>
                                                <td>
                                                    •	Can pick and explain morals from stories told. 
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                            <tr>
                                                <td>
                                                    •	Able to act out morals of stories in daily activities and interactions.
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                    
                                   
                                    <?php elseif($item->subname == 'GENERAL PAPER'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                •	Able to imitates movement in response to music
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> •	Able to sing rhymes from memory  </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Can identify parts of a computer </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> •	Attempts to click with a mouse</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> •	Able to mention some computer laboratory rules </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         <tr>
                                            <td> •	 Recognizes a computer</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                         <tr>
                                            <td> • Able to group objects according to their sizes </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    <?php elseif($item->subname == 'RELIGIOUS STUDIES'): ?>
                                        <tr scope="row">
                                            <td><strong><?php echo e($item->subname); ?> </strong></td>
                                            <td><?php echo e($item->TCA); ?></td>
                                            <td><?php echo e($item->Exam); ?></td>
                                            <td><?php echo e($item->GT); ?></td>

                                            <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                •	Can retell stories using pictures 
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> •	Can recall names of characters in a story</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td>• Able to answer questions related to stories </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> •	Can retell stories from memory </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr> 
                                        <tr>
                                            <td> •	Able to say the moral of a story </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        
                                      <?php endif; ?>
                                 
                                  
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               </tbody>
                            <?php elseif($class_->name == 'KINDERGARTEN' && $term->name === 'Term I' && $term->session =='2021/2022'): ?>
                               <tbody>
                                    <?php
                                    $total = 0;
                                    ?>
                                
                                    <?php $__currentLoopData = $scores->sortBy('subname'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                        <?php if($item->subname == 'GENERAL PAPER'): ?>
                                            <tr scope="row">
                                                <td><strong><?php echo e($item->subname); ?> </strong></td>
                                                <td><?php echo e($item->TCA); ?></td>
                                                <td><?php echo e($item->Exam); ?></td>
                                                <td><?php echo e($item->GT); ?></td>

                                                <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                            </tr> 
                                            <tr>
                                                <td>•	 Can say what measurement is. </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                            <tr>
                                                <td>•	Able to define computer and mention parts of a computer. </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                            <tr>
                                                <td>• Can obey simple commands in French.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                                 
                                            <tr>
                                                <td>• Able to identify Musical instruments.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                                 
                                            <tr>
                                                <td>• Can mention types of songs (lullaby, folk, rhymes).</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                        <?php elseif($item->subname == 'SOCIAL NORMS'): ?>
                                            <tr scope="row">
                                                <td><strong><?php echo e($item->subname); ?> </strong></td>
                                                <td><?php echo e($item->TCA); ?></td>
                                                <td><?php echo e($item->Exam); ?></td>
                                                <td><?php echo e($item->GT); ?></td>

                                                <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                            </tr> 
                                            <tr>
                                                <td>•	Able to say what a family is and mention the types of family. </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                            <tr>
                                                <td>•	Can say what religion is. </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                              <tr>
                                                <td>•	Can say what marriage is and the types of marriages. </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                              <tr>
                                                <td>•	Knows what national symbols are and can mention some national symbols. </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                            <tr>
                                                <td>•	Able to say the major languages in Nigeria. </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                              <tr>
                                                <td>•	Can define money. </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                             <tr>
                                                <td>•	Can differentiate goods from services. </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                        
                                                                                
                                        
                                        <?php elseif($item->subname == 'CREATIVE ART'): ?>
                                            <tr scope="row">
                                                <td><strong><?php echo e($item->subname); ?> </strong></td>
                                                <td><?php echo e($item->TCA); ?></td>
                                                <td><?php echo e($item->Exam); ?></td>
                                                <td><?php echo e($item->GT); ?></td>

                                                <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                            </tr> 
                                            <tr>
                                                <td>•	Able to draw and colour the Nigerian flag.  </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                            <tr>
                                                <td>
                                                    •	Attempts making a traffic light collage.
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                            <tr>
                                                <td>• Able to express self through free art expression.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                            <tr>
                                                <td>•	Attempts drawing 2D shapes (triangle, square, rectangle and circle shapes).</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                            <tr>
                                                <td>•	Enjoys making craft with materials provided.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                            

                                            
                                        <?php elseif($item->subname == 'DISCOVERY SCIENCE'): ?>
                                            <tr scope="row">
                                                <td><strong><?php echo e($item->subname); ?> </strong></td>
                                                <td><?php echo e($item->TCA); ?></td>
                                                <td><?php echo e($item->Exam); ?></td>
                                                <td><?php echo e($item->GT); ?></td>

                                                <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                            </tr> 
                                            <tr>
                                                <td>•	Able to say what rocks are and mention types of rocks. 
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                            <tr>
                                                <td>•	Recognizes some farm tools. </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                            <tr>
                                                <td>• Able to label parts of a tree.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                                <td>•	Can say what waste disposal is and the best way to dispose waste. </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            </tr>
                                                <td>•	Attempts to explain what livestock are and the things they produce. </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>

                                            </tr>
                                                <td>•	Can mention some health disorders and their causes.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>



                                            
                                    <?php elseif($item->subname == 'LANGUAGE ART'): ?>
                                        <tr scope="row">
                                                <td><strong><?php echo e($item->subname); ?> </strong></td>
                                                <td><?php echo e($item->TCA); ?></td>
                                                <td><?php echo e($item->Exam); ?></td>
                                                <td><?php echo e($item->GT); ?></td>

                                                <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                            </tr> 
                                            <tr>
                                                <td>
                                                    •	Able to write upper and lowercase letters Aa-Zz.
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                            <tr>
                                                <td> • Can differentiate vowels from consonants.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                            <tr>
                                                <td>•	Can spell and read sight words.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                            <tr>
                                                <td> • Attempts spelling (5, 6 and 7 letter words).</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                              <tr>
                                                <td> • Attempts spelling (5, 6 and 7 letter words).</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>   <tr>
                                                <td> • Able to blend and read words.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                              <tr>
                                                <td> • Recognizes some digraphs and their friends.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                              <tr>
                                                <td> • Can identify beginning, middle and ending sounds in words</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                              <tr>
                                                <td> • Attempts to form and read words with blends and digraphs.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                              <tr>
                                                <td> • Can read simple comprehension passages.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                            
                                    <?php elseif($item->subname == 'NUMBER WORK'): ?>
                                            <tr scope="row">
                                                <td><strong><?php echo e($item->subname); ?> </strong></td>
                                                <td><?php echo e($item->TCA); ?></td>
                                                <td><?php echo e($item->Exam); ?></td>
                                                <td><?php echo e($item->GT); ?></td>

                                                <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                            </tr> 
                                            <tr>
                                                <td>
                                                    •	Able to count, identify and write 1-100.

                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                            <tr>
                                                <td>•	Able to spell number names 1-20.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                            <tr>
                                                <td>•	Can say the multiplication table (zero, one, two and three).</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>• Able to count and write numbers backwards 50-1.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                              <tr>
                                                <td>• Able to say and write roman numerals ( i-v)..</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>• Able to subtract single digits using the horizontal and vertical methods.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <?php elseif($item->subname == 'RELIGIOUS STUDIES'): ?>
                                            <tr scope="row">
                                                <td><strong><?php echo e($item->subname); ?> </strong></td>
                                                <td><?php echo e($item->TCA); ?></td>
                                                <td><?php echo e($item->Exam); ?></td>
                                                <td><?php echo e($item->GT); ?></td>

                                                <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                            </tr> 
                                            <tr>
                                                <td>
                                                    •	Can recall names of characters in a story.

                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                            <tr>
                                                <td>•	Able to re-tell stories using pictures.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr> 
                                            <tr>
                                                <td>•	Able to re-call and re-tell stories from memory. </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>• Can say the moral lesson of stories told.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                           
                                    <?php endif; ?> 
                                    
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </tbody>

                            <?php endif; ?>
                        </table>
                    </div>
                </div>
                <div class="summary d-flex justify-content-between mb-4">
                    <ul class="list-group left-list my-2">
                        <li class="list-group-item d-flex justify-content-between">
                            <h5>Highest Average:</h5>
                            <span><?php echo e(App\Student::h_aver($class_->id,$term->id)); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <h5>Child's Average:</h5>
                            <span><?php echo e(number_format(App\Average::child_average($student->id,$term->id,$class_->id))); ?></span>
                        </li>
                    </ul>
                    <ul class="list-group right-list my-2">
                        <li class="list-group-item d-flex justify-content-between">
                            <h5>Class Average:</h5>
                            <span><?php echo e(App\Student::total_GT($class_->id,$term->id)); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                        <h5>Grade:</h5>
                        <span><?php echo e(App\Student::grade(App\Average::child_average($student->id,$term->id,$class_->id),$grades)); ?></span>
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
                            <?php if($comment != null): ?>
                            <?php echo e($comment->comment); ?>

                            <?php endif; ?>
                            
                        </p>
                    </div>
                    <!-- class register remark -->
                    <div class="remarks-box register-remarks">
                        <span class="remarks-heading d-block"> head academics remarks</span>
                        <p>
                            <?php if($comment != null): ?>
                            <?php echo e($comment->hcomment); ?>


                            <?php endif; ?>

                        </p>
                    </div>
                    <!-- resumption date -->
                    <div class="remarks-box resumption-date">
                        <span class="remarks-heading d-block">school resumption date</span>
                        <p><?php echo e(date('l, jS F, Y',strtotime($term->resumption_date))); ?></p>
                    </div>
                    <!-- school fees -->
                    <div class="remarks-box school-fees">
                        <span class="remarks-heading d-block">school fees amount</span>
                        <p>₦ 
                            
                            <?php if($class_->name == 'KINDERGARTEN' ): ?>
                               <?php echo e(number_format($term->kinda)); ?>

                            <?php elseif($class_->name == 'PRE-KINDERGARTEN' ): ?>
                            <?php echo e(number_format($term->prekin)); ?>

                            <?php elseif($class_->name == 'PLAYGROUP' ): ?>
                             <?php echo e(number_format($term->tulip)); ?>

                            <?php endif; ?>
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
<?php /**PATH /home/ishledpg/efs/resources/views/teacher/e_years.blade.php ENDPATH**/ ?>