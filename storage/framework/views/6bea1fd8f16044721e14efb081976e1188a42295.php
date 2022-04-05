

<?php $__env->startSection('title', 'High school Student List'); ?>

<?php $__env->startSection('content'); ?>

        <div class="container-fluid">

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-success"> <?php echo e($h->count()); ?> Students Record</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    
                      <th>Roll#</th>
                      <th>Reg.No</th>
                      <th>First Name</th>
                      <th>Other Name</th>
                      <th>Surame</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Gender</th>
                      <th>DOB</th>
                      
                    
                    
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $h; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <th><?php echo e($key + 1); ?></th>
                      <th scope="row"><?php echo e($item->reg_no); ?></th>
                      <td><?php echo e($item->name); ?></td>
                      <td><?php echo e($item->oname); ?></td>
                      <td><?php echo e($item->surname); ?></td>
                      <td><?php echo e($item->email); ?></td>
                      <td><?php echo e(App\User::where('student_id',$item->id)->first()->keep_track); ?></td>
                      <td> <?php if($item->gender == 1): ?>
                            M
                            <?php else: ?>
                            F
                            <?php endif; ?>                    
                        </td>
                      <td><?php echo e(date('jS F, Y', strtotime($item->dob))); ?></td>
                    
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                  </tbody>
                
                </table>
             
              </div>
            </div>
          </div>
       
        </div>
<?php $__env->stopSection(); ?>
  
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ishledpg/efs/resources/views/students/jhschool.blade.php ENDPATH**/ ?>