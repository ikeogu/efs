

<?php $__env->startSection('title', 'Class Broadsheet'); ?>

<?php $__env->startSection('content'); ?>


<div class="container-fluid">
    <form method="POST" action="<?php echo e(route('class_broad2')); ?>">
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
        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Broadsheet</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01" name="broadsheet">
            <option selected>Choose...</option>
            
             <option value="1">C.A.T 1</option>
             <option value="2">C.A.T 2</option>
             <option value="3">Exam</option>
             <option value="8">Summative 1</option>
             <option value="4">Summative 2</option>
             <option value="5">T.C.A</option>
             <option value="6">M.S.C</option>
             <option value="7">Grand Total</option>
            
        

            </select>
        </div>
        <button type="submit" class="btn btn-outline-success btn-md">Check</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ishledpg/efs/resources/views/allbroadsheet.blade.php ENDPATH**/ ?>