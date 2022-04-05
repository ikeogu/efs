

<?php $__env->startSection('title', 'My term sheet'); ?>

<?php $__env->startSection('sboard'); ?>

<div class="container-fluid">
    

        <!-- Page Heading -->
        <div class="row">

            <div class="col-9">
                <p class=" mb-2 text-gray-800 text-success"style=" font-size:13px;"> Session: <?php echo e($term->session); ?> <?php echo e($term->name); ?> </h2>
            </div>
            <div class="col-3" style="float:right;">
                <p class=" mb-2 text-gray-800  text-success"style=" font-size:13px;">Class: <?php echo e($class_T->name); ?> </h5>
            </div>
           
        </div>
    
            <div class="pr-3-">
                <p class="text-black-800 text-success">Name: <?php echo e($student->name); ?> <?php echo e($student->oname); ?> <?php echo e($student->surname); ?> </h5>
            </div>
            
        
        <?php if($class_T->status === 'Junior High School' || $class_T->status === 'Senior High School'): ?>
        <div class="row">
            <div class="col-4 d-flex ">
            <a href="<?php echo e(route('cat1',[$student->id,$term->id,$class_T->id])); ?>" class=" btn btn-block btn-success">C.A.T 1</a>
            </div>
            <div class="col-4 d-flex justify-content-between">
            <a href="<?php echo e(route('cat2',[$student->id,$term->id,$class_T->id])); ?>" class=" btn  btn-block btn-success">C.A.T 2</a>
            </div>
            <div class="col-4 d-flex justify-content-end">
            <a href="<?php echo e(route('result',[$student->id,$term->id,$class_T->id])); ?>" class=" btn  btn-block btn-success ">Result </a>
            </div>
          </div> 
          <?php elseif($class_T->status ==="Year School"): ?>
          <div class="row">
              <div class="col-4 ">
                  <a href="<?php echo e(route('sum1',[$student->id,$term->id,$class_T->id])); ?>" class="btn btn-block btn-success">Summative 1</a>
              </div>
              <div class="col-4 ">
                  <a href="<?php echo e(route('sum',[$student->id,$term->id,$class_T->id])); ?>" class="btn btn-block btn-success">Summative 2</a>
              </div>
              <div class="col-4">
                  <a href="<?php echo e(route('result',[$student->id,$term->id,$class_T->id])); ?>" class="btn btn-block btn-success">Result </a>
              </div>
          </div>
          <?php elseif($class_T->status ==="Early Years"): ?>
          <div class="row">
              <div class="col-6 float-left ">
                  <a href="<?php echo e(route('sum',[$student->id,$term->id,$class_T->id])); ?>" class="btn btn-block btn-success">Summative </a>
              </div>
              <div class="col-6 float-right">
                  <a href="<?php echo e(route('result',[$student->id,$term->id,$class_T->id])); ?>" class="btn btn-block btn-success">Result </a>
              </div>
          </div>
        <?php endif; ?>
       
    <term-sheet :s_details ="<?php echo e($student); ?>" :term="<?php echo e($term); ?>" :class_T="<?php echo e($class_T); ?>"></term-sheet>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.studentboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ishledpg/efs/resources/views/students/term_sheet2.blade.php ENDPATH**/ ?>