

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
				<a href="<?php echo e(route('cat2',[$student->id,$term->id,$class_->id])); ?>" type="button" class="btn btn-outline-success"><i class="fa fa-download" aria-hidden="true"></i>Download</a>
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
                            <li><?php echo e($term->name); ?></li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th>NAME:</th>
                        <td>
                            <ul>
                            <li><?php echo e($student->name); ?> <?php echo e($student->surname); ?></li>
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
                                <th scope="col">SCORE (20)</th>
                                <th scope="col">SUBJECT MAX SCORE (20)</th>
                                <th scope="col">SUBJECT AVERAGE SCORE (20)</th>
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
                            <td class="text-lowercase"><?php echo e($item->subname); ?></td>
                            
                            <td><?php echo e($item->CAT2); ?></td>
                            <?php
                                $total += $item->CAT2;
                            ?> 
                            
                             <td><?php echo e(App\Student::c2_max_score($item->subject_id,$class_->id,$term->id)); ?></td>
                            <td><?php echo e(App\Student::average(App\Student::subAver($item->subject_id,$class_->id,$term->id),$users->count())); ?></td>
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
                </div>
            </div>
        </section>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ishledpg/efs/resources/views/results/cat2.blade.php ENDPATH**/ ?>