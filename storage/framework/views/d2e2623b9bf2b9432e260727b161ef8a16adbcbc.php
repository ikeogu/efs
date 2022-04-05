

<?php $__env->startSection('title', 'Teacher Dashboard'); ?>

<?php $__env->startSection('tboard'); ?>



<div class="container-fluid table-responsive">
     <?php if($classt->count() > 0): ?>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Term</th>
            <th scope="col">Class</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $classt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td scope="row"><?php echo e($key + 1); ?></td>
                <td><?php echo e($item->term->name); ?></td>
                <td><?php echo e($item->s5_class->name); ?></td>
                <td>
                <a type="button" href="/api/students_in_term2/<?php echo e($item->term_id); ?>/class/<?php echo e($item->s5_class_id); ?>" class="btn btn-success btn-block">View</a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
          
        </tbody>
     </table>
     <?php else: ?>
     <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success">Notice</h6>
      </div>
      <div class="card-body">
        <p>Oops!!    <span class="emoji">&#128512;</span></p>
        <p class="mb-0">Currently not a class Teacher.</p>
        <p> Complain to Mr. Emmanuel, Okay!</p>
      </div>
    </div>
    <?php endif; ?>
</div>
 <style>
   span.emoji {
  font-size: 30px;
  vertical-align: middle;
  line-height: 2;
}
 </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.tdashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ishledpg/efs/resources/views/teacher/classteacher.blade.php ENDPATH**/ ?>