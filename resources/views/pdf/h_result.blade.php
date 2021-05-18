
<!DOCTYPE html>
<html lang="en">

	<head>
			<meta charset="UTF-8">
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="stylesheet" href="css/bootstrap.min.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/result.css">
			<link rel="stylesheet" href="css/style.css">
			<style>
				body{
					font-style: normal;
					font-weight:bolder;
					color:black;
					border: 2px solid black;
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
											line-height: 130px;
											font-size: 8px;
											font-weight: bolder;
											white-space: nowrap;
											overflow: hidden;
											text-overflow: ellipsis;
							
											padding: 0px !important;
									
									}

					.word th{
									word-break: inherit;
					}
					td{
							font-size: 8px;
							font-weight: bolder;
							text-align: center;
					}
			</style>
	</head>
	<body>


    <!-- details table -->
		<section class="container-fluid">
			<div class="" >
				<header>          
					<img src="img/logo2.png" alt="image" style="height: 100px; width:auto;" class="img">                
				</header>
				<div class="col-12 col-md-12 my-4 mx-auto p-0 ">
					<div >
						<div class="" style="border: 1px solid black;"> 
								<h3 class="text-uppercase text-bold text-center">EmeraldField High School</h3>
						</div>
						<div class="" style="border: 1px solid black;"> 
								<h3 class="text-uppercase text-bold text-center">report sheet</h3>
						</div>
						<div class="row" > 
							<div class="col-3 float-left">	
								<p class="text-uppercase text-bold  ">student's name :</p>
							</div>
							<div class="col-4 t">
								<p class="text-uppercase text-bold text-center"> {{$student->name}}  {{$student->oname}} {{$student->surname}}</p>
							</div>
							<div class="col-2 t">
								<p class="text-uppercase text-bold" style="font-size:10px;">Academic<br> year:</p>
							</div>
							<div class="col-3 float-right">
								<h6 class="text-uppercase text-bold " style="font-size:10px;">{{$term->session}}</h6>
							</div>
						</div>
						<hr>
						<div class="row p-0"> 
								<div class="col-3 float-left">	
									<p class="text-uppercase text-bold">Class:</p>
								</div>
								<div class="col-4 t">
										<p class="text-uppercase text-bold">{{$class_->name}} {{$class_->description}}</p>
								</div>
								<div class="col-3 ">
										<p class="text-uppercase text-bold">{{$term->name}}</p>
								</div>
						</div>
						<div class="row">
							<div class="col-7">
								<div style="border: 2px solid black; font-size: 10px; font-weight: bolder;">
										<p class=""> ACADEMIC PROGRESS REPORT, SUMMARY AND TEST</p>
								</div>
								<div class="d-flex justify-content-left table ">
									<table class="table-md table table-bordered  table-condensed table-stripped">
										<thead class="header word">
											
													
													<th class="rotate"></th>  
													<th class="rotate text-uppercase" > cat 1 ({{$cat1}}%)</th> 
													<th class="rotate text-uppercase" >cat 2 ({{$cat2}}%)</th>
													<th class="rotate text-uppercase" >MSC score ({{$msc}}%)</th> 
													<th class="rotate text-uppercase">Exam score ({{$exam}}%)</th> 
													<th class="rotate text-uppercase" >Total score (100%)</th> 
													<th class="rotate text-uppercase" >Class highest score (100%)</th> 
													<th class="rotate text-uppercase" >Class lowest score (100%)</th> 
													<th class="rotate text-uppercase">Remarks</th>
												
										</thead>
										@if ($class_->status == 'Junior High School')
										<tbody>
											@php
												$total = 0;
												$total_gt =0;
												$status = array();
												$emp = 0;
												$cnt = 0;
											@endphp
												
													@foreach ($scores as $key => $item)
													<tr>	
														
														@if($item->term_id == $term->id && $item->s5_class_id == $class_->id)
														 
															@if(!in_array($item->status,$status))
																@php
																$cat1 = App\SubjectMark::where('term_id',$term->id)->where('s5_class_id',$class_->id)->where('student_id',$student->id)->where('status',$item->status)->sum('CAT1');
																$cat2 = App\SubjectMark::where('term_id',$term->id)->where('s5_class_id',$class_->id)->where('student_id',$student->id)->where('status',$item->status)->sum('CAT2');
																$msc = App\SubjectMark::where('term_id',$term->id)->where('s5_class_id',$class_->id)->where('student_id',$student->id)->where('status',$item->status)->sum('MSC');
																$exam = App\SubjectMark::where('term_id',$term->id)->where('s5_class_id',$class_->id)->where('student_id',$student->id)->where('status',$item->status)->sum('Exam');
																$gt = App\SubjectMark::where('term_id',$term->id)->where('s5_class_id',$class_->id)->where('student_id',$student->id)->where('status',$item->status)->sum('GT');
																array_push($status,$item->status);
																 
															@endphp
															 
															@if($item->status ==1 )
																
																<td class="text-uppercase text-bold text-left">ENGLISH STUDIES</td>
																<td>{{round($cat1/2)}}</td>
																<td>{{round($cat2/2)}}</td>
																<td>{{round($msc/2)}}</td>
																<td>{{round($exam/2)}}</td>
																<td>{{round($gt/2)}}</td>
																@php
																	$total_gt =round($gt/2);
																@endphp
															
															@elseif($item->status == 2)
																
																<td class="">BASIC SCIENCE AND TECH</td>
																<td>{{round($cat1/4)}}</td>
																<td>{{round($cat2/4)}}</td>
																<td>{{round($msc/4)}}</td>
																<td>{{round($exam/4)}}</td>
																<td>{{round($gt/4)}}</td>
																@php
																	$total_gt =round($gt/4);
																	
																@endphp
															
															@elseif($item->status == 3)
																
																<td class="">PREVOCATIONAL STUDIES</td>
																<td>{{round($cat1/2)}}</td>
																<td>{{round($cat2/2)}}</td>
																<td>{{round($msc/2)}}</td>
																<td>{{round($exam/2)}}</td>
																<td>{{round($gt/2)}}</td>
																@php
																	$total_gt=round($gt/2);
																	
																@endphp
														
															@elseif($item->status == 4)
															
																
																<td class="">NATIONAL VALUES</td>
																<td>{{round($cat1/2)}}</td>
																<td>{{round($cat2/2)}}</td>
																<td>{{round($msc/2)}}</td>
																<td>{{round($exam/2)}}</td>
																<td>{{round($gt/2)}}</td>
																@php
																	$total_gt =round($gt/2);
																	
																@endphp
															
															@elseif($item->status ==5)
																
																<td class="">CULTURAL AND CREATIVE ART</td>
																<td>{{round($cat1/3)}}</td>
																<td>{{round($cat2/3)}}</td>
																<td>{{round($msc/3)}}</td>
																<td>{{round($exam/3)}}</td>
																<td>{{round($gt/3)}}</td>
																@php
																	$total_gt =round($gt/3);
																@endphp
															
															
															@elseif($item->status ==6)
																
																<td class="">BUSINESS STUDIES</td>
																<td> {{$item->CAT1}}</td>
																<td> {{$item->CAT2}}</td>
																<td> {{$item->MSC}}</td>
																<td> {{$item->Exam}}</td>
																<td> {{$item->GT}}</td>
																@php
																	$total_gt = round($item->GT);
																		
																@endphp
															
															@elseif($item->status ==7)
															
																<td class="">FRENCH</td>
																<td> {{$item->CAT1}}</td>
																<td> {{$item->CAT2}}</td>
																<td> {{$item->MSC}}</td>
																<td> {{$item->Exam}}</td>
																<td> {{$item->GT}}</td>
																@php
																	$total_gt = round($item->GT);
																		
																@endphp
													
															@elseif($item->status ==8)
																
																<td class="">MATHEMATICS</td>
												
																<td> {{$item->CAT1}}</td>
																<td> {{$item->CAT2}}</td>
																<td> {{$item->MSC}}</td>
																<td> {{$item->Exam}}</td>
																<td> {{$item->GT}}</td>
																@php
																	$total_gt = round($item->GT);
																		
																@endphp
															
															@elseif($item->status ==9)
																	
																
																<td class="">RELIGIOUS STUDIES</td>
																<td> {{$item->CAT1}}</td>
																<td> {{$item->CAT2}}</td>
																<td> {{$item->MSC}}</td>
																<td> {{$item->Exam}}</td>
																<td> {{$item->GT}}</td>
																@php
																	$total_gt = round($item->GT);
																		
																		if($item->CAT1 == null &&  $item->MSC == null && $item->Exam == null)
																			$emp = 1;
																@endphp
																
														
															@elseif($item->status ==10)    
																
																<td>HANDWRITING</td>
																<td> {{$item->CAT1}}</td>
																<td> {{$item->CAT2}}</td>
																<td> {{$item->MSC}}</td>
																<td> {{$item->Exam}}</td>
																<td> {{$item->GT}}</td>
																@php
																	$total_gt = round($item->GT);
																		
																@endphp
																
															@endif
															
															 @php
																	 
																					
																		 if($emp == 1){
																		 $cnt =count($status) - 1;
																	 }else{
																		 $cnt = count($status);
																	 }
																	 $total +=$total_gt;	
															 @endphp
																	 <td>{{round(App\Student::max_score_jGT($item->status,$term->id,$class_->id))}}</td>
																<td>{{round(App\Student::min_score_jGT($item->status,$term->id,$class_->id))}}</td>
																<td>{{App\Student::h_grade($total_gt,$grades)}}</td>
															 @endif
	
	
														@endif
													</tr>	
													@endforeach						
												
										
												<tr>
													<td class="text-uppercase text-left">Student Total Score</td>
													<td colspan="8">{{$total}}</td>	
															
												</tr>
												<tr>
												<td class="text-uppercase text-left">Average</td>
													<td colspan="8">{{App\Student::average($total,$cnt)}}</td>			
											</tr>
											<tr>
												<td class="text-uppercase">Remark</td>
													<td colspan='8'>{{App\Student::h_grade(App\Student::average($total,$cnt),$grades)}}</td>
													
												
											</tr>
	
											<tr>
												<td></td>
											</tr>
											<tr>
												<td style="border: hidden;" class="text-uppercase text-bold text-left" colspan="5">Class teacher's remark:</td>
											</tr>
											<tr style="">
												<td colspan="8">
													@if($comment != null)
														<h5>{{$comment->comment}}</h5>
													@endif
												</td>	
											</tr>
											
											<tr>
												<td style="border: hidden;" class="text-uppercase text-bold text-left" colspan="5"> President's remark:</td>
											</tr>
											<tr style="border-right: hidden;">
													<td colspan="8" >
														@if($comment != null)
														<h5>{{$comment->hcomment}}</h5>
														@endif
													</td>	
											</tr>
											
											<tr style="border-right: hidden;">
													<td colspan="8" >
													</td>
											</tr>
											
											
											
											
											
										</tbody>
										@else
										<tbody>
											@php
												$total = 0;
												$no_of_subject = 0;
											@endphp
												
													@foreach ($scores as $item)
														@if($item->CAT1 != null)
														<tr>	
															<td class="text-uppercase text-bold text-left">{{$item->subname}}</td>
															<td>{{$item->CAT1}}</td>
															<td>{{$item->CAT2}}</td>
															<td>{{$item->MSC}}</td>
															<td>{{$item->Exam}}</td>
															<td>{{$item->GT}}</td>
															@php
																$total +=$item->GT;
															if($item->GT != null && $item->CAT1 != null){
																$no_of_subject += 1;
															}	
															@endphp
															<td>{{App\Student::h_max_score($item->subject_id,$class_->id,$term->id)}}</td>
															<td>{{App\Student::h_min_score($item->subject_id,$class_->id,$term->id)}}</td>
															<td>{{App\Student::h_grade($item->GT,$grades)}}</td>
														</tr>
														@endif	
													@endforeach
														
												
												
										
												<tr>
													<td class="text-uppercase text-left">Student Total Score</td>
													<td colspan="8">{{$total}}</td>	
															
												</tr>
												<tr>
												<td class="text-uppercase text-left">Average</td>
													<td colspan="8">{{App\Student::average($total,$no_of_subject)}}</td>			
											</tr>
											<tr>
												<td class="text-uppercase">Remark</td>
													<td colspan='8'>{{App\Student::h_grade(App\Student::average($total,$no_of_subject),$grades)}}</td>
													
												
											</tr>
	
											<tr>
												<td></td>
											</tr>
											<tr>
												<td style="border: hidden;" class="text-uppercase text-bold text-left" colspan="5">Class teacher's remark:</td>
											</tr>
											<tr style="">
													<td colspan="8">
														@if($comment != null)
															<h5>{{$comment->comment}}</h5>
														@endif
													</td>	
											</tr>
											
											<tr>
												<td style="border: hidden;" class="text-uppercase text-bold text-left" colspan="5"> President's remark:</td>
											</tr>
											<tr style="border-right: hidden;">
													<td colspan="8" >
														@if($comment != null)
														<h5>{{$comment->hcomment}}</h5>
														@endif
													</td>
											</tr>
											
																	
										</tbody>
										@endif
									</table>
									
								</div>				
							</div>
							<div class="col-5">
								<div style="border: 2px solid black; font-size: 10px; font-weight: bolder;">
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
	
														@if ($behave != null)
														 <h3 class="text-bold">{{App\Student::h_behave($behave->hwc)}}</h3>
														@endif
												</tr>
												<tr>
													<td class=" text-uppercase text-left"> Class Attendance</td>
													@if ($behave != null)
													<h3 class="text-bold">{{App\Student::h_behave($behave->catt)}}</h3>
													@endif
												</tr>
												<tr>
													<td class=" text-uppercase text-left"> Care (School Property)</td>
														@if ($behave != null)
														<h3 class="text-bold">{{App\Student::h_behave($behave->care)}}</h3>
														@endif
												</tr>
												<tr>
													<td class=" text-uppercase text-left"> Responsibility</td>
														@if ($behave != null)
														<h3 class="text-bold">{{App\Student::h_behave($behave->res)}}</h3>
														@endif
												</tr>
												<tr>
													<td class=" text-uppercase text-left"> Honesty</td>
														@if ($behave != null)
														<h3 class="text-bold">{{App\Student::h_behave($behave->Hon)}}</h3>
														@endif
												</tr>
												<tr>
													<td class=" text-uppercase text-left"> Initiative</td>
													@if ($behave != null)
													<h3 class="text-bold">	{{App\Student::h_behave($behave->init)}}</h3>
													@endif
												</tr>
												<tr>
													<td class=" text-uppercase text-left"> Leadership Role</td>
													@if ($behave != null)
													<h3 class="text-bold">{{App\Student::h_behave($behave->lead)}}</h3>
													@endif
													
												</tr>
												<tr>
													<td class=" text-uppercase text-left"> Dress Code</td>
													@if ($behave != null)
													<h3 class="text-bold">	{{App\Student::h_behave($behave->dressc)}}</h3>
													@endif
													</tr>
												<tr>
													<td class=" text-uppercase text-left"> Obedience</td>
													@if ($behave != null)
													<h3 class="text-bold">	{{App\Student::h_behave($behave->obey)}}</h3>
													@endif
												</tr>
												<tr>
													<td class=" text-uppercase text-left"> Politiness</td>
													@if ($behave != null)
													<h3 class="text-bold">	{{App\Student::h_behave($behave->pol)}}</h3>
														
													@endif
												</tr>
												<tr>
													<td class=" text-uppercase text-left"> Team Spirit</td>
														
													@if($behave != null)
													<h3 class="text-bold">	{{App\Student::h_behave($behave->team)}} </h3>
													@endif
												</tr>
												<tr>
													<td class=" text-uppercase text-left"> Socialbility</td>
													@if($behave != null)
													<h3 class="text-bold">{{App\Student::h_behave($behave->soc)}}</h3>
													@endif
												</tr>
												<tr>
													<td class=" text-uppercase text-left"> PSYCHOMOTOR SKILLS
														&  PHYSICAL SKILLS</td>
														@if($behave != null)
														<h3 class="text-bold">	{{App\Student::h_behave($behave->psy)}}</h3>
														@endif
												</tr>
												<tr>
													<td class=" text-uppercase text-left"> Sport</td>
													@if($behave != null)
													<h3 class="text-bold">{{App\Student::h_behave($behave->sport)}}</h3>
													@endif
												</tr>
												<tr>
													<td class=" text-uppercase text-left"> Notes Completion</td>
													@if($behave != null)
													<h3 class="text-bold">{{App\Student::h_behave($behave->notec)}}</h3>
													@endif
												</tr>
												<tr>
													<td class=" text-uppercase text-left"> Spoken English</td>
														@if($behave != null)
														<h3 class="text-bold">{{App\Student::h_behave($behave->spoken)}}</h3>
														@endif
												</tr>
												<tr>
													<td class=" text-uppercase text-left"> Musical Skill</td>
													@if($behave != null)
													<h3 class="text-bold">	{{App\Student::h_behave($behave->mus)}}</h3>
													@endif
												</tr>
												<tr>
													<td class=" text-uppercase text-left"> Craft</td>
													@if($behave != null)
													<h3 class="text-bold">{{App\Student::h_behave($behave->craft)}}</h3>
													@endif	
			
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
												<tr>
													@if($class_->name == 'JSS 1' || $class_->name == 'JSS 2')
															<td colspan="5" class="text-left text-bold text-uppercase">
																School Fee: ₦{{number_format($term->fee_1_2)}}
															</td>
													@elseif($class_->name == 'JSS 3')
													<td colspan="5" class="text-left text-bold text-uppercase">
														School Fee: ₦{{number_format($term->fee_3)}}
													</td>
													@elseif($class_->name == 'SSS 1' || $class_->name == 'SSS 2')
															<td colspan="5" class="text-left text-bold text-uppercase">
																School Fee: ₦{{number_format($term->fee_s1)}}
															</td>
													@elseif($class_->name == 'SSS 3')
															<td colspan="5" class="text-left text-bold text-uppercase">
														School Fee: ₦{{number_format($term->fee_s3)}}
													</td>
													@endif
												</tr>
												<tr>
													<td colspan="5" class="text-left text-bold text-uppercase">
														Next term Begins: {{date('l, jS F, Y',strtotime($term->resumption_date))}}
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
	</body>
</html>