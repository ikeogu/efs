<template>

  <div id="postsrec" class="mt-5">

    <div class="row mt-5">
      <div class="col-lg-6 text-right" style="margin-bottom: 20px;">
        <a href="#" v-on:click="fixSubject()"
           class="btn btn-warning">Fix Subject Comment</a>
      </div>
      <div class="col-lg-6 text-right" style="margin-bottom: 20px;">

        <a href="#"
           data-target="#exampleModal"
           data-toggle="modal"
           class="btn btn-success">Add Subject Comment</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Add Subject Comment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" name="addSubjComment" id="addstudent" action="#" @submit.prevent="addSubjComment">
                  <div class="form-group">
                    <label for="subject_id">Subject</label>
                   <select class="form-control" name="subject_id" v-model="setting.subject_id" >
                      <option>Select Subject</option>
                      <option v-for="option in subjectData" v-bind:value="option.id" :key="option.id">
                          {{option.name}}
                      </option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="description">Decription</label>
                    <textarea name="description"  class="form-control" placeholder="Enter Subejct Comment ...." v-model="setting.description"></textarea>
                  </div>
                  
                  <div class="form-group text-right">
                    <button class="btn btn-success">Submit</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>

        <div class="modal fade"
             id="exampleModal1-sub"
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
                <form method="post" name="updatestudent" id="updatestudent" action="#" @submit.prevent="updateSubjComment">
                 <div class="form-group">
                    <label for="subject_id">Subject</label>
                   <select class="form-control" name="subject_id" v-model="esetting.subeject_id" >
                      <option>Select Subject</option>
                      <option v-for="option in subjectData" v-bind:value="option.id" :key="option.id">
                          {{option.name}}
                      </option>
                    </select>
                  </div>
                  <div class="form-group">
                     <input type="text" name="subject" readonly value="esetting.subject"  class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="description">Decription</label>
                    <textarea name="description"  class="form-control" v-model="esetting.description">
                      
                    </textarea>
                  </div>
                  <div class="form-group text-right">
                    <button class="btn btn-success">Update</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>

        <div class="modal fade" id="exampleModal2-sub" tabindex="-1" role="dialog" aria-labelledby="exampleModal2-subLabel" aria-hidden="true">
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
                  <button class="btn btn-success" v-on:click="deleteSubjComment()">Ok</button>
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Subject Comments List</h6>
          </div>
          <div class="card-body table-responsive">

            <table class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                <th>Class</th>
                <th>Term</th>
                 <th>Subject</th>
                  <th>Description</th>
                             
                </tr>
              </thead>
              <tbody>
                <tr v-for="gSetting in laravelData" :key="gSetting.id">
                  <td>{{ gSetting.class_ }}</td>
                  <td>{{ gSetting.term }}</td>
                    <td>{{ gSetting.subject}}</td>
                  <td>{{ gSetting.description}}</td>
                 
                  <td><a href="#"
                       v-on:click="editSubjComment(gSetting.id)"
                       data-target="#exampleModal1-sub"
                       data-toggle="modal"
                       v-bind:title="gSetting.id">Edit</a></td>
                  <td><a href="#" data-target="#exampleModal2-sub" v-on:click="deleteId(gSetting.id)" data-toggle="modal" v-bind:id="id">Delete</a></td>
                </tr>
              </tbody>
              
            </table>
        
          </div>
        </div>
        <div class="card" >
            <div class="card-header bg-success text-white">Subject Comment chart</div>
          <div class="card-body">
            <div class="table-responsive">
            
            <table class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr >
                  <th>#</th>
                  <th>Name</th>
                  <th>subject</th>
                  <th>Comment</th>
                  <th>Acquired</th>
                  <th>Emerging</th>
                </tr>
                
              </thead>
              <tbody >
                  
                <tr  v-for="(st,index) in orderedSubjComment" :key="st.id" >
                  <th scope="row">{{ index + 1 }}</th>
                  <td>{{ st.student}}</td>
                  <td>{{ st.subject}}</td>
                  <td>{{ st.description}}</td>

                  <td v-if="st.acquired!=null">{{ st.acquired}}</td>
                  <td v-else>
                  <input type="checkbox" id="one" :value="st.table_id + '_' + index + '_2'" v-model="checkedComments" > </td>  
                  <td  v-if="st.emerging!=null">{{ st.emerging}}</td>                                          
                  <td v-else>
                   <input type="checkbox" id="two" :value="st.table_id  + '_' + index + '_1'" v-model="checkedComments" >    
                  </td>  
                </tr>
               
                <tr>
                  <div class="form-group text-center">
                  <button class="btn btn-success" v-on:click="updateSubjCommentEmerging()">Submit</button>
                </div>
                </tr>
              </tbody>
            
                            
             
            </table>
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
        checkedComments: [],
        setting: {
         
          description:'',
          term_id:'',
          s5_class_id:'',
          subject_id:''
        },
        esetting: {
         
          description:'',
          term_id:'',
          s5_class_id:'',
          subject_id:''
        },
        laravelData: {},
        classData: {},
        subjectData:{},
        termData: {},
        subcomment:{
          student:'',
          acquired:'',
          emerging:'',
          description:'',
        },
        id: '',
        succmsg: true,
        showmodal: false,
        pagenumber: 1,
        actionmsg: ''
      }
    },
    computed: {
          orderedSubjComment: function () {
            return _.orderBy(this.subcomment, 'student')
          },
    },
    methods: {
      SubjCommentLists(page) {
         this.$http.get(BASE_URL + '/api/subjComment/class/'+ this.setting.s5_class_id+ '/term/'+ this.setting.term_id ).then(response => {
          //this.posts = response.data.data;
          
          this.laravelData = response.data.data
          
        })
      },
      // fetch the subeject description
       fetchComment(){
       this.$http.get( BASE_URL + '/api/subjcomment_/class/'+this.setting.s5_class_id+'/term/'+this.setting.term_id).then(response => {
          this.subcomment = response.data;
          console.log(response.data);
          
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
      classLists() {
        
        this.$http.get(BASE_URL + '/api/schclasses').then(response => {
          //this.posts = response.data.data;
          this.classData = response.data.data
          
        })
      },
      termLists() {
       
        this.$http.get(BASE_URL + '/api/terms').then(response => {
          //this.posts = response.data.data;
          this.termData = response.data.data
        })
              
      },
       subjectLists() {
       
        this.$http.get(BASE_URL + '/api/early-years-subject').then(response => {
          //this.posts = response.data.data;
          this.subjectData = response.data
          
        })
              
      },
      fixSubject(){
        this.$http
          .post(BASE_URL + '/api/fix_early_years', {
            
            term_id: this.setting.term_id,
            s5_class_id: this.setting.s5_class_id          
          })
          .then(data => {
            this.succmsg = false
            var self = this
            setTimeout(function() {
              self.succmsg = true
            }, 3000)
            this.actionmsg = 'Subjects fixed successfully'
            $('#exampleModal').modal('hide')
            $('body')
              .removeClass()
              .removeAttr('style')
            $('.modal-backdrop').remove()
            this.SubjCommentLists()
          })
      },
      addSubjComment() {
        this.$http
          .post(BASE_URL + '/api/subjComment', {
            description: this.setting.description,
            term_id: this.setting.term_id,
            s5_class_id: this.setting.s5_class_id,
            subject_id: this.setting.subject_id            
          })
          .then(data => {
            this.succmsg = false
            console.log(data)
            this.setting.description = ''
            
            var self = this
            setTimeout(function() {
              self.succmsg = true
            }, 3000)
            this.actionmsg = 'Data inserted successfully'
            $('#exampleModal').modal('hide')
            $('body')
              .removeClass()
              .removeAttr('style')
            $('.modal-backdrop').remove()
            this.SubjCommentLists()
          })
      },
      editSubjComment(settingid) {
        this.$http.get(BASE_URL + '/api/subjComment/' + settingid).then(data => {
          this.esetting.description = data.data.data.description
          this.esetting.subject_id = data.data.data.subject_id
          this.esetting.subject = data.data.data.subject
          this.id = settingid
        })
      },
      updateSubjComment() {
        this.$http
          .patch(BASE_URL + '/api/subjComment/' + this.id, {
           description: this.esetting.description,
           subject_id: this.esetting.subject_id,
          })
          .then(data => {
            this.succmsg = false
            console.log(data)
            this.esetting.description = ''
            this.esetting.subject_id = ''
            var self = this
            setTimeout(function() {
              self.succmsg = true
            }, 3000)
            this.actionmsg = 'Data updated successfully'
            $('#exampleModal1-sub').modal('hide')
            $('body')
              .removeClass()
              .removeAttr('style')
            $('.modal-backdrop').remove()
            this.SubjCommentLists()
          })
      },
      
       updateSubjCommentEmerging() {
          console.log(this.checkedComments);    
        this.$http
          .post(BASE_URL + '/api/update-subjcomment', {
            emerging: this.checkedComments
            })
          .then(data => {
            this.succmsg = false
            console.log(data)
            this.checkedComments= ''
            
            var self = this
            setTimeout(function() {
              self.succmsg = true
            }, 3000)
            this.actionmsg = 'Data updated successfully'
            this.SubjCommentLists()
          })
      },
      deleteId(settingid) {
        this.id = settingid
      },
      deleteSubjComment() {
        this.$http.delete(BASE_URL + '/api/subComment/' + this.id).then(data => {
          this.succmsg = false
          var self = this
          setTimeout(function() {
            self.succmsg = true
          }, 3000)

          this.actionmsg = 'Data deleted successfully'
          this.SubjCommentLists(this.pagenumber)
          $('#exampleModal2-sub').modal('hide')
          $('body')
            .removeClass()
            .removeAttr('style')
          $('.modal-backdrop').remove()
        })
      },
      hideModal() {
        $('#exampleModal2-sub').modal('hide')
        $('body')
          .removeClass()
          .removeAttr('style')
        $('.modal-backdrop').remove()
      }
    },
    beforeMount(){
       this.setting.term_id = this.term_id
      this.setting.s5_class_id = this.s5_class_id
    },
    mounted() {
      
      this.SubjCommentLists()
      this.subjectLists()
      this.classLists()
      this.termLists()
      this.fetchComment()
      
      
    },
    props:[
      'term_id',
      's5_class_id'
    ]
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
