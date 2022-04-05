<!doctype html>
<html>
<head>
  <meta charset="utf-8">
	<title>Commments</title>
	<style type="text/css">
  	body{font:20px/1.4 Arial, Helvetica, sans-serif; text-align: center; color:#333; }
  	h1{color:#09c; line-height: 1.1em; font-weight: normal;}
    span{color:#333; display: block; font-size:0.8em;}
	</style>
</head>
<body>
    <div>
         <p> <?php echo e($C->name); ?> | <?php echo e($C->description); ?> |  <?php echo e($T->name); ?> | <?php echo e($T->description); ?> </p>
          <table class="table table-striped table-bordered" style="width:100%">
           
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
    </div>

</body>
</html>
<?php /**PATH /home/ishledpg/efs/resources/views/pdf/comments.blade.php ENDPATH**/ ?>