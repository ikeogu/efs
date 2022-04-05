<?php $__env->startSection('title', 'Class Broadsheet'); ?>

<?php $__env->startSection('tboard'); ?>



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
                      
                      <a href="<?php echo e(route('show',[$item->id])); ?>" class="btn btn-success" >
                        view
                      </a>
                      <a href="<?php echo e(route('destroyAss',[$item->id])); ?>" class="btn btn-danger" >
                        Delete
                      </a>
                      

                    
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter-<?php echo e($key); ?>">
                        Edit
                      </button>
                       <div class="modal fade" id="exampleModalCenter-<?php echo e($key); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Edit <?php echo e($item->title); ?></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="POST" action="<?php echo e(route('updateASSG',[$item->id])); ?>" enctype="multipart/form-data">
                              <?php echo csrf_field(); ?>
                              <?php echo method_field('PUT'); ?>
                              
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
                                  <input class="form-control" name="title" value="<?php echo e($item->title); ?>" type="text"> 
                              </div>
                              <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                  <label class="input-group-text" for="inputGroupSelect01">Instructions</label>
                                  </div>
                                  <textarea class="form-control text-black-50" name="instruction" rows="5" cols="7"><?php echo e($item->instruction); ?> </textarea>
                              </div>
                              <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                  <label class="input-group-text" for="inputGroupSelect01">Assignment</label>
                                  </div>
                                  <textarea class="form-control" name="body" rows="5" cols="7"><?php echo e($item->body); ?></textarea>
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
                              <button type="submit" class="btn btn-outline-success btn-md">Update</button>
                          </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            
                            </div>
                          </div>
                        </div>
                      </div>

                    </td>
                    
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
            </tbody>
          </table>
    </div>
</div>
<!-- Modal -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.tdashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ishledpg/efs/resources/views/assignment/l_assignment.blade.php ENDPATH**/ ?>