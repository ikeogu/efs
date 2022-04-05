

<template>
  
  
  <div id="postsrec" class="mt-5">

    <div class="row mt-5">
      <div class="col-lg-12 text-right" style="margin-bottom: 20px;">
        <a href="#"
           data-target="#exampleModal"
           data-toggle="modal"
           class="btn btn-success">Add New Term</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Add new Term</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <form method="post" name="addterm" id="addclass" action="#" @submit.prevent="addTerm">
                  <div class="form-group">
                    <label for="name">Term </label>
                    <div class="form-group">
                    <select class="form-control" name="name" v-model="selected" v-on:change="getText">
                      <option>Choose Option</option>
                      <option v-for="option in options" v-bind:value="option.value" :key="option.value">
                          {{option.text}}
                      </option>
                    </select>
                </div>
                  </div>
                  <div class="form-group">
                    <label for="name">Description</label>
                    <input type="text" name="description" id="description" class="form-control" placeholder="First term...." v-model="term.description" />
                  </div>
                  <div class="form-group">
                    <label for="name">Session</label>
                    <input type="text" name="session" id="session" class="form-control" placeholder="2019/2020" v-model="term.session" />
                  </div>
                  
                  <div class="form-group">
                    <label for="name">Fee Schedule (Junior High School)</label>
                    <input type="number" name="jss1" id="session" class="form-control" placeholder="Jss1" v-model="term.jss1" />
                    <input type="number" name="jss2" id="session" class="form-control" placeholder="Jss2" v-model="term.jss2" />
                    <input type="number" name="jss3" id="session" class="form-control" placeholder="Jss3" v-model="term.jss3" />
                     <label for="name">Fee Schedule (Senior High School)</label>
                    <input type="number" name="ss1" id="session" class="form-control" placeholder="SSS1" v-model="term.ss1" />
                    <input type="number" name="ss2" id="session" class="form-control" placeholder="SSS2" v-model="term.ss2" />
                    <input type="number" name="ss3" id="session" class="form-control" placeholder="SSS3" v-model="term.ss3" />
                  </div>
                  <div class="form-group">
                    <label for="name">Fee Schedule (Year School)</label>
                    <input type="number" name="y1" id="session" class="form-control" placeholder="Year1" v-model="term.y1" />
                     <input type="number" name="y2" id="session" class="form-control" placeholder="Year 2 " v-model="term.y2" />
                      <input type="number" name="y3" id="session" class="form-control" placeholder="Year3" v-model="term.y3" />
                       <input type="number" name="y4" id="session" class="form-control" placeholder="Year4" v-model="term.y4" />
                        <input type="number" name="y5" id="session" class="form-control" placeholder="Year5" v-model="term.y5" />
                         <input type="number" name="y6" id="session" class="form-control" placeholder="Year6" v-model="term.y6" />
                    
                  </div>
                  <div class="form-group">
                    <label for="name">Fee Schedule (Early Years)</label>
                    <input type="number" name="tulip" id="session" class="form-control" placeholder="Tulip" v-model="term.tulip" />
                     <input type="number" name="prekin" id="session" class="form-control" placeholder="Pre-Kindertin" v-model="term.prekin" />
                      <input type="number" name="kinda" id="session" class="form-control" placeholder="KIndergatin" v-model="term.kinda" />
                  </div>
                  <div class="form-group">
                    <label for="name">Resumption Date </label>
                    <input type="date" name="resumption_date" id="session" class="form-control" placeholder="" v-model="term.resumption_date" />
                  </div>
                
                  <div class="form-group text-right">
                    <button class="btn btn-success">Submit</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
        <!-- cat scores -->
        <div class="modal fade"
             id="exampleModalScore"
             tabindex="-1"
             role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true"
             v-bind:class="{ showmodal:showmodal }">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Fix Point</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <form method="post" name="fixPoint" id="addclass" action="#" @submit.prevent="fixPoint">
                  
                  <div class="form-group">
                    <label for="name">C.A.T.1</label>
                    <input type="number" name="h_cat1" id="description" class="form-control" placeholder="Mark for C.A.T 1" v-model="term.h_cat1" />
                  </div>
                  <div class="form-group">
                    <label for="name">C.A.T 2</label>
                    <input type="number" name="h_cat2" id="session" class="form-control" placeholder="Mark for C.A.T.2" v-model="term.h_cat2" />
                  </div>
                  <div class="form-group">
                    <label for="name">MSC</label>
                    <input type="number" name="msc" id="session" class="form-control" placeholder="Mark for MSC" v-model="term.msc" />
                  </div>
                  
                  <div class="form-group">
                    <label for="name">Year School Summative</label>
                    <input type="number" name="y_summative" id="session" class="form-control" placeholder="" v-model="term.y_summative" />
                  </div>
                  <div class="form-group">
                    <label for="name">Early Years Summative</label>
                    <input type="number" name="e_summative" id="session" class="form-control" placeholder="" v-model="term.e_summative" />
                  </div>
                  
                
                  <div class="form-group text-right">
                    <button class="btn btn-success">Submit</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
        <!-- end cat scores-->

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
                <h5 class="modal-title" id="exampleModalLabel">Edit Term</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
              </div>
              <div class="modal-body">
                <form method="post" name="updateterm" id="updateclass" action="#" @submit.prevent="updateTerm">
                  
                    <div class="form-group">
                    <label for="name">Term </label>
                    <div class="form-group">
                    <select class="form-control" name="name" v-model="selected" v-on:change="getText">
                      <option>Choose Option</option>
                      <option v-for="option in options" v-bind:value="option.value" :key="option.value">
                          {{option.text}}
                      </option>
                    </select>
                </div>
                  </div>
                  <div class="form-group">
                    <label for="name">Description</label>
                    <input type="text" name="description" id="description" class="form-control" placeholder="First term...." v-model="term.description" />
                  </div>
                  <div class="form-group">
                    <label for="name">Session</label>
                    <input type="text" name="session" id="session" class="form-control" placeholder="2019/2020" v-model="term.session" />
                  </div>
                   <div class="form-group">
                    <label for="name">Fee Schedule (Junior High School)</label>
                    <input type="number" name="jss1" id="session" class="form-control" placeholder="Jss1" v-model="term.jss1" />
                    <input type="number" name="jss2" id="session" class="form-control" placeholder="Jss2" v-model="term.jss2" />
                    <input type="number" name="jss3" id="session" class="form-control" placeholder="Jss3" v-model="term.jss3" />
                     <label for="name">Fee Schedule (Senior High School)</label>
                    <input type="number" name="ss1" id="session" class="form-control" placeholder="SSS1" v-model="term.ss1" />
                    <input type="number" name="ss2" id="session" class="form-control" placeholder="SSS2" v-model="term.ss2" />
                    <input type="number" name="ss3" id="session" class="form-control" placeholder="SSS3" v-model="term.ss3" />
                  </div>
                  <div class="form-group">
                    <label for="name">Fee Schedule (Year School)</label>
                    <input type="number" name="y1" id="session" class="form-control" placeholder="Year1" v-model="term.y1" />
                     <input type="number" name="y2" id="session" class="form-control" placeholder="Year 2 " v-model="term.y2" />
                      <input type="number" name="y3" id="session" class="form-control" placeholder="Year3" v-model="term.y3" />
                       <input type="number" name="y4" id="session" class="form-control" placeholder="Year4" v-model="term.y4" />
                        <input type="number" name="y5" id="session" class="form-control" placeholder="Year5" v-model="term.y5" />
                         <input type="number" name="y6" id="session" class="form-control" placeholder="Year6" v-model="term.y6" />
                    
                  </div>
                  <div class="form-group">
                    <label for="name">Fee Schedule (Early Years)</label>
                    <input type="number" name="tulip" id="session" class="form-control" placeholder="Playgroup" v-model="term.tulip" />
                     <input type="number" name="prekin" id="session" class="form-control" placeholder="Pre-Kindergartin" v-model="term.prekin" />
                      <input type="number" name="kinda" id="session" class="form-control" placeholder="Kindergatin" v-model="term.kinda" />
                  </div>
                  <div class="form-group">
                    <label for="name">Resumption Date </label>
                    <input type="date" name="resumption_date" id="session" class="form-control" placeholder="" v-model="term.resumption_date" />
                  </div>
                  


                  <div class="form-group text-right">
                    <button class="btn btn-success">Submit</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>

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
                  <button class="btn btn-success" v-on:click="deleteClass()">Ok</button>
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="modal fade"
             id="exampleModal23"
             tabindex="-1"
             role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true"
             v-bind:class="{ showmodal:showmodal }">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Assign Classes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
              </div>
              <div class="modal-body">
                <form v-if="this.unassignedClasses.length > 0" method="post" name="assignClass" id="assignClass" action="#" @submit.prevent="assignClass(term_id, class_id)">

                  <div class="form-group">
                    <label for="gender">Assign Class</label>
                    <select class="form-control" name="class_id"  v-model="class_id">
                          <option v-for="classes in unassignedClasses"  :key="classes.id" v-bind:value="classes.id">{{ classes.name }} {{ classes.description }}</option>
                    </select>
                  </div>

                  <div class="form-group text-center">
                    <button class="btn btn-success">Submit</button>
                  </div>
                </form>
                <span v-else>All Classes Assigned to this Term!</span>
                <br>

                <span class="mt-3">Assigned Classes</span>
                <table class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>Classes</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="classes in assignedClasses" :key="classes.id">
                      <th scope="row">{{ classes.name }} {{ classes.description }}</th>
                      <td><a href="#" data-target="#exampleModal2" v-on:click="deleteClass(term_id, classes.id)" data-toggle="modal" disabled>Delete</a></td>
                    </tr>
                  </tbody>
                  
                </table>
              </div>

            </div>
          </div>
        </div>
        <div>
          <div v-show="active"  class="card shadow mb-4">Show</div>
                  
        </div>

        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Term List</h6>
          </div>
          <div class="card-body ">
            <div class="table-responsive">
              <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th> Name</th>
                    <th>Description</th>
                    <th>Session</th>
                    
                    <th colspan="15">Fee Schedule</th>
                    <th>Resumption</th>
                    <th>Details</th>
                    <th colspan="4">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="term in laravelData.data" :key="term.id">
                    <td>{{ term.name }}</td>
                    <td>{{ term.description }}</td>
                    <td>{{ term.session }}</td>
                    
                    <td>₦ {{ term.jss1 }} </td>
                    <td>₦ {{ term.jss2}} </td>
                    <td>₦ {{ term.jss3 }} </td>
                      <td>₦ {{ term.ss1 }} </td>
                      <td>₦ {{ term.ss2 }} </td>
                      <td>₦ {{ term.ss3 }} </td>
                    <td>₦ {{ term.y1 }} </td>
                    <td>₦ {{ term.y2 }} </td>
                    <td>₦ {{ term.y3 }} </td>
                    <td>₦ {{ term.y4 }}</td>
                    <td>₦ {{ term.y5 }}</td>
                    <td>₦ {{ term.y6 }}</td>
                    <td>₦ {{ term.tulip }}</td>
                    <td>₦ {{ term.prekin }}</td>
                    <td>₦ {{ term.kinda}}</td>
                    
                    <td>{{ term.resumption_date }}</td>
                    
                    <td>
                      <a :href="'/api/terms_classes/'+term.id" class="btn btn-success text-white">view Classes</a>
                    </td>
                    <!-- link to student in a class -->
                    <td>

                        <a class="btn btn-info text-white" 
                        v-on:click="unassignedClassList(term.id)"
                        data-target="#exampleModal23"
                        data-toggle="modal"
                        v-bind:title="term.name" > Assign Class</a>
                        <a href="#"
                        v-on:click="editTerm(term.id)"
                        data-target="#exampleModal1"
                        data-toggle="modal"
                        v-bind:title="term.name" class="btn btn-warning">Edit</a>
                       

                        
                      </td>
                      <td> 

                         <a class="btn btn-info text-white" 
                        v-on:click="getTerm(term.id)"
                        data-target="#exampleModalScore"
                        data-toggle="modal"
                        v-bind:title="term.name"> Fix point</a>
                        <span v-tooltip.right="'CAT1 ------ ' + term.h_cat1+ ' CAT2 -------- '+ term.h_cat2 + ' MSC-------- '+ term.msc +' Summative (YS)-------- '+ term.y_summative +' Summative (EY)------- '+term.e_summative" class="btn btn-info btn-sm"> >></span>
 
                      </td>
                

                    <td>
                        <a href="#" data-target="#exampleMod" v-on:click="deleteId(term.id)" data-toggle="modal"
                         v-bind:id="id" class="btn btn-danger">Delete</a></td>
                  </tr>
                </tbody>
                
              </table>
              <pagination :data="laravelData" :limit="2" @pagination-change-page="termLists">
                <span slot="prev-nav">&lt; Previous</span>
                <span slot="next-nav">Next &gt;</span>
              </pagination>
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
           hover: false,
           terms:{},
           assignedClasses: [],
           unassignedClasses: [],
           term_id:'',
           class_id:'',
            
          term : {
              term_id: '',
              name:'',
              session:'',
              description:'',
              
          },
        selected:"Choose Options",
        options: [
                { value: 1, text: 'Term I' },
                { value: 2, text: 'Term II' },
                { value: 3, text: 'Term III' }
        ],
        laravelData: {},
        
        id: '',
         
        id_n: '',
        succmsg: true,
        showmodal: false,
        pagenumber: 1,
        actionmsg: '',
        active:false
      }
    },
    methods: {
      termLists(page) {
        if (typeof page === 'undefined') {
          page = 1
        }
        this.$http.get(BASE_URL + '/api/terms?page=' + page).then(response => {
          //this.posts = response.data.data;
          this.laravelData = response.data
          this.pagenumber = page
        })
              
      },
        
      mouseOver: function(){
            this.active = !this.active;   
        },
      getText () {
        var values = this.options.map(function(o) { return o.value })
        var index = values.indexOf(this.selected) 
        this.term.name = this.options[index].text
      },
      
      addTerm() {
        this.$http
          .post(BASE_URL + '/api/terms', {
            name: this.term.name,
            description: this.term.description,
            session: this.term.session,
            jss1:this.term.jss1,
            jss2:this.term.jss2,
            jss3:this.term.jss3,
            ss1:this.term.ss1,
            ss2:this.term.ss2,
            ss3:this.term.ss3,
            y1:this.term.y1,
             y2:this.term.y2,
              y3:this.term.y3,
               y4:this.term.y4,
                y5:this.term.y5,
                 y6:this.term.y6,
            tulip:this.term.tulip,
            prekin:this.term.prekin,
            kinda:this.term.kinda,
            
            resumption_date:this.term.resumption_date
            
          })
          .then(data => {
            this.succmsg = false
            console.log(data)
            this.term.name = ''
            this.term.description = ''
                        
            var self = this
            setTimeout(function() {
              self.succmsg = true
            }, 3000)
            this.actionmsg = 'Term  Added successfully'
            $('#exampleModal').modal('hide')
            $('body')
              .removeClass()
              .removeAttr('style')
            $('.modal-backdrop').remove()
            this.termLists(this.pagenumber)
          })
      },
      editTerm(termid) {
        this.$http.get(BASE_URL + '/api/terms/' + termid).then(data => {
          this.term.name = data.data.data.name
          this.term.description = data.data.data.description,
          this.term.session = data.data.data.session
          this.term.ss1 = data.data.data.ss1,
           this.term.ss2 = data.data.data.ss2,
            this.term.ss3 = data.data.data.ss3,
          this.term.jss1 = data.data.data.jss1,
           this.term.jss2 = data.data.data.jss2,
            this.term.jss3 = data.data.data.jss3,
          this.term.y1 = data.data.data.y1,
          this.term.y2 = data.data.data.y2,
          this.term.y3 = data.data.data.y3,
          this.term.y4 = data.data.data.y4,
          this.term.y5 = data.data.data.y5,
          this.term.y6 = data.data.data.y6,
          this.term.tulip= data.data.data.tulip,
          this.term.prekin = data.data.data.prekin,
          this.term.kinda = data.data.data.kinda,
          this.term.resumption_date = data.data.data.resumption_date
          this.id = termid
        })
      },
      updateTerm() {
        this.$http
          .put(BASE_URL + '/api/terms/' + this.id, {
            term_id:this.id,
            name: this.term.name,
            description:this.term.description,
            session:this.term.session,
            jss1:this.term.jss1,
            jss2:this.term.jss2,
            jss3:this.term.jss3,
            ss1:this.term.ss1,
            ss2:this.term.ss2,
            ss3:this.term.ss3,
            y1:this.term.y1,
             y2:this.term.y2,
              y3:this.term.y3,
               y4:this.term.y4,
                y5:this.term.y5,
                 y6:this.term.y6,
            tulip:this.term.tulip,
            prekin:this.term.prekin,
            kinda:this.term.kinda,
            resumption_date:this.term.resumption_date
            
          })
          .then(data => {
            this.succmsg = false
            console.log(data)
            this.term.name = ''
            this.term.description = ''
            
            
            var self = this
            setTimeout(function() {
              self.succmsg = true
            }, 3000)
            this.actionmsg = 'Term updated successfully'
            $('#exampleModal1').modal('hide')
            $('body')
              .removeClass()
              .removeAttr('style')
            $('.modal-backdrop').remove()
            this.termLists(this.pagenumber)
          })
      },
      getTerm(id){
        this.id_ = id

      },
      fixPoint() {
        this.$http
          .put(BASE_URL + '/api/terms/' + this.id_, {
            term_id:this.id_,
            h_cat1: this.term.h_cat1,
            h_cat2:this.term.h_cat2,
            msc:this.term.msc,
            y_summative:this.term.y_summative,
            e_summative:this.term.e_summative,
             
          })
          .then(data => {
            this.succmsg = false
            console.log(data)
            
            this.term.h_cat1 = ''
            this.term.h_cat2 = ''
            this.term.y_summative = ''
            this.term.e_summative = ''
            this.id_ = ''
            this.term.msc=''
            
            
            var self = this
            setTimeout(function() {
              self.succmsg = true
            }, 3000)
            this.actionmsg = 'Fix Point set successfully'
            $('#exampleModalScore').modal('hide')
            $('body')
              .removeClass()
              .removeAttr('style')
            $('.modal-backdrop').remove()
            this.termLists(this.pagenumber)
          })
      },
        unassignedClassList(term) {
        this.$http.get(BASE_URL + '/api/terms/'+term+'/unassignedterms').then(response => {
          this.unassignedClasses = response.data;
          this.term_id = term;
          this.assignedClassList(term);
        })
      },
      assignedClassList(term) {
        this.$http.get(BASE_URL + '/api/terms/'+term+'/assignedterms').then(response => {
          this.assignedClasses = response.data
        })
      },
      assignClass(term_id, class_id){
        this.$http
          .post(BASE_URL + '/api/term/'+term_id+'/assignclass/'+class_id, {
            term_id: this.term_id,
            class_id: this.class_id,
          })
          .then(data => {
            this.term_id = '';
            this.assignedClassList(term_id);
            this.unassignedClassList(term_id);
            var self = this
            setTimeout(function() {
              self.succmsg = true
            }, 3000)
          })
      },
       deleteId(termid) {
        this.id = termid
        this.deleteTerm();
      },
      deleteClass(term_, cls_) {
        this.$http
          .delete(BASE_URL + '/api/terms/'+term_+'/deleteclass/'+cls_, {
            term_id: this.term_id,
            class_id: cls_,
          })
          .then(data => {
            cls_ = '';
            this.assignedClassList(cls_);
            this.unassignedClassList(cls_);
            var self = this
            setTimeout(function() {
              self.succmsg = true
            }, 3000)
          })
      },
   
     
      deleteTerm() {
        this.$http.delete(BASE_URL + '/api/terms/' + this.id).then(data => {
          this.succmsg = false
          var self = this
          setTimeout(function() {
            self.succmsg = true
          }, 3000)

          this.actionmsg = 'Term deleted successfully'
          this.termLists(this.pagenumber)
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
      },
      
    },
    mounted() {
          
            
      this.termLists()
      
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
