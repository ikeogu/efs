<template>

  <div id="postsrec" class="mt-5">

    

    <div class="row justify-content-center">
      <div v-bind:class="{ succmsg: succmsg }">
        <div class="col-md-12 col-lg-12">
          <div class="alert alert-success cusmsg">{{ actionmsg }}</div>
        </div>
      </div>
      <div class="col-12 full" >
        <div class="col-md-6 mb-4 full">
            <div class="card shadow mb-4">
              <div class="card-header py-2">
                <h6 class="m-0 font-weight-bold text-success">Subjects You Teach</h6>
              </div>
              <div class="card-body">          
                <div class="col-12">

                  <div v-for="cla in mySubjects"  :key="cla.id" class="card"  >
                  
                    
                    <a href="#" class="btn btn-warning"  
                      v-bind:id="cla.id" data-toggle="modal"
                      v-on:click="getSubjectId(cla.id)" 
                      data-target="#exampleModalCenter">{{cla.name}}</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="col-md-12 full">
        <div class="col-lg-12 mb-4 full">

          <!-- Project Card Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-2">
              <h6 class="m-0 font-weight-bold text-success">Subject Offered By Students in {{class_.name}} {{class_.description}}</h6>
            </div>
            <div class="card-body">          
              <div class="col-12 table-responsive" v-if="class_.status =='Year School' ||class_.status =='Early Years'" >
                <table  class="table" id="hide" v-if="seen">
                  <thead >
                    <th scope="col">Student</th>
                    <th scope="col">Subject</th>
                      <th scope="col">Hw</th>
                      <th scope="col">CW</th>
                      <th scope="col">HA</th>
                      <th scope="col">FT</th>
                      <th scope="col">S.T 1</th>
                      <th scope="col">S.T 2</th>
                      <th scope="col">TCA</th>
                      <th scope="col">Exam</th>
                      <th scope="col">Grand Total</th>
                      <th scope="col">Action</th>  
                  </thead>
                  <tbody v-if="student_mark != ''">
                    
                    <tr  v-for="marks in student_mark" :key="marks.id" :subject_id="marks.subject_id">
                        <td> {{marks.student}}</td>
                        <td> {{marks.subject}}</td>
                        <td>{{marks.HW}}</td>
                        <td>{{marks.CW}}</td>
                        <td>{{marks.HA}}</td>
                          <td>{{marks.FT}}</td>
                          <td>{{marks.summative_1}}</td>
                          <td>{{marks.summative_test}}</td>
                          <td>{{marks.TCA}}</td>
                          <td>{{marks.Exam}}</td>
                          <td>{{marks.GT}}</td>


                        <td>  
                          <a href="#"
                            v-on:click="editScore(marks.id)"
                              data-target="#exampleModalEdit"
                              data-toggle="modal"
                              v-bind:title="marks.id"
                              class="btn btn-success">Edit
                          </a> 
                      </td>
                    </tr>
                    
                  </tbody>
                  <span v-else> Students has not been assigned Your Subject.<br>Kindly meet The Class Teacher to assign your subject to students.</span>
                </table>
              </div>
             
              <div class="col-12 table-responsive" v-if="class_.status =='Junior High School' || class_.status =='Senior High School'" >
                <table  class="table" id="hide" v-if="seen">
                  <thead >
                    <th scope="col">Student</th>
                    <th scope="col">Subject</th>
                      <th scope="col">C.A.T 1</th>
                      <th scope="col">C.A.T 2</th>
                      <th scope="col">MSC</th>
                      <th scope="col">TCA</th>
                      <th scope="col">Exam</th>
                      <th scope="col">Grand Total</th>
                      <th scope="col">Action</th>  
                  </thead>
                  <tbody v-if="student_mark != ''">
                    
                    <tr  v-for="marks in student_mark" :key="marks.id" :subject_id="marks.subject_id">
                        <td> {{marks.student}}</td>
                        <td> {{marks.subject}}</td>
                        <td>{{marks.CAT1}}</td>
                        <td>{{marks.CAT2}}</td>
                        <td>{{marks.MSC}}</td>
                        <td>{{marks.TCA}}</td>
                        <td>{{marks.Exam}}</td>
                        <td>{{marks.GT}}</td>
                          
                        <td >  
                          <a href="#"
                            v-on:click="editScore(marks.id)"
                              data-target="#exampleModalEdit"
                              data-toggle="modal"
                              v-bind:title="marks.id"
                              class="btn btn-success">Edit
                          </a> 
                      </td>
                    </tr>
                    
                  </tbody>
                  <span v-else> Students has not been assigned Your Subject.<br>Kindly meet The Class Teacher to assign your subject to students.</span>
                </table>
              </div>
              
           </div>
          </div>
        </div>
            
      </div>

      <!-- <div class="row">
        <div class="col-md-6 mb-4 full" id="div2">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Biodata</h6>
              </div>
              <div class="card-body">
                <div class="col-12 ">
                  <form  class="user" method="post" name="updateteacher" id="updateteacher" action="#" @submit.prevent="updateTeacher">
                      <div class="form-group row ">
                         
                          <div class="">
                              <input type="text" name="name" id="name" class="form-control form-control-user" placeholder="Name" v-model="logged_in.name">
                              <small>Name</small>
                          </div>
                      </div>
                      
                      

                      <div class="form-group row">
                         
                          <div class="">
                              <input type="text" name="dob" id="name" class="form-control form-control-user" placeholder="DOB" v-model="logged_in.dob">
                              <small>DOB</small>
                          </div>
                      </div>
                      

                      <div class="form-group row">
                          
                          <div class="">
                              <input type="text" name="email" id="name" class="form-control form-control-user" placeholder="" v-model="logged_in.email">
                              <small>Email</small>
                          </div>
                      </div>
                      
                      <div class="form-group row">
                          
                          <div class="">
                              <input type="text" name="level" id="name" class="form-control form-control-user"  v-model="logged_in.level">
                              <small>School</small>
                          </div>
                      </div>
                      <div class="form-group text-right">
                          <button class="btn btn-success">Update</button>
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div id="div1" >
          <h3>Show profile</h3>
          </div>
          <button id="preview" class="btn-success">Click Me</button>
      </div> -->
    </div>    
            
      <!-- Button trigger modal -->
        

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body ">
                <div class="row ">
                 
                    <div class="card-body">
                       <form  method="post" name="assignsubjects" id="assignsubjects" action="#" @submit.prevent="mySubjectClass(item.class_id, item.term_id,s_id)">

                        <div class="form-group">
                          <label for="gender">Choose class</label>
                          <select class="form-control" name="class_name"  v-model="item.class_id">
                                <option v-for="subject in class5 "  :key="subject.id" v-bind:value="subject.id">{{ subject.name }} |{{ subject.description }}</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="gender">Choose Term</label>
                          <select class="form-control" name="subject" id="subject" v-model="item.term_id">
                                <option v-for="subject in terms"  :key="subject.id" v-bind:value="subject.id">{{ subject.name }} | {{ subject.session }}</option>
                          </select>
                        </div>

                        <div class="form-group text-center">
                          <button class="btn btn-success" v-on:click="seen = !seen">Submit</button>
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
        <!-- edit Score -->
        <div class="modal fade"
             id="exampleModalEdit"
             tabindex="-1"
             role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true"
             v-bind:class="{ showmodal:showmodal }">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Score</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
              </div>
              <div class="modal-body">
                <form method="post" name="updatescore" id="updatescore" action="#" @submit.prevent="updateScore" v-if="logged_in.level == 'Senior High School' || logged_in.level ==='Junior High School'">

                   <div class="form-group">
                    <label for="roll_no">CAT 1</label>
                    <input type="text" name="CAT1"  class="form-control" placeholder="Enter CAT 1 Score" v-model="editstudent_mark.CAT1" />
                  </div>

                  <div class="form-group">
                    <label for="roll_no">CAT 2</label>
                    <input type="number" name="CAT2" class="form-control" placeholder="Enter CAT 2 Score" v-model="editstudent_mark.CAT2" />
                  </div>
                  <div class="form-group">
                    <label for="contact">MSC</label>
                    <input type="number" name="MSC"  class="form-control" placeholder="Enter MSC Score" v-model="editstudent_mark.MSC" />
                  </div>
                  <div class="form-group">
                    <label for="contact">Exam</label>
                    <input type="number" name="exam"  class="form-control" placeholder="Enter MSC Score" v-model="editstudent_mark.Exam" />
                  </div>

                  <div class="form-group text-center">
                    <button class="btn btn-success">Update</button>
                  </div>
                </form>
                
                 <form v-if="logged_in.level ==='Year School'" method="post" name="updatescore" id="updatescore" action="#" @submit.prevent="updateScore">

                   <div class="form-group">
                    <label for="roll_no">Home Work</label>
                    <input type="number" name="HW"  class="form-control"  v-model="editstudent_mark.HW" />
                  </div>
                  <div class="form-group">
                    <label for="roll_no">Class Work</label>
                    <input type="number" name="CW" class="form-control" placeholder="" v-model="editstudent_mark.CW" />
                  </div>
                  <div class="form-group">
                    <label for="contact">Friday Assignment</label>
                    <input type="number" name="FT"  class="form-control" v-model="editstudent_mark.FT" />
                  </div>
                  <div class="form-group">
                    <label for="roll_no">Holiday Assignment</label>
                    <input type="number" name="HA"  class="form-control"  v-model="editstudent_mark.HA" />
                  </div>
                  <div class="form-group" >
                    <label for="roll_no">Summative Test 1</label>
                    <input type="number" name="summative_1" class="form-control"  v-model="editstudent_mark.summative_1" >
                  </div>
                  <div class="form-group">
                    <label for="roll_no">Summative Test 2</label>
                    <input type="number" name="summative_test" class="form-control"  v-model="editstudent_mark.summative_test" >
                  </div>
                  
                  <div class="form-group">
                    <label for="contact">Exam</label>
                    <input type="number" name="exam"  class="form-control" v-model="editstudent_mark.Exam"  value=""/>
                  </div>

                  <div class="form-group text-center">
                    <button class="btn btn-success">Update</button>
                  </div>
                </form>
                <form v-if="logged_in.level ==='Early Years'" method="post" name="updatescore" id="updatescore" action="#" @submit.prevent="updateScore">

                   <div class="form-group">
                    <label for="roll_no">Home Work</label>
                    <input type="number" name="HW"  class="form-control"  v-model="editstudent_mark.HW" />
                  </div>
                  <div class="form-group">
                    <label for="roll_no">Class Work</label>
                    <input type="number" name="CW" class="form-control" placeholder="" v-model="editstudent_mark.CW" />
                  </div>
                  <div class="form-group">
                    <label for="contact">Friday Assignment</label>
                    <input type="number" name="FT"  class="form-control" v-model="editstudent_mark.FT" />
                  </div>
                  <div class="form-group">
                    <label for="roll_no">Holiday Assignment</label>
                    <input type="number" name="HA"  class="form-control"  v-model="editstudent_mark.HA" />
                  </div>
                 
                  <div class="form-group">
                    <label for="roll_no">Summative Test </label>
                    <input type="number" name="summative_test" class="form-control"  v-model="editstudent_mark.summative_test" >
                  </div>
                  
                  <div class="form-group">
                    <label for="contact">Exam</label>
                    <input type="number" name="exam"  class="form-control" v-model="editstudent_mark.Exam"  value=""/>
                  </div>

                  <div class="form-group text-center">
                    <button class="btn btn-success">Update</button>
                  </div>
                </form>
                            
              </div>

            </div>
          </div>
        </div>
    </div>
  
  
</template>
<style>
.full{
  padding-left: 0px !important;
  padding-right:0px !important;
}
[v-cloak] {
  display: none;
}
</style>
<script>
 $(function(){
    $("#div2").hide();
    $("#preview").on("click", function(){
        $("#div1, #div2").toggle();
    });
});
</script>
<script>
  const BASE_URL = window.location.origin;
 
  export default {
    data() {
      return {
        seen: false,
        logged_in:{
          surname:'',
          name:'',
          dob:'',
          

        },
        mySubjects:{},
        class_id:'',
        s_id:'',
        terms:{},
        myClasses: {},
        succmsg: true,
        showmodal: false,
        pagenumber: 1,
        actionmsg: '',
        terms:{},
        class5:{},
        item:{
          class_id:'',
          term_id:'',
        },
        class_:{},
        LockedTeacher:{},
        student_mark:{
          student_id:'',
          subname:'',
          subject_id:'',
          term_id:'',
    
          id:'',
          HA:'',
          CW:'',
          HW:'',
          FT:'',
          summative_test:'',
          summmative_1:'',
          CAT1:'',
          CAT2:'',
          Exam:'',
          MSC:'',
          
        }, 
        editstudent_mark:{
          student_id:'',
          subname:'',
          subject_id:'',
          term_id:'',
    
          id:'',
          HA:'',
          CW:'',
          HW:'',
          FT:'',
          summative_test:'',
          summmative_1:'',
          CAT1:'',
          CAT2:'',
          Exam:'',
          MSC:'',
          
        }
        
      }
    },
    ready: function() {
      
      },
    
        
    methods: {

      fetchMyClass() {
        this.$http.get(BASE_URL + '/api/myclass/' +this.logged_in.id ).then(response => {
          this.myClasses = response.data.data
        })
      },
      fetchClass(){
        this.$http.get(BASE_URL + '/api/schclasses').then(response => {
          this.class5 = response.data.data
        })
      },

      fetchTerm(){
        this.$http.get(BASE_URL + '/api/terms').then(response => {
          this.terms= response.data.data
        })
      },
    
     
      updateTeacher() {
        this.$http
          .patch(BASE_URL + '/api/teachers/' + this.logged_in.id, {

            teacher_id:this.logged_in.id,
            name: this.logged_in.name
            
          })
          .then(data => {
            this.succmsg = false
            console.log(data)
                     
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
            
          })
      },
      getSubjectId(id){
        this.s_id = id
      },
     
      mySubjectClass(class_id, term_id, subject_id){
       
        this.$http
          .get(BASE_URL + '/api/teacher/'+this.item.class_id +'/assignclass/'+this.item.term_id +'/subject/'+this.s_id)
          .then((response) => {
          this.student_mark= response.data.student
           this.class_ = response.data.t_class
          }).then(data => {
            this.class_id = '';
            var self = this
            setTimeout(function() {
              self.succmsg = true
            }, 3000)
            
            $('#exampleModalCenter').modal('hide')
            $('body')
              .removeClass()
              .removeAttr('style')
            $('.modal-backdrop').remove()
            
            this.lockedTeacher(this.logged_in.id, term_id)
          })
      },
      
      editScore(markid) {
       
        this.$http.get(BASE_URL + '/api/subjectMark/' + markid).then(data => {
          
          this.editstudent_mark.subject_id = data.data.data.subject_id
          this.editstudent_mark.student_id = data.data.data.student_id
          this.editstudent_mark.term_id= data.data.data.term_id,
          this.editstudent_mark.HW = data.data.data.HW
          this.editstudent_mark.CW = data.data.data.CW
          this.editstudent_mark.FT = data.data.data.FT
          this.editstudent_mark.HA = data.data.data.HA
          this.editstudent_mark.summative_1 = data.data.data.summative_1
          this.editstudent_mark.summative_test = data.data.data.summative_test
          this.editstudent_mark.CAT1 = data.data.data.CAT1
          this.editstudent_mark.CAT2 = data.data.data.CAT2
          this.editstudent_mark.MSC = data.data.data.MSC
          this.editstudent_mark.Exam = data.data.data.Exam
          this.editstudent_mark.id= markid
        })
        
      },
      updateScore() {
        this.$http
          .patch(BASE_URL + '/api/subjectMark/' + this.editstudent_mark.id, {
            student_id: this.editstudent_mark.student_id,
            subject_id: this.editstudent_mark.subject_id,
            term_id: this.editstudent_mark.term_id,
              HA:this.editstudent_mark.HA,
              CW:this.editstudent_mark.CW,
              HW:this.editstudent_mark.HW,
              FT:this.editstudent_mark.FT,
              summative_1:this.editstudent_mark.summative_1,
              summative_test:this.editstudent_mark.summative_test,
              CAT1:this.editstudent_mark.CAT1,
              CAT2:this.editstudent_mark.CAT2,
              MSC:this.editstudent_mark.MSC,
              
              Exam:this.editstudent_mark.Exam,
              my_id:this.editstudent_mark.id
              
          })
          .then(data => {
            this.succmsg = false
           
            this.editstudent_mark.student_id = '';
            this.editstudent_mark.subject_id= '';
            
            this.editstudent_mark.HA= '';
            this.editstudent_mark.CW= '';
            this.editstudent_mark.HW= '';
            this.editstudent_mark.FT= '';
            this.editstudent_mark.summative_test= '';
            this.editstudent_mark.CAT1= '';
            this.editstudent_mark.CAT2= '';
            this.editstudent_mark.Exam= '';
            this.editstudent_mark.summative_1= '';
            var self = this
            setTimeout(function() {
              self.succmsg = true
            }, 3000)
            this.actionmsg = 'Score updated successfully'
            $('#exampleModalEdit').modal('hide')
            $('body')
              .removeClass()
              .removeAttr('style')
            $('.modal-backdrop').remove()
            this.mySubjectClass(this.item.class_id, this.item.term_id, this.s_id)
          })
      },
      lockedTeacher(teacherid,termid){
         this.$http
          .get(BASE_URL + '/api/lockedteacher/'+teacherid +'/term/'+termid)
          .then((response) => {
          this.LockedTeacher= response.data.data
          })
      }
      
      
    },
    
    props:['t_login','subjects'],
    mounted() {
      
    
      this.logged_in = this.t_login;
      this.mySubjects = this.subjects;
      this.fetchClass();
      this.fetchTerm();
      
      
      
     
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
