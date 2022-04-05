

<?php $__env->startSection('title', 'Student List'); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row">
            <?php if(session('success')): ?>
              <div class="alert alert-success">
                  <?php echo session('success'); ?>

              </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
              <div class="alert alert-danger">
                  <?php echo session('error'); ?>

              </div>
            <?php endif; ?>
    </div>
    <div class="row">
        <a href="<?php echo e(route('lockh')); ?>" class="btn btn-outline-danger col-4 label">Lock High School Students</a>

        <a href="<?php echo e(route('locky')); ?>" class="btn btn-outline-danger col-4 label">Lock Year School Students</a>
        <a href="<?php echo e(route('locke')); ?>" class="btn btn-outline-danger col-4 label ">Lock Early Years Students</a>
    </div>
    <div class="row">
        
        <a href="<?php echo e(route('unlockh')); ?>" class="btn btn-outline-info col-4 ">Unlock High School Students</a>
        <a href="<?php echo e(route('unlocky')); ?>" class="btn btn-outline-info col-4 ">Unlock Year School Students</a>
        <a href="<?php echo e(route('unlocke')); ?>" class="btn btn-outline-info col-4 ">Unlock Early Years Students</a>

    </div>

  <students></students>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/chiboy/lampstack-8.0.5-0/apache2/htdocs/efs/resources/views/students/index.blade.php ENDPATH**/ ?>