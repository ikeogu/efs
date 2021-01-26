<template>

  <div id="postsrec" class="mt-5">

    <div class="row justify-content-center">
      <div v-bind:class="{ succmsg: succmsg }">
        <div class="col-md-12 col-lg-12">
          <div class="alert alert-success cusmsg">{{ actionmsg }}</div>
        </div>
      </div>
    </div>
    <div>
        <div class="card">
          <div class="card-header"> {{assignedSubjects.length}} Subject's Record</div>
            <div class="card-body">

              <div class="row" v-if="student_details.level =='Junior High School'|| student_details.level =='Senior High School'">
               
                <div class="col-12 table-responsive">
                  <table  class="table-wrapper table table-striped" >
                    <thead >
                      <th>Subject</th>
                        <th>CAT 1</th>
                        <th>CAT 2</th>
                        <th>MSC</th>
                        <th>Exam</th>
                        <th>Grand Total</th>
                        <th>Action</th>  
                    </thead>
                    <tbody>
        
                      <tr v-for="marks in assignedSubjects" :key="marks.id" :subject_id="marks.subject_id">
                         <td>{{marks.subject.name}}</td>
                          <td>{{marks.CAT1}}</td>
                           <td>{{marks.CAT2}}</td>
                           <td>{{marks.MSC}}</td>
                            <td>{{marks.Exam}}</td>
                            <td>{{marks.GT}}</td>
                       
                         
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
              </div> 
              <div class="row" v-if="student_details.level === 'Year School'">
                
                <div class="col-12 table-responsive">
                  <table  class="table table-bordered table-striped" >
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
                          <td> {{marks.subname}}</td>
                          <td>{{marks.HW}}</td>
                           <td>{{marks.CW}}</td>
                           <td>{{marks.HA}}</td>
                            <td>{{marks.FT}}</td>
                            <td>{{marks.summative_test}}</td>
                            <td>{{marks.TCA}}</td>
                            <td>{{marks.Exam}}</td>
                            <td>{{marks.GT}}</td>
                       
                         
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
              </div> 
              <div class="row" v-if="student_details.level === 'Early Years'">
                
                <div class="col-12 table-responsive">
                  <table  class="table table-bordered table-striped" >
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
                          <td> {{marks.subname}}</td>
                          <td>{{marks.HW}}</td>
                           <td>{{marks.CW}}</td>
                           <td>{{marks.HA}}</td>
                            <td>{{marks.FT}}</td>
                            <td>{{marks.summative_test}}</td>
                            <td>{{marks.TCA}}</td>
                            <td>{{marks.Exam}}</td>
                            <td>{{marks.GT}}</td>
                       
                         
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
  
    
</template>

<script src="https://vuejs.org/js/vue.min.js"></script>
<script>
  const BASE_URL = 'https://efs.ishlp.com';
  export default {
    data() {
      return {
        
        students: {},
        assignedSubjects: {},
        unassignedSubjects: [],
        assignedMarks:{},
        
        student_id: '',
        T:'',
        sub_id: '',
        myClass:'',
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
          
        }
      }
    },
    
    methods: {
      scoreLists(page) {
        if (typeof page === 'undefined') {
          page = 1
        }
        this.$http.get(BASE_URL + '/api/my_subject/'+this.student_details.id+'/class/'+this.myClass.id+'/term/'+this.T.id).then(response => {
          
          this.assignedSubjects = response.data
          
          this.pagenumber = page
        })
      },
      
    
    },
      
    props:['s_details','term','class_T'],
    
    mounted() {
      
      this.student_details = this.s_details
      this.T = this.term
      this.myClass = this.class_T
      
      this.scoreLists()
      
      
      
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
