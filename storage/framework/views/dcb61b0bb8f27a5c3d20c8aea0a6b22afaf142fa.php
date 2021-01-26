

<?php $__env->startSection('title', 'Student Result'); ?>
<?php $__env->startSection('style'); ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/result.css')); ?>">

<?php $__env->stopSection(); ?>  
<?php $__env->startSection('tboard'); ?>


    
    <!-- top-left table -->
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
                                    <td class="pl-3"><?php echo e($student->name); ?> <?php echo e($student->oname); ?> <?php echo e($student->surname); ?></td>
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
                <h6 class="rt-heading text-center font-weight-bold">Pupil's Exam Result status</h6>
                <hr>
                <small class="px-1">Tick the appropriate columns</small>
                <div class="right-table-card">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm right-table">
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
                                <?php if($behave != null): ?>
                                <tr>
                                    <td scope="row">Participates in Class</td>
                                     <?php echo e(App\Student::behave($behave->pic)); ?>

                           
                                </tr>
                                <tr>
                                    <td scope="row">Listens Attentively</td>
                                    <?php echo e(App\Student::behave($behave->la)); ?>

                                </tr>
                                <tr>
                                    <td scope="row">Follows Instructions First Time </td>
                                    <?php echo e(App\Student::behave($behave->fift)); ?>

                                </tr>
                                <tr>
                                    <td scope="row">Completes Work on Time</td>
                                    <?php echo e(App\Student::behave($behave->cwot)); ?>

                                </tr>
                                <tr>
                                    <td scope="row">Accepts New Challenges and Persists with Activities </td>
                                    <?php echo e(App\Student::behave($behave->anc)); ?>

                                </tr>
                                <tr>
                                    <td scope="row">Expresses Feelings and Opinions Articulately. </td>
                                    <?php echo e(App\Student::behave($behave->efao)); ?>

                                </tr>
                                <tr>
                                    <td scope="row">Shows Respect and Kindness to All </td>
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
                            <?php if($class_->name == 'PLAYGROUP'): ?>
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
                            <?php elseif($class_->name == 'KINDERGARTEN'): ?>
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
                             <?php elseif($class_->name == 'PRE-KINDERGARTEN'): ?>
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
                        <p>₦ <?php echo e(number_format($term->fee_e)); ?></p>
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
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.tdashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ishledpg/efs/resources/views/teacher/e_years.blade.php ENDPATH**/ ?>