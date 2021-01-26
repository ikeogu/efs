

<?php $__env->startSection('title', 'Student List'); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div>
        <a href="<?php echo e(route('lock')); ?>" class="btn btn-danger">Lock out students</a>
        <a href="<?php echo e(route('unlock')); ?>" class="btn btn-warning">Unlock Students</a>

    </div>

  <students></students>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ishledpg/efs/resources/views/students/index.blade.php ENDPATH**/ ?>