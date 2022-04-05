<?php $__env->startSection('title', __('Server Error')); ?>
<?php $__env->startSection('code'); ?>
<div class="container-fluid">

    <!-- 404 Error Text -->
    <div class="text-center">
      <div class="error mx-auto" data-text="404"></div>
      <p class="lead text-gray-800 mb-5">Oops!!!</p>
      <p class="text-gray-500 mb-0">Something went wrong.</p>
      <a href="/">&larr; Back to Dashboard</a>
    </div>

  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('message', __('Server Error')); ?>

<?php echo $__env->make('errors::minimal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ishledpg/efs/resources/views/errors/500.blade.php ENDPATH**/ ?>