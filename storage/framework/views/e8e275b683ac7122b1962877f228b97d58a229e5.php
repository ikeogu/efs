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

    th.rotated {
        /* height: 140px; */
        white-space: nowrap;
        padding: 0 !important;
        font-size:14.5px;
        
    }

    th.rotated > div {
        transform:
            translate(13px, 0px)
            rotate(-90deg);
            text-align:center;
            /* line-height: 16px; */
        /* width: 30px; */
    }

    th.rotated > div > span {
        /* padding: 5px 10px; */
    }
    table {
        
            table-layout : auto;
            width:100%;
            border-collapse:separate; 
            border-spacing:0.1em
        }
    </style>
<body>

    <div class=" bg-success text-capitalize text-white">Exam broadSheet <?php echo e($data['class_']->name); ?>|   <?php echo e($data['class_']->description); ?>  | <?php echo e($data['term']->name); ?>|  <?php echo e($data['term']->session); ?></div>
    <?php if($data['class_']->status == 'Junior High School'): ?>
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
                    asort($data['subject_status']);
               ?>
        <table  class="table-striped table-bordered table-condensed">
                <thead class="membership-tiers">
                <tr>
                    <th scope="col">#</th>
                    <th class="rotate" scope="col"><div><span>Name</span></div></th>
                    <?php $__currentLoopData = $data['subject_status']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($sta == 1): ?>
                            <th class="rotate" scope="col"><div><span>ENGLISH STUDIES</span></div></th>
                         <?php elseif($sta == 2): ?>
                            <th class="rotate" scope="col"><div><span>BASIC SCIENCE AND TECH</span></div></th>
                        <?php elseif($sta == 3): ?>
                            <th class="rotate" scope="col"><div><span>PREVOCATIONAL STUDIES</span></div></th>
                         <?php elseif($sta == 4): ?>
                            <th class="rotate" scope="col"><div><span>NATIONAL VALUES</span></div></th>
                         <?php elseif($sta == 5): ?>
                            <th class="rotated" scope="col"><div><span>C.C.A</span></div></th>
                        <?php elseif($sta == 6): ?>
                            <th class="rotate" scope="col"><div><span>BUSINESS STUDIES</span></div></th>
                         <?php elseif($sta == 7): ?>
                            <th class="rotate" scope="col"><div><span>FRENCH</span></div></th>
                        <?php elseif($sta == 8): ?>
                            <th class="rotate" scope="col"><div><span>MATHEMATICS</span></div></th>
                        <?php elseif($sta == 9): ?>
                             <th class="rotate" scope="col"><div><span>RELIGIOUS STUDIES</span></div></th>
                        <?php elseif($sta == 10): ?>
                            <th class="rotate" scope="col"><div><span>HANDWRITING</span></div></th>
                        
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <th class="rotated" scope="col"><div><span>Total</span></div></th>
                      <th class="rotated" scope="col"><div><span>Average</span></div></th>
                       <th class="rotated" scope="col"><div><span>Average(%)</span></div></th>
                        <th class="rotated" scope="col"><div><span>Remarks</span></div></th>
                                        
                </tr>
           
          <tbody>
                <?php $__currentLoopData = $data['students']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <tr>
                    
                        <td>
                            <p><?php echo e($key + 1); ?> </p> </td>
                    <td><?php echo e($student->name); ?> <?php echo e($student->oname); ?>  <?php echo e($student->surname); ?></td>                    
                    <?php $__currentLoopData = $student->subjectMark->sortBy('status'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($item->term_id == $data['term']->id && $item->s5_class_id == $data['class_']->id): ?>
                        <?php if(!in_array($item->status,$status)): ?>
                            <?php
                                $sum = App\SubjectMark::where('term_id',$data['term']->id)->where('s5_class_id',$data['class_']->id)->where('student_id',$student->id)->where('status',$item->status)->sum('Exam');
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
                                    <td> <?php echo e($item->Exam); ?></td>
                                        <?php
                                        $total_sum =$item->Exam;
                                        
                                        ?>
                                <?php endif; ?>
                                    <?php if($item->status ==7): ?>
                                    <td> <?php echo e($item->Exam); ?></td>
                                        <?php
                                        $total_sum =$item->Exam;
                                        
                                        ?>
                                <?php endif; ?>
                                <?php if($item->status ==8): ?>
                                    <td> <?php echo e($item->Exam); ?></td>
                                        <?php
                                        $total_sum =$item->Exam;
                                        
                                        ?>
                                <?php endif; ?>
                                    <?php if($item->status ==9): ?>
                                    <td> <?php echo e($item->Exam); ?></td>
                                        <?php
                                        $total_sum =$item->Exam;
                                        if($item->Exam == null){
                                        $h  = 2;
                                        }
                                        ?>
                                <?php endif; ?>
                                    <?php if($item->status ==10): ?>
                                    <td> <?php echo e($item->Exam); ?></td>
                                        <?php
                                        $total_sum =$item->Exam;
                                        
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
                        $avgPer = App\Student::averPer($avg,$TCA_score );
                        $total = 0;
                        
                        $status = array();
                        $h = 0;
                    ?>
                    <td><?php echo e(App\Student::averPer($avg,$TCA_score )); ?> </td>
                    <td><?php echo e(App\Student::h_grade($avgPer,$data['grades'])); ?>  </td>
                </tr>  
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th></th>
                </tr> 
                
                    <tr>
                    <td></td>
                    <td>Total</td>
                    <?php for($i = 1; $i <= 10; $i++): ?>
                    <td><?php echo e(round(App\Student::subject_total_jExam($i,$data['class_']->id,$data['term']->id))); ?> </td>
                    <?php endfor; ?>
                    <td><?php echo e($sum_total); ?></td>
                    <td><?php echo e($min_t); ?></td>
                    <td><?php echo e($min_t_per); ?></td>
                    
                </tr>
                <tr>
                    <td></td>
                    <td>Max Score</td>
                    <?php for($i = 1; $i <= 10; $i++): ?>
                    <td><?php echo e(round(App\Student::max_score_jExam($i,$data['term']->id,$data['class_']->id))); ?></td>
                    <?php endfor; ?>
                    
                </tr>
                <tr>
                    <td></td>
                    <td>Min Score</td>
                    <?php for($i = 1; $i <= 10; $i++): ?>
                            <td><?php echo e(round(App\Student::min_score_jExam($i,$data['term']->id,$data['class_']->id))); ?></td>
                    <?php endfor; ?>
                    
                </tr> 
                <tr>
                    <td></td>
                    <td>Class Average</td>
                    <?php for($i = 1; $i <= 10; $i++): ?>
                    <td><?php echo e(App\Student::average(App\Student::subject_total_jExam($i,$data['class_']->id,$data['term']->id),App\Student::checkNoJStudent($i,$data['term']->id,$data['class_']->id,6))); ?></td>
                    <?php endfor; ?>
                    
                    
                </tr> 
                <tr>
                    <td></td>
                    <td>Class Performance (%)</td>
                    <?php for($i = 1; $i <= $cnt; $i++): ?>
                    <td><?php echo e(round(App\Student::average_per(App\Student::subject_total_jExam($i,$data['class_']->id,$data['term']->id),($TCA_score  * App\Student::checkNoJStudent($i,$data['term']->id,$data['class_']->id,6))))); ?></td>
                    <?php
                        $cl_av += App\Student::average_per(App\Student::subject_total_jExam($item->id,$data['class_']->id,$data['term']->id),($TCA_score  * App\Student::checkNoJStudent($i,$data['term']->id,$data['class_']->id,6)));
                    ?>
                    <?php endfor; ?>
                    <td><?php echo e(App\Student::average($cl_av, App\Student::checkNoJStudent($i,$data['term']->id,$data['class_']->id,6))); ?></td>
                        
                    
                    
                </tr> 
                <tr>
                    <td></td>
                    <td>Remarks</td>
                    <?php for($i = 1; $i <= $cnt; $i++): ?>
                    <td><?php echo e(App\Student::h_grade(App\Student::average_per(App\Student::subject_total_jExam($i,$data['class_']->id,$data['term']->id),($TCA_score  * App\Student::checkNoJStudent($i,$data['term']->id,$data['class_']->id,6))),$data['grades'])); ?></td>
                    <?php endfor; ?>
                    
                    
                </tr>   
          </tbody>
       </table>

       <?php else: ?>
             <?php
               $total = 0;
               $sum_total = 0;
               $min_t = 0;
               $min_t_per = 0;
               $cl_av = 0;
               $no_of_subject = 0;
            ?>   
       <table  class="table-striped table-bordered m-0 table-condensed">
           <thead class="header">
               <tr>
                    <th scope="col">#</th>
                    <th class="rotate" scope="col"><div><span>Name</span></div></th>
                 
                    <?php $__currentLoopData = $data['subject']->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                    <th class="rotate" scope="col"><div><span><?php echo e($item->name); ?><</span></div></th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <th class="rotate">Total</th>
                    <th class="rotate">Average</th>  
                    <th class="rotate">Average(%)</th> 
                    <th class="rotate">Remarks</th> 
               </tr>
           </thead>
                            
           <?php $__currentLoopData = $data['students']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           
           <tr>
               
               <td><?php echo e($key + 1); ?></td>
               <td><?php echo e($student->name); ?> <?php echo e($student->oname); ?>  <?php echo e($student->surname); ?></td>                    
               <?php $__currentLoopData = $student->subjectMark->sortBy('subname'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php if($item->term_id == $data['term']->id && $item->s5_class_id == $data['class_']->id): ?>                 
                   <td><?php echo e($item->Exam); ?></td>
                   <?php
                       $total += $item->Exam;
                       if($item->Exam != null){
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
                   $avgPer = App\Student::averPer($avg,$TCA_score );
                   $total = 0;
                   $no_of_subject =0;
               ?>
               <td><?php echo e(App\Student::averPer($avg,$TCA_score )); ?> </td>
               <td><?php echo e(App\Student::grade($avgPer,$data['grades'])); ?>  </td>
              
               
           </tr>
           
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           <tr>
               <th></th>
           </tr> 
          
            <tr>
               <td></td>
               <td>Total</td>
               <?php $__currentLoopData = $data['subject']->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <td><?php echo e(App\Student::subject_total_Exam($item->id,$data['class_']->id,$data['term']->id)); ?> </td>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <td><?php echo e($sum_total); ?></td>
               <td><?php echo e($min_t); ?></td>
               <td><?php echo e($min_t_per); ?></td>
               
           </tr>
           <tr>
               <td></td>
               <td>Max Score</td>
               <?php $__currentLoopData = $data['subject']->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <td><?php echo e(App\Student::max_score_Exam($item->id,$data['class_']->id,$data['term']->id)); ?></td>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               
           </tr>
           <tr>
               <td></td>
               <td>Min Score</td>
               <?php $__currentLoopData = $data['subject']->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td><?php echo e(App\Student::min_score_Exam($item->id,$data['class_']->id,$data['term']->id)); ?></td>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               
           </tr> 
          <tr>
                        <td></td>
                        <td>Class Average</td>
                        <?php $__currentLoopData = $data['subject']->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e(App\Student::average_(App\Student::subject_total_Exam($item->id,$data['class_']->id,$data['term']->id),$data['term']->id,$data['class_']->id,$item->id,6)); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                       
                    </tr> 
                    <tr>
                        <td></td>
                        <td>Class Performance (%)</td>
                        <?php $__currentLoopData = $data['subject']->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e(round(App\Student::average_per(App\Student::subject_total_Exam($item->id,$data['class_']->id,$data['term']->id),($TCA_score  * App\Student::checkNoStudent($data['term']->id,$data['class_']->id,$item->id,6))))); ?></td>
                        <?php
                            $cl_av += App\Student::average_per(App\Student::subject_total_Exam($item->id,$data['class_']->id,$data['term']->id),($TCA_score  * App\Student::checkNoStudent($data['term']->id,$data['class_']->id,$item->id,6)));
                        ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                       
                        
                    </tr> 
                    <tr>
                        <td></td>
                        <td>Remarks</td>
                        <?php $__currentLoopData = $data['subject']->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e(App\Student::grade(App\Student::average_per(App\Student::subject_total_Exam($item->id,$data['class_']->id,$data['term']->id),($TCA_score  * App\Student::checkNoStudent($data['term']->id,$data['class_']->id,$item->id,6))),$data['grades'])); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        
                    </tr> 
         </tbody>
       </table>
       <?php endif; ?>
       
     </div>
         
    </div>

</body>
</html>
<?php /**PATH /home/chiboy/lampstack-8.0.5-0/apache2/htdocs/efs/resources/views/pdf/exam.blade.php ENDPATH**/ ?>