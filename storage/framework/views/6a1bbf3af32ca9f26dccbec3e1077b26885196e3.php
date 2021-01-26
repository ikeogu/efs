

<?php $__env->startSection('title', 'Student Result SUMMATIVE TEST'); ?>

<?php $__env->startSection('style'); ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/sumative.css')); ?>">

<?php $__env->stopSection(); ?>  
<?php $__env->startSection('content'); ?>




        
    <!-- details table -->
        <section class="container my-5">
            <div class="d-flex justify-content-end">
                <a href="<?php echo e(route('ds',[$student->id,$term->id,$class_->id])); ?>" type="button" class="btn btn-outline-danger"><i class="fa fa-download" aria-hidden="true"></i>Download</a>
            </div>
            <div class="d-flex justify-content-center py-4 mb-2"><img src="<?php echo e(asset('img/logo2.png')); ?>" height="90" width="auto"></div>
            <strong class="d-flex justify-content-center">EMERALDFIELD SCHOOLS</strong>
            <strong class="d-flex justify-content-center ">SUMMATIVE TEST RESULT</strong>
           
            <div class="col-12 col-md-8 p-0 table-responsive">
                <table class="details-table table-sm ">
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
                            <li><?php echo e($student->name); ?>  <?php echo e($student->oname); ?> <?php echo e($student->surname); ?></li>
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
                    <table class="table-sm table table-bordered table-hover main-result-table text-nowrap">
                        <thead>
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">SUBJECT</th>
                                <th scope="col">SCORE (<?php echo e($SMT_score); ?>)</th>
                                <th scope="col">SUBJECT MAX SCORE (<?php echo e($SMT_score); ?>)</th>
                                <th scope="col">SUBJECT AVERAGE SCORE (<?php echo e($SMT_score); ?>)</th>
                            </tr>
                        </thead>
                        <?php
                        $total = 0;
                        $sum_total = 0;
                        
                        
                        
                    ?>  
                        <tbody>
                            <?php $__currentLoopData = $scores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                            <td><?php echo e($key + 1); ?></td>
                            <td><?php echo e($item->subname); ?></td>
                            
                            <td><?php echo e($item->summative_test); ?></td>
                            <?php
                                $total += $item->summative_test;
                            ?> 
                            
                             <td><?php echo e(App\Student::max_score($item->subject_id,$class_->id,$term->id)); ?></td>
                            <td><?php echo e(App\Student::average(App\Student::subject_total($item->subject_id,$class_->id,$term->id),$users->count())); ?></td>
                            </tr> 
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
                                <td><?php echo e(App\Student::average($total,$scores->count())); ?></td>
                                <?php
                                    $avg = App\Student::average($total,$scores->count());
                                ?>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr class="average">
                                <td></td>
                                <td>average (100%)</td>
                                <td><?php echo e(App\Student::averPer($avg,$SMT_score)); ?></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr class="remarks">
                                <td></td>

                                <td>remarks</td>
                                <td><?php echo e(App\Student::grade(App\Student::averPer($avg,$SMT_score),$grades)); ?></td>
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
                                <td class="text-left"><span>a+ (95 - 100%)</span> <span class="pl-3">a (90 - 94%)</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-left">b+ <span>(85 - 89%)</span> <span class="pl-3">b (80 - 84%)</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-left"><span>c+ (75 - 79%)</span> <span class="pl-3">c (61 - 74%)</span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-left">d (50 - 60%)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2" class="text-left">needs improvement (49% & below) </td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ishledpg/efs/resources/views/results/summative_sheet.blade.php ENDPATH**/ ?>