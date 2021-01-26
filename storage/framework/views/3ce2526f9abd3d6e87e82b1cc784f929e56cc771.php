

<?php $__env->startSection('title', 'CAT 2 BROADSHEET'); ?>

<?php $__env->startSection('content'); ?>


<div class="container-fluid">
    <div class="card">
    <div class="card-header bg-success text-capitalize text-white">C.A.T 2 <?php echo e($class_->name); ?>|   <?php echo e($class_->description); ?>  | <?php echo e($term->name); ?> |  <?php echo e($term->session); ?></div>
        <div class="card-body">
            <div class="col-12 table-responsive">
                <table  class="table table-striped table-bordered m-0  text-default" style="width:100%">
                <thead class="header">
                    <th class="rotate">S/No</th>
                    <th >Name</th>
                    <?php
                    $total = 0;
                     $sum_total = 0;
                     $min_t = 0;
                     $min_t_per = 0;
                     $cl_av = 0;
                    ?>     
                    <?php $__currentLoopData = $subjectt->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <th class="rotate text-capitalize ">
                        <div><?php echo e($item->name); ?></div>
                    </th>  
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                
                    
                    <th class="rotate">Total</th>
                    <th class="rotate">Average</th>  
                    <th class="rotate">Average(%)</th> 
                    <th class="rotate">Remarks</th> 
                </thead>
                                     
                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <tr>
                        
                        <td><?php echo e($key + 1); ?></td>
                        <td><?php echo e($student->surname); ?> <?php echo e($student->name); ?>  <?php echo e($student->oname); ?></td>                 
                        <?php $__currentLoopData = $student->subjectMark; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item->term_id === $term->id && $item->s5_class_id === $class_->id): ?>                 
                            <td><?php echo e($item->CAT2); ?></td>
                            <?php
                                $total += $item->CAT2;
                            ?>  
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e($total); ?></td>
                        <td><?php echo e(App\Student::average($total,$subject->count())); ?></td>
                        <?php
                            $sum_total += $total;
                            $avg = App\Student::average($total,$subject->count());
                            $avgPer = App\Student::averPer($avg,$TCA_score);
                            $total = 0;
                        ?>
                        <td><?php echo e(App\Student::averPer($avg,$TCA_score)); ?> </td>
                        <td><?php echo e(App\Student::grade($avgPer,$grades)); ?>  </td>
                       
                        
                    </tr>
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th></th>
                    </tr> 
                   
                     <tr>
                        <td></td>
                        <th>Total</th>
                        <?php $__currentLoopData = $subjectt->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e(App\Student::subject_total_cat2($item->id,$class_->id,$term->id)); ?> </td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e($sum_total); ?></td>
                        <td><?php echo e($min_t); ?></td>
                        <td><?php echo e($min_t_per); ?></td>
                        
                    </tr>
                    <tr>
                        <td></td>
                        <th>Max Score</th>
                        <?php $__currentLoopData = $subjectt->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e(App\Student::max_score_cat2($item->id,$class_->id,$term->id)); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </tr>
                    <tr>
                        <td></td>
                        <th>Min Score</th>
                        <?php $__currentLoopData = $subjectt->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <td><?php echo e(App\Student::min_score_cat2($item->id,$class_->id,$term->id)); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </tr> 
                    <tr>
                        <td></td>
                        <th>Class Average</th>
                        <?php $__currentLoopData = $subjectt->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e(App\Student::average(App\Student::subject_total_cat2($item->id,$class_->id,$term->id),$students->count())); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                       
                    </tr> 
                    <tr>
                        <td></td>
                        <th>Class Performance (%)</th>
                        <?php $__currentLoopData = $subjectt->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e(App\Student::average_per(App\Student::subject_total_cat2($item->id,$class_->id,$term->id),($TCA_score * $students->count()))); ?></td>
                        <?php
                            $cl_av += App\Student::average_per(App\Student::subject_total_cat2($item->id,$class_->id,$term->id),($TCA_score * $students->count()));
                        ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                       
                        
                    </tr> 
                    <tr>
                        <td></td>
                        <th>Remarks</th>
                        <?php $__currentLoopData = $subjectt->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e(App\Student::grade(App\Student::average_per(App\Student::subject_total_GT($item->id,$class_->id,$term->id),($TCA_score * $students->count())),$grades)); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        
                    </tr>   
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<style>
   td {
    border: 1px black solid;
    padding: 5px;
}
.rotate {
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  width: 1.5em;
}
.rotate div {
     -moz-transform: rotate(-90.0deg);  /* FF3.5+ */
       -o-transform: rotate(-90.0deg);  /* Opera 10.5 */
  -webkit-transform: rotate(-90.0deg);  /* Saf3.1+, Chrome */
             filter:  progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083);  /* IE6,IE7 */
         -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083)"; /* IE8 */
         margin-left: -10em;
         margin-right: -10em;
}
.table { font-size: 1rem; }

@media (min-width: 576px) {
    .table { font-size: 1.25rem; }
}
/* @media (min-width: 768px) {
    .table { font-size: 1.5rem; }
}
@media (min-width: 992px) {
    .table { font-size: 1.75rem; }
}
@media (min-width: 1200px) {
    .table { font-size: 2rem; }
} */ 
.header th {
              line-height: 180px;
              font-size: 12px;
    }
th, td{
    font-size: 12px;
}
.word th{
    word-break: break-word;
}
</style>
<script>


//Trim and re-trim only when necessary (prevent re-trim when string is shorted than maxLength, it causes last word cut) 
function shorten(text,max) {
    return text && text.length > max ? text.slice(0,max).split('/ (.*)/').slice(0, -1).join(' ') : text
}
    
</script>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ishledpg/efs/resources/views/teacher/cat2_broadsheet.blade.php ENDPATH**/ ?>