

<?php $__env->startSection('title', 'Student Dashboard'); ?>

<?php $__env->startSection('sboard'); ?>

<div class="container-fluid">
  
  
    
    <biodata :stud_login ="<?php echo e($stud); ?>"></biodata>
  
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.studentboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/chiboy/lampstack-8.0.5-0/apache2/htdocs/efs/resources/views/students/biodata.blade.php ENDPATH**/ ?>