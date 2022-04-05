

<?php $__env->startSection('title', 'Class List'); ?>

<?php $__env->startSection('content'); ?>



<div class="container-fluid">

<termclasses :term_1 = "<?php echo e($classes); ?>" :sess="<?php echo e($term); ?>"></termclasses>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/chiboy/lampstack-8.0.5-0/apache2/htdocs/efs/resources/views/class/termClasses.blade.php ENDPATH**/ ?>