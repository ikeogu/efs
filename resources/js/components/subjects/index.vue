

<template>
  
  
  <div id="postsrec" class="mt-5">

    <div class="row mt-5">
      <div class="col-lg-12 text-right" style="margin-bottom: 20px;">
        <a href="#"
           data-target="#exampleModal"
           data-toggle="modal"
           class="btn btn-success">Add Subject</a>
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
                  <h5 class="modal-title" id="exampleModalLabel">Add a Subject</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <form method="post" name="addsubject" id="addsubject" action="#" @submit.prevent="addSubject">
                    <div class="form-group">
                      <label for="name">Subject Name</label>
                      <input type="text" name="name" id="name" class="form-control" placeholder="Name" v-model="subject.name" />
                    </div>
                    <div class="form-group">
                      <label for="name">Description</label>
                      <input type="text" name="description" id="description" class="form-control" placeholder="This subject is for ...." v-model="subject.description" />
                    </div>

                    <div class="form-group">
                      <select class="form-control" name="level" v-model="selected" v-on:change="getText">
                        <option>Choose Option</option>
                        <option v-for="option in options" v-bind:value="option.value" :key="option.value">
                            {{option.text}}
                        </option>
                      </select>
                  </div>
                  <div id="high" v-if="selected === 1">
                  <div class="form-group">
                      <label for="name">CAT 1</label>
                      <input type="number" name="cat_1" id="name" class="form-control"  placeholder="Mark for CAT 1" v-model="subject.cat_1" />
                    </div>
                    <div class="form-group">
                      <label for="name">CAT 2</label>
                      <input type="number" name="cat_2" id="name" class="form-control"  placeholder="Mark for CAT 2 " v-model="subject.cat_2" />
                    </div>
                     <div class="form-group">
                      <label for="name">Home Work</label>
                      <input type="hidden" name="home_work" id="home_work" class="form-control" value="10" v-model="subject.home_work" />
                    </div>
                    <div class="form-group">
                      <label for="name">Class Work</label>
                      <input type="hidden" name="class_work" id="class_work" class="form-control" value="10" v-model="subject.class_work" />
                    </div>
                  </div>
                  <div id="year" v-if="selected === 2">
                    <div class="form-group">
                      <label for="name">Home Work</label>
                      <input type="number" name="home_work" id="home_work" class="form-control" value="10" v-model="subject.home_work" />
                    </div>
                    <div class="form-group">
                      <label for="name">Class Work</label>
                      <input type="number" name="class_work" id="class_work" class="form-control" value="10" v-model="subject.class_work" />
                    </div>
                    <div class="form-group">
                      <label for="name">Summative Test</label>
                      <input type="number" name="summative_test" id="name" class="form-control"  placeholder="Mark for Summative Test " v-model="subject.summative_test" />
                    </div>
                  </div>
                  <div id="early" v-if="selected === 3">
                    <div class="form-group">
                      <label for="name">Summative Test</label>
                      <input type="number" name="summative_test" id="name" class="form-control"  placeholder="Mark for Summative Test " v-model="subject.summative_test" />
                    </div>
                  </div> 
                  <div class="form-group">
                      <label for="name">Exam</label>
                      <input type="number" name="exam" id="name" class="form-control"  placeholder="Mark for Exams " v-model="subject.exam" />
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
             id="exampleModal1"
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
                <form method="post" name="updatesubject" id="updatesubject" action="#" @submit.prevent="updateSubject">
                  <div class="form-group">
                    <label for="name">Subject Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" v-model="subject.name" />
                  </div>
                   <div class="form-group">
                    <label for="name">Description</label>
                    <input type="text" name="description" id="description" class="form-control" placeholder="This subject is for ...." v-model="subject.description" />
                  </div>
                    
                    <div class="form-group">
                      <select class="form-control" name="level" v-model="selected" v-on:change="getText">
                        <option>Choose Option</option>
                        <option v-for="option in options" v-bind:value="option.value" :key="option.value">
                            {{option.text}}
                        </option>
                      </select>
                  </div>
                  <!--
                  <div id="high" v-if="selected === 1">
                  <div class="form-group">
                      <label for="name">CAT 1</label>
                      <input type="number" name="cat_1" id="name" class="form-control"  placeholder="Mark for CAT 1" v-model="subject.cat_1" />
                    </div>
                    <div class="form-group">
                      <label for="name">CAT 2</label>
                      <input type="number" name="cat_2" id="name" class="form-control"  placeholder="Mark for CAT 2 " v-model="subject.cat_2" />
                    </div>
                  </div>
                  <div id="high" v-if="selected === 2">
                  <div class="form-group">
                      <label for="name">CAT 1</label>
                      <input type="number" name="cat_1" id="name" class="form-control"  placeholder="Mark for CAT 1" v-model="subject.cat_1" />
                    </div>
                    <div class="form-group">
                      <label for="name">CAT 2</label>
                      <input type="number" name="cat_2" id="name" class="form-control"  placeholder="Mark for CAT 2 " v-model="subject.cat_2" />
                    </div>
                  </div>
                  <div id="year" v-if="selected === 3">
                    <div class="form-group">
                      <label for="name">Home Work</label>
                      <input type="number" name="home_work" id="home_work" class="form-control" value="10" v-model="subject.home_work" />
                    </div>
                    <div class="form-group">
                      <label for="name">Class Work</label>
                      <input type="number" name="class_work" id="class_work" class="form-control" value="10" v-model="subject.class_work" />
                    </div>
                    
                  </div>
                  <div id="early" v-if="selected === 4">
                    <div class="form-group">
                      <label for="name">Summative Test</label>
                      <input type="number" name="summative_test" id="name" class="form-control"  placeholder="Mark for Summative Test " v-model="subject.summative_test" />
                    </div>
                  </div> 
                   <div class="form-group">
                    <label for="name">Exam</label>
                    <input type="number" name="exam" id="name" class="form-control"  placeholder="Mark for Exams " v-model="subject.exam" />
                  </div>-->
                
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
                  <button class="btn btn-success" v-on:click="deleteSubject()">Ok</button>
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="card shadow mb-4">
          <div class="card-header py-3 bg-success">
            <h6 class="m-0 font-weight-bold text-white">Subjects</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <th>#</th>
                    <th>Subject Name</th>
                    <th>Subject Description</th>
                    <th>School</th>
                    <th colspan="2">Action</th>
                  
                </thead>
                <tbody>
                  <tr v-for="(sub,index) in orderedSubject" :key="sub.id">
                    <td>{{ index + 1 }}</td>
                    <td>{{ sub.name }}</td>
                    <td>{{ sub.description }}</td>
                    <td>{{ sub.level }}</td>
                                      
                    <td>
                      <a href="#"
                        v-on:click="editSubject(sub.id)"
                        data-target="#exampleModal1"
                        data-toggle="modal"
                        v-bind:title="sub.name" class="btn btn-warning">Edit</a></td>
                    <td><a href="#"  class="btn btn-danger" data-target="#exampleModal2" v-on:click="deleteId(sub.id)" data-toggle="modal" v-bind:id="id">Delete</a></td>
                  
                  </tr>
                </tbody>
              
              </table>
            <pagination :data="laravelData" :limit="2" @pagination-change-page="subjectLists">
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
  const BASE_URL = 'https://efs.ishlp.com';
  export default {
    data() {
      return {
        selected:"Choose Options",
        options: [
                { value: 1, text: 'Senior High School' },
                { value: 2, text: 'Junior High School' },
                { value: 3, text: 'Year School' },
                { value: 4, text: 'Early Years' }
            ],
        subject: {
          name: '',
          description: '',
          home_work: '',
          class_work:'',
          friday_test:'',
          holiday_assignment:'',
          cat_1:'',
          cat_2:'',
          summative_test:'',
          exam:'',
          level:'',
        },
        laravelData: {},
        id: '',
        succmsg: true,
        showmodal: false,
        pagenumber: 1,
        actionmsg: ''
      }
    },
    computed: {
          orderedSubject: function () {
            return _.orderBy(this.laravelData, 'name')
          },
          
    },
    methods: {
      subjectLists(page) {
        if (typeof page === 'undefined') {
          page = 1
        }
        this.$http.get(BASE_URL + '/api/subjects?page=' + page).then(response => {
          //this.posts = response.data.data;
          this.laravelData = response.data.data
          this.pagenumber = page
        })
      },
      getText () {
        var values = this.options.map(function(o) { return o.value })
        var index = values.indexOf(this.selected) 
        this.subject.level = this.options[index].text
      },
      addSubject() {
        this.$http
          .post(BASE_URL + '/api/subjects', {
            name: this.subject.name,
            description: this.subject.description,
            home_work: this.subject.home_work,
            class_work: this.subject.class_work,
            friday_test: this.subject.friday_test,
            holiday_assignment: this.subject.holiday_assignment,
            cat_1: this.subject.cat_1,
            cat_2: this.subject.cat_1,
            summative_test: this.subject.summative_test,
            exam: this.subject.exam,
            level:this.subject.level
          })
          .then(data => {
            this.succmsg = false
            console.log(data)
            this.subject.name = ''
            this.subject.description = ''
             this.subject.home_work = ''
            this.subject.class_work = ''
            this.subject.friday_test = ''
            this.subject.holiday_assignment = ''
             this.subject.cat_1 = ''
            this.subject.cat_2 = ''
            this.subject.summative_test = ''
            this.subject.exam = ''
            this.subject.level = ''
            var self = this
            setTimeout(function() {
              self.succmsg = true
            }, 3000)
            this.actionmsg = 'Subject inserted successfully'
            $('#exampleModal').modal('hide')
            $('body')
              .removeClass()
              .removeAttr('style')
            $('.modal-backdrop').remove()
            this.subjectLists(this.pagenumber)
          })
      },
      editSubject(subjectid) {
        this.$http.get(BASE_URL + '/api/subjects/' + subjectid).then(data => {
          this.subject.name = data.data.data.name,
          this.subject.description = data.data.data.description,
          this.subject.home_work = data.data.data.home_work,
          this.subject.class_work = data.data.data.class_work,
          this.subject.friday_test = data.data.data.friday_test,
          this.subject.holiday_assignment = data.data.data.holiday_assignment,
          this.subject.cat_1 = data.data.data.cat_1,
          this.subject.cat_2 = data.data.data.cat_2,
          this.subject.exam = data.data.data.exam,
          this.subject.summative_test = data.data.data.summative_test,
          this.subject.level = data.data.data.level,
          this.id = subjectid
        })
      },
      updateSubject() {
        this.$http
          .patch(BASE_URL + '/api/subjects/' + this.id, {
            name: this.subject.name,
            description: this.subject.description,
            // home_work: this.subject.home_work,
            // class_work: this.subject.class_work,
            // friday_test: this.subject.friday_test,
            // holiday_assignment: this.subject.holiday_assignment,
            // cat_1: this.subject.cat_1,
            // cat_2: this.subject.cat_1,
            // summative_test: this.subject.summative_test,
            subject_id: this.id,
            level:this.subject.level
          })
          .then(data => {
            this.succmsg = false
            console.log(data)
            this.subject.name = ''
            this.subject.name = ''
            this.subject.description = ''
             this.subject.home_work = ''
            this.subject.class_work = ''
            this.subject.friday_test = ''
            this.subject.holiday_assignment = ''
             this.subject.cat_1 = ''
            this.subject.cat_2 = ''
            this.subject.summative_test = ''
            this.subject.exam = ''
            this.subject.level = ''
            var self = this
            setTimeout(function() {
              self.succmsg = true
            }, 3000)
            this.actionmsg = 'Data updated successfully'
            $('#exampleModal1').modal('hide')
            $('body')
              .removeClass()
              .removeAttr('style')
            $('.modal-backdrop').remove()
            this.subjectLists(this.pagenumber)
          })
      },
      deleteId(subjectid) {
        this.id = subjectid
      },
      deleteSubject() {
        this.$http.delete(BASE_URL + '/api/subjects/' + this.id).then(data => {
          this.succmsg = false
          var self = this
          setTimeout(function() {
            self.succmsg = true
          }, 3000)

          this.actionmsg = 'Data deleted successfully'
          this.subjectLists(this.pagenumber)
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
      this.subjectLists()
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
