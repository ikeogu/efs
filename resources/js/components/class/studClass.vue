<template>

  <div id="postsrec" class="mt-5">

     <div class="row mt-3 jumbotron" style="margin-bottom: 20px;">
      
      <div v-for="term in terms"  :key="term.id" class="card" style="width: 14rem; height: 14rem;" >
        <div class="card-body">
        <h5 class="card-title">{{term.name}}</h5>
        <p class="card-text">{{term.session}}</p>
        <a :href="'https://efs.ishlp.com/api/' + term.id" class="btn btn-success">view</a>
        </div>
      </div>
        
      
    </div>

    <div class="row justify-content-center">
      <div v-bind:class="{succmsg: succmsg }">
        <div class="col-md-12 col-lg-12">
          <div class="alert alert-success cusmsg">{{ actionmsg }}</div>
        </div>
      </div>
      <div class="col-md-12">
        <!-- Button trigger modal -->

        <!-- Modal -->



        <div class="card shadow mb-4 ">
            <div class="card-header py-3 row"><h6 class="m-0 font-weight-bold text-primary"></h6></div> 
                <div class="card-body">
                     <!-- Nested Row within Card Body -->
                    <div class="row p-5 mt-3">
                        
                        <div class="row" v-if="logged_in.level == 'Senior High School' || 'Junior High School' ">
                            
                          <div class="col-12 table-responsive">
                            <table  class="table-wrapper" >
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
                    
                                <tr v-for="marks in scores" :key="marks.id" :subject_id="marks.subject_id">
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
                        <div class="row" v-if="logged_in.level === 'Year School'">
                           
                            <div class="col-8">
                            <table  class="" >
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
                                <tr v-for="marks in scores" :key="marks.id" :subject_id="marks.subject_id">
                                    <td>{{marks.subject.name}}</td>
                                    <td>{{marks.HW}}</td>
                                    <td>{{marks.CW}}</td>
                                    <td>{{marks.HA}}</td>
                                        <td>{{marks.FT}}</td>
                                        <td>{{marks.Summative_test}}</td>
                                        <td>{{marks.FT + marks.Summative_test +marks.HA + marks.CW +marks.HW}}</td>
                                        <td>{{marks.Exam}}</td>
                                        <td>{{marks.GT}}</td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                        </div> 
                        <div class="row" v-if="logged_in.level === 'Early Years'">
                           
                            <div class="col-8">
                            <table  class="" >
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
                                <tr v-for="marks in scores" :key="marks.id" :subject_id="marks.subject_id">
                                    <td>{{marks.subject.name}}</td>
                                    <td>{{marks.HW}}</td>
                                    <td>{{marks.CW}}</td>
                                    <td>{{marks.HA}}</td>
                                        <td>{{marks.FT}}</td>
                                        <td>{{marks.Summative_test}}</td>
                                        <td>{{marks.FT + marks.Summative_test +marks.HA + marks.CW +marks.HW}}</td>
                                        <td>{{marks.Exam}}</td>
                                        <td>{{marks.GT}}</td>
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
  

</template>

<script>
   const BASE_URL = 'https://efs.ishlp.com';
  export default {
    data() {
      return {
        logged_in:{
          surname:'',
          name:'',
          dob:'',
          contact:'',
          address:'',
          p_email:'',

        },
        
        terms: {},
        succmsg: true,
        showmodal: false,
        pagenumber: 1,
        actionmsg: ''
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
     
      updateStudent() {
        this.$http
          .patch(BASE_URL + '/api/students/' + this.logged_in.id, {

            student_id:this.logged_in.id,
            name: this.logged_in.name,
            surname: this.logged_in.surname,
            dob: this.logged_in.dob,
            contact: this.logged_in.contact,
            address: this.logged_in.address,
            
          })
          .then(data => {
            this.succmsg = false
            console.log(data)
                     
            var self = this
            setTimeout(function() {
              self.succmsg = true
            }, 3000)
            this.actionmsg = 'Student updated successfully'
            $('#exampleModal1').modal('hide')
            $('body')
              .removeClass()
              .removeAttr('style')
            $('.modal-backdrop').remove()
            
          })
      },
      
      
    },
    
    props:['stud_login','term_class'],
    mounted() {
      this.logged_in = this.stud_login;
      this.terms = this.term_class;
      
      this.fetchMyClass();
     
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
