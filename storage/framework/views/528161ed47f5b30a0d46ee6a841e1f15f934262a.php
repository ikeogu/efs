

<?php $__env->startSection('title', 'Teacher Dashboard'); ?>

<?php $__env->startSection('tboard'); ?>



<div class="container-fluid">
    
    

<tboard :t_login="<?php echo e($teacher); ?>" :subjects="<?php echo e($subjects); ?>"></tboard>


</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.tdashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ishledpg/efs/resources/views/teacher/dashboard.blade.php ENDPATH**/ ?>