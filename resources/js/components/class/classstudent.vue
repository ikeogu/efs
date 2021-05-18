<template>

  
    

    <div class="row justify-content-center">
      
      <div class="col-md-12">
        <!-- Button trigger modal -->

        <!-- Modal -->


        <div class="card">
          <div class="card-header">Students List</div>
          <div class="card-body">
             <div class="table-responsive">
            
            <table class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  
                  <th>Surname</th>
                  <th>Other name</th>
                  <th>Email</th>
                  
                  <th>Gender</th>
                  
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  
                <tr v-for="st in stud" :key="st.id" >
                  
                           <td>{{ st.surname}}</td>
                            <td>{{ st.name}}</td>
                            <td>{{ st.email}}</td> 
                            
                            <td>{{ st.gender}}</td>
                            
                          <td>

                            <a :href="'/api/studentSubject/'+st.id+'/class/'+classId.id+'/term/'+T_id.id" class="btn btn-info text-white  ">View Subjects</a>
                          </td>
                  
                </tr>
              </tbody>
             
            </table>
            </div>
          </div>
        </div>

      </div>
    </div>
  

</template>

<script>
   const BASE_URL =  window.location.origin;
 export default {
    data() {
      return {
          stud:{
              surname:'',
              name:'',
              email:'',
              gender:'',
          },
          T_id:{
              id:'',
          },
          classId:'',
      }
    },
  props:['students','t','class_'],
  mounted(){
      this.stud = this.students,
      this.T_id = this.t,
      this.classId = this.class_
  }
}
</script>
