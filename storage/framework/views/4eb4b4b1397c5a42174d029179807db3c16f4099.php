

<?php $__env->startSection('title', 'Teacher Dashboard'); ?>

<?php $__env->startSection('sboard'); ?>

<div class="container-fluid">
    
    <div class="card alert-warning" >
      <img class="card-img-top" src="https://ishlp.com/deactive.png" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Account has been deactivated</h5>
        <p class="card-text">Contact the Admin.</p>
       
      </div>
    </div>
    

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.tdashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ishledpg/efs/resources/views/deactive.blade.php ENDPATH**/ ?>