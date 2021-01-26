<template>

  <div id="postsrec" class="mt-5">

    <div class="row justify-content-center">
      <div v-bind:class="{ succmsg: succmsg }">
        <div class="col-md-12 col-lg-12">
          <div class="alert alert-success cusmsg">{{ actionmsg }}</div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header bg-success text-white"> {{assignedSubjects.length}} Subject's Record</div>
            <div class="card-body">

              <div class="row" v-if="this.class__.status =='Junior High School'">
               
                <div class="col-12 table-responsive">
                  <table  class=" table-bordered table-striped" >
                    <thead >
                      <th>Subject</th>
                        <th>CAT 1</th>
                        <th>CAT 2</th>
                        <th>MSC</th>
                        <th>TCA</th>
                        <th>Exam</th>
                        <th>Grand Total</th>
                         
                    </thead>
                    <tbody>
        
                      <tr v-for="marks in assignedSubjects" :key="marks.id" :subject_id="marks.subject_id">
                         <td>{{marks.subname}}</td>
                          <td>{{marks.CAT1}}</td>
                           <td>{{marks.CAT2}}</td>
                           <td>{{marks.MSC}}</td>
                           <td>{{marks.TCA}}</td>
                            <td>{{marks.Exam}}</td>
                            <td>{{marks.GT}}</td>
                       
                          <td>  
                            <!-- <a href="#"
                                data-target="#exampleModal"
                                data-toggle="modal"
                                v-on:click="getSubjectID(subject.id)"
                                class="btn btn-success" >Add Score
                            </a> 
                              <a href="#"
                               v-on:click="editScore(marks.id)"
                                data-target="#exampleModalEdit"
                                data-toggle="modal"
                                v-bind:title="marks.subject_id"
                                class="btn btn-success">Edit
                            </a>-->
                            
                        </td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
              </div> 
              <div class="row" v-if="this.class__.status =='Senior High School'">
               
                <div class="col-12 table-responsive">
                  <table  class=" table-bordered table-striped" >
                    <thead >
                      <th>Subject</th>
                        <th>CAT 1</th>
                        <th>CAT 2</th>
                        <th>MSC</th>
                        <th>TCA</th>
                        <th>Exam</th>
                        <th>Grand Total</th>
                         
                    </thead>
                    <tbody>
        
                      <tr v-for="marks in assignedSubjects" :key="marks.id" :subject_id="marks.subject_id">
                         <td>{{marks.subname}}</td>
                          <td>{{marks.CAT1}}</td>
                           <td>{{marks.CAT2}}</td>
                           <td>{{marks.MSC}}</td>
                           <td>{{marks.TCA}}</td>
                            <td>{{marks.Exam}}</td>
                            <td>{{marks.GT}}</td>
                       
                          <td>  
                            <!-- <a href="#"
                                data-target="#exampleModal"
                                data-toggle="modal"
                                v-on:click="getSubjectID(subject.id)"
                                class="btn btn-success" >Add Score
                            </a> 
                              <a href="#"
                               v-on:click="editScore(marks.id)"
                                data-target="#exampleModalEdit"
                                data-toggle="modal"
                                v-bind:title="marks.subject_id"
                                class="btn btn-success">Edit
                            </a>-->
                            
                        </td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
              </div> 
              <div class="row" v-if="class__.status == 'Year School'">
                
                <div class="col-12 table-responsive">
                  <table  class="table tab table-bordered table-striped" >
                    <thead >
                      <th>Subject</th>
                        <th>Hw</th>
                        <th>CW</th>
                        <th>HA</th>
                        <th>FT</th>
                        <th>S.T</th>
                        <th>TCA</th>
                        <th>Exam</th>
                        <th>Grand Total</th>
                        
                    </thead>
                    <tbody>
        
                      <tr v-for="marks in assignedSubjects" :key="marks.id" :subject_id="marks.subject_id">
                          <td class="td"> {{marks.subname}}</td>
                          <td class="td2">{{marks.HW}}</td>
                           <td class="td2">{{marks.CW}}</td>
                           <td class="td2">{{marks.HA}}</td>
                            <td class="td2">{{marks.FT}}</td>
                            <td class="td2">{{marks.summative_test}}</td>
                            <td class="td2">{{marks.TCA}}</td>
                            <td class="td2">{{marks.Exam}}</td>
                            <td class="td2">{{marks.GT}}</td>
                       
                          <td><!-- 
                             <a href="#"
                               v-on:click="editScore(marks.id)"
                                data-target="#exampleModalEdit"
                                data-toggle="modal"
                                v-bind:title="marks.id"
                                class="btn btn-success">Edit
                            </a>-->
                            
                          </td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row" v-if="class__.status == 'Early Years'">
                
                <div class="col-12 table-responsive">
                  <table  class="table tab table-bordered table-striped" >
                    <thead >
                      <th>Subject</th>
                        <th>Hw</th>
                        <th>CW</th>
                        <th>HA</th>
                        <th>FT</th>
                        <th>S.T</th>
                        <th>TCA</th>
                        <th>Exam</th>
                        <th>Grand Total</th>
                        <th>Action</th>  
                    </thead>
                    <tbody>
        
                      <tr v-for="marks in assignedSubjects" :key="marks.id" :subject_id="marks.subject_id">
                          <td class="td"> {{marks.subname}}</td>
                          <td class="td2">{{marks.HW}}</td>
                           <td class="td2">{{marks.CW}}</td>
                           <td class="td2">{{marks.HA}}</td>
                            <td class="td2">{{marks.FT}}</td>
                            <td class="td2">{{marks.summative_test}}</td>
                            <td class="td2">{{marks.TCA}}</td>
                            <td class="td2">{{marks.Exam}}</td>
                            <td class="td2">{{marks.GT}}</td>
                       
                          <td> 
                          <!-- 
                             <a href="#"
                               v-on:click="editScore(marks.id)"
                                data-target="#exampleModalEdit"
                                data-toggle="modal"
                                v-bind:title="marks.id"
                                class="btn btn-success">Edit
                            </a> -->
                            
                          </td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
              </div> 
              <!-- Still need to do table for creche -->
            </div>
          </div>
        </div>
      </div>

      <!-- edit -->
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
                <form method="post" name="updatescore" id="updatescore" action="#" @submit.prevent="updateScore" v-if="class__.status === 'High School'">

                   <div class="form-group">
                    <label for="roll_no">CAT 1</label>
                    <input type="text" name="CAT1"  class="form-control" placeholder="Enter CAT 1 Score" v-model="student_mark.CAT1" />
                  </div>

                  <div class="form-group">
                    <label for="roll_no">CAT 2</label>
                    <input type="number" name="CAT2" class="form-control" placeholder="Enter CAT 2 Score" v-model="student_mark.CAT2" />
                  </div>
                  <div class="form-group">
                    <label for="contact">MSC</label>
                    <input type="number" name="MSC"  class="form-control" placeholder="Enter MSC Score" v-model="student_mark.MSC" />
                  </div>
                  <div class="form-group">
                    <label for="contact">Exam</label>
                    <input type="number" name="exam"  class="form-control" placeholder="Enter Exam Score" v-model="student_mark.Exam" />
                  </div>

                  <div class="form-group text-center">
                    <button class="btn btn-success">Update</button>
                  </div>
                </form>
                 <form v-if="class__.status === 'Year School'" method="post" name="updatescore" id="updatescore" action="#" @submit.prevent="updateScore">

                   <div class="form-group">
                    <label for="roll_no">Home Work</label>
                    <input type="number" name="HW"  class="form-control"  v-model="student_mark.HW" />
                  </div>
                  <div class="form-group">
                    <label for="roll_no">Class Work</label>
                    <input type="number" name="CW" class="form-control" placeholder="" v-model="student_mark.CW" />
                  </div>
                  <div class="form-group">
                    <label for="contact">Friday Assignment</label>
                    <input type="number" name="FT"  class="form-control" v-model="student_mark.FT" />
                  </div>
                  <div class="form-group">
                    <label for="roll_no">Holiday Assignment</label>
                    <input type="number" name="HA"  class="form-control"  v-model="student_mark.HA" />
                  </div>
                  <div class="form-group">
                    <label for="roll_no">Summative Test</label>
                    <input type="number" name="summative_test" class="form-control"  v-model="student_mark.summative_test" >
                  </div>
                  
                  <div class="form-group">
                    <label for="contact">Exam</label>
                    <input type="number" name="exam"  class="form-control" v-model="student_mark.Exam" />
                  </div>

                  <div class="form-group text-center">
                    <button class="btn btn-success">Update</button>
                  </div>
                </form>
                <form v-if="class__.status === 'Early Years'" method="post" name="updatescore" id="updatescore" action="#" @submit.prevent="updateScore">

                   <div class="form-group">
                    <label for="roll_no">Home Work</label>
                    <input type="number" name="HW"  class="form-control"  v-model="student_mark.HW" />
                  </div>
                  <div class="form-group">
                    <label for="roll_no">Class Work</label>
                    <input type="number" name="CW" class="form-control" placeholder="" v-model="student_mark.CW" />
                  </div>
                  <div class="form-group">
                    <label for="contact">Friday Assignment</label>
                    <input type="number" name="FT"  class="form-control" v-model="student_mark.FT" />
                  </div>
                  <div class="form-group">
                    <label for="roll_no">Holiday Assignment</label>
                    <input type="number" name="HA"  class="form-control"  v-model="student_mark.HA" />
                  </div>
                  <div class="form-group">
                    <label for="roll_no">Summative Test</label>
                    <input type="number" name="summative_test" class="form-control"  v-model="student_mark.summative_test" >
                  </div>
                  
                  <div class="form-group">
                    <label for="contact">Exam</label>
                    <input type="number" name="exam"  class="form-control" v-model="student_mark.Exam" />
                  </div>

                  <div class="form-group text-center">
                    <button class="btn btn-success">Update</button>
                  </div>
                </form>
               <span v-else></span>
              </div>

            </div>
          </div>
        </div>
    </div>
  
    
</template>

<script src="https://vuejs.org/js/vue.min.js"></script>
<style type="text/css">
 .td{
   
    position: -webkit-sticky !important;
     position: relative !important; 
     left: -1px !important; 
    text-align: center !important;
    
   white-space: normal !important;
 }
 .td2{
   
   white-space: normal !important;
 }
 .tab{
   background-color: #eee !important; 
 }
</style>
<script>
   const BASE_URL = 'https://efs.ishlp.com';
  export default {
    data() {
      return {
        itemsPerRow:5,
        students: {},
        assignedSubjects: {},
        unassignedSubjects: [],
        assignedMarks:{},
        scores:{},
        
        student_id: '',
        T:'',
        sub_id: '',
        student_details :'',
        succmsg: true,
        showmodal: false,
        actionmsg: '',
        id:'',
        student_mark:{
          id:'',
          subject_id:'',
          student_id: '',
          HA:'',
          CW:'',
          HW:'',
          FT:'',
          summative_test:'',
          CAT1:'',
          CAT2:'',
          Exam:'',
          MSC:'',
          term_id:'',
          s5_class_id:''
          
        },
        class__:'',
      }
    },
    
    methods: {
      scoreLists(page) {
        if (typeof page === 'undefined') {
          page = 1
        }
        this.$http.get(BASE_URL + '/api/subjectMarks/'+ this.student_details.id).then(response => {
          
          this.scores = response.data
         
          this.pagenumber = page
        })
      },
      
    
     getSubjectID(id){
      this.student_mark.subject_id = id  
       
     },
      
      assignMark() {
        this.$http
          .post(BASE_URL + '/api/subjectMark',{
            student_id: this.student_details.id,
            subject_id: this.student_mark.subject_id,
            term_id:this.student_mark.term_id,
            s5_class_id:this.student_mark.s5_class_id,
             HA:this.student_mark.HA,
              CW:this.student_mark.CW,
              HW:this.student_mark.HW,
              FT:this.student_mark.FT,
              summative_test:this.student_mark.summative_test,
              CAT1:this.student_mark.CAT1,
              CAT2:this.student_mark.CAT2,
              exam:this.student_mark.exam,

          })
          .then(data => {
            this.succmsg = false
            
            this.subject_id = '';
            
            var self = this
            setTimeout(function() {
              self.succmsg = true
            }, 3000)
            this.actionmsg = 'Score added successfully'
            
            $('#exampleModal').modal('hide')
            $('body')
              .removeClass()
              .removeAttr('style')
            $('.modal-backdrop').remove()
            this.scoreLists(this.pagenumber)
          })
      },
      editScore(markid) {
        this.$http.get(BASE_URL + '/api/subjectMark/' + markid).then(data => {
          
          this.student_mark.subject_id = data.data.data.subject_id
          this.student_mark.student_id = data.data.data.student_id
          this.student_mark.term_id= data.data.data.term_id,
          this.student_mark.HW = data.data.data.HW
          this.student_mark.CW = data.data.data.CW
          this.student_mark.FT = data.data.data.FT
          this.student_mark.HA = data.data.data.HA
          this.student_mark.summative_test = data.data.data.summative_test
          this.student_mark.CAT1 = data.data.data.CAT1
          this.student_mark.CAT2 = data.data.data.CAT2
          this.student_mark.MSC = data.data.data.MSC
          this.student_mark.Exam = data.data.data.Exam
          this.student_mark.id = markid
        })
        
      },
      updateScore() {
        this.$http
          .patch(BASE_URL + '/api/subjectMark/' + this.student_mark.id, {
            student_id: this.student_details.id,
            subject_id: this.student_mark.subject_id,
            term_id: this.student_mark.term_id,
            s5_class_id:this.student_mark.s5_class_id,
              HA:this.student_mark.HA,
              CW:this.student_mark.CW,
              HW:this.student_mark.HW,
              FT:this.student_mark.FT,
              summative_test:this.student_mark.summative_test,
              CAT1:this.student_mark.CAT1,
              CAT2:this.student_mark.CAT2,
              MSC:this.student_mark.MSC,
              
              Exam:this.student_mark.Exam,
              my_id:this.student_mark.id
              
          })
          .then(data => {
            this.succmsg = false
           
            this.student_details.id = '';
            this.student_mark.subject_id= '';
            
            this.student_mark.HA= '';
            this.student_mark.CW= '';
            this.student_mark.HW= '';
            this.student_mark.FT= '';
            this.student_mark.summative_test= '';
            this.student_mark.CAT1= '';
            this.student_mark.CAT2= '';
            this.student_mark.Exam= '';
            var self = this
            setTimeout(function() {
              self.succmsg = true
            }, 3000)
            this.actionmsg = 'Score updated successfully'
            $('#exampleModalEdit').modal('hide')
            $('body')
              .removeClass()
              .removeAttr('style')
            $('.modal-backdrop').remove();
            this.scoreLists(this.pagenumber);
          })
      },
      deleteSubject(student_id, subject_id) {
        this.$http
          .delete(BASE_URL + '/api/students/'+student_id+'/deletesubject/'+subject_id, {
            student_id: this.student_id,
            subject_id: this.subject_id,
            term_id:this.student_mark.term_id,
            s5_class_id:this.student_mark.s5_class_id,
          })
          .then(data => {
            this.succmsg = false
            console.log(data)
            this.subject_id = '';
            this.assignedSubjectsList(student_id);
            this.unassignedSubjectsList(student_id);
            var self = this
            setTimeout(function() {
              self.succmsg = true
            }, 3000)
            this.actionmsg = 'Score inserted successfully'
            
            $('#exampleModal').modal('hide')
            $('body')
              .removeClass()
              .removeAttr('style')
            $('.modal-backdrop').remove();
            this.scoreLists(this.pagenumber)
          })
      },
      deleteId(studentid) {
        this.id = studentid
      },
      deleteStudent() {
        this.$http.delete(BASE_URL + '/api/students/' + this.id).then(data => {
          this.succmsg = false
          var self = this
          setTimeout(function() {
            self.succmsg = true
          }, 3000)

          this.actionmsg = 'Data deleted successfully'
          this.studentLists(this.pagenumber)
          $('#exampleModal2').modal('hide')
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
      }
    },
    props:['studs_data','s_details','term','class_t'],
    
    mounted() {
      
      this.assignedSubjects = this.studs_data
      this.student_details = this.s_details
      this.assignedMarks = this.sub_mark
      this.T = this.term
      this.class__ =this.class_t
      this.student_mark.s5_class_id = this.class_t.id
      this.student_mark.term_id = this.term.id
      this.scoreLists(this.pagenumber)
      
      
      
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

    .table-wrapper {
  max-width: 1200px;
  overflow: scroll;
}

table {
  position: relative;
  border: 1px solid #ddd;
  border-collapse: collapse;
}

td, th {
  white-space: nowrap;
  border: 1px solid #ddd;
  padding: 20px;
  text-align: center;
}

th {
  background-color: #eee;
  position: sticky;
  top: -1px;
  z-index: 2;
  
  /* &:first-of-type {
    left: 0;
    z-index: 3;
  } */
}

tbody tr td:first-of-type {
  background-color: #eee;
  position: sticky;
  left: -1px;
  text-align: left;
}
</style>
