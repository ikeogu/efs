<template>

  <div id="postsrec" class="mt-5">

    <div class="row mt-5">
      <div class="col-lg-12 text-right" style="margin-bottom: 20px;">
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
                    <label for="percentage">Subject</label>
                    <input type="text" name="name" id="percentage" class="form-control" placeholder="name" v-model="setting.name"
                    />
                  </div>
                  <div class="form-group">
                    <label for="grade">First Comment</label>
                    <input type="text" name="f" id="grade" class="form-control" placeholder="First Comment" v-model="setting.f" />
                  </div>
                  <div class="form-group">
                    <label for="grade">Second Comment</label>
                    <input type="text" name="s" id="grade" class="form-control" placeholder="Second Comment" v-model="setting.s" />
                  </div>
                  <div class="form-group">
                    <label for="grade">Third Comment</label>
                    <input type="text" name="th" id="grade" class="form-control" placeholder="Third Comment" v-model="setting.th" />
                  </div>
                  <div class="form-group">
                    <label for="grade">Fourth Comment</label>
                    <input type="text" name="fr" id="grade" class="form-control" placeholder="Forth Comment" v-model="setting.fr" />
                  </div>
                  <div class="form-group">
                    <label for="grade">Fifith Comment</label>
                    <input type="text" name="fif" id="grade" class="form-control" placeholder="Fifth Comment" v-model="setting.fif" />
                  </div>
                  <div class="form-group">
                    <label for="grade">Sixth Comment</label>
                    <input type="text" name="six" id="grade" class="form-control" placeholder="Six Comment" v-model="setting.six" />
                  </div>
                  <div class="form-group">
                    <label for="grade">Seventh Comment</label>
                    <input type="text" name="sev" id="grade" class="form-control" placeholder="Seventh Comment" v-model="setting.sev" />
                  </div>
                  <div class="form-group">
                    <label for="description">Class</label>
                      <select class="form-control" name="s5_class_id" v-model="setting.s5_class_id"  placeholder="Choose Class">
                         <option v-for="classes in classData" v-bind:value="classes.id" :key="classes.id">
                          {{classes.name}}
                      </option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="description">Term</label>
                      <select class="form-control" name="term_id" v-model="setting.term_id"  placeholder="Choose Term">
                         <option v-for="term in TermData" v-bind:value="term.id" :key="term.id">
                          {{term.name}}
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
                <form method="post" name="updatestudent" id="updatestudent" action="#" @submit.prevent="updateSubjComment">
                  <div class="form-group">
                    <label for="percentage">Subject</label>
                    <input type="text" name="name" id="percentage" class="form-control" placeholder="name" v-model="setting.name"
                    />
                  </div>
                  <div class="form-group">
                    <label for="grade">First Comment</label>
                    <input type="text" name="f" id="grade" class="form-control" placeholder="First Comment" v-model="setting.f" />
                  </div>
                  <div class="form-group">
                    <label for="grade">Second Comment</label>
                    <input type="text" name="s" id="grade" class="form-control" placeholder="Second Comment" v-model="setting.s" />
                  </div>
                  <div class="form-group">
                    <label for="grade">Third Comment</label>
                    <input type="text" name="th" id="grade" class="form-control" placeholder="Third Comment" v-model="setting.th" />
                  </div>
                  <div class="form-group">
                    <label for="grade">Fourth Comment</label>
                    <input type="text" name="fr" id="grade" class="form-control" placeholder="Forth Comment" v-model="setting.fr" />
                  </div>
                  <div class="form-group">
                    <label for="grade">Fifith Comment</label>
                    <input type="text" name="fif" id="grade" class="form-control" placeholder="Fifth Comment" v-model="setting.fif" />
                  </div>
                  <div class="form-group">
                    <label for="grade">Sixth Comment</label>
                    <input type="text" name="six" id="grade" class="form-control" placeholder="Six Comment" v-model="setting.six" />
                  </div>
                  <div class="form-group">
                    <label for="grade">Seventh Comment</label>
                    <input type="text" name="sev" id="grade" class="form-control" placeholder="Seventh Comment" v-model="setting.sev" />
                  </div>
                  <div class="form-group">
                    <label for="description">Class</label>
                      <select class="form-control" name="s5_class_id" v-model="setting.s5_class_id"  placeholder="Choose Class">
                         <option v-for="classes in classData" v-bind:value="classes.id" :key="classes.id">
                          {{classes.name}}
                      </option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="description">Term</label>
                      <select class="form-control" name="term_id" v-model="setting.term_id"  placeholder="Choose Term">
                         <option v-for="term in TermData" v-bind:value="term.id" :key="term.id">
                          {{term.name}}
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
                  <button class="btn btn-success" v-on:click="deleteSubjComment()">Ok</button>
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">SubjComments List</h6>
          </div>
          <div class="card-body table-responsive">

            <table class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                <th>Class</th>
                <th>Term</th>
                  <th>Name</th>
                  <th>First Com</th>
                  <th>Second Com</th>
                  <th>Third Com</th>
                  <th>Fourth Com</th>
                  <th>Fifth Com</th>
                  <th>Sixth Com</th>
                  <th>Seventh Com</th>
                  
                </tr>
              </thead>
              <tbody>
                <tr v-for="gSetting in laravelData" :key="gSetting.id">
                  <td>{{ gSetting.class_ }}</td>
                  <td>{{ gSetting.term }}</td>
                  <td>{{ gSetting.name}}</td>
                  <td>{{ gSetting.f }}</td>
                  <td>{{ gSetting.s }}</td>
                  <td>{{ gSetting.th }}</td>
                  <td>{{ gSetting.fr }}</td>
                  <td>{{ gSetting.fif }}</td>
                  <td>{{ gSetting.six }}</td>
                  <td>{{ gSetting.sev }}</td>
                  <td><a href="#"
                       v-on:click="editSubjComment(gSetting.id)"
                       data-target="#exampleModal1"
                       data-toggle="modal"
                       v-bind:title="gSetting.id">Edit</a></td>
                  <td><a href="#" data-target="#exampleModal2" v-on:click="deleteId(gSetting.id)" data-toggle="modal" v-bind:id="id">Delete</a></td>
                </tr>
              </tbody>
              
            </table>
            <pagination :data="laravelData" :limit="2" @pagination-change-page="SubjCommentLists">
              <span slot="prev-nav">&lt; Previous</span>
              <span slot="next-nav">Next &gt;</span>
            </pagination>
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
        setting: {
          f: '',
          s: '',
          th: '',
          fr:'',
          fif:'',
          six:'',
          sev:'',
          term_id:'',
          s5_class_id:'',
          name:''
        },
        laravelData: {},
        classData: {},
        termData: {},
        id: '',
        succmsg: true,
        showmodal: false,
        pagenumber: 1,
        actionmsg: ''
      }
    },
    methods: {
      SubjCommentLists(page) {
        if (typeof page === 'undefined') {
          page = 1
        }
        this.$http.get(BASE_URL + '/api/subjComment?page=' + page).then(response => {
          //this.posts = response.data.data;
          this.laravelData = response.data.data
          
        })
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
      addSubjComment() {
        this.$http
          .post(BASE_URL + '/api/subjComment', {
            name: this.setting.name,
            term_id: this.setting.term_id,
            s5_class_id: this.setting.s5_class_id,
            f: this.setting.f,
            s: this.setting.s,
            th: this.setting.th,
            fr: this.setting.fr,
            fif: this.setting.fif,
            six: this.setting.six,
            sev: this.setting.sev,
            
          })
          .then(data => {
            this.succmsg = false
            console.log(data)
            this.setting.name = ''
            this.setting.term_id = ''
            this.setting.s5_class_id = ''
             this.setting.f = ''
             this.setting.s = ''
             this.setting.th = ''
             this.setting.fr = ''
             this.setting.fif = ''
             this.setting.six = ''
             this.setting.sev = ''
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
            this.SubjCommentLists(this.pagenumber)
          })
      },
      editSubjComment(settingid) {
        this.$http.get(BASE_URL + '/api/subjComment/' + settingid).then(data => {
          this.setting.name = data.data.data.name
          this.setting.f = data.data.data.f
          this.setting.s = data.data.data.s
          this.setting.th = data.data.data.th
          this.setting.fr = data.data.data.fr
          this.setting.fif = data.data.data.fif
          this.setting.six = data.data.data.six
          this.setting.sev = data.data.data.sev
          this.id = settingid
        })
      },
      updateSubjComment() {
        this.$http
          .patch(BASE_URL + '/api/subjComment/' + this.id, {
            name: this.setting.name,
            term_id: this.setting.term_id,
            s5_class_id: this.setting.s5_class_id,
            f: this.setting.f,
            s: this.setting.s,
            th: this.setting.th,
            fr: this.setting.fr,
            fif: this.setting.fif,
            six: this.setting.six,
            sev: this.setting.sev,
            
          })
          .then(data => {
            this.succmsg = false
            console.log(data)
            this.setting.name = ''
            this.setting.term_id = ''
            this.setting.s5_class_id = ''
             this.setting.f = ''
             this.setting.s = ''
             this.setting.th = ''
             this.setting.fr = ''
             this.setting.fif = ''
             this.setting.six = ''
             this.setting.sev = ''
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
            this.SubjCommentLists(this.pagenumber)
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
      }
    },
    mounted() {
      this.SubjCommentLists()
      this.classLists()
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
