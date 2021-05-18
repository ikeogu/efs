<template>

  <div id="postsrec" class="mt-5">

    <div class="row jumbotron" style="margin-bottom: 10px;">
      
        <div class="col-lg-6">  
            <h5>Welcome!</h5>
        </div>
        <div class="col-lg-6"> 
             <h5>{{logged_in.surname}} {{logged_in.name}}</h5>
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
        <div class="card shadow mb-4 ">
          <div class="card-header py-3 row">
            <div class=" col-6">
              <h6 class="m-0 font-weight-bold text-primary " >Classes</h6>
            </div>
          </div> 
          <div v-if="logged_in.p_fee == 1" class="card-body">
              <div v-for="cla in myClasses"  :key="cla.id"  class="row">
                <div class="card col-lg-4 col-md-4" style="width: 9rem; height: 9rem;">
                  <div class="card-body">
                    <p class="card-title" style="font-size:12px;">{{cla.name}}</p>
                    <p class="card-text" style="font-size:12px;">{{cla.description}}</p>
                    <a href="#" class="btn btn-success" v-on:click="ClassId(cla.id)"  v-bind:id="cla.id" data-toggle="modal" data-target="#exampleModalCenter">view</a>
                  </div>
                </div>

              </div>
            
          </div>
          <div v-else class="alert alert-warning">
           <h5> Oops!!!</h5>
           <p> You currently cannot view result until you pay tuition fee.</p>
           <p>Thanks you for understanding.</p>
          </div>
        </div>
        <div class="card shadow mb-4 ">
          <div class="card-header py-3 row">
            <div class=" col-6">
            <h6 class="m-0 font-weight-bold text-success">Biodata</h6>
            </div>
            
          </div> 
          <div class="card-body">
            <div class="">
                  <form  class="user" method="post" name="updatestudent" id="updatestudent" action="#" @submit.prevent="updateStudent">
                      <div class="form-group row ">
                          <div class="col-lg-4 col-md-4">
                              <label for="name">Surname</label>
                          </div>
                          <div class="col-lg-8 col-md-8">
                              <input type="text" name="surname" id="name" class="form-control form-control-user" placeholder="Name" v-model="logged_in.surname">
                          </div>
                      </div>
                      <div class="form-group row">
                      <div class="col-lg-4 ">
                              <label for="name">First Name</label>
                          </div>
                          <div class="col-lg-8 col-md-8">
                              <input type="text" name="name" id="name" class="form-control form-control-user" placeholder="Name" v-model="logged_in.name">
                          </div>
                      </div>
                      
                      <!-- <div class="form-group row">
                          <div class="col-lg-4 col-md-4">
                              <label for="name">Gender</label>
                          </div>
                          <div class="col-lg-8 col-md-8">
                              <input type="text" name="gender" id="name" class="form-control form-control-user" placeholder="Name" v-model="logged_in.gender">
                          </div>
                      </div> -->

                      <div class="form-group row">
                          <div class="col-lg-4 col-md-4">
                              <label for="name">DOB</label>
                          </div>
                          <div class="col-lg-8 col-md-8">
                              <input type="text" name="dob" id="name" class="form-control form-control-user" placeholder="Name" v-model="logged_in.dob">
                          </div>
                      </div>
                      

                      <div class="form-group row">
                          <div class="col-lg-4 col-md-4">
                              <label for="name">Parent Email</label>
                          </div>
                          <div class="col-lg-8 col-md-4">
                              <input type="text" name="p_email" id="name" class="form-control form-control-user" placeholder="Name" v-model="logged_in.p_email">
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-lg-4 col-md-4">
                              <label for="name">Contact</label>
                          </div>
                          <div class="col-lg-8 col-md-8">
                              <input type="text" name="contact" id="name" class="form-control form-control-user" placeholder="Name" v-model="logged_in.contact">
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-lg-4 col-md-4">
                              <label for="name">Address</label>
                          </div>
                          <div class="col-lg-8 col-md-8">
                              <input type="text" name="address" id="name" class="form-control form-control-user" placeholder="Name" v-model="logged_in.address">
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
      </div>
      <!-- Button trigger modal -->
        

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Choose Term</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body ">
                <div class="row ">
                 <div v-for="term in terms"  :key="term.id" class="card col-lg-4  col-md-4 p-3 " style="width: 9rem; height: 9rem;" >
                    <div class="card-body">
                      <h5 class="card-title" style=" font-size:12px;">{{term.name}}</h5>
                      <p class="card-text" style=" font-size:12px;">{{term.session}}</p>
                      <a :href="'/api/my_subjects/'+logged_in.id+'/class/'+class_id+'/term/'+term.id" class="btn btn-success btn-sm"  >view</a>
                    </div>
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
        logged_in:{
          surname:'',
          name:'',
          dob:'',
          contact:'',
          address:'',
          p_email:'',

        },
        
        class_id:'',
        terms:{},
        myClasses: {},
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
      
      ClassId(class_id){
        this.class_id = class_id,
        this.$http.get(BASE_URL + '/api/s5class_term/' + class_id ).then(response => {
          this.terms = response.data.data
        })
      },
      
    },
    
    props:['stud_login'],
    mounted() {
      this.logged_in = this.stud_login;
      
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
