
<!DOCTYPE html>
<html lang="en">

	<head>
			<meta charset="UTF-8">
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="stylesheet" href="https://emerald-field-school.herokuapp.com/css/bootstrap.min.css">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link rel="stylesheet" href="https://emerald-field-school.herokuapp.com/css/result.css">
			<style>
				body{
					font-style: normal;
					font-weight:bolder;
					color:black;
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
				
				<!-- main result table -->
				<div class="d-flex justify-content-center py-4 mb-2"><img src="/img/logo2.png" height="120" width="auto"></div>
				<div class="col-12 col-md-12 my-4 mx-auto p-0">
						<div class="table-responsive " style="border: 1px solid black;">
								<div class="d-flex justify-content-center" style="border: 1px solid black;"> 
										<h3 class="text-uppercase text-bold">EmeraldField High School</h3>
										
								</div>
								<div class="d-flex justify-content-center" style="border: 1px solid black;"> 
										<h3 class="text-uppercase text-bold">report sheet</h3>
										
								</div>
								<div class="row" style="border: 1px solid black;"> 
										<div class="col-3">
												
										<p class="text-uppercase text-bold">student's name :</p>
										</div>
										<div class="col-4">
										<p class="text-uppercase text-bold">{{$student->surname}} {{$student->name}}</p>
										</div>
										<div class="col-3">
												<p class="text-uppercase text-bold">Academic year:</p>
										</div>
										<div class="col-2">
												<p class="text-uppercase text-bold">{{$term->session}}</p>
										</div>
										
								</div>
								<div class="row" style="border: 1px solid black;"> 
										<div class="col-3">
												
										<p class="text-uppercase text-bold">Class:</p>
										</div>
										<div class="col-4 ">
												<p class="text-uppercase text-bold">{{$class_->name}}</p>
										</div>
										<div class="col-3 d-flex justify-content-center">
												<p class="text-uppercase text-bold">{{$term->name}}</p>
										</div>
										
										
								</div>
								<div class="row">
										<div class="col-8">
					<div style="border: 1px solid black;">
							<p> ACADEMIC PROGRESS REPORT, SUMMARY AND TEST</p>
					</div>
											
										</div>
										<div class="col-4">
												<div style="border: 1px solid black; font-size: 10px; font-weight: bolder;">
														<p >AFFECTIVE ASSESSMENT (VALUE,INTEREST,CHARACTER)</p>
								</div>
												
										</div>
								</div>
								<div class="row">
									<div class="col-8">
										<div class="d-flex justify-content-left" style="float: left;">
											<table class="table-sm table table-bordered table-hover table-condensed">
												<thead class="header word">
													
															
															<th class="rotate"></th>  
															<th class="rotate text-uppercase" > cat 1 (20%)</th> 
															<th class="rotate text-uppercase" >cat 2 (20%)</th>
															<th class="rotate text-uppercase" >MSC score (10%)</th> 
															<th class="rotate text-uppercase">Exam score (10%)</th> 
															<th class="rotate text-uppercase" >Total score (100%)</th> 
															<th class="rotate text-uppercase" >Class highest score (100%)</th> 
															<th class="rotate text-uppercase" >Class lowest score (100%)</th> 
															<th class="rotate text-uppercase">Remarks</th>
														
												</thead>
												<tbody>
													@php
														$total = 0;
													@endphp
														
															@foreach ($scores as $item)
															<tr>	
																<td class="text-uppercase text-bold text-left">{{$item->subname}}</td>
																<td>{{$item->CAT1}}</</td>
																<td>{{$item->CAT2}}</</td>
																<td>{{$item->MSC}}</</td>
																<td>{{$item->Exam}}</</td>
																<td>{{$item->GT}}</</td>
																@php
																	$total +=$item->GT;	
																@endphp
																<td>{{App\Student::h_max_score($item->subject_id,$class_->id,$term->id)}}</td>
																<td>{{App\Student::h_min_score($item->subject_id,$class_->id,$term->id)}}</td>
																<td>{{App\Student::h_grade($item->GT,$grades)}}</td>
															</tr>	
															@endforeach
																
														
														
												
														<tr>
															<td class="text-uppercase text-left">Student Total Score</td>
															<td colspan="8">{{$total}}</td>	
																
														</tr>
														<tr>
														<td class="text-uppercase text-left">Average</td>
															<td colspan="8">{{App\Student::average($total,$scores->count())}}</td>			
													</tr>
													<tr>
														<td class="text-uppercase">Summary of Result</td>
															<td >3C4</td>
															<td >2F9</td>
															<td >3C5</td>
															<td ></td>
															<td ></td>
															<td ></td>
															<td ></td>
															<td ></td>
														
													</tr>

													<tr>
														<td></td>
													</tr>
													<tr>
														<td style="border: hidden;" class="text-uppercase text-bold text-left" colspan="5">Class teacher's remark:</td>
													</tr>
													<tr style="">
															<td colspan="8">
																{{$comment->comment}}</td>
													</tr>
													
													<tr>
														<td style="border: hidden;" class="text-uppercase text-bold text-left" colspan="5"> President's remark:</td>
													</tr>
													<tr style="border-right: hidden;">
															<td colspan="8" >
																{{$comment->hcomment}}</td>
													</tr>
													<tr>
														<td style="border: hidden;" class="text-uppercase text-bold text-left" colspan="5"> Date and Stamp:</td>
													</tr>
													<tr style="border-right: hidden;">
															<td colspan="8" >
																</td>
													</tr>
													
													
													
													
													
												</tbody>
											</table>
											
										</div>
									</div>
									<div class="col-4">
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
															{{App\Student::h_behave($behave->hwt)}}
														</tr>
														<tr>
															<td class=" text-uppercase text-left"> Class Attendance</td>
															{{App\Student::h_behave($behave->catt)}}
														</tr>
														<tr>
															<td class=" text-uppercase text-left"> Care (School Property)</td>
															{{App\Student::h_behave($behave->care)}}
														</tr>
														<tr>
															<td class=" text-uppercase text-left"> Responsibility</td>
															{{App\Student::h_behave($behave->res)}}
														</tr>
														<tr>
															<td class=" text-uppercase text-left"> Honesty</td>
															{{App\Student::h_behave($behave->Hon)}}
														</tr>
														<tr>
															<td class=" text-uppercase text-left"> Initiative</td>
															{{App\Student::h_behave($behave->init)}}
														</tr>
														<tr>
															<td class=" text-uppercase text-left"> Leadership Role</td>
															{{App\Student::h_behave($behave->lead)}}
															
														</tr>
														<tr>
															<td class=" text-uppercase text-left"> Dress Code</td>
															{{App\Student::h_behave($behave->dressc)}}
															</tr>
														<tr>
															<td class=" text-uppercase text-left"> Obedience</td>
															{{App\Student::h_behave($behave->obey)}}
														</tr>
														<tr>
															<td class=" text-uppercase text-left"> Politiness</td>
															{{App\Student::h_behave($behave->pol)}}
																
														</tr>
														<tr>
															<td class=" text-uppercase text-left"> Team Spirit</td>
																
															{{App\Student::h_behave($behave->team)}}
																
														</tr>
														<tr>
															<td class=" text-uppercase text-left"> Socialbility</td>
															{{App\Student::h_behave($behave->soc)}}

														</tr>
														<tr>
															<td class=" text-uppercase text-left"> PSYCHOMOTOR SKILLS
																&  PHYSICAL SKILLS</td>
																{{App\Student::h_behave($behave->psy)}}

														</tr>
														<tr>
															<td class=" text-uppercase text-left"> Sport</td>
															{{App\Student::h_behave($behave->sport)}}

														</tr>
														<tr>
															<td class=" text-uppercase text-left"> Notes Completion</td>
															{{App\Student::h_behave($behave->notec)}}

														</tr>
														<tr>
															<td class=" text-uppercase text-left"> Spoken English
																{{App\Student::h_behave($behave->spoken)}}

														</tr>
														<tr>
															<td class=" text-uppercase text-left"> Musical Skill</td>
															{{App\Student::h_behave($behave->mus)}}
														</tr>
														<tr>
															<td class=" text-uppercase text-left"> Craft</td>
															{{App\Student::h_behave($behave->craft)}}
																
					
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
															<td colspan="5" class="text-left text-bold text-uppercase">
																School Fee: {{$term->fee_h}}
															</td>
														</tr>
														<tr>
															<td colspan="5" class="text-left text-bold text-uppercase">
																Next term Begins: {{date('j F, Y',strtotime($term->resumption_date))}}
															</td>
														</tr>
														
												</tbody>
											</table>
										</div>
									</div>
								</div>
								
						</div>
				</div>
		</section>
	</body>
</html>