<?php $__env->startSection('title', __('Page Expired')); ?>
<div class="container-fluid">
    <?php $__env->startSection('code'); ?>
    <!-- 404 Error Text -->
    <div class="text-center">
      <div class="error mx-auto" data-text="404">Session Expired!</div>
      <p class="lead text-gray-800 mb-5"></p>
      <p class="text-gray-500 mb-0"></p>
      <a href="/login">&larr; Back to Login</a>
    </div>

  </div>
  <?php $__env->stopSection(); ?>
<?php $__env->startSection('message', __('Page Expired')); ?>

<?php echo $__env->make('errors::minimal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ishledpg/efs/resources/views/errors/419.blade.php ENDPATH**/ ?>