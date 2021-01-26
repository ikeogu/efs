<template>
    <div class="card">
        <div class="card-header">SUMMATIVE TEST</div>
        <div class="card-body">
            <div class="col-12 table-responsive">
                <table  class="table table-striped table-bordered  text-default">
                <thead class="header">
                    <th class="rotate">S/No</th>
                    <th >Name</th>
                    <th class="rotate word" scope="col" v-for="item in subject" :key="item.id">{{item.name}}</th>                  
                    <th class="rotate">Total</th>
                    <th class="rotate">Average</th>  
                    <th class="rotate">Average(%)</th> 
                    <th class="rotate">Remarks</th> 
                </thead>
                <tbody> 
                    
                    <tr v-for="student in students" :key="student.id">
                        
                        <td>{{student.id}}</td>
                        <td>{{student.name}}</td>                    
                                                                 
                        <td v-for="item in students.subjectMark" :key="item.id" :total="this.total +item.Summative">{{item.Summative_test}}</td>
                        <td>{{this.total}}</td>
                        
                        
                    </tr>
                    
                  
                    
                    <tr>
                        <th></th>
                        <td></td>
                    </tr>
                   
                     <tr>
                        <td></td>
                        <th>Total</th>
                        
                        <td>Total</td>
                        <td>Average</td>
                        
                        
                    </tr>
                    <tr>
                        <td></td>
                        <th>Max Score</th>
                        
                        <td>Total</td>
                        <td>Average</td>
                    </tr>
                    <tr>
                        <td></td>
                        <th>Min Score</th>
                      
                        <td>Total</td>
                        <td>Average</td>
                    </tr> 
                    <tr>
                        <td></td>
                        <th>Subject Average</th>
                       
                        <td>Total</td>
                        <td>Average</td>
                       
                    </tr> 
                    <tr>
                        <td></td>
                        <th>Subject Average (%)</th>
                        
                        <td>Total</td>
                        <td>Average</td>
                        <td>Class Average</td>
                    </tr>  
                    
                </tbody>
                
                </table>
            </div>
        </div>
    </div>

</template>

<script>
export default {

    data() {
      return {
        students: [],
        subject: {},
        grades:{},
        SMT_score:'',
        showmodal: false,
        pagenumber: 1,
        total: 0,

      }
    },
    methods: {
      studentLists() {
        this.$http.get('http://127.0.0.1:8000/api/students').then(response => {
          this.students = response.data.data
        })
      },
      getResultofStudent(studentid) {
        this.$http.get('http://127.0.0.1:8000/api/results/student/' + studentid).then(response => {
          this.student = response.data;
          this.showmodal = true;
        })
      },
      result(student) {
        return student.total;
      },
      avg(){

      },
      avgPer(){

      },
      grades(){

      },
    },
    props:['students','subject','grades','SMT_score'],
    mounted() {
        console.log('Hello'),
      this.students = this.students,
      this.subject = this.subject,
      this.grades = this.grades,
      this.SMT_score = this.SMT_score
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
