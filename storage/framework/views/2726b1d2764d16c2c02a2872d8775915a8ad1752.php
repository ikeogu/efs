

<?php $__env->startSection('title', 'Class Broadsheet'); ?>

<?php $__env->startSection('content'); ?>



<div class="container-fluid">
    <p><?php echo e($term->name); ?> | <?php echo e($term->session); ?> | <?php echo e($class_->name); ?> <?php echo e($class_->description); ?></p>
    <div class="table table-responsive">
        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">FirstName</th>
                <th scope="col">Othername</th>
                <th scope="col">Lastname</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><?php echo e($key + 1); ?></th>
                    <td><?php echo e($item->name); ?></td>
                    <td><?php echo e($item->oname); ?></td>
                    <td><?php echo e($item->surname); ?></td>
                    <?php if(auth()->user()->teacher_id != null): ?>
                        <?php if($class_->status =='Early Years'): ?>
                            <td>
                                <a href="<?php echo e(route('sum_ct',[$item->id,$term->id,$class_->id])); ?>" class="btn btn-success">Summative</a>
                            </td>
                        <?php elseif($class_->status == 'Year School'): ?>
                        <td>
                            <a href="<?php echo e(route('sum_ct1',[$item->id,$term->id,$class_->id])); ?>" class="btn btn-success">Summative 1</a>
                        </td>
                        <td>
                            <a href="<?php echo e(route('sum_ct',[$item->id,$term->id,$class_->id])); ?>" class="btn btn-success">Summative 2</a>
                        </td>
                        <?php else: ?>
                            <td>
                                <a href="<?php echo e(route('cat1_ct',[$item->id,$term->id,$class_->id])); ?>" class="btn btn-success">C.A.T 1</a>
                            </td>
                            <td>
                                <a href="<?php echo e(route('cat2_ct',[$item->id,$term->id,$class_->id])); ?>" class="btn btn-success">C.A.T 2</a>
                            </td>
                        <?php endif; ?>
                        
                        <td>
                            <a href="<?php echo e(route('result_ct',[$item->id,$term->id,$class_->id])); ?>" class="btn btn-success">Report Card</a>
                        </td>
                    <?php else: ?>
                    
                       <?php if($class_->status =='Early Years'): ?>
                            <td>
                                <a href="<?php echo e(route('sum_ct',[$item->id,$term->id,$class_->id])); ?>" class="btn btn-success">Summative</a>
                            </td>
                        <?php elseif($class_->status == 'Year School'): ?>
                        <td>
                            <a href="<?php echo e(route('sum_ct1',[$item->id,$term->id,$class_->id])); ?>" class="btn btn-success">Summative 1</a>
                        </td>
                        <td>
                            <a href="<?php echo e(route('sum_ct',[$item->id,$term->id,$class_->id])); ?>" class="btn btn-success">Summative 2</a>
                        </td>
                        <?php else: ?>
                            <td>
                                <a href="<?php echo e(route('cat1',[$item->id,$term->id,$class_->id])); ?>" class="btn btn-success">C.A.T 1</a>
                            </td>
                            <td>
                                <a href="<?php echo e(route('cat2',[$item->id,$term->id,$class_->id])); ?>" class="btn btn-success">C.A.T 2</a>
                            </td>
                        <?php endif; ?>
                        
                        <td>
                            <a href="<?php echo e(route('result',[$item->id,$term->id,$class_->id])); ?>" class="btn btn-success">Report Card</a>
                        </td>
                    <?php endif; ?>
                    
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
            </tbody>
          </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ishledpg/efs/resources/views/ind_students.blade.php ENDPATH**/ ?>