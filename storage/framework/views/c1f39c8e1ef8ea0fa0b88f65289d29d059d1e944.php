<!doctype html>
<html>
<head>
       <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

 <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <style>
   
     body{
         
         padding :0 ;
         margin:0 auto;
     }
   
    th, td{
         font-size:14.5px;
         font-weight:bold;
         
         
     }

    th.rotated-text {
    
        white-space: nowrap;
        padding: 0 !important;
        font-size:11.5px;
        
    }

    th.rotated-text > div {
        transform:
            translate(13px, 0px)
            rotate(-90deg);
            text-align:center;
            line-height: -160px;
        /* width: 30px; */
    }

    th.rotated-text > div > span {
        /* padding: 5px 10px; */
    }
    table {
        
            table-layout : auto;
            width:98%;
            border-collapse:separate; 
            border-spacing:0.1em;
            padding:2px;
            margin: 2px;
        }
    </style>
</head>
<body>
    
        <div class="bg-success text-white">SUMMATIVE TEST 1 <?php echo e($data['class_']->name); ?>| <?php echo e($data['class_']->description); ?>     <?php echo e($data['term']->name); ?> ||  <?php echo e($data['term']->session); ?></div>

            <table  class="table-striped table-bordered">
                <thead class="">
                    <tr>
                            <th scope="col">#</th>
                            <th class="rotated" scope="col"><div><span>Name</span></div></th>
                        
                            <?php $__currentLoopData = $data['subject']->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                            <th class="rotated" scope="col"><div><span><?php echo e($item->name); ?><</span></div></th>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <th class="rotate">Total</th>
                            <th class="rotate">Average</th>  
                            <th class="rotate">Average(%)</th> 
                            <th class="rotate">Remarks</th> 
                    </tr>
                </thead>
                <tbody>  
                    <?php
                        $total = 0;
                        $sum_total = 0;
                        $min_t = 0;
                        $min_t_per = 0;
                        
                    ?>                       
                    <?php $__currentLoopData = $data['students']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <tr>
                        
                        <td><?php echo e($key + 1); ?></td>
                        <td> <?php echo e($student->name); ?>  <?php echo e($student->oname); ?> <?php echo e($student->surname); ?></td>                   
                        <?php $__currentLoopData = $student->subjectMark; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>  $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($item->term_id == $data['term']->id && $item->s5_class_id == $data['class_']->id): ?>                  
                            <td><?php echo e($item->summative_test); ?></td>              
                        
                            <?php
                                $total += $item->summative_test;
                            ?>  
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e($total); ?></td>

                        <td><?php echo e(App\Student::average($total,$data['subject']->count())); ?></td>
                        <?php
                            $sum_total += $total;
                            
                            $avg = App\Student::average($total,$data['subject']->count());
                            $avgPer = App\Student::averPer($avg,$SMT_score);
                            $total = 0;
                            $min_t +=$avg; 
                            $min_t_per +=$avgPer; 
                        ?>
                        <td><?php echo e(App\Student::averPer($avg,$SMT_score)); ?> </td>
                        <td><?php echo e(App\Student::grade($avgPer,$data['grades'])); ?>  </td>
                    
                        
                    </tr>
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    <tr>
                        <th></th>
                    </tr> 
                
                    <tr>
                        <td></td>
                        <th>Total</th>
                        <?php $__currentLoopData = $data['subject']->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e(App\Student::subject_total($item->id,$data['class_']->id,$data['term']->id)); ?> </td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e($sum_total); ?></td>
                        <td><?php echo e($min_t); ?></td>
                        <td><?php echo e($min_t_per); ?></td>
                        
                    </tr>
                    <tr>
                        <td></td>
                        <th>Max Score</th>
                        <?php $__currentLoopData = $data['subject']->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e(App\Student::max_score($item->id,$data['class_']->id,$data['term']->id)); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </tr>
                    <tr>
                        <td></td>
                        <th>Min Score</th>
                        <?php $__currentLoopData = $data['subject']->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td><?php echo e(App\Student::min_score($item->id,$data['class_']->id,$data['term']->id)); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </tr> 
                    <tr>
                        <td></td>
                        <th>Subject Average</th>
                        <?php $__currentLoopData = $data['subject']->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e(App\Student::average(App\Student::subject_total($item->id,$data['class_']->id,$data['term']->id),$data['students']->count())); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    
                    </tr> 
                    <tr>
                        <td></td>
                        <th>Subject Average (%)</th>
                        <?php $__currentLoopData = $data['subject']->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e(round(App\Student::average_per(App\Student::subject_total($item->id,$data['class_']->id,$data['term']->id),($SMT_score * $data['students']->count())))); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    
                        
                    </tr> 
                    <tr>
                        <td></td>
                        <th>Remarks</th>
                        <?php $__currentLoopData = $data['subject']->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e(App\Student::grade(App\Student::average_per(App\Student::subject_total($item->id,$data['class_']->id,$data['term']->id),($SMT_score * $data['students']->count())),$data['grades'])); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        
                    </tr>   
                    
                </tbody>
                
            </table>
         
        </div> 
</body>
</html><?php /**PATH /home/chiboy/lampstack-8.0.5-0/apache2/htdocs/efs/resources/views/pdf/summative_sheet.blade.php ENDPATH**/ ?>