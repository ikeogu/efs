<template>

  <div id="postsrec" class="mt-5">
    <div class="row mt-5">
      <div class="col-lg-4 text-right" style="margin-bottom: 10px;">
        <a href="#"
           data-target="#allSubject"
           data-toggle="modal"
          
           class="btn btn-info">Assign Subjects To All</a>
      </div>
     
       <div class="col-lg-4 text-right" style="margin-bottom: 10px;">
        <a href="#"
           data-target="#exampleModalCenter"
           data-toggle="modal"
           class="btn btn-success">Add Student</a>
      </div>
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Add Student</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post" name="addStudent" id="addStudent" action="#" @submit.prevent="addStudent"
              class="form-inline d-flex justify-content-center md-form form-sm">
                 <div class="row">
                  <input class="form-control" type="hidden" placeholder="Search" aria-label="Search" v-model="add_student.term_id"> 
                  <input class="form-control  form-control-sm ml-3 w-7" type="text" placeholder="search Student's name" aria-label="Search" v-model="query" 
                  v-on:keyup="autoComplete">
                  </div>
                  <div class="card "  style="position:relative; z-index:1000; background-color:white;" v-for="s in results" v-bind:key="s.id">
                   
                      <div class="col-10 ">
                        <b>{{s.name}} {{s.oname}} {{s.surname}}</b> 
                      </div>
                      <div class="col-2 d-flex justify-content-end">
                          <a href="#"
                       v-on:click="addbutton(s.id)"
                       v-bind:title="s.name" class="btn btn-success text-white ">Add</a>
                      </div>
              
                  </div>         
              </form> 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="allSubject" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Are you sure?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <p>Are you sure you want to assign  all subjects to all students.</p>
              <div class="">
                  <a href="#" v-on:click="assignSubjectToMyStudents()" class="btn btn-success">Confirm</a>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
      <div v-bind:class="{ succmsg: succmsg }">
        <div class="col-md-12 col-lg-12">
          <div class="alert alert-success cusmsg">{{ actionmsg }}</div>
        </div>
      </div>
      <div class="col-md-12">
        <!-- Button trigger modal -->

        <!-- Modal -->

        <div class="modal fade"
             id="exampleModal1"
             tabindex="-1"
             role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true"
             v-bind:class="{ showmodal:showmodal }">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Assign Subjects</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
              </div>
              <div class="modal-body">
                <form v-if="this.unassignedSubjects.length > 0" method="post" name="assignsubjects" id="assignsubjects" action="#" @submit.prevent="assignSubject(student_id, subject_id,T_id)">

                  <div class="form-group">
                    <label for="gender">Assign Subjects</label>
                    <select class="form-control" name="subject" id="subject" v-model="subject_id">
                          <option v-for="subject in unassignedSubjects"  :key="subject.id" v-bind:value="subject.id">{{ subject.name }} {{ subject.description}}</option>
                    </select>
                  </div>

                  <div class="form-group text-center">
                    <button class="btn btn-success">Submit</button>
                  </div>
                </form>
                <span v-else>All Subjects has been Assigned to this Student!</span>
                <br>

                <div class="card">
                  <div class="card-header">Assigned Subject</div>
                    <div class="card-body">
                     <div class="table-responsive">
            
                      <table class="table table-striped table-bordered" style="width:100%">
                        <thead>
                          <tr>
                            <th>Subjects</th>
                            <th>Description</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="subject in assignedSubjects" :key="subject.id">
                            <th scope="row">{{ subject.name }}</th>
                            <td>{{subject.description}}</td>
                            <td><a href="#" v-on:click="deleteSubject(student_id, subject.id)" >Delete</a></td>
                          </tr>
                        </tbody>
                        
                      </table>
                      </div>
                    </div>
                  </div>
              </div>
              </div>

            </div>
          </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-success">
              <h6 class="m-0 font-weight-bold text-white">Student List</h6>
            </div>
          <div class="card-body">
          <div class="table-responsive">
            
            <table class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>#</th>
                  <th >Name</th>
                  <th>DOB</th>
                  <th>Gender</th>              
                  <th>Action</th>
                </tr>
              </thead>
              <tbody v-if="s.length > 0">
                  
                <tr v-for="(st,index) in s" :key="st.id" >
                  <td scope="row">{{ index + 1 }} </td>
                  <td> {{st.name}} {{ st.oname}} {{ st.surname}}  </td>

                  <td>{{ st.dob| formatDate}}</td> 
                  <td >
                    <p v-if="st.gender == 1">Male</p>
                    
                    <p v-if="st.gender == 2">Female</p>
                  </td>
                       <td>
                    <a
                      href="#"
                      class="btn btn-success btn-sm text-white"
                      v-on:click=" editStudent(st.id)"
                      data-target="#exampleModal19"
                      data-toggle="modal"
                      v-bind:title="st.name"
                      >Edit</a
                    >
                  </td>      
                   <td>

                            <a :href="'/api/studentSubject/'+st.id+'/term/'+T_id.id+'/class/'+myId.id" 
                            class="btn btn-warning text-white  ">View Subjects</a>
                          </td>
                  <td><a href="#" class="btn btn-success text-white"
                       v-on:click="unassignedSubjectsList(st.id)"
                       data-target="#exampleModal1"
                       data-toggle="modal"
                       v-bind:title="st.name">Assign Subjects</a></td>
                       <td>
                       <a href="#" class="btn btn-danger text-white"
                       v-on:click="re_move(st.id)"
                       data-target="#delModal12"
                       data-toggle="modal"
                       v-bind:title="st.name">Remove</a></td>
                </tr>
              </tbody>
             <span v-else> No Student has been added to this class</span>
            </table>
            </div>
          </div>
        </div>
        <br>     
      </div>
      <div class="card shadow mb-4">
                <div class="card-header py-3 bg-success">
                  <h6 class="m-0 font-weight-bold text-white">Student's Comment</h6>
                </div>
              <div class="card-body">
               <div class="table-responsive">
            
            <table class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Class Teacher</th>
                  <th>Result Comment</th>
                  <th>Head Academcs Remark</th>
                  <th>created </th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  
                <tr v-for="(st,index) in orderedComment" :key="st.id" >
                  <th scope="row">{{ index + 1 }}</th>
                  <td>{{ st.student}}</td>
                  <td>{{ st.teacher}}</td>
                  <td>{{ st.comment}}</td>
                  <td>{{ st.hcomment}}</td>
                  <td>{{ st.created_at | formatDate}}</td>                             

                  <td>
                  <a href="#" class="btn btn-success text-white"
                       v-on:click="editComent(st.id)"
                       data-target="#exampleMod123"
                       data-toggle="modal"
                       v-bind:title="st.student">Edit</a>
                  </td>
                       
                </tr>
              </tbody>

            </table>
            </div>
          </div>
      </div>

        <div class="card">
          <div class="card-header bg-success text-white">Student's Behavioural Chart</div>
          <div class="card-body">
            <div class="table-responsive">
            
            <table class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr v-if="myId.status =='Early Years'" :key="myId.id">
                  <th>#</th>
                  <th>Name</th>
                  <th>Participates in class</th>
                  <th>Listens Attentively</th>
                  <th>Follows instrunction First time</th>
                  <th> Completes work on time</th>
                  <th> Accepts new Challenges and persist with activities</th>
                  <th> Expresses feelings and Opinions </th>
                  <th> Shows respect and Kidness to all</th>
                  <th>Action</th>
                </tr>
                <tr v-if="myId.status =='Year School'" :key="myId.id">
                  <th>#</th>
                  <th>Name</th>
                  <th>Participates in class</th>
                  <th>Listens Attentively</th>
                  <th>Follows instrunction First time</th>
                  <th> Completes work on time</th>
                  <th> Accepts new Challenges and persist with activities</th>
                  <th> Expresses feelings and Opinions </th>
                  <th> Shows respect and Kidness to all</th>
                  <th>Action</th>
                </tr>
                <tr v-else-if="myId.status =='Senior High School'|| myId.status =='Junior High School'" :key="myId.id">
                  <th>#</th>
                  <th>Name</th>
                  <th>Home work culture</th>
                  <th>Class Attendance</th>
                  <th>Care (School property)</th>
                  <th>Responsibilty</th>
                  <th> Honesty</th>
                  <th> Initiative</th>
                  <th> Leadership Role</th>
                  <th> Dress Code</th>
                  <th> Obeidence</th>
                  <th> Politeness</th>
                  <th> Team Sport</th>
                  <th> Sociability</th>
                  <th> Psychomotor Skill & Physical Skill</th>
                  <th> Sport</th>
                  <th> Note Completion</th>
                  <th> Spoken English</th>
                  <th> Musical Skill</th>
                  <th> Craft</th>
                  <th>Action</th>
                </tr>
                
              </thead>
              <tbody v-if="myId.status =='Early Years' || myId.status =='Year School'" :key="myId.id">
                  
                <tr  v-for="(st,index) in orderedBehave" :key="st.id" >
                  <th scope="row">{{ index + 1 }}</th>
                  <td>{{ st.student}}</td>
                  <td>{{ st.pic}}</td>
                  <td>{{ st.la}}</td>
                  <td>{{ st.fift}}</td>
                  <td>{{ st.cwot}}</td>
                  <td>{{ st.anc}}</td>
                  <td>{{ st.efao}}</td>
                  <td>{{ st.srk}}</td>
                                            

                  <td>
                  <a href="#" class="btn btn-success text-white"
                       v-on:click="editBehaviour(st.id)"
                       data-target="#exampleModbev"
                       data-toggle="modal"
                       v-bind:title="st.name">Edit</a>
                  </td>
                       
                </tr>
              </tbody>
             
              <tr>
              </tr>
              <tfoot>
                <span>Keys</span>
                <tr>
                  
                  <td> 1: Outstanding</td>
                   <td> 2: Very Good</td>
                   <td> 3: Good</td>
                   <td>4: Needs More Improvement</td>
                </tr>
                
                 
                
              </tfoot>
              <tbody v-if="myId.status =='Junior High School' || myId.status =='Senior High School'" :key="myId.id">
                  
                <tr  v-for="(st,index) in orderedBehave" :key="st.id" >
                  <th scope="row">{{ index + 1 }}</th>
                  <td>{{ st.student}}</td>
                  <td>{{ st.hwc}}</td>
                  <td>{{ st.catt}}</td>
                  <td>{{ st.care}}</td>
                  <td>{{ st.res}}</td>
                  <td>{{ st.Hon}}</td>
                  <td>{{ st.init}}</td>
                  <td>{{ st.lead}}</td>
                  <td>{{ st.dressc}}</td>
                  <td>{{ st.obey}}</td>
                  <td>{{ st.pol}}</td>
                  <td>{{ st.team}}</td>
                  <td>{{ st.soc}}</td>
                  <td>{{ st.psy}}</td>
                  <td>{{ st.sport}}</td>
                  <td>{{ st.notec}}</td>
                  <td>{{ st.spoken}}</td>
                  <td>{{ st.mus}}</td>
                  <td>{{ st.craft}}</td>
                <td>
                  <a href="#" class="btn btn-success text-white"
                       v-on:click="editBehaviour(st.id)"
                       data-target="#exampleModbev"
                       data-toggle="modal"
                       v-bind:title="st.name">Edit</a>
                  </td>
                       
                </tr>
              </tbody>
               
            </table>
            </div>
          </div>
      </div>
        
        <div class="modal fade" id="delModal12" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Remove Student from Class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <p>Are you sure want to remove student from class? </p>
                </div>
                <div class="form-group text-center">
                  <button class="btn btn-success" v-on:click="hideModal()">Cancel</button>
                </div>
                <div class="form-group text-center">
                  <button class="btn btn-success" v-on:click="removeStudent()">Ok</button>
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="modal fade" id="exampleMod123" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add/Edit Comment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
              </div>
              <div class="modal-body">
                <form  method="post" name="updateComment" id="updateComment" action="#" @submit.prevent="updateComment">

                 <div class="form-group">
                    <label for="name">Class Teachers Comment</label>
                    <textarea name="comment" id="name" class="form-control" placeholder="" v-model="editComments.comment"  cols="7" rows="5"/>
                  </div>
                  <div class="form-group">
                    <label for="father_name">President's Remark</label>
                      <textarea name="hcomment" id="name" class="form-control" placeholder="" v-model="editComments.hcomment"  cols="7" rows="5"/>
                  </div>

                  <div class="form-group text-center">
                    <button class="btn btn-success">Submit</button>
                  </div>
                </form>
              </div>
              </div>

          </div>
        </div>
       

        <div  v-if="myId.status === 'Senior High School'||myId.status === 'Junior High School'" :key="myId.id" class="modal fade" id="exampleModbev" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">High School Behavioural Chart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
              </div>
              <div class="modal-body">
                 <form  method="post" name="updateBehaviour" id="updateBehaviour" action="#" @submit.prevent="updateBehaviour">

                <div class="form-group row">
                  <div class="col-8">
                    <label for="name">Home Work Culture</label>
                  </div>
                  <div class="col-4">
                    <select class="form-control" name="hwc" id="subject" v-model="ebehaviour.hwc">
                      <option :value="ebehaviour.hwc">{{ebehaviour.hwc}}</option>
                      <option value="1"> A</option>
                      <option value="2"> B</option>
                      <option value="3"> C</option>
                      <option value="4"> D</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-8">
                    <label for="name">Class Attendance</label>
                  </div>
                  <div class="col-4">
                    <select class="form-control" name="catt" id="subject" v-model="ebehaviour.catt">
                      <option :value="ebehaviour.catt">{{ebehaviour.catt}}</option>
                      <option value="1"> A</option>
                      <option value="2"> B</option>
                      <option value="3"> C</option>
                      <option value="4"> D</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-8">
                    <label for="name">Care (School property)</label>
                  </div>
                  <div class="col-4">
                    <select class="form-control" name="care" id="subject" v-model="ebehaviour.care">
                      <option :value="ebehaviour.care">{{ebehaviour.care}}</option>
                      <option value="1"> A</option>
                      <option value="2"> B</option>
                      <option value="3"> C</option>
                      <option value="4"> D</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-8">
                    <label for="name">Responsibility</label>
                  </div>
                  <div class="col-4">
                    <select class="form-control" name="res" id="subject" v-model="ebehaviour.res">
                      <option :value="ebehaviour.res">{{ebehaviour.res}}</option>
                      <option value="1"> A</option>
                      <option value="2"> B</option>
                      <option value="3"> C</option>
                      <option value="4"> D</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-8">
                    <label for="name">Honesty</label>
                  </div>
                  <div class="col-4">
                    <select class="form-control" name="Hon" id="subject" v-model="ebehaviour.Hon">
                      <option :value="ebehaviour.Hon">{{ebehaviour.Hon}}</option>
                      <option value="1"> A</option>
                      <option value="2"> B</option>
                      <option value="3"> C</option>
                      <option value="4"> D</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-8">
                    <label for="name">Initiative</label>
                  </div>
                  <div class="col-4">
                    <select class="form-control" name="init" id="subject" v-model="ebehaviour.init">
                      <option :value="ebehaviour.init">{{ebehaviour.int}}</option>
                      <option value="1"> A</option>
                      <option value="2"> B</option>
                      <option value="3"> C</option>
                      <option value="4"> D</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-8">
                    <label for="name">Leadership Role</label>
                  </div>
                  <div class="col-4">
                    <select class="form-control" name="lead" id="subject" v-model="ebehaviour.lead">
                      <option :value="ebehaviour.lead">{{ebehaviour.lead}}</option>
                      <option value="1"> A</option>
                      <option value="2"> B</option>
                      <option value="3"> C</option>
                      <option value="4"> D</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-8">
                    <label for="name">Dress Code</label>
                  </div>
                  <div class="col-4">
                    <select class="form-control" name="dressc" id="subject" v-model="ebehaviour.dressc">
                      <option :value="ebehaviour.dressc">{{ebehaviour.dressc}}</option>
                      <option value="1"> A</option>
                      <option value="2"> B</option>
                      <option value="3"> C</option>
                      <option value="4"> D</option>
                    </select>
                  </div>
                </div>
                  <div class="form-group row">
                  <div class="col-8">
                    <label for="name">Obedience</label>
                  </div>
                  <div class="col-4">
                    <select class="form-control" name="obey" id="subject" v-model="ebehaviour.obey">
                      <option :value="ebehaviour.obey">{{ebehaviour.obey}}</option>
                      <option value="1"> A</option>
                      <option value="2"> B</option>
                      <option value="3"> C</option>
                      <option value="4"> D</option>
                    </select>
                  </div>
                </div>
                  <div class="form-group row">
                  <div class="col-8">
                    <label for="name">Politiness</label>
                  </div>
                  <div class="col-4">
                    <select class="form-control" name="pol" id="subject" v-model="ebehaviour.pol">
                      <option :value="ebehaviour.pol">{{ebehaviour.pol}}</option>
                      <option value="1"> A</option>
                      <option value="2"> B</option>
                      <option value="3"> C</option>
                      <option value="4"> D</option>
                    </select>
                  </div>
                </div>
                  <div class="form-group row">
                  <div class="col-8">
                    <label for="name">Team Spirit</label>
                  </div>
                  <div class="col-4">
                    <select class="form-control" name="team" id="subject" v-model="ebehaviour.team">
                      <option :value="ebehaviour.team">{{ebehaviour.team}}</option>
                      <option value="1"> A</option>
                      <option value="2"> B</option>
                      <option value="3"> C</option>
                      <option value="4"> D</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-8">
                    <label for="name">Socialbility</label>
                  </div>
                  <div class="col-4">
                    <select class="form-control" name="soc" id="subject" v-model="ebehaviour.soc">
                      <option :value="ebehaviour.pic">{{ebehaviour.soc}}</option>
                      <option value="1"> A</option>
                      <option value="2"> B</option>
                      <option value="3"> C</option>
                      <option value="4"> D</option>
                    </select>
                  </div>
                </div>
                 <div class="form-group row">
                  <div class="col-8">
                    <label for="name">PSYCHOMOTOR SKILLS
                &  PHYSICAL SKILLS</label>
                  </div>
                  <div class="col-4">
                    <select class="form-control" name="psy" id="subject" v-model="ebehaviour.psy">
                      <option :value="ebehaviour.psy">{{ebehaviour.psy}}</option>
                      <option value="1"> A</option>
                      <option value="2"> B</option>
                      <option value="3"> C</option>
                      <option value="4"> D</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-8">
                    <label for="name">Sport</label>
                  </div>
                  <div class="col-4">
                    <select class="form-control" name="sport" id="subject" v-model="ebehaviour.sport">
                      <option :value="ebehaviour.sport">{{ebehaviour.sport}}</option>
                      <option value="1"> A</option>
                      <option value="2"> B</option>
                      <option value="3"> C</option>
                      <option value="4"> D</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-8">
                    <label for="name">Note Completion</label>
                  </div>
                  <div class="col-4">
                    <select class="form-control" name="notec" id="subject" v-model="ebehaviour.notec">
                      <option :value="ebehaviour.notec">{{ebehaviour.notec}}</option>
                      <option value="1"> A</option>
                      <option value="2"> B</option>
                      <option value="3"> C</option>
                      <option value="4"> D</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-8">
                    <label for="name">Spoken English</label>
                  </div>
                  <div class="col-4">
                    <select class="form-control" name="spoken" id="subject" v-model="ebehaviour.spoken">
                      <option :value="ebehaviour.spoken">{{ebehaviour.spoken}}</option>
                      <option value="1"> A</option>
                      <option value="2"> B</option>
                      <option value="3"> C</option>
                      <option value="4"> D</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-8">
                    <label for="name">Musical Skill</label>
                  </div>
                  <div class="col-4">
                    <select class="form-control" name="mus" id="subject" v-model="ebehaviour.mus">
                      <option :value="ebehaviour.mus">{{ebehaviour.mus}}</option>
                      <option value="1"> A</option>
                      <option value="2"> B</option>
                      <option value="3"> C</option>
                      <option value="4"> D</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-8">
                    <label for="name">Craft</label>
                  </div>
                  <div class="col-4">
                    <select class="form-control" name="craft" id="subject" v-model="ebehaviour.craft">
                      <option :value="ebehaviour.craft">{{ebehaviour.craft}}</option>
                      <option value="1"> A</option>
                      <option value="2"> B</option>
                      <option value="3"> C</option>
                      <option value="4"> D</option>
                    </select>
                  </div>
                </div>
                  <div class="form-group text-center">
                    <button class="btn btn-success">Submit</button>
                  </div>
                </form>
              </div>
              </div>

          </div>
        </div>
       
        <div  v-if="myId.status === 'Year School' || myId.status === 'Early Years'" :key="myId.id" class="modal fade" id="exampleModbev" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Year School Behavioural Chart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
              </div>
              <div class="modal-body">
                <form  method="post" name="updateBehaviour" id="updateBehaviour" action="#" @submit.prevent="updateBehaviour">

                <div class="form-group row">
                  <div class="col-8">
                    <label for="name">Participates in class</label>
                  </div>
                  <div class="col-4">
                    <select class="form-control" name="pic" id="subject" v-model="ebehaviour.pic">
                     <option :value="ebehaviour.pic">{{ebehaviour.pic}}</option>
                      <option value="1"> Outstanding</option>
                      <option value="2"> Very Good</option>
                      <option value="3"> Good</option>
                      <option value="4"> Needs More Improvement</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-8">
                    <label for="name">Listens Attentively</label>
                  </div>
                  <div class="col-4">
                    <select class="form-control" name="la" id="subject" v-model="ebehaviour.la">
                      <option :value="ebehaviour.la">{{ebehaviour.la}}</option>
                      <option value="1"> Outstanding</option>
                      <option value="2"> Very Good</option>
                      <option value="3"> Good</option>
                      <option value="4"> Needs More Improvement</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-8">
                    <label for="name">Follows instrunction First time</label>
                  </div>
                  <div class="col-4">
                    <select class="form-control" name="fift" id="subject" v-model="ebehaviour.fift">
                      <option :value="ebehaviour.fift">{{ebehaviour.fift}}</option>
                      <option value="1"> Outstanding</option>
                      <option value="2"> Very Good</option>
                      <option value="3"> Good</option>
                      <option value="4"> Needs More Improvement</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-8">
                    <label for="name">Completes work on time</label>
                  </div>
                  <div class="col-4">
                    <select class="form-control" name="cwot" id="subject" v-model="ebehaviour.cwot">
                      <option :value="ebehaviour.cwot">{{ebehaviour.cwot}}</option>
                      <option value="1"> Outstanding</option>
                      <option value="2"> Very Good</option>
                      <option value="3"> Good</option>
                      <option value="4"> Needs More Improvement</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-8">
                    <label for="name">Accepts new Challenges and persist with activities</label>
                  </div>
                  <div class="col-4">
                    <select class="form-control" name="anc" id="subject" v-model="ebehaviour.anc">
                      <option :value="ebehaviour.anc">{{ebehaviour.anc}}</option>
                      <option value="1"> Outstanding</option>
                      <option value="2"> Very Good</option>
                      <option value="3"> Good</option>
                      <option value="4"> Needs More Improvement</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-8">
                    <label for="name">Expresses feelings and Opinions</label>
                  </div>
                  <div class="col-4">
                    <select class="form-control" name="efao" id="subject" v-model="ebehaviour.efao">
                      <option :value="ebehaviour.efao">{{ebehaviour.efao}}</option>
                      <option value="1"> Outstanding</option>
                      <option value="2"> Very Good</option>
                      <option value="3"> Good</option>
                      <option value="4"> Needs More Improvement</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-8">
                    <label for="name">Shows respect and Kidness to all</label>
                  </div>
                  <div class="col-4">
                    <select class="form-control" name="srk" id="subject" v-model="ebehaviour.srk">
                      <option :value="ebehaviour.srk">{{ebehaviour.srk}}</option>
                      <option value="1"> Outstanding</option>
                      <option value="2"> Very Good</option>
                      <option value="3"> Good</option>
                      <option value="4"> Needs More Improvement</option>
                    </select>
                  </div>
                </div>

                  <div class="form-group text-center">
                    <button class="btn btn-success">Submit</button>
                  </div>
                </form>
              </div>
              </div>

          </div>
        </div>

     
        
        <div class="card" v-if="myId.status ==='Year School' || myId.status ==='Early Years'" :key="myId.id">
            <div class="card-header bg-success text-white">Student's Attendance Chart</div>
          <div class="card-body">
            <div class="table-responsive">
            
            <table class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr >
                  <th>#</th>
                  <th>Name</th>
                  <th>Days Present</th>
                  <th>Days Absent</th>
                  <th>Tardy Days</th>
                  <th>Action</th>
                </tr>
                
              </thead>
              <tbody >
                  
                <tr  v-for="(st,index) in orderedAttend" :key="st.id" >
                  <th scope="row">{{ index + 1 }}</th>
                  <td>{{ st.student}}</td>
                  <td>{{ st.dp}}</td>
                  <td>{{ st.da}}</td>
                  <td>{{ st.tar}}</td>                                          

                  <td>
                  <a href="#" class="btn btn-success text-white"
                       v-on:click="attId(st.id)"
                       data-target="#exampleModattend"
                       data-toggle="modal"
                       v-bind:title="st.name">Edit</a>
                  </td>
                       
                </tr>
              </tbody>
            
                            
             
            </table>
            </div>
          </div>
        </div>

        <div  v-if="myId.status =='Year School'||myId.status ==='Early Years'" :key="myId.id" class="modal fade" id="exampleModattend" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Year School Attendace Chart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
              </div>
              <div class="modal-body">
                <form  method="post" name="updateAttendance" id="updateAttendance" action="#" @submit.prevent="updateAttendance">

                <div class="form-group row">
                  <div class="col-8">
                    <label for="name">Days Present</label>
                  </div>
                  <div class="col-4">
                    <input class="form-control" name="dp" v-model="attendance.dp">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-8">
                    <label for="name">Days Absent</label>
                  </div>
                  <div class="col-4">
                     <input class="form-control" name="da" v-model="attendance.da">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-8">
                    <label for="name">Tardy Days</label>
                  </div>
                  <div class="col-4">
                    <input class="form-control" name="tar" v-model="attendance.tar">
                  </div>
                </div>
                
                  <div class="form-group text-center">
                    <button class="btn btn-success">Submit</button>
                  </div>
                </form>
              </div>
              </div>

          </div>
        </div> 
         <div
      class="modal fade"
      id="exampleModal19"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
      v-bind:class="{ showmodal: showmodal }"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form
              method="post"
              name="updatestudent"
              id="updatestudent"
              action="#"
              @submit.prevent="updateStudent"
              enctype="multipart/form-data"
            >
              <div class="form-group">
                <label for="name">Photo</label>
                <input
                  type="file"
                  id="name"
                  class="form-control"
                  placeholder="Name"
                  @change="onFileSelected"
                />
              </div>
              <div class="form-group">
                <label for="name">First Name</label>
                <input
                  type="text"
                  name="name"
                  id="name"
                  class="form-control"
                  placeholder="Name"
                  v-model="student.name"
                />
              </div>
              <div class="form-group">
                <label for="name">Other Name</label>
                <input
                  type="text"
                  name="oname"
                  id="name"
                  class="form-control"
                  placeholder="Name"
                  v-model="student.oname"
                />
              </div>
              <div class="form-group">
                <label for="surname">Surname</label>
                <input
                  type="text"
                  name="surname"
                  id="father_name"
                  class="form-control"
                  placeholder="Surname"
                  v-model="student.surname"
                />
              </div>
              <div class="form-group">
                <label for="gender">Gender</label>
                <select
                  class="form-control"
                  name="gender"
                  id="gender"
                  v-model="student.gender"
                >
                  <option value="1">Male</option>
                  <option value="2">Female</option>
                </select>
              </div>
              <div class="form-group">
                <label for="contact">Reg.No</label>
                <input
                  type="text"
                  name="reg_no"
                  id="contact"
                  class="form-control"
                  placeholder="Reg.no"
                  v-model="student.reg_no"
                />
              </div>
              <div class="form-group">
                <label for="roll_no">Date of Birth</label>
                <input
                  type="date"
                  name="dob"
                  id="roll_no"
                  class="form-control"
                  placeholder="Roll Number"
                  v-model="student.dob"
                />
              </div>
              <div class="form-group">
                <label for="contact">Email</label>
                <input
                  type="email"
                  name="email"
                  id="email"
                  class="form-control"
                  placeholder="Contact"
                  v-model="student.email"
                />
              </div>
              <div class="form-group">
                <label for="contact">Contact</label>
                <input
                  type="text"
                  name="contact"
                  id="contact"
                  class="form-control"
                  placeholder="Contact"
                  v-model="student.contact"
                />
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input
                  type="text"
                  name="address"
                  id="address"
                  class="form-control"
                  placeholder="Address"
                  v-model="student.address"
                />
              </div>
              <div class="form-group">
                <label for="email">Parent Email</label>
                <input
                  type="text"
                  name="p_email"
                  id="email"
                  class="form-control"
                  v-model="student.p_email"
                />
              </div>
              <div class="form-group">
                <label for="email">Special case? (Yes/NO)</label>
                <input
                  type="text"
                  name="identification_mark"
                  id="email"
                  class="form-control"
                  placeholder=""
                  v-model="student.identification_mark"
                />
              </div>
              <div class="form-group text-right">
                <button class="btn btn-success btn-sm">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div> 
      
          
    </div>
  

</template>

<script>
  const BASE_URL = window.location.origin;


  export default {
      
    data() {
        
      return {
           
        students: {},
        student: {
        student_id: "",
        name: "",
        surname: "",
        roll_no: "",
        gender: "",
        contact: "",
        address: "",
        p_email: "",
        email: "",
        dob: "",
        identification_mark: "",
      },
        assignedSubjects: [],
        unassignedSubjects: [],
        student_id: '', 
        subject_id: '',
        id: '',
        succmsg: true,
        showmodal: false,
        actionmsg: '',
        s:{},
        
        comments:{
          comment:'',
          hcomment:'',
        },
         editComments:{
          comment:'',
          hcomment:'',
        },
        comment_id:'',
        T_id :'',
        chosen: '',
        item: {},
        add_student: {
          term_id : '',
          stud_id: '',
        },
        myId:{}, 
        behaviour:{},
        attendance:{},
        bev_id:'',
        attend_id:'',
        query:'',
        results:{},
        subjComment:'',
        ebehaviour:{},
        eattendance:{},

      }
    },
    computed: {
          orderedComment: function () {
            return _.orderBy(this.comments, 'student')
          },
          orderedBehave: function () {
            return _.orderBy(this.behaviour, 'student')
          },
           orderedAttend: function () {
            return _.orderBy(this.attendance, 'student')
          },
    },
    
    methods: {
      studentLists() {
                 
        
        this.$http.get( BASE_URL + '/api/students').then(response => {
          //this.posts = response.data.data;
          this.students = response.data
         
        })
      },
      autoComplete(){
                   
            this.$http.post(BASE_URL +'/api/search',{query: this.query}).then(response => {
            this.results = response.data;
            });  
      },
      addbutton(studentid){
        this.add_student.stud_id =studentid
        this.addStudent(this.add_student.stud_id)

      },
      addStudent(id) {
         this.add_student.term_id  = this.T_id.id,
        this.$http
          .post( BASE_URL +'/api/add_student_class/'+id+'/term/'+ this.add_student.term_id +'/class/'+this.myId.id , {
             term_id: this.add_student.term_id ,
            student_id: this.add_student.stud_id,
            class_id:this.myId.id
          })
          .then(data => {
            this.student_id = ''
            this.add_student.stud_id =''
                       
            var self = this
            setTimeout(function() {
              self.succmsg = true
            }, 3000)
            this.actionmsg = 'Student Added successfully!'
             
          $('#exampleModalCenter').modal('hide')
          $('body')
            .removeClass()
            .removeAttr('style')
          $('.modal-backdrop').remove()
          this.studentLists()
              this.fetchComment()
              this.fetchBehave() 
              this.fetchAttend()
          })
      },
      editStudent(studentid) {
      this.$http.get(BASE_URL + "/api/students/" + studentid).then((data) => {
        this.student.name = data.data.data.name;
        this.student.reg_no = data.data.data.reg_no;
        this.student.oname = data.data.data.oname;
        this.student.dob = data.data.data.dob;
        this.student.surname = data.data.data.surname;
        this.student.p_email = data.data.data.p_email;
        this.student.email = data.data.data.email;
        this.student.gender = data.data.data.gender;
        this.student.roll_no = data.data.data.roll_no;
        this.student.contact = data.data.data.contact;
        this.student.address = data.data.data.address;
        this.student.s_class = data.data.data.s_class;
        this.student.term_id = data.data.data.term_id;
        this.student.photo = data.data.data.photo;
        this.id = studentid;
      });
    },
    onFileSelected(e) {
      let files = e.target.files || e.dataTransfer.files;
      if (!files.length) return;
      this.createImage(files[0]);
    },
    createImage(file) {
      let reader = new FileReader();
      let vm = this;
      reader.onload = (e) => {
        vm.selectedFile = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    updateStudent() {
      this.$http
        .patch(BASE_URL + "/api/students/" + this.id, {
          student_id: this.id,
          name: this.student.name,
          reg_no: this.student.reg_no,
          oname: this.student.oname,
          surname: this.student.surname,
          email: this.student.email,
          dob: this.student.dob,
          gender: this.student.gender,
          photo: this.student.photo,
          contact: this.student.contact,
          roll_no: this.student.roll_no,
          address: this.student.address,
          s_class: this.student.s_class,
          term_id: this.student.term_id,
          photo: this.selectedFile,
        })
        .then((data) => {
          this.succmsg = false;
          console.log(data);
          this.student.name = "";
          this.student.oname = "";
          this.student.dob = "";
          this.student.term_id = "";
          this.student.email = "";
          this.student.surname = "";
          this.student.gender = "";
          this.student.reg_no = "";
          this.student.contact = "";
          this.student.address = "";
          this.student.p_email = "";
          this.student.s_class = "";
          this.student.photo = "";
          this.student.identification_mark = "";
          var self = this;
          setTimeout(function () {
            self.succmsg = true;
          }, 3000);
          this.actionmsg = "Data updated successfully";
          $("#exampleModal19").modal("hide");
          $("body").removeClass().removeAttr("style");
          $(".modal-backdrop").remove();
          this.studentLists();
          this.fetchComment();
          this.fetchBehave();
          this.fetchAttend();
          this.fetchPdata();
          this.fetchMyGoal();
        });
    },
      unassignedSubjectsList(student,term_id) {
        this.$http.get(BASE_URL + '/api/students/'+student+'/unassignedsubjects/class/'+this.myId.id+'/term/'+this.T_id.id).then(response => {
          this.unassignedSubjects = response.data;
          this.student_id = student;
          this.assignedSubjectsList(student);
        })
      },
      assignedSubjectsList(student,term_id) {
        this.$http.get(BASE_URL +'/api/students/'+student+'/assignedsubjects/class/'+this.myId.id+'/term/'+this.T_id.id).then(response => {
          this.assignedSubjects = response.data
        })
      },
      
      assignSubject(student_id, subject_id,term_id){
        this.$http
          .post( BASE_URL +'/api/students/'+student_id+'/assignsubject/'+subject_id+'/class/'+this.myId.id+'/term/'+this.T_id.id, {
            student_id: this.student_id,
            subject_id: this.subject_id,
            term_id : this.T_id.id
          })
          .then(data => {
            this.subject_id = '';
            this.assignedSubjectsList(student_id);
            this.unassignedSubjectsList(student_id);
            var self = this
            setTimeout(function() {
              self.succmsg = true
            }, 3000)
          })
      },
      assignSubjectToMyStudents(){
        this.$http
          .post(BASE_URL+ '/api/assign_all_subjects_to_students', {
            class_id: this.myId.id,
            term_id : this.T_id.id
          })
          .then(data => {
            this.subject_id = '';
            var self = this
            setTimeout(function() {
              self.succmsg = true
            }, 3000)
            this.actionmsg = 'All Subjects assigned successfully!'
            $('#allSubject').modal('hide')
            $('body')
              .removeClass()
              .removeAttr('style')
            $('.modal-backdrop').remove()
               this.studentLists()
              this.fetchComment()
              this.fetchBehave() 
              this.fetchAttend()
          })
      },
       removeSubjectToMyStudents(){
        this.$http
          .delete(BASE_URL +'/api/remove_all_subjects_from_students/'+this.T_id.id+'/class/'+this.myId.id, {
            class_id: this.myId.id,
            term_id : this.T_id.id
          })
          .then(data => {
            this.subject_id = '';
            var self = this
            setTimeout(function() {
              self.succmsg = true
            }, 3000)
            this.actionmsg = 'All Subjects removed successfully!'
          })
      },
      deleteSubject(studentid, subjectid) {
        this.$http
          .delete(BASE_URL + '/api/students/'+this.student_id+'/deletesubject/'+subjectid+'/class/'+this.myId.id+'/term/'+this.T_id.id, {
                  
                  student_id: this.student_id,
                  subject_id: subjectid,
            
                  })
          .then(data => {
            this.subjectid = '';
            this.assignedSubjectsList(this.student_id);
            this.unassignedSubjectsList(this.student_id);
            var self = this
            setTimeout(function() {
              self.succmsg = true
            }, 3000)
          })
      },
      re_move(studentid) {
        this.id = studentid
      
      },
      fetchComment(){
       this.$http.get( BASE_URL + '/api/comment/class/'+this.myId.id+'/term/'+this.T_id.id).then(response => {
          this.comments = response.data.data;
          
       })
          
      },
      fetchBehave(){
       this.$http.get( BASE_URL +'/api/behave/class/'+this.myId.id+'/term/'+this.T_id.id).then(response => {
          this.behaviour = response.data.data;
          
       })
          
      },
      fetchAttend(){
       this.$http.get(BASE_URL +'/api/attendance/class/'+this.myId.id+'/term/'+this.T_id.id).then(response => {
          this.attendance = response.data.data;
         
       })
          
      },
      getId(comment) {
        this.comment_id= comment
      },
      attId(comments) {
        this.attend_id= comments
      },
      editComent(commentid) {
        this.$http.get(BASE_URL + '/api/comments/' + commentid).then(data => {
          this.editComments.hcomment  = data.data.data.hcomment
         this.editComments.comment  = data.data.data.comment
          this.comment_id= commentid
        })
       
      },
      updateComment() {
        this.$http
          .put(BASE_URL + '/api/comments/' + this.comment_id, {
            comment_id: this.comment_id,
            comment: this.editComments.comment,
            hcomment: this.editComments.hcomment,
          })
          .then(data => {
            this.succmsg = false
            console.log(data)         
            var self = this
            this.comment_id =''
            this.editComments.comment =''
            this.editComments.hcomment =''
            setTimeout(function() {
              self.succmsg = true
            }, 3000)
            this.actionmsg = 'Comment Added successfully'
            $('#exampleMod123').modal('hide')
            $('body')
              .removeClass()
              .removeAttr('style')
            $('.modal-backdrop').remove()
            this.studentLists()
            this.fetchComment()
            this.fetchBehave() 
            this.fetchAttend()
          })
      },
      removeStudent() {
        this.$http.delete(BASE_URL + '/api/remove_stud_in_class/student/'+this.id+'/class/'+this.myId.id+'/term/'+this.T_id.id).then(data => {
          this.succmsg = false
          var self = this
          setTimeout(function() {
            self.succmsg = true
          }, 3000)

          this.actionmsg = 'Student taken off Class.'
          this.id = ''
          
          $('#delModal12').modal('hide')
          $('body')
            .removeClass()
            .removeAttr('style')
          $('.modal-backdrop').remove()
          this.studentLists()
            this.fetchComment()
            this.fetchBehave() 
            this.fetchAttend()
        })
      },
      hideModal() {
        $('#exampleModal2').modal('hide')
        $('body')
          .removeClass()
          .removeAttr('style')
        $('.modal-backdrop').remove()
      },

      bevId(comment) {
        this.bev_id= comment
        
        
      },
      editBehaviour(bevid){
         this.$http
          .get(BASE_URL + '/api/behaviour/'+ bevid, {
            behave_id: bevid,
            pic:this.ebehaviour.pic,
            la:this.ebehaviour.la,
            fift:this.ebehaviour.fift,
            cwot:this.ebehaviour.cwot,
            anc :this.ebehaviour.anc,
            efao:this.ebehaviour.efao,
            srk:this.ebehaviour.srk,
            hwc :this.ebehaviour.hwk,
            catt:this.ebehaviour.catt,
            care:this.ebehaviour.care,
            res :this.ebehaviour.res,
            Hon:this.ebehaviour.Hon,
            init:this.ebehaviour.init,
            lead:this.ebehaviour.lead,
            dressc :this.ebehaviour.dressc,
            obey:this.ebehaviour.obey,
            pol:this.ebehaviour.pol,
            team:this.ebehaviour.team,
            soc:this.ebehaviour.soc,
            psy:this.ebehaviour.psy,
            sport:this.ebehaviour.sport,
            notec:this.ebehaviour.notec,
            spoken:this.ebehaviour.spoken, 
            mus:this.ebehaviour.mus,
            craft:this.ebehaviour.craft,
           
          })
           this.bev_id= bevid
      },
      updateBehaviour() {
        this.$http
          .put(BASE_URL + '/api/behaviour/'+ this.bev_id, {
            behave_id: this.bev_id,
            pic:this.ebehaviour.pic,
            la:this.ebehaviour.la,
            fift:this.ebehaviour.fift,
            cwot:this.ebehaviour.cwot,
            anc :this.ebehaviour.anc,
            efao:this.ebehaviour.efao,
            srk:this.ebehaviour.srk,
            hwc :this.ebehaviour.hwk,
            catt:this.ebehaviour.catt,
            care:this.ebehaviour.care,
            res :this.ebehaviour.res,
            Hon:this.ebehaviour.Hon,
            init:this.ebehaviour.init,
            lead:this.ebehaviour.lead,
            dressc :this.ebehaviour.dressc,
            obey:this.ebehaviour.obey,
            pol:this.ebehaviour.pol,
            team:this.ebehaviour.team,
            soc:this.ebehaviour.soc,
            psy:this.ebehaviour.psy,
            sport:this.ebehaviour.sport,
            notec:this.ebehaviour.notec,
            spoken:this.ebehaviour.spoken, 
            mus:this.ebehaviour.mus,
            craft:this.ebehaviour.craft,
          })
          .then(data => {
            this.succmsg = false
            this.ebehaviour.pic = '';
            this.ebehaviour.la = '';
            this.ebehaviour.fift = '';
            this.ebehaviour.cwot = '';
            this.ebehaviour.anc = '';
            this.ebehaviour.efao = '';
            this.ebehaviour.srk = '';
            this.ebehaviour.hwk = '';
            this.ebehaviour.catt = '';
            this.ebehaviour.care = '';
            this.ebehaviour.res = '';
            this.ebehaviour.Hon = '';
            this.ebehaviour.init = '';
            this.ebehaviour.lead = '';
            this.ebehaviour.dressc = '';
            this.ebehaviour.obey = '';
            this.ebehaviour.pol = '';
            this.ebehaviour.team = '';
            this.ebehaviour.soc = '';
            this.ebehaviour.psy = '';
            this.ebehaviour.sport = '';
            this.ebehaviour.notec = '';
            this.ebehaviour.spoken = '';
            this.ebehaviour.mus = '';
            this.ebehaviour.craft = '';      
            var self = this
            setTimeout(function() {
              self.succmsg = true
            }, 3000)
            this.actionmsg = 'Behavioural Chart  Added successfully'
            $('#exampleModbev').modal('hide')
            $('body')
              .removeClass()
              .removeAttr('style')
            $('.modal-backdrop').remove()
             this.studentLists()
              this.fetchComment()
              this.fetchBehave() 
              this.fetchAttend()
          })
      },

      updateAttendance() {
        this.$http
          .put(BASE_URL + '/api/attendance/'+ this.attend_id, {
            attend_id: this.attend_id,
            dp:this.attendance.dp,
            da:this.attendance.da,
            tar:this.attendance.tar,
           
          })
          .then(data => {
            this.succmsg = false
            var self = this
            this.attendance.dp =''
            this.attendance.da=''
            this.attendance.tar=''
            
            
            setTimeout(function() {
              self.succmsg = true
            }, 3000)
            this.actionmsg = 'Attendance Chart  Added successfully'
            $('#exampleModattend').modal('hide')
            $('body')
              .removeClass()
              .removeAttr('style')
            $('.modal-backdrop').remove()
             this.studentLists()
              this.fetchComment()
              this.fetchBehave() 
              this.fetchAttend()
          })
      },
      getSubjComment(term_id,class_id){
        this.$http.get(BASE_URL+'/api/Subjcomment/term/'+term_id+'/class/'+class_id).then(response => {
          this.subjComment = response.data.data;
          
       })
      }
    },
    
    props:['terms','t','m'],
    mounted() {
      
      this.s = this.terms,
      this.T_id =this.t,
      this.myId = this.m,
      this.studentLists()
      this.fetchComment()
      this.fetchBehave() 
      this.fetchAttend()
      
      
    }
  }

</script>

<style scoped>

  .succmsg {
    display: none;
  }
  .showmodal {
    display: none !important;
    opacity: 0;
  }

@import "../../../../node_modules/@syncfusion/ej2-base/styles/material.css";
@import "../../../../node_modules/@syncfusion/ej2-inputs/styles/material.css";
@import "../../../../node_modules/@syncfusion/ej2-vue-dropdowns/styles/material.css";

  #app {
    color: #008cff;
    height: 40px;
    left: 35%;
    position: absolute;
    top: 35%;
    width: 30%;
  }
  #btn {
  margin:40px auto;
  display:block;
  background-color: green;
}

</style>
