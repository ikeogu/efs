

<?php $__env->startSection('title', '<?php echo e($tudent->name); ?>'); ?>

<?php $__env->startSection('content'); ?>




    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">

            <div class="col-4 col-sm-4">
                <p class="mb-2  text-success text-capitalize"><?php echo e($term->name); ?></p>
                <p class="mb-2 text-success text-success"><?php echo e($term->session); ?></p>
            </div>
            <div class="col-4 justify-content-left flaot" >
                <p class=" mb-2  text-success">CLASS: <?php echo e($class_T->name); ?> </p>
                <p class=" mb-2  text-success">NAME: <?php echo e($class_T->description); ?> </p>
            </div>
            <div class="col-4 justify-content-left flaot" >
                <p class=" mb-2 text-success ">School: <?php echo e($student->level); ?> </p>
            </div>
        </div>
        <div class="row">

            <div class="col-4 justify-content-center">
                <p class=" mb-2 text-white btn btn-success"><?php echo e($student->surname); ?> <?php echo e($student->name); ?> </p>
            </div>
            
        </div>
        <?php if($class_T->status === 'Junior High School'): ?>
          <div class="row">
            <div class="col-4 d-flex ">
            <a href="<?php echo e(route('cat1',[$student->id,$term->id,$class_T->id])); ?>" class="col-4 col-sm-4 btn btn-block btn-success">C.A.T 1</a>
            </div>
            <div class="col-4 d-flex justify-content-between">
            <a href="<?php echo e(route('cat2',[$student->id,$term->id,$class_T->id])); ?>" class="col-4 btn  col-sm-4 btn-block btn-success">C.A.T 2</a>
            </div>
            <div class="col-4 d-flex justify-content-end">
            <a href="<?php echo e(route('result',[$student->id,$term->id,$class_T->id])); ?>" class="col-4 btn col-sm-4 btn-block btn-success ">Result </a>
            </div>
          </div> 
        <?php elseif($class_T->status ==='Senior High School'): ?>
           <div class="row">
            <div class="col-4 d-flex ">
            <a href="<?php echo e(route('cat1',[$student->id,$term->id,$class_T->id])); ?>" class="col-4 col-sm-4 btn btn-block btn-success">C.A.T 1</a>
            </div>
            <div class="col-4 d-flex justify-content-between">
            <a href="<?php echo e(route('cat2',[$student->id,$term->id,$class_T->id])); ?>" class="col-4 btn  col-sm-4 btn-block btn-success">C.A.T 2</a>
            </div>
            <div class="col-4 d-flex justify-content-end">
            <a href="<?php echo e(route('result',[$student->id,$term->id,$class_T->id])); ?>" class="col-4 btn col-sm-4 btn-block btn-success ">Result </a>
            </div>
          </div> 
        <?php else: ?>
        <div class="row">
            <a href="<?php echo e(route('sum',[$student->id,$term->id,$class_T->id])); ?>" class="col-lg-6 col-md-6 btn btn-block btn-success">Summative </a>
            <div class="col-6-lg col-sm-6 col-md-6">
            <a href="<?php echo e(route('result',[$student->id,$term->id,$class_T->id])); ?>" class="col-lg-6  col-md-6 btn btn-block btn-success ">Result </a>
            </div>
          </div> 
        <?php endif; ?>
       
        

    <student-record :studs_data ="<?php echo e($data); ?>" :s_details ="<?php echo e($student); ?>" :term="<?php echo e($term); ?>" :class_T="<?php echo e($class_T); ?>"></student-record>

    </div>

<?php $__env->stopSection(); ?>
<style>
    .float{float:right;}
</style>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ishledpg/efs/resources/views/students/sheet.blade.php ENDPATH**/ ?>