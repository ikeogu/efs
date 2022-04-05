

<?php $__env->startSection('title', 'Class List'); ?>

<?php $__env->startSection('content'); ?>



<div class="container-fluid">
  <div class="row p-3">
    <div class="col-2 card">
      <p class="card-header bg-warning">Students</p>
      <p class="card-body"> <?php echo e(App\Student::count()); ?></p>
      
    </div>
    <div class="col-2 card p-2">
      <p class="card-header bg-teal">Terms</p>
      <p class="card-body"> <?php echo e(App\Term::count()); ?></p>
      
    </div>
    <div class="col-2 card p-2">
      <p class="card-header bg-success">Subjects</p>
      <p class="card-body"> <?php echo e(App\Subject::count()); ?></p>
      
    </div>
    <div class="col-2 card p-2">
      <p class="card-header bg-teal">Class</p>
      <p class="card-body"> <?php echo e(App\S5Class::count()); ?></p>
      
    </div>
    <div class="col-2 card p-2">
      <p class="card-header bg-success">Teachers</p>
      <p class="card-body"> <?php echo e(App\Teacher::count()); ?></p>
      
    </div>
  </div>
  <div>
      <a href="<?php echo e(route('resetScore')); ?>" class="btn btn-sm btn-warning">Reset Subject</a>
  </div>

  <term></term>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Bitnami\wampstack-7.4.27-0\apache2\htdocs\efs\resources\views/class/term.blade.php ENDPATH**/ ?>