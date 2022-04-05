

<?php $__env->startSection('title', 'Class Broadsheet'); ?>

<?php $__env->startSection('content'); ?>


<div class="container-fluid">
    <form method="POST" action="<?php echo e(route('FC')); ?>">
        <?php echo csrf_field(); ?>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Class</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01" name="class_">
            <option selected>Choose...</option>
            <?php $__currentLoopData = $class_; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?> <?php echo e($item->description); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            

            </select>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Term</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01" name="term">
            <option selected>Choose...</option>
            <?php $__currentLoopData = $term; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?>| <?php echo e($item->session); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        

            </select>
        </div>

    
        <button type="submit" class="btn btn-outline-success btn-md">Fetch</button>
    </form>
    
    <?php if( is_object($c) &&  is_object($t)): ?>
  
        <a href="<?php echo e(route('DC',[$c->id,$t->id])); ?>" class="btn btn-warning">Download PDF</a>
        <table class="table table-striped table-bordered" style="width:100%">
            <p> <?php echo e($c->name); ?> | <?php echo e($t->name); ?></p>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Result Comment</th>
                  <th>Head Academcs Remark</th>
                  
                </tr>
              </thead>
              <tbody>
                  
               
                    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$st): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr  >
                  <td scope="row"><?php echo e($key + 1); ?></td>
                  <td><?php echo e($st->student->name); ?></td>
                 
                  <td><?php echo e($st->comment); ?></td>
                  <td><?php echo e($st->hcomment); ?></td>
                 
                  
                </tr>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
        </table>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ishledpg/efs/resources/views/check_comment.blade.php ENDPATH**/ ?>