<template>

  <div id="postsrec" class="mt-5">

    
        
    

       
      </div>
    
  

</template>

<script>
  const BASE_URL = 'https://efs.ishlp.com';
  export default {
    data() {
      return {
        student: {
          student_id:'',
          name: '',
          surname: '',
          roll_no: '',
          gender: '',
          contact: '',
          address: '',
          p_email:'',
          s_class:'',
          term_id:'',
          dob:'',
          identification_mark:'',
        },
        laravelData: {},
        laravelClassData:{},
        laravelTerm:{},
        id: '',
        succmsg: true,
        showmodal: false,
        pagenumber: 1,
        actionmsg: ''
      }
    },
    ready: function() {
      this.fetchClasses();
      this.fetchTerms();
      },
      
        
    methods: {

      fetchClasses() {
        this.$http.get(BASE_URL + '/api/schclasses').then(response => {
          //this.posts = response.data.data;
          this.laravelClassData = response.data
          
        })
      },
        fetchTerms() {
        this.$http.get(BASE_URL + '/api/terms').then(responses => {
          //this.posts = response.data.data;
          this.laravelTerm = responses.data
          
          
        })   
        
      },
      
      studentLists(page) {
        if (typeof page === 'undefined') {
          page = 1
        }
        this.$http.get(BASE_URL + '/api/students?page=' + page).then(response => {
          //this.posts = response.data.data;
          this.laravelData = response.data
          this.pagenumber = page
        })
      },
      addStudent() {
        this.$http
          .post(BASE_URL + '/api/students', {
            name: this.student.name,
            surname: this.student.surname,
            gender: this.student.gender,
            contact: this.student.contact,
            roll_no: this.student.roll_no,
            address: this.student.address,
            p_email:this.student.p_email,
            s_class:this.student.s_class,
            term_id:this.student.term_id,
            identification_mark:this.student.identification_mark,
            dob:this.student.dob,

          })
          .then(data => {
            this.succmsg = false
            console.log(data)
            this.student.name = ''
            this.student.surname = ''
            this.student.gender = ''
            this.student.roll_no = ''
            this.student.contact = ''
            this.student.address = ''
            this.student.p_email = ''
            this.student.s_class= ''
            var self = this
            setTimeout(function() {
              self.succmsg = true
            }, 3000)
            this.actionmsg = 'Student inserted successfully'
            
            $('#exampleModal').modal('hide')
            $('body')
              .removeClass()
              .removeAttr('style')
            $('.modal-backdrop').remove()
            this.studentLists(this.pagenumber)
          })
      },
      editStudent(studentid) {
        this.$http.get(BASE_URL + '/api/students/' + studentid).then(data => {
          
          this.student.name = data.data.data.name
          this.student.surname = data.data.data.surname
          this.student.p_email = data.data.data.p_email
          this.student.gender = data.data.data.gender
          this.student.roll_no = data.data.data.roll_no
          this.student.contact = data.data.data.contact
          this.student.address = data.data.data.address
          this.student.s_class = data.data.data.s_class
          this.student.term_id = data.data.data.term_id
          this.id = studentid
        })
      },
      updateStudent() {
        this.$http
          .patch(BASE_URL + '/api/students/' + this.id, {
            student_id:this.id,
            name: this.student.name,
            surname: this.student.surname,
            gender: this.student.gender,
            contact: this.student.contact,
            roll_no: this.student.roll_no,
            address: this.student.address,
            s_class:this.student.s_class ,
            term_id:this.student.term_id 
          })
          .then(data => {
            this.succmsg = false
            console.log(data)
            this.student.name = ''
            this.student.father_name = ''
            this.student.gender = ''
            this.student.roll_no = ''
            this.student.contact = ''
            this.student.address = ''
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
            this.studentLists(this.pagenumber)
          })
      },
      deleteId(studentid) {
        this.id = studentid
      },
      deleteStudent() {
        this.$http.delete(BASE_URL + '/api/students/' + this.id).then(data => {
          this.succmsg = false
          var self = this
          setTimeout(function() {
            self.succmsg = true
          }, 3000)

          this.actionmsg = 'Data deleted successfully'
          this.studentLists(this.pagenumber)
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
      this.fetchClasses();
      this.studentLists()
      this.fetchTerms()
      
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
