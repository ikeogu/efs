<?php $__env->startSection('title', 'Student Result SUMMATIVE TEST I'); ?>

<?php $__env->startSection('content'); ?>


<div class="container-fluid " > 
          <div class="d-flex justify-content-end">
            <a href="<?php echo e(route('dsum',[$term->id,$class_->id])); ?>" type="button" class="btn btn-outline-danger"><i class="fa fa-download" aria-hidden="true"></i>ExportTOPDF</a>
        </div>

   <div class="card">
        <div class="card-header bg-success text-white">SUMMATIVE TEST I / <?php echo e($class_->name); ?> / <?php echo e($class_->description); ?>    / <?php echo e($term->name); ?>  /  <?php echo e($term->session); ?></div>
        <div class="card-body">
            <div class="col-12 table-responsive">
                <table  class="table table-striped table-bordered  text-default">
                <thead class="header">
                    <th class="rotate">S/No</th>
                    <th >Name</th>
                    
                    <?php $__currentLoopData = $subject->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <th class="rotate text-capitalize ">
                        <div><?php echo e($item->name); ?></div>
                    </th>   
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                
                    
                    <th class="rotate">Total</th>
                    <th class="rotate">Average</th>  
                    <th class="rotate">Average(%)</th> 
                    <th class="rotate">Remarks</th> 
                </thead>
                <tbody>  
                     <?php
                        $total = 0;
                        $sum_total = 0;
                        $min_t = 0;
                        $min_t_per = 0;
                        $no_of_subject =0;
                        
                    ?>                       
                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <tr>
                        
                        <td><?php echo e($key + 1); ?></td>
                        <td> <?php echo e($student->name); ?>  <?php echo e($student->oname); ?> <?php echo e($student->surname); ?></td>                   
                        <?php $__currentLoopData = $student->subjectMark->sortBy('subname'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>  $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($item->term_id == $term->id && $item->s5_class_id == $class_->id): ?> 
                                
                               <td><?php echo e($item->summative_1); ?></td>
                                <?php
                                $total += $item->summative_1;
                                if(!empty($item->summative_1)){
                                  $no_of_subject +=1;
                                  
                                }
                               ?> 
                            <?php endif; ?>
                             
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e($total); ?></td>

                        <td><?php echo e(App\Student::average($total,$no_of_subject )); ?></td>
                        <?php
                            $sum_total += $total;
                            
                            $avg = App\Student::average($total,$no_of_subject );
                            $avgPer = App\Student::averPer($avg,$SMT_1);
                            $total = 0;
                            $min_t +=$avg; 
                            $min_t_per +=$avgPer; 
                            $no_of_subject =0;
                        ?>
                        <td><?php echo e(App\Student::averPer($avg,$SMT_1)); ?> </td>
                        <td><?php echo e(App\Student::grade($avgPer,$grades)); ?>  </td>
                       
                        
                    </tr>
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                     <tr>
                        <th></th>
                    </tr> 
                   
                     <tr>
                        <td></td>
                        <th>Total</th>
                        <?php $__currentLoopData = $subject->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e(App\Student::subject_total_summative_1($item->id,$class_->id,$term->id)); ?> </td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e($sum_total); ?></td>
                        <td><?php echo e($min_t); ?></td>
                        <td><?php echo e($min_t_per); ?></td>
                        
                    </tr>
                    <tr>
                        <td></td>
                        <th>Max Score</th>
                        <?php $__currentLoopData = $subject->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e(App\Student::max_score_1($item->id,$class_->id,$term->id)); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </tr>
                    <tr>
                        <td></td>
                        <th>Min Score</th>
                        <?php $__currentLoopData = $subject->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <td><?php echo e(App\Student::min_score_1($item->id,$class_->id,$term->id)); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </tr> 
                    <tr>
                        <td></td>
                        <th>Subject Average</th>
                        <?php $__currentLoopData = $subject->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e(App\Student::average(App\Student::subject_total_summative_1($item->id,$class_->id,$term->id),App\Student::checkNoStudent($term->id,$class_->id,$item->id,8))); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                       
                    </tr> 
                    <tr>
                        <td></td>
                        <th>Subject Average (%)</th>
                        <?php $__currentLoopData = $subject->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e(round(App\Student::average_per(App\Student::subject_total_summative_1($item->id,$class_->id,$term->id),($SMT_1 * App\Student::checkNoStudent($term->id,$class_->id,$item->id,8))))); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                       
                        
                    </tr> 
                    <tr>
                        <td></td>
                        <th>Remarks</th>
                        <?php $__currentLoopData = $subject->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e(App\Student::grade(App\Student::average_per(App\Student::subject_total_summative_1($item->id,$class_->id,$term->id),($SMT_1 * App\Student::checkNoStudent($term->id,$class_->id,$item->id,8))),$grades)); ?></td>
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
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/chiboy/lampstack-8.0.5-0/apache2/htdocs/efs/resources/views/results/summative1.blade.php ENDPATH**/ ?>