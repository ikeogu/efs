<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
      table, th, td {
              border: 1px solid black;
        }
        table {
          width: 100%;
          border-collapse: collapse;
        }
  </style>
</head>
<body>
  <main>
    <header>
      
      <p>EmeraldField Students Password</p>
    </header>
    <section>
      
          <table>
            <tr>
              <td>Name</td>
              <td>Email</td>
              <td>Password</td>
            </tr>
            <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td> <?php echo e($item->name); ?></td>
                    <td><?php echo e($item->email); ?></td>
                    <td><?php echo e($item->keep_track); ?></td>
                  </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
            </tbody>
          </table>
    </section>

  </main>


</body>
</html>

<?php /**PATH /home/ishledpg/efs/resources/views/pdf/users.blade.php ENDPATH**/ ?>