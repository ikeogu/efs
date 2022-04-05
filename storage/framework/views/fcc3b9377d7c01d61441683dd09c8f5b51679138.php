

<?php $__env->startSection('title', 'Student Result SUMMATIVE TEST'); ?>

<?php $__env->startSection('style'); ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/sumative.css')); ?>">

<?php $__env->stopSection(); ?>  
<?php $__env->startSection('tboard'); ?>




       
    
    <!-- details table -->
        <section class="container my-5">
            <div class="d-flex justify-content-end">
				<a href="<?php echo e(route('dcat2',[$student->id,$term->id,$class_->id])); ?>" type="button" class="btn btn-outline-success"><i class="fa fa-download" aria-hidden="true"></i>Download</a>
			</div>
            <div class="d-flex justify-content-center py-4 mb-2"><img src="<?php echo e(asset('img/logo2.png')); ?>" height="80" width="auto"></div>
            <strong class="d-flex justify-content-center">EMERALD FIELD SCHOOLS</strong>
            <strong class="d-flex justify-content-center ">CONTINUOUS ASSESSMENT TEST II</strong>
    
            <div class="col-12 col-md-8 p-0">
                <table class="details-table table-sm">
                    <tr>
                        <th>SESSION:</th>
                        <td>
                            <ul>
                            <li><?php echo e($term->session); ?></li>
                                <li>Term:</li>
                              <li><?php if($term->name === 'Term I'): ?>
                                    I
                                <?php elseif($term->name === 'Term II'): ?>
                                    II
                                <?php else: ?>
                                    III
                                <?php endif; ?></li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th>NAME:</th>
                        <td>
                            <ul>
                            <li><?php echo e($student->name); ?> <?php echo e($student->oname); ?> <?php echo e($student->surname); ?></li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th>CLASS:</th>
                        <td>
                            <ul>
                            <li><?php echo e($class_->name); ?> <?php echo e($class_->description); ?></li>
                            </ul>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- main result table -->
            <div class="col-12 col-md-12 my-4 mx-auto p-0">
                <div class="table-responsive">
                    
                  <?php if($class_->status =='Junior High School'): ?>
                    <table class="table-sm table table-bordered table-hover main-result-table text-nowrap">
                        <thead>
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">SUBJECT</th>
                                <th scope="col">SCORE (<?php echo e($TCA_score); ?>)</th>
                                <th scope="col">SUBJECT MAX SCORE (<?php echo e($TCA_score); ?>)</th>
                                <th scope="col">SUBJECT AVERAGE SCORE (<?php echo e($TCA_score); ?>)</th>
                            </tr>
                        </thead>
                        <?php
                        $total = 0;
                        $sum_total = 0; 
                        $no_of_subject = 0;
                        $sum = 0;
                        $status = array();
                        $total_sum = 0;
                        $cnt = 0;
                        $emp = 0;
                        
                        ?>  
                        <tbody>
                            <?php $__currentLoopData = $scores->sortBy('status'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             
                            <tr>
                               
                            <?php if($item->term_id == $term->id && $item->s5_class_id == $class_->id): ?>
                           
                                 <?php if(!in_array($item->status,$status)): ?>
                                       <?php
                                         $sum = App\SubjectMark::where('term_id',$term->id)->where('s5_class_id',$class_->id)->where('student_id',$student->id)->where('status',$item->status)->sum('CAT2');
                                         array_push($status,$item->status);
                                          
                                        ?>
                                    
                                    <?php if($item->status == 1 ): ?>
                                        <td>1</td>
                                        <td class="">ENGLISH STUDIES</td>
                            
                                    <td><?php echo e(round($sum/2)); ?></td>
                                        <?php
                                         $total_sum =round($sum/2);
                                         
                                         ?>
                                    <?php endif; ?>
                                    <?php if($item->status == 2): ?>
                                        <td>2</td>
                                         <td class="">BASIC SCIENCE AND TECH</td>
                            
                                         <td><?php echo e(round($sum/4)); ?></td>
                                         <?php
                                         $total_sum =round($sum/4);
                                         
                                         ?>
                                    <?php endif; ?>
                                    <?php if($item->status == 3): ?>
                                            <td>3</td>
                                            <td class="">PREVOCATIONAL STUDIES</td>
                            
                                         <td><?php echo e(round($sum/2)); ?></td>
                                         <?php
                                         $total_sum =round($sum/2);
                                         
                                         ?>
                                    <?php endif; ?>
                                    <?php if($item->status == 4): ?>
                                    
                                        <td>4</td>
                                        <td class="">NATIONAL VALUES</td>
                            
                                        <td> <?php echo e(round($sum/2)); ?></td>
                                         <?php
                                         $total_sum =round($sum/2);
                                         
                                         ?>
                                    <?php endif; ?>
                                    <?php if($item->status ==5): ?>
                                        <td>5</td>
                                            <td class="">CULTURAL & CREATIVE ART</td>
                            
                                        <td> <?php echo e(round($sum/3)); ?></td>
                                         <?php
                                         $total_sum =round($sum/3);
                                         
                                         ?>
                                    <?php endif; ?>
                                    
                                    <?php if($item->status ==6): ?>
                                        <td>6</td>
                                        <td class="">BUSINESS STUDIES</td>
                            
                                        <td> <?php echo e($item->CAT2); ?></td>
                                         <?php
                                         $total_sum =$item->CAT2;
                                         
                                         ?>
                                    <?php endif; ?>
                                     <?php if($item->status ==7): ?>
                                        <td>7</td>
                                        <td class="">FRENCH</td>
                            
                                        <td> <?php echo e($item->CAT2); ?></td>
                                         <?php
                                         $total_sum =$item->CAT2;
                                         
                                         ?>
                                    <?php endif; ?>
                                    <?php if($item->status ==8): ?>
                                        <td>8</td>
                                            <td class="">MATHEMATICS</td>
                            
                                        <td> <?php echo e($item->CAT2); ?></td>
                                         <?php
                                         $total_sum =$item->CAT2;
                                         
                                         ?>
                                    <?php endif; ?>
                                     <?php if($item->status ==9): ?>
                                            
                                            <td>9</td>
                                            <td class="">RELIGIOUS STUDIES</td>
                                
                                            <td> <?php echo e($item->CAT2); ?></td>
                                             <?php
                                             $total_sum =$item->CAT2;
                                             if($item->CAT2 == null)
                                                $emp = 1;
                                             
                                             ?>
                                    <?php endif; ?>
                                     <?php if($item->status ==10): ?>    
                                        <td>10</td>
                                        <td>HANDWRITING</td>
                                        <td> <?php echo e($item->CAT2); ?></td>
                                         <?php
                                             $total_sum =$item->CAT2;
                                         ?>
                                    <?php endif; ?>
                                    
                                    <?php
                                    $total += $total_sum;
                                          
                                     
                                    
                                    if($emp == 1){
                                        $cnt =count($status) - 1;
                                    }else{
                                        $cnt = count($status);
                                    }
                                    ?>
                                
                                 <td><?php echo e(round(App\Student::c2_jmax_score($item->status,$class_->id,$term->id))); ?></td> 
                                <td><?php echo e(App\Student::average(App\Student::jsubAver2($item->status,$class_->id,$term->id),$users->count())); ?></td>

                            <?php endif; ?>
                             
                            
                           
                            </tr> 
                             <?php endif; ?>
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <tr class="average">
                                <td></td>
                                <td>Total</td>
                                <td><?php echo e($total); ?></td>
                                <td></td>
                                <td></td>
                            </tr>
                           
                            <tr class="average">
                                <td></td>
                                <td>average</td>
                                <td><?php echo e(App\Student::average($total,$cnt)); ?></td>
                                <?php
                                    $avg = App\Student::average($total,$cnt);
                                ?>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr class="average">
                                <td></td>
                                <td>average (100%)</td>
                                <td><?php echo e(App\Student::averPer($avg,$TCA_score)); ?></td>
                                <td></td>
                                <td></td>
                            </tr>
                           
                            <tr class="remarks">
                                <td></td>

                                <td>remarks</td>
                                <td><?php echo e(App\Student::h_grade(App\Student::averPer($avg,$TCA_score),$grades)); ?></td>
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
                  <?php else: ?>
                    <table class="table-sm table table-bordered table-hover main-result-table text-nowrap">
                        <thead>
                            <tr>
                            
                                <th scope="col">SUBJECT</th>
                                <th scope="col">SCORE (<?php echo e($TCA_score); ?>)</th>
                                <th scope="col">SUBJECT MAX SCORE (<?php echo e($TCA_score); ?>)</th>
                                <th scope="col">SUBJECT AVERAGE SCORE (<?php echo e($TCA_score); ?>)</th>
                            </tr>
                        </thead>
                        <?php
                        $total = 0;
                        $sum_total = 0; 
                        $no_of_subject = 0;
                        
                        ?>  
                        <tbody>
                            <?php $__currentLoopData = $scores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                            
                            <?php if($item->CAT2 != null): ?>
                        
                            <td class=""><?php echo e($item->subname); ?></td>
                            
                            <td><?php echo e($item->CAT2); ?></td>
                            
                            <?php
                                $total += $item->CAT2;
                                if($item->CAT2 != null){
                                    $no_of_subject += 1;
                                }
                            ?> 

                             <td><?php echo e(App\Student::c2_max_score($item->subject_id,$class_->id,$term->id)); ?></td> 
                            <td><?php echo e(App\Student::average(App\Student::subAver($item->subject_id,$class_->id,$term->id),$users->count())); ?></td>
                            </tr> 
                             <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr class="average">
                                <td></td>
                                <td>Total</td>
                                <td><?php echo e($total); ?></td>
                                <td></td>
                                <td></td>
                            </tr>
                           
                            <tr class="average">
                                <td></td>
                                <td>average</td>
                                <td><?php echo e(App\Student::average($total,$no_of_subject)); ?></td>
                                <?php
                                    $avg = App\Student::average($total,$no_of_subject);
                                ?>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr class="average">
                                <td></td>
                                <td>average (100%)</td>
                                <td><?php echo e(App\Student::averPer($avg,$TCA_score)); ?></td>
                                <td></td>
                                <td></td>
                            </tr>
                           
                            <tr class="remarks">
                                <td></td>

                                <td>remarks</td>
                                <td><?php echo e(App\Student::h_grade(App\Student::averPer($avg,$TCA_score),$grades)); ?></td>
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
                    <?php endif; ?>
                </div>
            </div>
        </section>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.tdashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ishledpg/efs/resources/views/teacher/cat2.blade.php ENDPATH**/ ?>