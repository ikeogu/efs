<!DOCTYPE html>
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
        font-size: 11px !important;
    }
    td,p,th{
        color: black !important;
    }
    @media  print {
      #printPageButton,#back {
        display: none;
      }
    }
</style>

</head>
<body>

    
    
    <!-- top-left table -->
    
    <div class="d-flex justify-content-end">
        <button onclick="goBack()" class=" btn btn-warning text-white btn-block btn-sm"id="back"> Go Back</button>
        <form>
         <input type = "button" value = "Print" onclick = "window.print()" id="printPageButton"  class="btn btn-success btn-block btn-sm"/>
      </form>   
    </div>
    <div class="container ">
        
        <header >
            <div class="row">
                <div class="col-8 yellow ">
                  <img src="/img/header.png" height="120" width="650" class="img img-responsive">
                </div>
                <div class="col-4 yellow" >
                    
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
                                            <?php if($student->gender ==1 ): ?>
                                            <strong>M</strong>
                                            <?php else: ?>
                                            <strong>F</strong>
                                            <?php endif; ?>
                                            </li>
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
                                    <?php
                                    $total = 0;
                                    ?>
                                    
                                    <?php $__currentLoopData = $scores->sortBy('subname'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr scope="row">
                                        <td><strong><?php echo e($item->subname); ?> </strong></td>
                                        <td><?php echo e($item->TCA); ?></td>
                                        <td><?php echo e($item->Exam); ?></td>
                                        <td><?php echo e($item->GT); ?></td>
    
                                        <td><?php echo e(App\Student::grade($item->GT,$grades)); ?></td>
                                    </tr> 
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="summary d-flex justify-content-between mb-4 text-black">
                        <ul class="list-group left-list my-2">
                            <li class="list-group-item d-flex justify-content-between">
                                <p class="text-success text-bold">Highest Average:</p>
                                <span><?php echo e(App\Student::h_aver($class_->id,$term->id)); ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <p class="text-success text-bold">Child's Average:</p>
                                <span><?php echo e(number_format(App\Average::child_average($student->id,$term->id,$class_->id))); ?></span>
                            </li>
                        </ul>
                        <ul class="list-group right-list my-2">
                            <li class="list-group-item d-flex justify-content-between">
                                <p class="text-success text-bold">Class Average:</p>
                                <span><?php echo e(App\Student::total_GT($class_->id,$term->id)); ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                            <p class="text-success text-bold">Grade:</p>
                            <span><?php echo e(App\Student::grade(App\Average::child_average($student->id,$term->id,$class_->id),$grades)); ?></span>
                            </li>
                        </ul>
                        </div>
                         <div class="summary d-flex justify-content-between mb-4 text-black">
                        <?php if($term->name == 'Term III'): ?>
                            <ul class="list-group left-list my-2">
                            <li class="list-group-item d-flex justify-content-between">
                                <p class="text-success text-bold">Term I Average:</p>
                                <span><?php echo e(App\Student::get_average($class_->id,$term->status,$student->id,1)); ?></span>
                            </li>
                            
                        </ul>
                        <ul class="list-group right-list my-2">
                            <li class="list-group-item d-flex justify-content-between">
                                <p class="text-success text-bold">Term II Average:</p>
                                <span><?php echo e(App\Student::get_average($class_->id,$term->status,$student->id,2)); ?></span>
                            </li>
                            
                        </ul>
                        <ul class="list-group right-list my-2">
                            <li class="list-group-item d-flex justify-content-between">
                                <p class="text-success text-bold">Overal Average:</p>
                                <span><?php echo e(App\Student::overAll($class_->id,$term->status,$student->id)); ?></span>
                            </li>
                            
                        </ul>
                            
                        <?php endif; ?>
                        
                    </div>
                     <div class="summary d-flex justify-content-between mb-4 row" >
                         <div class="col-lg-5 col-md-6">
                             <?php if($student->photo != null): ?>
                         <img src="<?php echo e(asset('storage/Students/' . $student->photo)); ?>" alt="profile pic" height="250" width="250" style="box-shadow: 0 1px 8px rgb(0 0 0 / 30%); border: 1px solid #ffffff;" class="rounded-circle">
                            <?php endif; ?>
                         </div>
                         <div class="col-lg-7 col-md-6">
                              
                        <address class="text-black">
                            <p> Residential Address:<br> <?php echo e($student->address); ?></p>
                            
                            </address>
                         </div>
                        
                       
                        
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
                            
                                <?php if($comment != null): ?>
                                <p><?php echo e($comment->comment); ?></p>
                                <?php endif; ?>
                                
                            
                        </div>
                        <!-- class register remark -->
                        <div class="remarks-box register-remarks p-0">
                            <span class="remarks-heading d-block">head academic's remarks</span>
                            
                                <?php if($comment != null): ?>
                                <p><?php echo e($comment->hcomment); ?></p>
    
                                <?php endif; ?>
    
                        
                        </div>
                        <!-- resumption date -->
                        <div class="remarks-box resumption-date p-0">
                            <span class="remarks-heading d-block">school resumption date</span>
                            <p><?php echo e(date('l, jS F, Y',strtotime($term->resumption_date))); ?></p>
                        </div>
                        <!-- school fees -->
                        <div class="remarks-box school-fees">
                            <span class="remarks-heading d-block">school fees amount</span>
                            <p> ₦

                                    <?php if($class_->name == 'YEAR 1' ): ?>
                                    <?php echo e(number_format($term->y1)); ?>

                                    <?php elseif($class_->name == 'YEAR 2' ): ?>
                                    <?php echo e(number_format($term->y2)); ?>

                                    <?php elseif($class_->name == 'YEAR 3' ): ?>
                                    <?php echo e(number_format($term->y3)); ?>

                                    <?php elseif($class_->name == 'YEAR 4' ): ?>
                                    <?php echo e(number_format($term->y4)); ?>

                                    <?php elseif($class_->name == 'YEAR 5' ): ?>
                                    <?php echo e(number_format($term->y5)); ?>

                                    <?php elseif($class_->name == 'YEAR 6' ): ?>
                                    <?php echo e(number_format($term->y6)); ?>

                            
                                    <?php endif; ?>
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
</html><?php /**PATH /home/ishledpg/efs/resources/views/results/result.blade.php ENDPATH**/ ?>