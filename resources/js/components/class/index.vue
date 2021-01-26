

<template>
  
  
  <div id="postsrec" class="mt-5">

    <div class="row mt-5">
      <div class="col-lg-12 text-right" style="margin-bottom: 20px;">
        <a href="#"
           data-target="#exampleModal"
           data-toggle="modal"
           class="btn btn-success">Add Class</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Add a Class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <form method="post" name="addclass" id="addclass" action="#" @submit.prevent="addClass">
                  <div class="form-group">
                    <label for="name">Class Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" v-model="classes.name" />
                  </div>
                  <div class="form-group">
                    <label for="name">Description</label>
                    <input type="text" name="description" id="description" class="form-control" placeholder="This Class is for ...." v-model="classes.description" />
                  </div>
                  <div class="form-group">
                    <label for="name">Max No of Students</label>
                    <input type="number" name="no_of_students" id="no_of_student" class="form-control" placeholder="10" v-model="classes.no_of_students" />
                  </div>
                  
                  <div class="form-group">
                    <select class="form-control" name="status" v-model="selected" v-on:change="getText">
                      <option>Choose Option</option>
                      <option v-for="option in options" v-bind:value="option.value" :key="option.value">
                          {{option.text}}
                      </option>
                    </select>
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
                <form method="post" name="updateclass" id="updateclass" action="#" @submit.prevent="updateClass">
                  <div class="form-group">
                    <label for="name">Subject Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" v-model="classes.name" />
                  </div>
                   <div class="form-group">
                    <label for="name">Description</label>
                    <input type="text" name="description" id="description" class="form-control" placeholder="This subject is for ...." v-model="classes.description" />
                  </div>
                  <div class="form-group">
                    <label for="name">Max No of Students</label>
                    <input type="text" name="no_of_students" id="no_of_student" class="form-control" placeholder="10" v-model="classes.no_of_students" />
                  </div>
                  <div class="form-group">
                    <label for="name">Level</label>
                    <input type="text" name="status" id="no_of_student" class="form-control" placeholder="10" v-model="classes.status" readonly />
                  </div>
                  
                  <div class="form-group">
                    <select class="form-control" name="status" v-model="selected" v-on:change="getText">
                      <option>Choose Option</option>
                      <option v-for="option in options" v-bind:value="option.value" :key="option.value" >
                          {{option.text}}
                      </option>
                    </select>
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

        <div class="card">
          <div class="card-header">Class List</div>
          <div class="card-body">
            <div class="table-responsive">
            
            <table class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>Class</th>
                  <th>Description</th>
                  <th>Max in Class</th>
                  <th>Level</th>
                  <th>More</th>
                  <th colspan="2">Action</th>
                </tr>
              </thead>
              <tbody v-if="this.laravelData.data.length > 0">
                <tr v-for="las in laravelData.data" :key="las.id">
                  <td>{{ las.name }}</td>
                  <td>{{ las.description }}</td>
                  <td>{{ las.no_of_students }}</td>
                  <td>{{ las.status }}</td>
                  <td>
                    
                    <a :href="'https://efs.ishlp.com/api/class_terms/' + las.id" class="btn btn-info text-white ">More</a>
                  </td>
                  <!-- link to student in a class -->
                  <td><a href="#"
                       v-on:click="editClass(las.id)"
                       data-target="#exampleModal1" 
                       data-toggle="modal"
                       v-bind:title="las.name" class="btn btn-warning text-white ">Edit</a></td>
                  <td><a href="#" data-target="#exampleModal2" v-on:click="deleteId(las.id)" data-toggle="modal" v-bind:id="id" class="btn btn-danger text-white ">Delete</a></td>
                </tr>
                
              </tbody>
              <span v-else>No Class has been Added!</span>
            </table>
            <pagination :data="laravelData" :limit="2" @pagination-change-page="classLists">
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
        classes: {
          name: '',
          description: '',
          no_of_students: '',
          status:'',
         
        },
        laravelData: {},
        id: '',
        succmsg: true,
        showmodal: false,
        pagenumber: 1,
        actionmsg: ''
      }
    },
    methods: {
      classLists(page) {
        if (typeof page === 'undefined') {
          page = 1
        }
        this.$http.get(BASE_URL + '/api/schclasses?page=' + page).then(response => {
          //this.posts = response.data.data;
          this.laravelData = response.data
          this.pagenumber = page
        })
      },
      getText () {
        var values = this.options.map(function(o) { return o.value })
        var index = values.indexOf(this.selected) 
        this.classes.status = this.options[index].text
      },
      addClass() {
        this.$http
          .post(BASE_URL + '/api/schclasses', {
            name: this.classes.name,
            description: this.classes.description,
            no_of_students: this.classes.no_of_students,
            status: this.classes.status
          })
          .then(data => {
            this.succmsg = false
            console.log(data)
            this.classes.name = ''
            this.classes.description = ''
            this.classes.status = ''
            this.classes.no_of_students = ''
            this.classes.status = ''
            var self = this
            setTimeout(function() {
              self.succmsg = true
            }, 3000)
            this.actionmsg = 'Class Added successfully'
            $('#exampleModal').modal('hide')
            $('body')
              .removeClass()
              .removeAttr('style')
            $('.modal-backdrop').remove()
            this.classLists(this.pagenumber)
          })
      },
      editClass(classesid) {
        this.$http.get(BASE_URL + '/api/schclasses/' + classesid).then(data => {
          this.classes.name = data.data.data.name
          this.classes.description = data.data.data.description,
          this.classes.no_of_students = data.data.data.no_of_students
          this.classes.status = data.data.data.status
          this.id = classesid
        })
      },
      updateClass() {
        this.$http
          .put(BASE_URL + '/api/schclass/' + this.id, {
            schclass_id:this.id,
            name: this.classes.name,
            description:this.classes.description,
            no_of_students:this.classes.no_of_students,
            status:this.classes.status
          })
          .then(data => {
            this.succmsg = false
            console.log(data)
            this.classes.name = ''
            this.classes.description = ''
            this.classes.status = ''
            this.classes.no_of_students = ''
            this.classes.status = ''
            var self = this
            setTimeout(function() {
              self.succmsg = true
            }, 3000)
            this.actionmsg = 'Class updated successfully'
            $('#exampleModal1').modal('hide')
            $('body')
              .removeClass()
              .removeAttr('style')
            $('.modal-backdrop').remove()
            this.classLists(this.pagenumber)
          })
      },
      deleteId(classesid) {
        this.id = classesid
      },
      deleteClass() {
        this.$http.delete(BASE_URL + '/api/schclasses/' + this.id).then(data => {
          this.succmsg = false
          var self = this
          setTimeout(function() {
            self.succmsg = true
          }, 3000)

          this.actionmsg = 'Class deleted successfully'
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
      this.classLists()
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
