

<?php $__env->startSection('title', 'CAT 2 BROADSHEET'); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <form>
        <input type = "button" value = "Print" onclick = "window.print()" id="printPageButton"  class="btn btn-success btn-block btn-sm"/>
    </form>
    <div class="d-flex justify-content-end">-->
    <a href="<?php echo e(route('dcat2_bs',[$term->id,$class_->id])); ?>" type="button" class="btn btn-outline-danger"><i class="fa fa-download" aria-hidden="true"></i>ExportTOPDF</a>
    </div>
    <div class="card">
    <div class="card-header bg-success text-capitalize text-white">C.A.T 2 <?php echo e($class_->name); ?>|   <?php echo e($class_->description); ?>  | <?php echo e($term->name); ?>|  <?php echo e($term->session); ?></div>
        <div class="card-body">
            <div class="col-12 table-responsive">
                 <?php if($class_->status == 'Junior High School'): ?>
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
                            $no_of_subject = 0;
                            $total_sum = 0;
                            $h = 0;
                            $status = array();
                             asort($subject_status);
                        ?>
                        <?php $__currentLoopData = $subject_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($sta == 1): ?>
                         <th class='rotate text-capitalize'>
                            <div>ENGLISH STUDIES</div>
                        </th>
                        
                        <?php elseif($sta == 2): ?>
                         <th class='rotate text-capitalize'>
                            <div>BASIC SCIENCE AND TECH</div>
                        </th>
                        
                        <?php elseif($sta == 3): ?>
                         <th class='rotate text-capitalize'>
                            <div>PREVOCATIONAL STUDIES</div>
                        </th>
                        
                        <?php elseif($sta == 4): ?>
                         <th class='rotate text-capitalize'>
                            <div>NATIONAL VALUES</div>
                        </th>
                        
                        <?php elseif($sta == 5): ?>
                        <th class='rotate text-capitalize'>
                            <div>C.C.A</div>
                        </th>
                        
                        <?php elseif($sta == 6): ?>
                         <th class='rotate text-capitalize'>
                            <div>BUSINESS STUDIES</div>
                        </th>
                        
                        <?php elseif($sta == 7): ?>
                        <th class='rotate text-capitalize'>
                            <div>FRENCH</div>
                        </th>
                        
                        <?php elseif($sta == 8): ?>
                        <th class='rotate text-capitalize'>
                            <div>MATHEMATICS</div>
                        </th>
                        <?php endif; ?>
                         <?php if($sta == 9): ?>
                        <th class='rotate text-capitalize'>
                            <div>RELIGIOUS STUDIES</div>
                        </th>
                        
                         <?php elseif($sta == 10): ?>
                        <th class='rotate text-capitalize'>
                            <div>HANDWRITING</div>
                        </th>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <th class="rotate">Total</th>
                        <th class="rotate">Average</th>  
                        <th class="rotate">Average(%)</th> 
                        <th class="rotate">Remarks</th> 
                    </thead>
                                     
                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <tr>
                        
                        <td><?php echo e($key + 1); ?></td>
                        <td><?php echo e($student->name); ?> <?php echo e($student->oname); ?>  <?php echo e($student->surname); ?></td>                    
                        <?php $__currentLoopData = $student->subjectMark->sortBy('status'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item->term_id == $term->id && $item->s5_class_id == $class_->id): ?>
                           <?php if(!in_array($item->status,$status)): ?>
                               <?php
                                 $sum = App\SubjectMark::where('term_id',$term->id)->where('s5_class_id',$class_->id)->where('student_id',$student->id)->where('status',$item->status)->sum('CAT2');
                                 array_push($status,$item->status);
                                  
                                ?>
                                  
                                    <?php if($item->status == 1): ?>
                                    <td><?php echo e(round($sum/2)); ?></td>
                                        <?php
                                         $total_sum =round($sum/2);
                                         
                                         ?>
                                    <?php endif; ?>
                                    <?php if($item->status == 2): ?>
                                         <td><?php echo e(round($sum/4)); ?></td>
                                         <?php
                                         $total_sum =round($sum/4);
                                         
                                         ?>
                                    <?php endif; ?>
                                    <?php if($item->status == 3): ?>
                                         <td><?php echo e(round($sum/2)); ?></td>
                                         <?php
                                         $total_sum =round($sum/2);
                                         
                                         ?>
                                    <?php endif; ?>
                                    <?php if($item->status == 4): ?>
                                        <td> <?php echo e(round($sum/2)); ?></td>
                                         <?php
                                         $total_sum =round($sum/2);
                                         
                                         ?>
                                    <?php endif; ?>
                                    <?php if($item->status ==5): ?>
                                        <td> <?php echo e(round($sum/3)); ?></td>
                                         <?php
                                         $total_sum =round($sum/3);
                                         
                                         ?>
                                    <?php endif; ?>
                                    
                                    <?php if($item->status ==6): ?>
                                        <td> <?php echo e($item->CAT2); ?></td>
                                         <?php
                                         $total_sum =$item->CAT2;
                                         
                                         ?>
                                    <?php endif; ?>
                                     <?php if($item->status ==7): ?>
                                        <td> <?php echo e($item->CAT2); ?></td>
                                         <?php
                                         $total_sum =$item->CAT2;
                                         
                                         ?>
                                    <?php endif; ?>
                                    <?php if($item->status ==8): ?>
                                        <td> <?php echo e($item->CAT2); ?></td>
                                         <?php
                                         $total_sum =$item->CAT2;
                                         
                                         ?>
                                    <?php endif; ?>
                                     <?php if($item->status ==9): ?>
                                        <td> <?php echo e($item->CAT2); ?></td>
                                         <?php
                                         $total_sum =$item->CAT2;
                                         if($item->CAT2 == null){
                                           $h  = 2;
                                         }
                                         ?>
                                    <?php endif; ?>
                                     <?php if($item->status ==10): ?>
                                        <td> <?php echo e($item->CAT2); ?></td>
                                         <?php
                                         $total_sum =$item->CAT2;
                                         
                                         ?>
                                    <?php endif; ?>
                                
                                    
                                    
                                
                                <?php
                                    $total += $total_sum;
                                   
                                ?> 
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            if($h == 2){
                                $cnt = 9;
                            }else{
                                 $cnt = count($status);
                            }
                           
                        ?>
                        <td><?php echo e($total); ?></td>
                        <td><?php echo e(App\Student::average($total,$cnt)); ?></td>
                        <?php
                          
                            $sum_total += $total;
                            $avg = App\Student::average($total,$cnt);
                            $avgPer = App\Student::averPer($avg,$TCA_score);
                            $total = 0;
                            
                            $status = array();
                            $h = 0;
                        ?>
                        <td><?php echo e(App\Student::averPer($avg,$TCA_score)); ?> </td>
                        <td><?php echo e(App\Student::h_grade($avgPer,$grades)); ?>  </td>
                    </tr>  
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th></th>
                    </tr> 
                   
                     <tr>
                        <td></td>
                        <th>Total</th>
                        <?php for($i = 1; $i <= $cnt; $i++): ?>
                        <td><?php echo e(round(App\Student::subject_total_jcat2($i,$class_->id,$term->id))); ?> </td>
                        <?php endfor; ?>
                        <td><?php echo e($sum_total); ?></td>
                        <td><?php echo e($min_t); ?></td>
                        <td><?php echo e($min_t_per); ?></td>
                        
                    </tr>
                    <tr>
                        <td></td>
                        <th>Max Score</th>
                        <?php for($i = 1; $i <= $cnt; $i++): ?>
                        <td><?php echo e(round(App\Student::max_score_jcat2($i,$class_->id,$term->id))); ?></td>
                        <?php endfor; ?>
                        
                    </tr>
                    <tr>
                        <td></td>
                        <th>Min Score</th>
                        <?php for($i = 1; $i <= $cnt; $i++): ?>
                             <td><?php echo e(round(App\Student::min_score_jcat2($i,$class_->id,$term->id))); ?></td>
                        <?php endfor; ?>
                        
                    </tr> 
                    <tr>
                        <td></td>
                        <th>Class Average</th>
                        <?php for($i = 1; $i <= $cnt; $i++): ?>
                        <td><?php echo e(App\Student::average(App\Student::subject_total_jcat2($i,$class_->id,$term->id),App\Student::checkNoStudent($term->id,$class_->id,$item->id,2))); ?></td>
                        <?php endfor; ?>
                        
                       
                    </tr> 
                    <tr>
                        <td></td>
                        <th>Class Performance (%)</th>
                        <?php for($i = 1; $i <= $cnt; $i++): ?>
                        <td><?php echo e(round(App\Student::average_per(App\Student::subject_total_jcat2($i,$class_->id,$term->id),($TCA_score * App\Student::checkNoStudent($term->id,$class_->id,$item->id,2))))); ?></td>
                        <?php
                            $cl_av += App\Student::average_per(App\Student::subject_total_jcat2($item->id,$class_->id,$term->id),($TCA_score * App\Student::checkNoStudent($term->id,$class_->id,$item->id,2)))
                        ?>
                        <?php endfor; ?>
                        
                       
                        
                    </tr> 
                    <tr>
                        <td></td>
                        <th>Remarks</th>
                        <?php for($i = 1; $i <= $cnt; $i++): ?>
                        <td><?php echo e(App\Student::h_grade(App\Student::average_per(App\Student::subject_total_jcat2($i,$class_->id,$term->id),($TCA_score * App\Student::checkNoStudent($term->id,$class_->id,$item->id,2))),$grades)); ?></td>
                        <?php endfor; ?>
                        
                        
                    </tr>   
                  </tbody>
                </table>
                <?php else: ?>
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
                        $no_of_subject = 0;
                        ?>     
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
                                     
                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <tr>
                        
                        <td><?php echo e($key + 1); ?></td>
                        <td><?php echo e($student->name); ?> <?php echo e($student->oname); ?>  <?php echo e($student->surname); ?></td>                    
                        <?php $__currentLoopData = $student->subjectMark->sortBy('subname'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item->term_id == $term->id && $item->s5_class_id == $class_->id): ?>                 
                            <td><?php echo e($item->CAT2); ?></td>
                            <?php
                                $total += $item->CAT2;
                                if($item->CAT2 != null){
                                    $no_of_subject += 1;
                                }
                            ?>  
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e($total); ?></td>
                        <td><?php echo e(App\Student::average($total,$no_of_subject)); ?></td>
                        <?php
                            $sum_total += $total;
                            $avg = App\Student::average($total,$no_of_subject);
                            $avgPer = App\Student::averPer($avg,$TCA_score);
                            $total = 0;
                            $no_of_subject =0;
                        ?>
                        <td><?php echo e(App\Student::averPer($avg,$TCA_score)); ?> </td>
                        <td><?php echo e(App\Student::h_grade($avgPer,$grades)); ?>  </td>
                       
                        
                    </tr>
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th></th>
                    </tr> 
                   
                     <tr>
                        <td></td>
                        <th>Total</th>
                        <?php $__currentLoopData = $subject->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e(App\Student::subject_total_cat2($item->id,$class_->id,$term->id)); ?> </td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e($sum_total); ?></td>
                        <td><?php echo e($min_t); ?></td>
                        <td><?php echo e($min_t_per); ?></td>
                        
                    </tr>
                    <tr>
                        <td></td>
                        <th>Max Score</th>
                        <?php $__currentLoopData = $subject->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e(App\Student::max_score_cat2($item->id,$class_->id,$term->id)); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </tr>
                    <tr>
                        <td></td>
                        <th>Min Score</th>
                        <?php $__currentLoopData = $subject->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <td><?php echo e(App\Student::min_score_cat2($item->id,$class_->id,$term->id)); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </tr> 
                    <tr>
                        <td></td>
                        <th>Class Average</th>
                        <?php $__currentLoopData = $subject->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e(App\Student::average_(App\Student::subject_total_cat2($item->id,$class_->id,$term->id),$term->id,$class_->id,$item->id,4)); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                       
                    </tr> 
                    <tr>
                        <td></td>
                        <th>Class Performance (%)</th>
                        <?php $__currentLoopData = $subject->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e(round(App\Student::average_per(App\Student::subject_total_cat2($item->id,$class_->id,$term->id),($TCA_score  * App\Student::checkNoStudent($term->id,$class_->id,$item->id,4))))); ?></td>
                        <?php
                            $cl_av += App\Student::average_per(App\Student::subject_total_cat2($item->id,$class_->id,$term->id),($TCA_score  * App\Student::checkNoStudent($term->id,$class_->id,$item->id,4)));
                        ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                       
                        
                    </tr> 
                    <tr>
                        <td></td>
                        <th>Remarks</th>
                        <?php $__currentLoopData = $subject->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e(App\Student::h_grade(App\Student::average_per(App\Student::subject_total_cat2($item->id,$class_->id,$term->id),($TCA_score  * App\Student::checkNoStudent($term->id,$class_->id,$item->id,4))),$grades)); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        
                    </tr> 
                  </tbody>
                </table>
                <?php endif; ?>
                
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
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/chiboy/lampstack-8.0.5-0/apache2/htdocs/efs/resources/views/results/cat2_broadsheet.blade.php ENDPATH**/ ?>