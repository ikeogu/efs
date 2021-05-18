<template>

  <div id="postsrec" class="mt-5">

    <div class="row mt-5">
      <div class="col-lg-12 text-right" style="margin-bottom: 20px;">
        <a href="#"
           data-target="#exampleModal"
           data-toggle="modal"
           class="btn btn-success">Add Teacher</a>
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
             id="exampleModal"
             tabindex="-1"
             role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true"
             v-bind:class="{ showmodal:showmodal }">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
             
              <div class="modal-body">
                <form method="post" name="addteacher" id="addteacher" action="#" @submit.prevent="addTeacher">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" v-model="teacher.name" />
                  </div>
                  <div class="form-group">
                    <label >Start Year</label>
                    <input type="text" name="start_year"  class="form-control" placeholder="Year Started Work" v-model="teacher.start_year"
                    />
                  </div>
                  
                  <div class="form-group">
                    <label for="address">Choose status</label>
                    <select class="form-control" name="status" v-model="teacher.status"  placeholder="Choose Status">
                      
                     <option>Choose Status</option>
                     <option value="Corp member">Corp Member</option>
                     <option valie="Staff">Staff</option>
                    
                    </select>
                </div>

                  <div class="form-group">
                    <label for="address">Choose a Class</label>
                    <select class="form-control" name="level" v-model="teacher.level"  placeholder="Choose Class">
                      
                     
                     <option value="Early Years">Early Years</option>
                     <option value="Junior High School"> Junior High School</option>
                     <option value="Senior High School"> Senior High School</option>
                     <option valie="Year School">Year School</option>
                     
                    </select>
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-success">Submit</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
<!-- Modal to Add Teacher -->
        <div class="modal fade"
             id="exampleModal1"
             tabindex="-1"
             role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true"
             v-bind:class="{ showmodal:showmodal }">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
              </div>
              <div class="modal-body">
                <form method="post" name="updateteacher" id="updateteacher" action="#" @submit.prevent="updateTeacher">
                  <div class="form-group">
                    <label for="name">teacher Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" v-model="teacher.name" />
                  </div>
                  <div class="form-group">
                    <label >Start Year</label>
                    <input type="text" name="start_year"  class="form-control" placeholder="Year Started Work" v-model="teacher.start_year"
                    />
                  </div>
                  
                  <div class="form-group">
                    <label for="address">Choose status</label>
                    <select class="form-control" name="status" v-model="teacher.status"  placeholder="Choose Status">
                      
                     <option>Choose Status</option>
                     <option value="Corp member">Corp Member</option>
                     <option valie="Staff"> Staff</option>
                    
                    </select>
                </div>
                 

                  <div class="form-group">
                    <label for="address">Choose a Class</label>
                    <select class="form-control" name="level" v-model="teacher.level"  placeholder="Choose Class">
                      
                                          
                     <option value="Early Years">Early Years</option>
                     <option value="Junior High School"> Junior High School</option>
                     <option value="Senior High School"> Senior High School</option>
                     <option valie="Year School">Year School</option>
                    </select>
                </div>
                  
                  <div class="form-group text-right">
                    <button class="btn btn-success">Submit</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
<!-- Moadal to Delete a techer -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <p>Are you sure want to delete the record? </p>
                </div>
                <div class="form-group text-center">
                  <button class="btn btn-success" v-on:click="hideModal()">Cancel</button>
                </div>
                <div class="form-group text-center">
                  <button class="btn btn-success" v-on:click="deleteteacher()">Ok</button>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- Model to Activate or deactivate a teacher -->
         <div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Activate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <p>Are you sure want to activate teacher? </p>
                </div>
                <div class="form-group text-center">
                  <button class="btn btn-success" v-on:click="hideModal()">Cancel</button>
                </div>
                <div class="form-group text-center">
                  <button class="btn btn-success" v-on:click="activate()">Ok</button>
                </div>
              </div>

            </div>
          </div>
        </div>

         <div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deactivate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <p>Are you sure want to deactivate teacher? </p>
                </div>
                <div class="form-group text-center">
                  <button class="btn btn-success" v-on:click="hideModal()">Cancel</button>
                </div>
                <div class="form-group text-center">
                  <button class="btn btn-success" v-on:click="deactivate()">Ok</button>
                </div>
              </div>

            </div>
          </div>
        </div>
<!-- Modal to assign Subjeco teacher  -->
          <div class="modal fade"
             id="exampleModal12"
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
                <form v-if="this.unassignedSubjects.length > 0" method="post" name="assignsubjects" id="assignsubjects" action="#" @submit.prevent="assignSubject(teacher_id, subject_id)">

                  <div class="form-group">
                    <label for="gender">Assign Subjects</label>
                    <select class="form-control" name="subject" id="subject" v-model="subject_id">
                          <option v-for="subject in unassignedSubjects"  :key="subject.id" v-bind:value="subject.id">{{ subject.name }} | {{ subject.description }}</option>
                    </select>
                  </div>

                  <div class="form-group text-center">
                    <button class="btn btn-success">Submit</button>
                  </div>
                </form>
                <span v-else>All Subjects has been Assigned to this Teacher!</span>
                <br>

                <div class="card">
                  <div class="card-header">Assigned Subject</div>
                    <div class="card-body">
                      <table class="table table-striped table-bordered" style="width:100%">
                        <thead>
                          <tr>
                            <th>Subjects</th>
                                                        
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="subject in assignedSubjects" :key="subject.id">
                            <th scope="row">{{ subject.name }}</th>
                           
                            <td><a href="#" v-on:click="deleteSubject(teacher.teacher_id, subject.id)" class="btn btn-danger">Delete</a></td>
                          </tr>
                        </tbody>
                        
                      </table>
                    </div>
                  </div>
              </div>
              </div>

            </div>
          </div>
        
        <!-- End of modal -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success"> {{(orderedTeachers).length}} Teachers </h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <th>#</th>
                  <th> Name</th>
                  <th>Start year</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Level</th>
                  <th>Status</th>
                  
                  
                  <th colspan="2">Action</th>
                </thead>
              
                <tbody>
                    <tr v-for="(teacher, index) in orderedTeachers" :key="teacher.id">
                    <th scope="row">{{ index + 1 }}</th>
                    <td>{{ teacher.name }}</td>
                    <td>{{ teacher.start_year}}</td>
                    <td>{{ teacher.email }}</td>
                    <td>{{ teacher.track}}</td>
                    <td>{{ teacher.level }}</td>
                    <td>{{ teacher.status }}
                        <a href="#" class="btn btn-success text-white btn-block py-2 mb-2"
                       v-on:click="getTeacherId(teacher.id)"
                       data-target="#exampleModa"
                       data-toggle="modal"
                       v-bind:title="teacher.name">Assigned Class</a>
                    </td>
                    <td>
                      <a href="#" class="btn btn-success text-white btn-block py-2 mb-2"
                       v-on:click="unassignedSubjectList(teacher.id)"
                       data-target="#exampleModal12"
                       data-toggle="modal"
                       v-bind:title="teacher.name">Assign Subjects</a>

                       <a href="#" class="btn btn-info text-white btn-block py-2 mb-2"
                       v-on:click="getTeacherId(teacher.id)"
                       data-target="#exampleModal123"
                       data-toggle="modal"
                       v-bind:title="teacher.name">Make Class Teacher</a>

                    </td> 
                    <td>
                      
                      <a href="#" class="btn btn-info text-white btn-block py-2 mb-2"
                        v-on:click="editTeacher(teacher.id)"
                        data-target="#exampleModal1"
                        data-toggle="modal"
                        v-bind:title="teacher.name">Edit</a>
                        <a href="#" class="btn btn-danger text-white" data-target="#exampleModal2" v-on:click="deleteId(teacher.id)" 
                      data-toggle="modal" v-bind:id="id">Delete</a>
                      
                    </td>
                    <td>
                       <a href="#" class="btn btn-info text-white btn-block py-2 mb-2"
                        v-on:click="deleteId(teacher.id)"
                        data-target="#exampleModal3"
                        data-toggle="modal"
                        v-bind:title="teacher.name" >Lock</a>
                        <a href="#" class="btn btn-danger text-white" data-target="#exampleModal4" v-on:click="deleteId(teacher.id)" 
                      data-toggle="modal" v-bind:id="id">unlock</a>
                    </td>
                     <td>
                       <a href="#" class="btn btn-info text-white btn-block py-2 mb-2"
                        v-on:click="deleteId(teacher.id)"
                        data-target="#exampleModal5"
                        data-toggle="modal"
                        v-bind:title="teacher.name" >Activate</a>
                        <a href="#" class="btn btn-danger text-white" data-target="#exampleModal6" v-on:click="deleteId(teacher.id)" 
                      data-toggle="modal" v-bind:id="id">Deactivate</a>
                    </td>
                    </tr>
                </tbody>
              
             </table>
                <!-- <pagination :data="laravelData" :limit="3" @pagination-change-page="teacherLists">
                <span slot="prev-nav">&lt; Previous</span>
                <span slot="next-nav">Next &gt;</span>
                </pagination> -->
          </div>
        </div>
        </div>
      </div>
    </div>
    <!-- Modal to lock class -->
       <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Lock Teacher</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body ">
                <div class="row card-body">
                    <form method="post"  action="#" @submit.prevent="lockTeacher">
                      <div class="form-group">
                          
                        <label for="address">Academic Session</label>
                        <select class="form-control" name="term_id" v-model="term__id"  >
                          
                          <option v-for="term in laravelTerm" v-bind:key="term.id" v-bind:value="term.id">
                              {{term.name}} ({{term.session}})
                          </option>
                        </select>
                      </div>
                        <div class="form-group text-right">
                          <button class="btn btn-success">Submit</button>
                        </div>
                    </form>
                                   
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                
              </div>
            </div>
          </div>
        </div>
        <!-- Modal to lock class -->
       <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">unLock Teacher</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body ">
                <div class="row card-body">
                    <form method="post"  action="#" @submit.prevent="unlockTeacher">
                      <div class="form-group">
                          
                        <label for="address">Academic Session</label>
                        <select class="form-control" name="term_id" v-model="term__id"  >
                          
                          <option v-for="term in laravelTerm" v-bind:key="term.id" v-bind:value="term.id">
                              {{term.name}} ({{term.session}})
                          </option>
                        </select>
                      </div>
                        <div class="form-group text-right">
                          <button class="btn btn-success">Submit</button>
                        </div>
                    </form>
                                   
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                
              </div>
            </div>
          </div>
        </div>
    <!-- Modal  ofassigned classes-->
        <div class="modal fade" id="exampleModa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Assigned Class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body ">
                <div class="row card-body">
                 
                    <div class="table-responsive">
                      
                        <table class="table table-bordered">
                          <thead>
                           <th>#</th>
                            <th>Class</th>
                            <th> Term</th>
                            <th> Action</th>
                          </thead>
                          <tbody>
                          <tr v-for="(m,index) in mclass" :key="m.id">
                           <td>{{index + 1}}</td>
                            <td>{{m.myclass}}</td>
                            <td>{{m.term_}}</td>
                            <td>
                               <a href="#" class="btn btn-danger text-white" v-on:click="removeClassTeacher(m.id)" 
                               v-bind:id="id">Delete</a>
                            </td>
                          </tr>
                          </tbody>
                        </table>
                      
                    </div>
                  
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                
              </div>
            </div>
          </div>
        </div>
  
    <!-- Modal  to assign class-->
        <div class="modal fade" id="exampleModal123" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Assign Class Teacher</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body ">
                <div class="row ">
                 
                    <div class="card-body">
                       <form  method="post" name="classteacher" id="classteacher" action="#" @submit.prevent="classTeacher(item.teacher_id, item.class_id,item.term_id)">

                        <div class="form-group">
                          <label for="gender">Choose class</label>
                          <select class="form-control" name="class_name" v-model="item.class_id">
                                <option v-for="classes in orderedclasses "  :key="classes.id" v-bind:value="classes.id">
                                {{ classes.name }} {{ classes.description }}
                                </option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="gender">Choose Term</label>
                          <select class="form-control" name="subject" id="subject" v-model="item.term_id">
                                <option v-for="term in classLists"  :key="term.id" v-bind:value="term.id">{{ term.name }} | {{ term.session }}</option>
                          </select>
                        </div>

                        <div class="form-group text-center">
                          <button class="btn btn-success btn-block">Submit</button>
                        </div>
                      </form>
                    </div>
                  
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                
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
        teacher: {
          teacher_id:'',
          name: '',
          start_year: '',
          level:'',
          status:'',

          
        },
        laravelData: [],
       classLists:{
          //  id:'',
          // name:'',
          // description:''
        },
        laravelClassData:{},
        laravelTerm:{},
        item:{
          class_id:'',
          term_id:'',
          teacher_id:'',
        },
        term__id:'',
        id: '',
        myclass:'',
        mclass:{},
        unassignedSubjects:{},
        assignedSubjects:{},
        subject_id:'',
        succmsg: true,
        showmodal: false,
        pagenumber: 1,
        actionmsg: ''
      }
    },
    computed: {
          orderedclasses: function () {
            return _.orderBy(this.laravelClassData, 'name')
          },
           orderedTeachers: function () {
            return _.orderBy(this.laravelData, 'name')
          },
          
    },
    ready: function() {
      this.fetchClasses();
      },
      
        
    methods: {

      fetchClasses() {
        this.$http.get(BASE_URL + '/api/schclasses').then(response => {
          //this.posts = response.data.data;
          this.laravelClassData = response.data.data
          
        })
      },
      fetchTerms() {
        this.$http.get(BASE_URL + '/api/terms').then(responses => {
          //this.posts = response.data.data;
          this.laravelTerm = responses.data.data
        })   
      },
      teacherLists(page) {
        if (typeof page === 'undefined') {
          page = 1
        }
        this.$http.get(BASE_URL + '/api/teachers?page=' + page).then(response => {
          //this.posts = response.data.data;
          this.laravelData = response.data.data
          console.log(this.laravelData)
          this.pagenumber = page
        })
      },
      addTeacher() {
        this.$http
          .post(BASE_URL + '/api/teachers', {
            
            start_year: this.teacher.start_year,
            level: this.teacher.level,
            status: this.teacher.status,
            name: this.teacher.name

          })
          .then(data => {
            this.succmsg = false
            console.log(data)
            this.teacher.name = ''
            this.teacher.start_year = ''
            this.teacher.level= ''
             this.teacher.status= ''
            var self = this
            setTimeout(function() {
              self.succmsg = true
            }, 3000)
            this.actionmsg = 'Teacher inserted successfully'
            
            $('#exampleModal').modal('hide')
            $('body')
              .removeClass()
              .removeAttr('style')
            $('.modal-backdrop').remove()
            this.teacherLists(this.pagenumber)
          })
      },
      editTeacher(teacherid) {
        this.$http.get(BASE_URL + '/api/teachers/' + teacherid).then(data => {
          
          this.teacher.name = data.data.data.name
          this.teacher.start_year = data.data.data.start_year
          this.teacher.level = data.data.data.level
          this.teacher.status = data.data.data.status
          this.id = teacherid
        })
      },
      updateTeacher() {
        this.$http
          .put(BASE_URL + '/api/teachers/' + this.id, {
            teacher_id:this.id,
            name: this.teacher.name,
            start_year: this.teacher.start_year,
            level: this.teacher.level,
            status: this.teacher.status,
          })
          .then(data => {
            this.succmsg = false
            console.log(data)
            this.teacher.name = ''
            this.teacher.start_year= ''
            this.teacher.level = ''
            this.teacher.status =''
           
            var self = this
            setTimeout(function() {
              self.succmsg = true
            }, 3000)
            this.actionmsg = 'Teacher updated successfully'
            $('#exampleModal1').modal('hide')
            $('body')
              .removeClass()
              .removeAttr('style')
            $('.modal-backdrop').remove()
            this.teacherLists(this.pagenumber)
          })
      },
      deleteId(teacherid) {
        this.id = teacherid
      },
      deleteteacher() {
        this.$http.delete(BASE_URL + '/api/teachers/' + this.id).then(data => {
          this.succmsg = false
          var self = this
          setTimeout(function() {
            self.succmsg = true
          }, 3000)

          this.actionmsg = 'Teacher deleted successfully'
          this.teacherLists(this.pagenumber)
          $('#exampleModal2').modal('hide')
          $('body')
            .removeClass()
            .removeAttr('style')
          $('.modal-backdrop').remove()
           this.teacherLists(this.pagenumber)
        })
      },
      lockTeacher() {
        this.$http.post(BASE_URL + '/api/block_teacher',{
            
            term_id: this.term__id,
            teacher_id: this.id,
            
          }).then(data => {
          this.succmsg = false
          var self = this
          this.term__id=''
          setTimeout(function() {
            self.succmsg = true
          }, 3000)

          this.actionmsg = 'Teacher Locked successfully'
          this.teacherLists(this.pagenumber)
          $('#exampleModal3').modal('hide')
          $('body')
            .removeClass()
            .removeAttr('style')
          $('.modal-backdrop').remove()
        })
      },
      unlockTeacher() {
        this.$http.post(BASE_URL + '/api/unblock_teacher',{
            
            term_id: this.term__id,
            teacher_id: this.id,
            
          }).then(data => {
          this.succmsg = false
          var self = this
          this.term__id=''
          setTimeout(function() {
            self.succmsg = true
          }, 3000)

          this.actionmsg = 'Teacher unLocked successfully'
          this.teacherLists(this.pagenumber)
          $('#exampleModal4').modal('hide')
          $('body')
            .removeClass()
            .removeAttr('style')
          $('.modal-backdrop').remove()
        })
      },

      activate() {
        this.$http.post(BASE_URL + '/api/activate',{
            
            teacher_id: this.id,
            
          }).then(data => {
          this.succmsg = false
          var self = this
          this.term__id=''
          setTimeout(function() {
            self.succmsg = true
          }, 3000)

          this.actionmsg = 'Teacher Activated successfully'
          this.teacherLists(this.pagenumber)
          $('#exampleModal5').modal('hide')
          $('body')
            .removeClass()
            .removeAttr('style')
          $('.modal-backdrop').remove()
        })
      },
      deactivate() {
        this.$http.post(BASE_URL + '/api/deactivate',{
            
            teacher_id: this.id,
            
          }).then(data => {
          this.succmsg = false
          var self = this
          this.term__id=''
          setTimeout(function() {
            self.succmsg = true
          }, 3000)

          this.actionmsg = 'Teacher Deactivated successfully'
          this.teacherLists(this.pagenumber)
          $('#exampleModal6').modal('hide')
          $('body')
            .removeClass()
            .removeAttr('style')
          $('.modal-backdrop').remove()
        })
      },
      hideModal() {
        $('#exampleModal2').modal('hide')
        $('body')
          .removeClass()
          .removeAttr('style')
        $('.modal-backdrop').remove()
      },

        unassignedSubjectList(subject) {
        this.$http.get(BASE_URL + '/api/teachers/'+subject+'/unassignedsubjects').then(response => {
          this.unassignedSubjects = response.data;
          
          this.teacher.teacher_id = subject;
          this.assignedSubjectList(subject);
        })
      },
      assignedSubjectList(subject) {
        this.$http.get(BASE_URL + '/api/teachers/'+subject+'/assignedsubjects').then(response => {
          this.assignedSubjects = response.data
        })
      },
      assignSubject(teacher_id, subject_id){
        this.$http
          .post(BASE_URL + '/api/teachers/'+this.teacher.teacher_id+'/assignsubject/'+subject_id, {
            teacher_id: this.teacher.teacher_id,
            subject_id: this.class_id,
          })
          .then(data => {
            this.subject_id = '';
            this.assignedSubjectList(this.teacher.teacher_id);
            this.unassignedSubjectList(this.teacher.teacher_id);
            var self = this
            setTimeout(function() {
              self.succmsg = true
            }, 3000)
          })
      },
       classTerms() {

        this.$http.get(BASE_URL + '/api/terms').then(response => {
          //this.posts = response.data.data;
          this.classLists = response.data.data
          
        })
      },
      getTeacherId(id){
        this.item.teacher_id = id
        this.teacher_(this.item.teacher_id)
      },
      teacher_(t){
        this.$http.get(BASE_URL + '/api/teacher_c/'+t)
        .then(response => {
          this.mclass= response.data.data
          console.log(this.mclass)
        })
      },
      classTeacher(teacherid, classid,termid){
        this.$http
          .get(BASE_URL + '/api/assignclassteacher/'+teacherid +'/class/'+classid +'/term/'+termid)
          .then(response => {
          this.myclass= response.data.data
        
        }).then(data => {
            this.class_id = '';
            var self = this
            setTimeout(function() {
              self.succmsg = true
            }, 3000)
            
            this.actionmsg = 'Teacher has been assigned To Class'
            $('#exampleModal123').modal('hide')
            $('body')
              .removeClass()
              .removeAttr('style')
            $('.modal-backdrop').remove()
            
            
          })
      },
      removeClassTeacher(Tid){
        this.$http.delete(BASE_URL + '/api/removeClassTeacher/' +Tid).then(data => {
          this.succmsg = false
          var self = this
          setTimeout(function() {
            self.succmsg = true
          }, 3000)

          this.actionmsg = 'Class Teacher removed successfully'
          this.teacherLists(this.pagenumber)
          $('#exampleModa').modal('hide')
          $('body')
            .removeClass()
            .removeAttr('style')
          $('.modal-backdrop').remove()
        })
         this.teacherLists(this.pagenumber)
    
      },
      deleteSubject(teaid, subid){
          this.$http
          .delete(BASE_URL + '/api/teachers/'+teaid+'/deletesubject/'+subid, {
            teacher_id: this.teacher_id,
            subject_id: this.subid,
          })
          .then(data => {
            this.subject_id = '';
            this.teacher_id = '';
            this.assignedSubjectsList(this.teacher.teacher_id);
            this.unassignedSubjectsList(this.teacher.teacher_id);
            var self = this
            setTimeout(function() {
              self.succmsg = true
            }, 3000)
          })
      }
    },
    // asssign a subject to teacher

    mounted() {
      this.fetchClasses();
      this.teacherLists()
      this.classTerms()
      this. fetchTerms()
      
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

</style>
