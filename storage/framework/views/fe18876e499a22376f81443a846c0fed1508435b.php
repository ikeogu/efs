

<?php $__env->startSection('title', '<?php echo e($tudent->name); ?>'); ?>

<?php $__env->startSection('content'); ?>




    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">

            <div class="col-4 col-sm-4">
                <p class="mb-2  text-success text-capitalize"><?php echo e($term->name); ?></p>
                <p class="mb-2 text-success text-success"><?php echo e($term->session); ?></p>
            </div>
            <div class="col-4  float-left" >
                <p class=" mb-2  text-success">CLASS: <?php echo e($class_T->name); ?> </p>
                <p class=" mb-2  text-success">NAME: <?php echo e($class_T->description); ?> </p>
            </div>
            <div class="col-4  float-right" >
                <p class=" mb-2 text-success ">School: <?php echo e($student->level); ?> </p>
            </div>
        </div>
        

        <div class="col-9 d-flex justify-content-center">
            <p class=" mb-2 text-white btn btn-success btn-lg"><?php echo e($student->surname); ?> <?php echo e($student->name); ?> </p>
        </div>
            
        
        <?php if($class_T->status === 'Junior High School'|| $class_T->status ==='Senior High School'): ?>
          <div class="row">
            <div class="col-4 ">
            <a href="<?php echo e(route('cat1',[$student->id,$term->id,$class_T->id])); ?>" class=" btn btn-block btn-success">C.A.T 1</a>
            </div>
            <div class="col-4">
            <a href="<?php echo e(route('cat2',[$student->id,$term->id,$class_T->id])); ?>" class="btn btn-block btn-success">C.A.T 2</a>
            </div>
            <div class="col-4">
            <a href="<?php echo e(route('result',[$student->id,$term->id,$class_T->id])); ?>" class=" btn btn-block btn-success ">Result </a>
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
       
        

        <student-record :studs_data ="<?php echo e($data); ?>" :s_details ="<?php echo e($student); ?>" :term="<?php echo e($term); ?>" :class_T="<?php echo e($class_T); ?>"></student-record>

    </div>

<?php $__env->stopSection(); ?>
<style>
    .float{float:right;}
</style>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/chiboy/lampstack-8.0.5-0/apache2/htdocs/efs/resources/views/students/sheet.blade.php ENDPATH**/ ?>