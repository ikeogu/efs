

<?php $__env->startSection('title', 'Student in Class List'); ?>

<?php $__env->startSection('tboard'); ?>




    <div class="container-fluid">

        <div class="row">

            <div class="col-6 col-sm-6">
                <p class=" mb-2  text-success text-capitalize"><?php echo e($t->name); ?></p>
                <p class=" mb-2 text-success text-success"><?php echo e($t->session); ?></p>
            </div>
            <div class="col-6 col-sm-6" >
                <p class=" mb-2  text-success">CLASS: <?php echo e($class_T->name); ?> </p>
                <p class=" mb-2  text-success">NAME: <?php echo e($class_T->description); ?> </p>
            </div>
            
        </div>
        <?php if($class_T->status =='Junior High School'): ?>
        <div class="row mt-5">
            <div class="col-md-2 mb-2 ">
                <a href="<?php echo e(route('cat1s_ct',[$t->id,$class_T->id])); ?>"  class="btn btn-success">C.A.T 1</a>
            </div>
            <div class="col-md-2 mb-2">
                <a href="<?php echo e(route('cat2s_ct',[$t->id,$class_T->id])); ?>"  class="btn btn-success">C.A.T 2</a>
            </div>
            <div class="col-md-2 mb-2">
                <a href="<?php echo e(route('msc_ct',[$t->id,$class_T->id])); ?>"  class="btn btn-success">MSC</a>
            </div>
            <div class="col-md-2 mb-2">
                <a href="<?php echo e(route('tca_ct',[$t->id,$class_T->id])); ?>"  class="btn btn-success">T.C.A</a>
            </div>
            <div class=" col-md-2 mb-2">
                <a href="<?php echo e(route('exam_ct',[$t->id,$class_T->id])); ?>"  class="btn btn-success">Exam </a>
            </div>
            <div class="col-md-2">
                <a href="<?php echo e(route('gt_ct',[$t->id,$class_T->id])); ?>"  class="btn btn-success">Grand Total</a>
            </div>
        </div>
        <?php endif; ?>
        <?php if($class_T->status =='Senior High School'): ?>
        <div class="row mt-5">
            <div class="col-md-2 mb-2 ">
                <a href="<?php echo e(route('cat1s_ct',[$t->id,$class_T->id])); ?>"  class="btn btn-success">C.A.T 1</a>
            </div>
            <div class="col-md-2 mb-2">
                <a href="<?php echo e(route('cat2s_ct',[$t->id,$class_T->id])); ?>"  class="btn btn-success">C.A.T 2</a>
            </div>
            <div class="col-md-2 mb-2">
                <a href="<?php echo e(route('msc_ct',[$t->id,$class_T->id])); ?>"  class="btn btn-success">MSC</a>
            </div>
            <div class="col-md-2 mb-2">
                <a href="<?php echo e(route('tca_ct',[$t->id,$class_T->id])); ?>"  class="btn btn-success">T.C.A</a>
            </div>
            <div class=" col-md-2 mb-2">
                <a href="<?php echo e(route('exam_ct',[$t->id,$class_T->id])); ?>"  class="btn btn-success">Exam </a>
            </div>
            <div class="col-md-2">
                <a href="<?php echo e(route('gt_ct',[$t->id,$class_T->id])); ?>"  class="btn btn-success">Grand Total</a>
            </div>
        </div>
        <?php endif; ?>
        <?php if($class_T->status == 'Year School'): ?>
        <div class="row mt-5">
            <div class="col-md-3">
                <a href="<?php echo e(route('summative_ct',[$t->id,$class_T->id])); ?>"  class="btn btn-success">Summative </a>
            </div>
            <div class="col-md-3">
                <a href="<?php echo e(route('tca_ct',[$t->id,$class_T->id])); ?>"  class="btn btn-success">TCA BroadSheet</a>
            </div>
            <div class=" col-md-3 py-3">
                <a href="<?php echo e(route('exam_ct',[$t->id,$class_T->id])); ?>"  class="btn btn-success">Exam BroadSheet</a>
            </div>
            <div class="col-md-3">
                <a href="<?php echo e(route('gt_ct',[$t->id,$class_T->id])); ?>"  class="btn btn-success">Grand Total BroadSheet</a>
            </div>
        </div>
        <?php endif; ?>
        <?php if($class_T->status == 'Early Years'): ?>
        <div class="row mt-5">
            <div class="col-md-3">
                <a href="<?php echo e(route('summative_ct',[$t->id,$class_T->id])); ?>"  class="btn btn-success">Summative </a>
            </div>
            <div class="col-md-3">
                <a href="<?php echo e(route('tca_ct',[$t->id,$class_T->id])); ?>"  class="btn btn-success">TCA BroadSheet</a>
            </div>
            <div class=" col-md-3 py-3">
                <a href="<?php echo e(route('exam_ct',[$t->id,$class_T->id])); ?>"  class="btn btn-success">Exam BroadSheet</a>
            </div>
            <div class="col-md-3">
                <a href="<?php echo e(route('gt_ct',[$t->id,$class_T->id])); ?>"  class="btn btn-success">Grand Total BroadSheet</a>
            </div>
        </div>
        <?php endif; ?>
       

    <class-ct :terms="<?php echo e($terms); ?>" :t="<?php echo e($t); ?>" :m="<?php echo e($class_T); ?>"></class-ct>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.tdashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ishledpg/efs/resources/views/class/classStudent2.blade.php ENDPATH**/ ?>