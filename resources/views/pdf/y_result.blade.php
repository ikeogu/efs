<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/style2.css">
    <title>Emerald Field</title>
</head>

<body>
   
    <!-- top-left table -->
    <div class="container-fluid mt-5">
        <header >
            <div class="row">
                <div class="col-8 yellow ">
                  <img src="img/header.png" height="120" width="650">
                </div>
                <div class="col-4 yellow" >
                    
                        <strong class="text-dark font-weight-bold">YEAR CLASSES</strong><br>
                        <strong class="text-dark font-weight-bold">REPORT CARD</strong><br>
                    <strong class="text-danger font-weight-bold text-uppercase "> {{$term->name}}</strong>
                   
                  </div>
            </div>
        </header>
        <div class="row top-section">
            
            <div class="col-12 col-md-12 col-lg-7 p-0 left-col">
                <!-- table heading -->
                
                <h6 class="lt-heading text-uppercase font-weight-bold">pupil's data</h6>
                <hr>
                <!-- table card -->
                <div class="left-table-card">
                    <!-- make table responsive -->
                    <div class="table-responsive text-nowrap">
                        <!-- main table -->
                        <table class="left-table">
                            <tbody>
                                <!-- pupil name -->
                                <tr class="table-row pupil-name">
                                    <th>CLASS NAME</th>
                                    <td class="pl-3">tobi unima shi odunlam</td>
                                </tr>
                                <!-- date of birth -->
                                <tr class="table-row pupil-dob">
                                    <th>DATE OF BIRTH</th>
                                    <td class="pl-2">
                                        <ul>
                                            <li>1st november, 2015</li>
                                            <li class="gender">gender</li>
                                            <li><strong>Male</strong></li>
                                        </ul>
                                    </td>
                                </tr>
                                <!-- class -->
                                <tr class="table-row pupil-class">
                                    <th>CLASS</th>
                                    <td class="pl-3">year 1 allamanda <strong>(B)</strong></td>
                                </tr>
                                <!-- school year -->
                                <tr class="table-row sch-year">
                                    <th>SCHOOL YEAR</th>
                                    <td class="pl-3">2019/2020</td>
                                </tr>
                                <!-- class teacher -->
                                <tr class="table-row class-teacher">
                                    <th>TEACHER</th>
                                    <td class="pl-3">ms jane asuquo</td>
                                </tr>
                                <!-- date of birth -->
                                <tr class="table-row">
                                    <th>ATTENDANCE</th>
                                    <td class="pl-2">
                                        <ul>
                                            <li>days present</li>
                                            <li class="present"><strong>103</strong></li>
                                            <li>days absent</li>
                                            <li class="absent"><strong>6</strong></li>
                                            <li>visit days</li>
                                            <li class="days"><strong>6</strong></li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- top right table -->
            <div class="col-12 col-md-12 col-lg-5 p-0 right-col">
                <h6 class="rt-heading text-uppercase text-center font-weight-bold">pupil's exam result status</h6>
                <hr>
                <small class="px-1">Tick the appropriate columns</small>
                <div class="right-table-card">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm right-table">
                            <thead class="thead-light" >
                                <tr>
                                    <th scope="col">DEVELOPMENT</th>
                                    <th scope="col">OUTSTANDING</th>
                                    <th scope="col">VERY GOOD</th>
                                    <th scope="col">GRADE</th>
                                    <th scope="col">PERFORMANCE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">Lorem ipsum dolor sit amet ?</td>
                                    <td><i class="fa fa-check"></i></td>
                                    <td><i class="fa fa-check"></i></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row">Lorem ipsum dolor sit amet ?</td>
                                    <td><i class="fa fa-check"></i></td>
                                    <td><i class="fa fa-check"></i></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et minima </td>
                                    <td><i class="fa fa-check"></i></td>
                                    <td><i class="fa fa-check"></i></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row">Lorem ipsum dolor sit amet </td>
                                    <td><i class="fa fa-check"></i></td>
                                    <td><i class="fa fa-check"></i></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td scope="row">Lorem ipsum dolor sit amet </td>
                                    <td><i class="fa fa-check"></i></td>
                                    <td><i class="fa fa-check"></i></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row bottom-section">
            <div class="col-12 col-md-12 col-lg-7 bottom-left-col p-0">
                <h6 class="assessment-heading text-uppercase text-success font-weight-bold">ASSESSMENT AND OBSERVATION SUMMARY</h6>
                <div class="bottom-left-card">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="bg-success text-light">
                                <tr>
                                    <th scope="col">SUBJECT</th>
                                    <th scope="col">CONTINUOS ASSESSMENT 40%</th>
                                    <th scope="col">EXAMINATION 60%</th>
                                    <th scope="col">GRAND TOTAL 100%</th>
                                    <th scope="col">GRADE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td><strong>MATHEMATICS</strong></td></tr>
                                <tr scope="row">
                                    <td>General Mathematics</td>
                                    <td>48</td>
                                    <td>30</td>
                                    <td>78</td>
                                    <td>C+</td>
                                </tr>
                                <tr>
                                    <td>Quantitative Reasoning</td>
                                    <td>48</td>
                                    <td>29</td>
                                    <td>77</td>
                                    <td>C+</td>
                                </tr>
                                <tr><td><strong>ENGLISH STUDIES</strong></tr>
                                <tr>
                                    <td>English Studies</td>
                                    <td>48</td>
                                    <td>29</td>
                                    <td>77</td>
                                    <td>C+</td>
                                </tr>
                                <tr>
                                    <td>Verbal Reasoning</td>
                                    <td>48</td>
                                    <td>29</td>
                                    <td>77</td>
                                    <td>C+</td>
                                </tr>
                                <tr><td><strong>BASIC SCIENCE & TECHNOLOGY</strong></tr>
                                <tr>
                                    <td>Basic Science & Tecnology</td>
                                    <td>48</td>
                                    <td>29</td>
                                    <td>77</td>
                                    <td>C+</td>
                                </tr>
                                <tr>
                                    <td>Physical & Health Education</td>
                                    <td>48</td>
                                    <td>29</td>
                                    <td>77</td>
                                    <td>C+</td>
                                </tr>
                                <tr>
                                    <td>I.C.T</td>
                                    <td>48</td>
                                    <td>29</td>
                                    <td>77</td>
                                    <td>C+</td>
                                </tr>
                                <tr><td><strong>RELIGION & NATIONAL VALUES</strong></tr>
                                <tr>
                                    <td>Christian Religious Studies</td>
                                    <td>48</td>
                                    <td>29</td>
                                    <td>77</td>
                                    <td>C+</td>
                                </tr>
                                <tr>
                                    <td>Citizenship Education</td>
                                    <td>48</td>
                                    <td>29</td>
                                    <td>77</td>
                                    <td>C+</td>
                                </tr> 
                                <tr><td><strong>HOME & ANIMAL STUDIES</strong></tr> 
                                <tr>
                                    <td>Agricultural Science</td>
                                    <td>48</td>
                                    <td>29</td>
                                    <td>77</td>
                                    <td>C+</td>
                                </tr>  
                                <tr>
                                    <td>Home Economics</td>
                                    <td>48</td>
                                    <td>29</td>
                                    <td>77</td>
                                    <td>C+</td>
                                </tr>
                                <tr><td><strong>CULTURAL & CREATIVE ART</strong></tr>
                                <tr>
                                    <td>Cultural & creative art</td>
                                    <td>48</td>
                                    <td>29</td>
                                    <td>77</td>
                                    <td>C+</td>
                                </tr> 
                                <tr>
                                    <td>Music</td>
                                    <td>48</td>
                                    <td>29</td>
                                    <td>77</td>
                                    <td>C+</td>
                                </tr>
                                <tr><td><strong>HANDWRITING</strong>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>Null</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
               <div class="summary d-flex justify-content-between mb-4">
                  <ul class="list-group left-list my-2">
                      <li class="list-group-item d-flex justify-content-between">
                          <h5>Highest score:</h5>
                           <span>75</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between">
                        <h5>Highest score:</h5>
                         <span>75</span>
                    </li>
                  </ul>
                  <ul class="list-group right-list my-2">
                    <li class="list-group-item d-flex justify-content-between">
                        <h5>Highest score:</h5>
                         <span>75</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                      <h5>Grade:</h5>
                       <span>C+</span>
                  </li>
                </ul>
                </div>
               </div>
               <div class="col-12 col-md-12 col-lg-5 bottom-right p-0">
                   <div class="bottom-right-card">
                    <div class="table-responsive">
                        <table class="table  bottom-right-table table-bordered bg-success text-light text-center">
                            <thead>
                                <tr>
                                    <th colspan="4">GRADE KEY</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>A+</td>
                                    <td>95 - 100%</td>
                                    <td>C+</td>
                                    <td>75 - 79%</td>
                                </tr>
                                <tr>
                                    <td>A</td>
                                    <td>90 - 94%</td>
                                    <td>C</td>
                                    <td>61 - 74%</td>
                                </tr>
                                <tr>
                                    <td>B+</td>
                                    <td>85 - 89%</td>
                                    <td>D</td>
                                    <td>50 - 60%</td>
                                </tr>
                                <tr>
                                    <td>B</td>
                                    <td>80 - 84%</td>
                                    <td>Needs Improvement</td>
                                    <td>49% below</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- teacher remarks -->
                    <div class="remarks-box teacher-remarks">
                        <span class="remarks-heading d-block">class teacher remarks</span>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem enim esse porro, nesciunt ipsum praesentium delectus animi maxime sit harum.</p>
                    </div>
                    <!-- class register remark -->
                    <div class="remarks-box register-remarks">
                        <span class="remarks-heading d-block">class master remarks</span>
                        <p>Lorem ipsum dolor sit amet consectetur come tomorrow</p>
                    </div>
                    <!-- resumption date -->
                    <div class="remarks-box resumption-date">
                        <span class="remarks-heading d-block">school resumption date</span>
                        <p>Monday, 4th May, 2020</p>
                    </div>
                    <!-- school fees -->
                    <div class="remarks-box school-fees">
                        <span class="remarks-heading d-block">school fees amount</span>
                        <p>$23,000</p>
                    </div>
                   </div>
               </div>
            </div>
            <footer class="row">
                <div class="">
                    <img src="img/footer.png" height="30" width="1090">
                  </div>
                </div>
            </footer>
        
    </div>
    
</body>
</html>