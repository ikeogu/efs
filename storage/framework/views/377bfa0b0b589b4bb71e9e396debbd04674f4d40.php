

<?php $__env->startSection('title', 'Student in Class List'); ?>

<?php $__env->startSection('content'); ?>




    <div class="container-fluid">

        <!-- Page Heading -->
    <h2 class="h3 mb-2 text-success"><?php echo e($class_T->name); ?> <?php echo e($class_T->description); ?></h2>
      

    <terms :terms="<?php echo e($terms); ?>" :myclass="<?php echo e($class_T); ?>"></terms>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ishledpg/efs/resources/views/class/terms.blade.php ENDPATH**/ ?>