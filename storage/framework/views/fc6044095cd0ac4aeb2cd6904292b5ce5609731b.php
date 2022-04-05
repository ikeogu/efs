<?php $__env->startSection('title', 'Student Dashboard'); ?>

<?php $__env->startSection('sboard'); ?>

<div class="container-fluid">
    
   <form method="POST" action="<?php echo e(route('VA')); ?>">
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
            <?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?>| <?php echo e($item->session); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        

            </select>
        </div>
        
        <button type="submit" class="btn btn-outline-success btn-md">Fetch</button>
    </form>
    <hr>
    <?php if(!empty($assignment)): ?>
       <div class="table table-responsive jumbotron-fluid">
        <table class="table table-light">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Subject</th>
                <th scope="col">Title</th>
                <th scope="col">Dead Line</th>
                <th scope="col">Posted</th>
                <th scope="col">Action</th>
               
              </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $assignment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><?php echo e($key + 1); ?></th>
                    <td><?php echo e(App\Subject::find($item->subject_id)->name); ?></td>
                    <td><?php echo e($item->title); ?></td>
                    <td><?php echo e($item->dead_line); ?></td>
                    <td><?php echo e($item->created_at->diffForHumans()); ?></td>
                    
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

<?php echo $__env->make('layouts.studentboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/chiboy/lampstack-8.0.5-0/apache2/htdocs/efs/resources/views/assignment/student.blade.php ENDPATH**/ ?>