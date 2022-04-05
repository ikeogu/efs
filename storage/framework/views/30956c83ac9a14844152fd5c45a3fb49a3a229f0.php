

<?php $__env->startSection('title', 'Import Students'); ?>

<?php $__env->startSection('content'); ?>


<import_students :terms="<?php echo e($terms); ?>" :class_="<?php echo e($class_); ?>"></import_students>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ishledpg/efs/resources/views/students/import.blade.php ENDPATH**/ ?>