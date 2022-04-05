<?php $__env->startSection('title', 'Assignement'); ?>

<?php $__env->startSection('content'); ?>



<div class="container-fluid">
    <?php if($errors->any()): ?>
    <?php echo e(implode('', $errors->all('<div>:message</div>'))); ?>

    <?php endif; ?>
    
    <div class="table table-responsive">
        <table class="table table-light">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Subject</th>

                <th scope="col">Title</th>
                <th scope="col">Term</th>
                <th scope="col">Class</th>
                <th scope="col">Dead Line</th>
                <th scope="col">Posted</th>
                <th scope="col">Downloaded</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $ass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><?php echo e($key + 1); ?></th>
                    <td><?php echo e(App\Subject::find($item->subject_id)->name); ?></td>
                    <td><?php echo e($item->title); ?></td>
                     <td><?php echo e(App\Term::find($item->term_id)->name); ?> || <?php echo e(App\Term::find($item->term_id)->session); ?></td>
                      <td><?php echo e(App\S5Class::find($item->s5_class_id)->name); ?> || <?php echo e(App\S5Class::find($item->s5_class_id)->description); ?></td>
                    <td><?php echo e($item->dead_line); ?></td>
                    <td><?php echo e($item->created_at->diffForHumans()); ?></td>
                     <td><?php echo e($item->views); ?></td>
                    
                    <td>
                      <a href="<?php echo e(route('show',[$item->id])); ?>" class="btn btn-success" >
                        view
                      </a>
                      

                    </td>
                    
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
            </tbody>
          </table>
    </div>
</div>
<!-- Modal -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ishledpg/efs/resources/views/assignment/index.blade.php ENDPATH**/ ?>