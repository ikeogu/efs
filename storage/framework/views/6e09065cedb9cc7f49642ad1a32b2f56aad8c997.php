<?php $__env->startSection('title', 'Class Broadsheet'); ?>

<?php $__env->startSection('tboard'); ?>



<div class="container-fluid">
    <p><?php echo e($term->name); ?> | <?php echo e($term->session); ?> | <?php echo e($class_->name); ?> <?php echo e($class_->description); ?></p>
    <div class="table table-responsive">
        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>

                <th scope="col">Exam</th>
                <th scope="col">TCA</th>
                <th scope="col">GT</th>
              </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $scores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><?php echo e($key + 1); ?></th>
                    <td><?php echo e(App\Student::me($item->student_id)); ?></td>
                    <td><?php echo e($item->Exam); ?></td>
                    <td><?php echo e($item->TCA); ?></td>
                    <td><?php echo e($item->GT); ?></td>

                    
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
            </tbody>
          </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.tdashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ishledpg/efs/resources/views/spo.blade.php ENDPATH**/ ?>