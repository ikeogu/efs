

<?php $__env->startSection('title', 'Student in Class List'); ?>

<?php $__env->startSection('content'); ?>




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
        <?php if($class_T->status === 'Senior High School'||$class_T->status === 'Junior High School'): ?>
        <div class="row mt-5">
            <div class="col-md-2 mb-2 ">
                <a href="<?php echo e(route('cat1s',[$t->id,$class_T->id])); ?>"  class="btn btn-success">C.A.T 1</a>
            </div>
            <div class="col-md-2 mb-2">
                <a href="<?php echo e(route('cat2s',[$t->id,$class_T->id])); ?>"  class="btn btn-success">C.A.T 2</a>
            </div>
            <div class="col-md-2 mb-2">
                <a href="<?php echo e(route('msc',[$t->id,$class_T->id])); ?>"  class="btn btn-success">MSC</a>
            </div>
            <div class="col-md-2 mb-2">
                <a href="<?php echo e(route('tca',[$t->id,$class_T->id])); ?>"  class="btn btn-success">T.C.A</a>
            </div>
            <div class=" col-md-2 mb-2">
                <a href="<?php echo e(route('exam',[$t->id,$class_T->id])); ?>"  class="btn btn-success">Exam </a>
            </div>
            <div class="col-md-2">
                <a href="<?php echo e(route('gt',[$t->id,$class_T->id])); ?>"  class="btn btn-success">Grand Total</a>
            </div>
        </div>
        <?php endif; ?>
 
        <?php if($class_T->status === 'Year School'): ?>
        <div class="row mt-5">
            <div class="col-md-4">
                <a href="<?php echo e(route('summative1',[$t->id,$class_T->id])); ?>"  class="btn btn-success">Summative 1</a>
            </div>
            <div class="col-md-4">
                <a href="<?php echo e(route('summative',[$t->id,$class_T->id])); ?>"  class="btn btn-success">Summative 2</a>
            </div>
            <div class="col-md-4">
                <a href="<?php echo e(route('tca',[$t->id,$class_T->id])); ?>"  class="btn btn-success">TCA BroadSheet</a>
            </div>
           
        </div>
        <div class="row">
            <div class=" col-md-6 py-3">
                <a href="<?php echo e(route('exam',[$t->id,$class_T->id])); ?>"  class="btn btn-success">Exam BroadSheet</a>
            </div>
            <div class="col-md-6">
                <a href="<?php echo e(route('gt',[$t->id,$class_T->id])); ?>"  class="btn btn-success">Grand Total BroadSheet</a>
            </div>
        </div>
        <?php endif; ?>
        <?php if($class_T->status === 'Early Years'): ?>
        <div class="row mt-5">
            <div class="col-md-3">
                <a href="<?php echo e(route('summative',[$t->id,$class_T->id])); ?>"  class="btn btn-success">Summative </a>
            </div>
            <div class="col-md-3">
                <a href="<?php echo e(route('tca',[$t->id,$class_T->id])); ?>"  class="btn btn-success">TCA BroadSheet</a>
            </div>
            <div class=" col-md-3 py-3">
                <a href="<?php echo e(route('exam',[$t->id,$class_T->id])); ?>"  class="btn btn-success">Exam BroadSheet</a>
            </div>
            <div class="col-md-3">
                <a href="<?php echo e(route('gt',[$t->id,$class_T->id])); ?>"  class="btn btn-success">Grand Total BroadSheet</a>
            </div>
        </div>
        <?php endif; ?>
       

    <student-class :terms="<?php echo e($terms); ?>" :t="<?php echo e($t); ?>" :m="<?php echo e($class_T); ?>"></student-class>
    <?php if($class_T->status === 'Early Years'): ?>
         <subcomment :s5_class_id="<?php echo e($class_T->id); ?>" :term_id="<?php echo e($t->id); ?>"/>
    <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Bitnami\wampstack-7.4.27-0\apache2\htdocs\efs\resources\views/class/studentClass.blade.php ENDPATH**/ ?>