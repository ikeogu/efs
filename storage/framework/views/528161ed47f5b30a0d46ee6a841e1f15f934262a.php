

<?php $__env->startSection('title', 'Teacher Dashboard'); ?>

<?php $__env->startSection('tboard'); ?>



<div class="container-fluid">
    
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <div class="card card-title">
            <h4>Notification</h4>
      </div>
      <div class="card-body">
        
        <p class="card-text">Do well to input accuately the right score for your children, <br> from now henceforth, you will be DISABLED <br>
            from editing of scores when result has been viewed by parent.
        </p>
        
      </div>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

<tboard :t_login="<?php echo e($teacher); ?>" :subjects="<?php echo e($subjects); ?>"></tboard>


</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.tdashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ishledpg/efs/resources/views/teacher/dashboard.blade.php ENDPATH**/ ?>