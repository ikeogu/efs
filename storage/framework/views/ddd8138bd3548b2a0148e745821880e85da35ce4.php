<!DOCTYPE html>
<html lang="en">

	<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/result.css')); ?>">
    <style>
		body{
			font-style: normal;
			font-weight:bolder;
			color:black;
		}
		table {
    border:solid #000 !important;
    border-width:1px 0 0 1px !important;
        }
        th, td {
            border:solid #000 !important;
            border-width:0 1px 1px 0 !important;
        }
        .rotate {
         transform: rotate(-90deg);
     
         /* Legacy vendor prefixes that you probably don't need... */
         /* Safari */
         -webkit-transform: rotate(-90deg);
         /* Firefox */
         -moz-transform: rotate(-90deg);
         /* IE */
         -ms-transform: rotate(-90deg);
         /* Opera */
         -o-transform: rotate(-90deg);
         /* Internet Explorer */
         filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
     }
     .table { font-size: 1rem; }
     
     @media (min-width: 576px) {
             .table { font-size: 1.25rem; }
     }
     @media (min-width: 576px) {
	.table { font-size: 1.25rem; }
		}
   
    .header th {
				line-height: 120px;
				font-size: 9px;
				font-weight: bolder;
				white-space: nowrap;
				overflow: hidden;
				text-overflow: ellipsis;
		
				padding: 0px !important;
				border: 3px solid black;
				width:aut0;
             
            }

    .word th{
            word-break: inherit;
    }
    td{
        font-size: 11px;
        font-weight: bolder;
        text-align: center;
        
         border:3px solid black
        
    }
     @media  print {
      #printPageButton,#back {
        display: none;
      }
    }
</style>
	</head>
<body> 

    <!-- details table -->
	<div class="d-flex justify-content-end">
        <button onclick="goBack()" class=" btn btn-warning text-white btn-block btn-sm"id="back"> Go Back</button>
        <form>
         <input type = "button" value = "Print" onclick = "window.print()" id="printPageButton"  class="btn btn-success btn-block btn-sm"/>
      </form>   
    </div>
  <section class="container my-5 p-1">
    
    <!-- main result table -->
    <div class="card " style="border: 2px solid black;">
      <div class="d-flex justify-content-center py-4 mb-2"><img src="<?php echo e(asset('img/logo2.png')); ?>" height="90" width="auto"></div>
			<div class="col-12 col-md-12 my-4 mx-auto p-0 card-body">
				<div >
					<div class="d-flex justify-content-center" style="border: 2px solid black;"> 
							<h3 class="text-uppercase text-bold">EmeraldField High School</h3>
					</div>
					<div class="d-flex justify-content-center" style="border:2px solid black;"> 
							<h3 class="text-uppercase text-bold">report sheet</h3>
					</div>
					<div class="row" style=""> 
						<div class="col-3">	
							<p class="text-uppercase text-bold">student's name:</p>
						</div>
						<div class="col-4">
							<p class="text-uppercase text-bold"> <?php echo e($student->name); ?>  <?php echo e($student->oname); ?> <?php echo e($student->surname); ?></p>
						</div>
						<div class="col-3">
							<p class="text-uppercase text-bold " style="font-size:10px;">Academic year:</p>
						</div>
						<div class="col-2">
							<p class="text-uppercase text-bold" style="font-size:10px;"><?php echo e($term->session); ?></p>
						</div>
					</div>
					<hr style="border-top: 2px solid black;">
					<div class="row" > 
					
							<div class="col-3">	
								<p class="text-uppercase text-bold">Class:</p>
							</div>
							<div class="col-4 ">
									<p class="text-uppercase text-bold"><?php echo e($class_->name); ?> <?php echo e($class_->description); ?></p>
							</div>
							<div class="col-3 d-flex justify-content-center">
									<p class="text-uppercase text-bold"><?php echo e($term->name); ?></p>
							</div>
					</div>
					<div class="row">
						<div class="col-lg-8 col-md-8">
							<div style="border: 1px solid black; font-size: 10px; font-weight: bolder;">
									<p class=""> ACADEMIC PROGRESS REPORT, SUMMARY AND TEST</p>
							</div>
							<div class=" table">
								<table class="table-md table-bordered table-stripped" cellpadding="0" cellspacing="0">
									<thead class="header word">
										
												
												<th class="text-uppercase text-center">Subject</th>
											    <th class="rotate text-uppercase  text-bold" style="font-size:">cat 1 <?php echo e($cat1); ?>%</th> 
												<th class="rotate text-uppercase  text-bold">cat 2 <?php echo e($cat2); ?>%</th>
												<th class="rotate text-uppercase  text-bold">MSC score <?php echo e($msc); ?>%</th> 
												<th class="rotate text-uppercase  text-bold">Exam score <?php echo e($exam); ?>%</th> 
												<th class="rotate text-uppercase  text-bold">Total score 100%</th> 
												<th class="rotate text-uppercase  text-bold" >highest score</th> 
												<th class="rotate text-uppercase  text-bold" >lowest score</th> 
												<th class="rotate text-uppercase  text-bold" >Remarks</th>
											
												
												
											
									</thead>
									<?php if($class_->status == 'Junior High School'): ?>
									<tbody>
										<?php
											$total = 0;
											$total_gt =0;
											$status = array();
											$emp = 0;
											$cnt = 0;
										?>
											
												<?php $__currentLoopData = $scores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<tr>	
													
													<?php if($item->term_id == $term->id && $item->s5_class_id == $class_->id): ?>
                           
														<?php if(!in_array($item->status,$status)): ?>
														  <?php
															$cat1 = App\SubjectMark::where('term_id',$term->id)->where('s5_class_id',$class_->id)->where('student_id',$student->id)->where('status',$item->status)->sum('CAT1');
															$cat2 = App\SubjectMark::where('term_id',$term->id)->where('s5_class_id',$class_->id)->where('student_id',$student->id)->where('status',$item->status)->sum('CAT2');
															$msc = App\SubjectMark::where('term_id',$term->id)->where('s5_class_id',$class_->id)->where('student_id',$student->id)->where('status',$item->status)->sum('MSC');
															$exam = App\SubjectMark::where('term_id',$term->id)->where('s5_class_id',$class_->id)->where('student_id',$student->id)->where('status',$item->status)->sum('Exam');
															$gt = App\SubjectMark::where('term_id',$term->id)->where('s5_class_id',$class_->id)->where('student_id',$student->id)->where('status',$item->status)->sum('GT');
															array_push($status,$item->status);
															 
														?>
													   
														<?php if($item->status ==1 ): ?>
															
															<td class="text-uppercase text-bold text-left">ENGLISH STUDIES</td>
															<td><?php echo e(round($cat1/2)); ?></td>
															<td><?php echo e(round($cat2/2)); ?></td>
															<td><?php echo e(round($msc/2)); ?></td>
															<td><?php echo e(round($exam/2)); ?></td>
															<td><?php echo e(round($gt/2)); ?></td>
															<?php
																$total_gt =round($gt/2);
															?>
														
														<?php elseif($item->status == 2): ?>
															
															<td class="">BASIC SCIENCE AND TECH</td>
															<td><?php echo e(round($cat1/4)); ?></td>
															<td><?php echo e(round($cat2/4)); ?></td>
															<td><?php echo e(round($msc/4)); ?></td>
															<td><?php echo e(round($exam/4)); ?></td>
															<td><?php echo e(round($gt/4)); ?></td>
															<?php
																$total_gt =round($gt/4);
																
															?>
														
														<?php elseif($item->status == 3): ?>
															
															<td class="">PREVOCATIONAL STUDIES</td>
															<td><?php echo e(round($cat1/2)); ?></td>
															<td><?php echo e(round($cat2/2)); ?></td>
															<td><?php echo e(round($msc/2)); ?></td>
															<td><?php echo e(round($exam/2)); ?></td>
															<td><?php echo e(round($gt/2)); ?></td>
															<?php
																$total_gt=round($gt/2);
																
															?>
													
														<?php elseif($item->status == 4): ?>
														
															
															<td class="">NATIONAL VALUES</td>
															<td><?php echo e(round($cat1/2)); ?></td>
															<td><?php echo e(round($cat2/2)); ?></td>
															<td><?php echo e(round($msc/2)); ?></td>
															<td><?php echo e(round($exam/2)); ?></td>
															<td><?php echo e(round($gt/2)); ?></td>
															<?php
																$total_gt =round($gt/2);
																
															?>
														
														<?php elseif($item->status ==5): ?>
															
															<td class="">CULTURAL AND CREATIVE ART</td>
															<td><?php echo e(round($cat1/3)); ?></td>
															<td><?php echo e(round($cat2/3)); ?></td>
															<td><?php echo e(round($msc/3)); ?></td>
															<td><?php echo e(round($exam/3)); ?></td>
															<td><?php echo e(round($gt/3)); ?></td>
															<?php
																$total_gt =round($gt/3);
															?>
														
														
														<?php elseif($item->status ==6): ?>
															
															<td class="">BUSINESS STUDIES</td>
															<td> <?php echo e($item->CAT1); ?></td>
															<td> <?php echo e($item->CAT2); ?></td>
															<td> <?php echo e($item->MSC); ?></td>
															<td> <?php echo e($item->Exam); ?></td>
															<td> <?php echo e($item->GT); ?></td>
															<?php
																$total_gt = round($item->GT);
																	
															?>
														
														<?php elseif($item->status ==7): ?>
														
															<td class="">FRENCH</td>
															<td> <?php echo e($item->CAT1); ?></td>
															<td> <?php echo e($item->CAT2); ?></td>
															<td> <?php echo e($item->MSC); ?></td>
															<td> <?php echo e($item->Exam); ?></td>
															<td> <?php echo e($item->GT); ?></td>
															<?php
																$total_gt = round($item->GT);
																	
															?>
												
														<?php elseif($item->status ==8): ?>
															
															<td class="">MATHEMATICS</td>
											
															<td> <?php echo e($item->CAT1); ?></td>
															<td> <?php echo e($item->CAT2); ?></td>
															<td> <?php echo e($item->MSC); ?></td>
															<td> <?php echo e($item->Exam); ?></td>
															<td> <?php echo e($item->GT); ?></td>
															<?php
																$total_gt = round($item->GT);
																	
															?>
														
														<?php elseif($item->status ==9): ?>
																
															
															<td class="">RELIGIOUS STUDIES</td>
															<td> <?php echo e($item->CAT1); ?></td>
															<td> <?php echo e($item->CAT2); ?></td>
															<td> <?php echo e($item->MSC); ?></td>
															<td> <?php echo e($item->Exam); ?></td>
															<td> <?php echo e($item->GT); ?></td>
															<?php
																$total_gt = round($item->GT);
																	
																	if($item->CAT1 == null &&  $item->MSC == null && $item->Exam == null)
																		$emp = 1;
															?>
															
													
														<?php elseif($item->status ==10): ?>    
															
															<td>HANDWRITING</td>
															<td> <?php echo e($item->CAT1); ?></td>
															<td> <?php echo e($item->CAT2); ?></td>
															<td> <?php echo e($item->MSC); ?></td>
															<td> <?php echo e($item->Exam); ?></td>
															<td> <?php echo e($item->GT); ?></td>
															<?php
																$total_gt = round($item->GT);
																	
															?>
															
														<?php endif; ?>
														
													   <?php
    													   
    																		
    												       if($emp == 1){
    														   $cnt =count($status) - 1;
    													   }else{
    														   $cnt = count($status);
    													   }
    													   $total +=$total_gt;	
													   ?>
												         <td><?php echo e(round(App\Student::max_score_jGT($item->status,$term->id,$class_->id))); ?></td>
    													<td><?php echo e(round(App\Student::min_score_jGT($item->status,$term->id,$class_->id))); ?></td>
    													<td><?php echo e(App\Student::h_grade($total_gt,$grades)); ?></td>
													   <?php endif; ?>


													<?php endif; ?>
												</tr>	
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>						
											
									
											<tr>
												<td class="text-uppercase text-left">Student's Total Score</td>
												<td colspan="8"><?php echo e($total); ?></td>	
														
											</tr>
											<tr>
											<td class="text-uppercase text-left">Average</td>
												<td colspan="8"><?php echo e(App\Student::average($total,$cnt)); ?></td>			
										</tr>
										<tr>
											<td class="text-uppercase">Remark</td>
												<td colspan='8'><?php echo e(App\Student::h_grade(App\Student::average($total,$cnt),$grades)); ?></td>
												
											
										</tr>
										<tr>
											<td style="border: hidden;" class="text-uppercase text-bold text-left" colspan="5">Class teacher's remark:</td>
										</tr>
										<tr style="">
											<td colspan="8">
												<?php if($comment != null): ?>
													<p><?php echo e($comment->comment); ?></p>
												<?php endif; ?>
											</td>	
										</tr>
										
										<tr>
											<td style="border: hidden;" class="text-uppercase text-bold text-left" colspan="5"> President's remark:</td>
										</tr>
										<tr style="border-right: hidden;">
												<td colspan="8" >
													<?php if($comment != null): ?>
													<p><?php echo e($comment->hcomment); ?></p>
													<?php endif; ?>
												</td>	
										</tr>
										
										
										
										
										
									</tbody>
									<?php else: ?>
									<tbody>
										<?php
											$total = 0;
											$no_of_subject = 0;
										?>
											
												<?php $__currentLoopData = $scores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												
													<?php if($item->CAT1 != null): ?>
													<tr>	
														<td class="text-uppercase text-bold text-left"><?php echo e($item->subname); ?></td>
														<td><?php echo e($item->CAT1); ?></td>
														<td><?php echo e($item->CAT2); ?></td>
														<td><?php echo e($item->MSC); ?></td>
														<td><?php echo e($item->Exam); ?></td>
														<td><?php echo e($item->GT); ?></td>
														<?php
															$total +=$item->GT;
														if($item->GT != null && $item->CAT1 != null){
															$no_of_subject += 1;
														}	
														?>
														<td><?php echo e(App\Student::h_max_score($item->subject_id,$class_->id,$term->id)); ?></td>
														<td><?php echo e(App\Student::h_min_score($item->subject_id,$class_->id,$term->id)); ?></td>
														<td><?php echo e(App\Student::h_grade($item->GT,$grades)); ?></td>
													</tr>
													<?php endif; ?>
													
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													
											
											
									
											<tr>
												<td class="text-uppercase text-left">Student's Total Score</td>
												<td colspan="8"><?php echo e($total); ?></td>	
														
											</tr>
											<tr>
											<td class="text-uppercase text-left">Average</td>
												<td colspan="8"><?php echo e(App\Student::average($total,$no_of_subject)); ?></td>			
										</tr>
										<tr>
											<td class="text-uppercase">Remark</td>
												<td colspan='8'><?php echo e(App\Student::h_grade(App\Student::average($total,$no_of_subject),$grades)); ?></td>
												
											
										</tr>


										<tr>
											<td style="border: hidden;" class="text-uppercase text-bold text-left" colspan="5">Class teacher's remark:</td>
										</tr>
										<tr style="">
												<td colspan="8">
													<?php if($comment != null): ?>
														<p><?php echo e($comment->comment); ?></p>
													<?php endif; ?>
												</td>	
										</tr>
										
										<tr>
											<td style="border: hidden;" class="text-uppercase text-bold text-left" colspan="5"> President's remark:</td>
										</tr>
										<tr style="border-right: hidden;">
												<td colspan="8" >
													<?php if($comment != null): ?>
													<p><?php echo e($comment->hcomment); ?></p>
													<?php endif; ?>
												</td>
										</tr>
										
																
									</tbody>
									<?php endif; ?>
								</table>
								
							</div>				
						</div>
						<div class="col-md-4 col-lg-4">
							<div style="border: 1px solid black; font-size: 10px; font-weight: bolder;">
									<p >AFFECTIVE ASSESSMENT (VALUE,INTEREST,CHARACTER)</p>
							</div>
							<div class="d-flex justify-content-right" >
								<table class="table-sm table table-bordered table-hover table-condensed">
									<thead class="header">
												<th class=" text-uppercase text-center" > behaviour</th> 
												<th class=" text-uppercase text-center" colspan="4" >
													grading
												</th>
														
												<th class=" text-uppercase" ></th> 
												<th class=" text-uppercase"></th> 
									</thead>
									<tbody>
											<tr>
													<td></td>
													
														<td>
																A
														</td>
														<td >
																B
														</td>
														<td >
																C
														</td>
														<td >
																D
														</td>

											</tr>
											
											<tr>
												<td class=" text-uppercase text-left"> Home Work Culture</td>

													<?php if($behave != null): ?>
													 <h3 class="text-bold"><?php echo e(App\Student::h_behave($behave->hwc)); ?></h3>
													<?php endif; ?>
											</tr>
											<tr>
												<td class=" text-uppercase text-left"> Class Attendance</td>
												<?php if($behave != null): ?>
												<h3 class="text-bold"><?php echo e(App\Student::h_behave($behave->catt)); ?></h3>
												<?php endif; ?>
											</tr>
											<tr>
												<td class=" text-uppercase text-left"> Care (School Property)</td>
													<?php if($behave != null): ?>
													<h3 class="text-bold"><?php echo e(App\Student::h_behave($behave->care)); ?></h3>
													<?php endif; ?>
											</tr>
											<tr>
												<td class=" text-uppercase text-left"> Responsibility</td>
													<?php if($behave != null): ?>
													<h3 class="text-bold"><?php echo e(App\Student::h_behave($behave->res)); ?></h3>
													<?php endif; ?>
											</tr>
											<tr>
												<td class=" text-uppercase text-left"> Honesty</td>
													<?php if($behave != null): ?>
													<h3 class="text-bold"><?php echo e(App\Student::h_behave($behave->Hon)); ?></h3>
													<?php endif; ?>
											</tr>
											<tr>
												<td class=" text-uppercase text-left"> Initiative</td>
												<?php if($behave != null): ?>
												<h3 class="text-bold">	<?php echo e(App\Student::h_behave($behave->init)); ?></h3>
												<?php endif; ?>
											</tr>
											<tr>
												<td class=" text-uppercase text-left"> Leadership Role</td>
												<?php if($behave != null): ?>
												<h3 class="text-bold"><?php echo e(App\Student::h_behave($behave->lead)); ?></h3>
												<?php endif; ?>
												
											</tr>
											<tr>
												<td class=" text-uppercase text-left"> Dress Code</td>
												<?php if($behave != null): ?>
												<h3 class="text-bold">	<?php echo e(App\Student::h_behave($behave->dressc)); ?></h3>
												<?php endif; ?>
												</tr>
											<tr>
												<td class=" text-uppercase text-left"> Obedience</td>
												<?php if($behave != null): ?>
												<h3 class="text-bold">	<?php echo e(App\Student::h_behave($behave->obey)); ?></h3>
												<?php endif; ?>
											</tr>
											<tr>
												<td class=" text-uppercase text-left"> Politeness</td>
												<?php if($behave != null): ?>
												<h3 class="text-bold">	<?php echo e(App\Student::h_behave($behave->pol)); ?></h3>
													
												<?php endif; ?>
											</tr>
											<tr>
												<td class=" text-uppercase text-left"> Team Spirit</td>
													
												<?php if($behave != null): ?>
												<h3 class="text-bold">	<?php echo e(App\Student::h_behave($behave->team)); ?> </h3>
												<?php endif; ?>
											</tr>
											<tr>
												<td class=" text-uppercase text-left"> Socialbility</td>
												<?php if($behave != null): ?>
												<h3 class="text-bold"><?php echo e(App\Student::h_behave($behave->soc)); ?></h3>
												<?php endif; ?>
											</tr>
											<tr>
												<td class=" text-uppercase text-left"> PSYCHOMOTOR SKILLS
													&  PHYSICAL SKILLS</td>
													<?php if($behave != null): ?>
													<h3 class="text-bold">	<?php echo e(App\Student::h_behave($behave->psy)); ?></h3>
													<?php endif; ?>
											</tr>
											<tr>
												<td class=" text-uppercase text-left"> Sport</td>
												<?php if($behave != null): ?>
												<h3 class="text-bold"><?php echo e(App\Student::h_behave($behave->sport)); ?></h3>
												<?php endif; ?>
											</tr>
											<tr>
												<td class=" text-uppercase text-left"> Notes Completion</td>
												<?php if($behave != null): ?>
												<h3 class="text-bold"><?php echo e(App\Student::h_behave($behave->notec)); ?></h3>
												<?php endif; ?>
											</tr>
											<tr>
												<td class=" text-uppercase text-left"> Spoken English</td>
													<?php if($behave != null): ?>
													<h3 class="text-bold"><?php echo e(App\Student::h_behave($behave->spoken)); ?></h3>
													<?php endif; ?>
											</tr>
											<tr>
												<td class=" text-uppercase text-left"> Musical Skill</td>
												<?php if($behave != null): ?>
												<h3 class="text-bold">	<?php echo e(App\Student::h_behave($behave->mus)); ?></h3>
												<?php endif; ?>
											</tr>
											<tr>
												<td class=" text-uppercase text-left"> Craft</td>
												<?php if($behave != null): ?>
												<h3 class="text-bold"><?php echo e(App\Student::h_behave($behave->craft)); ?></h3>
												<?php endif; ?>	
		
											</tr>
											<tr >
											
												<td></td>
												<td style="border-right:hidden" colspan="4">
														<strong class="text-uppercase text-center text-bolder" > grading</strong>
												</td>
													
											</tr>
											<tr >
											
												<td></td>
												<td>
													<strong class="text-uppercase text-center text-bolder">a</strong>
												</td>
												<td style="font-size: 10px;" class="text-left">A1 86-100%</td>
												<td style="border-bottom:hidden; font-size: 8px;" class="text-center text-bolder">D</td>
												<td style="font-size: 10px;">D7 46-59%</td>
											</tr>
											<tr >
											
												<td></td>
												<td>
													<strong class="text-uppercase text-center text-bolder"></strong>
												</td>
												<td style="font-size: 10px;" class="text-left"></td>
												<td style="border-bottom:hidden; font-size: 8px;" class="text-center text-bolder"></td>
												<td style="font-size: 10px;"></td>
											</tr>
											<tr >
											
												<td></td>
												<td>
													<strong class="text-uppercase text-center text-bolder"></strong>
												</td>
												<td style="font-size: 10px;" class="text-left">B2 80-85%</td>
												<td style="border-bottom:hidden; font-size: 8px;" class="text-center text-bolder">E</td>
												<td style="font-size: 10px;">E8 40-45%</td>
											</tr>
											<tr >
											
												<td></td>
												<td style="border-top:hidden;">
													<strong class="text-uppercase text-center text-bolder" >B</strong>
												</td>
												<td style="font-size: 10px;" class="text-left">B3 76-79%</td>
												<td style="border-bottom:hidden; font-size: 8px;" class="text-center text-bolder"></td>
												<td style="font-size: 10px;"></td>
											</tr>
											<tr >
											
												<td></td>
												<td>
													<strong class="text-uppercase text-center text-bolder"></strong>
												</td>
												<td style="font-size: 10px;" class="text-left"></td>
												<td style="border-bottom:hidden; font-size: 8px;" class="text-center text-bolder"></td>
												<td style="font-size: 10px;"></td>
											</tr>
											<tr >
											
												<td></td>
												<td>
													<strong class="text-uppercase text-center text-bolder">C</strong>
												</td>
												<td style="font-size: 10px;" class="text-left">C4 70-75%</td>
												<td style="border-bottom:hidden; font-size: 8px;" class="text-center text-bolder">F</td>
												<td style="font-size: 10px;">F9 0-39%</td>
											</tr>
											<tr >
											
												<td></td>
												<td style="border-top:hidden;">
													<strong class="text-uppercase text-center text-bolder" ></strong>
												</td>
												<td style="font-size: 10px;" class="text-left">C5 66-69%</td>
												<td style="border-bottom:hidden; font-size: 8px;" class="text-center text-bolder"></td>
												<td style="font-size: 10px;"></td>
											</tr>
											<tr >
											
												<td></td>
												<td style="border-top:hidden;">
													<strong class="text-uppercase text-center text-bolder" ></strong>
												</td>
												<td style="font-size: 10px;" class="text-left">C6 60-65%</td>
												<td style="border-bottom:hidden; font-size: 8px;" class="text-center text-bolder"></td>
												<td style="font-size: 10px;"></td>
												
											</tr>
										
											    <?php if($term->session == '2020/2021' && $term->name == 'Term III'): ?>
											     <tr>
											     	<?php if($class_->name == 'J.S.S 1'): ?>
												    <td colspan="5" class="text-left text-bold text-uppercase">
													    School Fee: ₦180,000
												    </td>
    												<?php elseif($class_->name == 'J.S.S 2'): ?>
    												<td colspan="5" class="text-left text-bold text-uppercase">
    													School Fee: ₦260,000
    												</td>
    													<?php elseif($class_->name == 'S.S.S 1'): ?>
    												    <td colspan="5" class="text-left text-bold text-uppercase">
    												    	School Fee: ₦197,000
    												    </td>
    													<?php elseif($class_->name == 'S.S.S 2'): ?>
    												    <td colspan="5" class="text-left text-bold text-uppercase">
    												    	School Fee: ₦317,000
    												    </td>
    												<?php elseif($class_->name == 'S.S.S 3'): ?>
    												    <td colspan="5" class="text-left text-bold text-uppercase">
    													School Fee: ₦<?php echo e(number_format($term->fee_s3)); ?>

    												</td>
    												<?php endif; ?>
    										<?php else: ?>
												<?php if($class_->name == 'J.S.S 1'): ?>
												    <td colspan="5" class="text-left text-bold text-uppercase">
													    School Fee: ₦<?php echo e(number_format($term->jss1)); ?>

												    </td>
													<?php elseif($class_->name == 'J.S.S 2'): ?>
												    <td colspan="5" class="text-left text-bold text-uppercase">
													    School Fee: ₦<?php echo e(number_format($term->jss2)); ?>

												    </td>
												<?php elseif($class_->name == 'J.S.S 3'): ?>
												<td colspan="5" class="text-left text-bold text-uppercase">
													School Fee: ₦<?php echo e(number_format($term->jss3)); ?>

												</td>
													<?php elseif($class_->name == 'S.S.S 1'): ?>
												    <td colspan="5" class="text-left text-bold text-uppercase">
												    	School Fee: ₦<?php echo e(number_format($term->ss1)); ?>

												    </td>
													<?php elseif($class_->name == 'S.S.S 2'): ?>
												    <td colspan="5" class="text-left text-bold text-uppercase">
												    	School Fee: ₦<?php echo e(number_format($term->ss2)); ?>

												    </td>
												<?php elseif($class_->name == 'S.S.S 3'): ?>
												    <td colspan="5" class="text-left text-bold text-uppercase">
													School Fee: ₦<?php echo e(number_format($term->ss3)); ?>

												</td>
												<?php endif; ?>
											</tr>
											<?php endif; ?>
											<tr>
												<td colspan="5" class="text-left text-bold text-uppercase">
													Next term Begins: <?php echo e(date('l, jS F, Y',strtotime($term->resumption_date))); ?>

												</td>
											</tr>
											
									</tbody>
								</table>
							</div>						
						</div>
					</div>
				</div>
				
			</div>
		</div>	
	</section>
	<script>
		function goBack() {
			window.history.back();
		}
	</script>
 
</body>
</html><?php /**PATH /home/ishledpg/efs/resources/views/results/h_result.blade.php ENDPATH**/ ?>