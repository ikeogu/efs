

<?php $__env->startSection('title', 'Student Dashboard'); ?>

<?php $__env->startSection('sboard'); ?>

<div class="container-fluid">
    
    <div class="card alert-warning" >
      <img class="card-img-top" src="https://ishlp.com/resul.jpg" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Maintenance!!!</h5>
        <p class="card-text">Result computation in progress!<br>
      You will be notified once we are done.</p>
       
      </div>
    </div>
    

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.studentboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ishledpg/efs/resources/views/no_result_yet.blade.php ENDPATH**/ ?>