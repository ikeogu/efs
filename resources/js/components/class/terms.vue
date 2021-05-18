

<template>
  
  
  <div id="postsrec" class="mt-5">

    <!-- <div class="row mt-5">
        <h6>Session:{{term.session}}</h6>
      <div class="col-lg-12 text-right" style="margin-bottom: 20px;">
        <a href="#"
           data-target="#exampleModal"
           data-toggle="modal"
           class="btn btn-success">{{term.name}}</a>
      </div>
    </div> -->

    <div class="row justify-content-center">
      <div v-bind:class="{ succmsg: succmsg }">
        <div class="col-md-12 col-lg-12">
          <div class="alert alert-success cusmsg">{{ actionmsg }}</div>
        </div>
      </div>
      <div class="col-md-12">
        <!-- Button trigger modal -->

       


        <div class="card">
          <div class="card-header bg-success text-white">Term List </div>
          <div class="card-body">

             <div class="row ">
                 <div v-for="term in laravelData"  :key="term.id" class="card col-lg-4 p-3 " style="width: 15rem; height: 10rem;" >
                    <div class="card-body">
                      <h5 class="card-title">{{term.name}}</h5>
                      <p class="card-text">{{term.session}}</p>
                      <a :href="'/api/students_in_term/'+ term.id+'/class/'+class_.id" class="btn btn-success"  >view</a>
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
   const BASE_URL = window.location.origin;
  export default {
    data() {
      return {
       
        laravelData:{},
        term:{},
        class_:{},
        id: '',
        succmsg: true,
        showmodal: false,
        pagenumber: 1,
        actionmsg: ''
      }
    },
    methods: {
      
        
      
      
    
    },
    props:['terms','myclass'],
    mounted() {
      
       this.laravelData = this.terms,
       this.class_ = this.myclass
       
       
     
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
