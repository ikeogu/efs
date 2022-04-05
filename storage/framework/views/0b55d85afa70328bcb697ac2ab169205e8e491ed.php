<?php $__env->startSection('title', 'Class Assignment'); ?>

<?php $__env->startSection('tboard'); ?>


<div class="container-fluid">
    <?php if($errors->any()): ?>
    <?php echo e(implode('', $errors->all('<div>:message</div>'))); ?>

    <?php endif; ?>
    <div class="row">
            <?php if(session('success')): ?>
              <div class="alert alert-success">
                  <?php echo session('success'); ?>

              </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
              <div class="alert alert-danger">
                  <?php echo session('error'); ?>

              </div>
            <?php endif; ?>
    </div>
    <form method="POST" action="<?php echo e(route('ASSG')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
         <div class="input-group mb-3">
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Name</label>
            </div>
           
           <input class="form-control" id="inputGroupSelect01" value="<?php echo e(Auth::user()->name); ?>" readonly>
        </div>
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
            <label class="input-group-text" for="inputGroupSelect01">Subject</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01" name="subject_id">
            <option selected>Choose...</option>
            
             
            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?>| <?php echo e($item->description); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        

            </select>
        </div>
         <div class="input-group mb-3">
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Title</label>
            </div>
            <input class="form-control" name="title" placeholder="Title of Assignment" type="text"> 
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Instructions</label>
            </div>
            <textarea class="form-control" name="instruction" rows="5" cols="7">Enter Intruction.... </textarea>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Assignment</label>
            </div>
            <textarea class="form-control" name="body" rows="5" cols="7">Enter Assignment.... </textarea>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Upload(PDF,IMAGE,WORD)</label>
            </div>
            <input type="file" class="form-control" name="file" >
        </div>
         <div class="input-group mb-3">
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">When To Turn In</label>
            </div>
            <input type="date" class="form-control" name="dead_line" >
        </div>
        <button type="submit" class="btn btn-outline-success btn-md">Create</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.tdashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ishledpg/efs/resources/views/assignment/p_assignment.blade.php ENDPATH**/ ?>