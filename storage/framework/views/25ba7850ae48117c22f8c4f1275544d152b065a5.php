<?php $__env->startSection('title', 'Student Dashboard'); ?>

<?php $__env->startSection('sboard'); ?>

<div class="container-fluid">
    <?php if($errors->any()): ?>
    <?php echo e(implode('', $errors->all('<div>:message</div>'))); ?>

    <?php endif; ?>
    
  
    <hr>
    <?php if(!empty($assignments)): ?>
       <div class="table table-responsive jumbotron-fluid">
        <table class="table table-light">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Subject</th>
                <th scope="col">Title</th>
                <th scope="col">Class</th>
                <th scope="col">Term</th>
                <th scope="col">Dead Line</th>
                <th scope="col">Posted</th>
                <th scope="col">Action</th>
               
              </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $assignments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><?php echo e($key + 1); ?></th>
                    <td><?php echo e(App\Subject::find($item->subject_id)->name); ?></td>
                    <td><?php echo e($item->title); ?></td>
                    <td><?php echo e(App\Subject::findClass($item->s5_class_id)); ?></td>
                      <td><?php echo e(App\Subject::findTerm($item->term_id)); ?></td>
                    <td><?php echo e($item->dead_line); ?></td>
                    <td><?php echo e($item->created_at); ?></td>
                    
                     <td>
                       <a href="<?php echo e(route('show',[$item->id])); ?>" class="btn btn-success">view</a>
                     </td>
                    
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
            </tbody>
          </table>
    </div>
    <?php endif; ?>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.studentboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ishledpg/efs/resources/views/assignment/student.blade.php ENDPATH**/ ?>