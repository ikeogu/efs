  

  <?php $__env->startSection('title', 'Student Dashboard'); ?>

  <?php $__env->startSection('sboard'); ?>


  <div class="container-fluid">
      
    <div class="card col-8">
      <div class="card-header">
        <p>Assignment on <?php echo e(App\Subject::find($ass->subject_id)->name); ?></p>
        <small><?php echo e($ass->title); ?></small>
      </div>
      <div class="card-body">
        <article  class="row">
          <?php echo e($ass->instruction); ?>

        </article>
        <article  class="row">
             <?php echo  $ass->body ?>
        </article>
        
      </div>
        <div class="card-footer">
        <?php if(file_exists($ass->file)): ?>
            <em>Download file.</em>
            <a href="<?php echo e(route('DA',[$ass->id])); ?>" class="btn btn-success"> Download</a>
        <?php endif; ?>
        </div>
    </div>

  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.studentboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ishledpg/efs/resources/views/assignment/show.blade.php ENDPATH**/ ?>