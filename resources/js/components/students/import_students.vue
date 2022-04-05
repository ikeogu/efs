<template>
    
<div class="container-fluid">
    <div class="row justify-content-center">
      <div v-bind:class="{ succmsg: succmsg }">
        <div class="col-md-12 col-lg-12">
          <div class="alert alert-success cusmsg">{{ actionmsg }}</div>
        </div>
      </div>
    </div>
    <h6>Import students by Term</h6>
    <form method="post" name="importStudent" id="importstudent" action="#" @submit.prevent="importStudent">
        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Class</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01"  name="sclass" v-model="sclass">
                <option v-for="c in class__"  :key="c.id" v-bind:value="c.id">{{ c.name }} | {{c.description}}</option>
            </select>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Import from Term</label>
            </div>
             <select class="custom-select" id="inputGroupSelect01"  name="term" v-model="term">
                <option v-for="t in terms__"  :key="t.id" v-bind:value="t.id">{{ t.name }} | {{t.session}}</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Import to Term</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01"  name="term_to" v-model="term_to">
                <option v-for="t in terms__"  :key="t.id" v-bind:value="t.id">{{ t.name }} | {{t.session}}</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-outline-success btn-md">Import</button>
    </form>
    <hr>
    <h6>Import students by Class</h6>
     <form method="post" name="importStudentByClass" id="importstudentByClass" action="#" @submit.prevent="importStudentByClass">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Import From Old Term</label>
            </div>
             <select class="custom-select" id="inputGroupSelect01"  name="oldTerm" v-model="oldTerm">
                <option v-for="oldTerm in terms__"  :key="oldTerm.id" v-bind:value="oldTerm.id">{{ oldTerm.name }} | {{oldTerm.session}}</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Import From Old Class</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01"  name="oldClass" v-model="oldClass">
                <option v-for="oldClass in class__"  :key="oldClass.id" v-bind:value="oldClass.id">{{ oldClass.name }} | {{oldClass.description}}</option>
            </select>
        </div>

         <div class="input-group mb-3">
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Import To New Term</label>
            </div>
             <select class="custom-select" id="inputGroupSelect01"  name="newTerm" v-model="newTerm">
                <option v-for="newTerm in terms__"  :key="newTerm.id" v-bind:value="newTerm.id">{{ newTerm.name }} | {{newTerm.session}}</option>
            </select>
        </div>
         <div class="input-group mb-3">
            <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Import To New Class</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01"  name="newClass" v-model="newClass">
                <option v-for="newClass in class__"  :key="newClass.id" v-bind:value="newClass.id">{{ newClass.name }} | {{newClass.description}}</option>
            </select>
        </div>
       
        
        <button type="submit" class="btn btn-outline-success btn-md">Import</button>
    </form>

</div>


</template>
<script>
     const BASE_URL = window.location.origin;
     export default {
         data(){
            return{
                 terms__:'',
                 class__:'',
                 term_to:'',
                 term:'',
                 sclass:'',
                 newClass:'',
                 oldClass:'',
                 newTerm:'',
                 oldTerm:'',

                succmsg: true,
                showmodal: false,
                actionmsg: '',

            }
            
         },
         methods: {
             importStudent() {
                this.$http
                    .post(BASE_URL + '/api/import_students', {
                    
                        sclass: this.sclass,
                        term: this.term,
                        term_to: this.term_to,

                })
                .then(data => {
                    this.succmsg = false
                    console.log(data)
                    this.sclass = ''
                    this.term = ''
                    this.term_to= ''
                    var self = this
                    setTimeout(function() {
                    self.succmsg = true
                    }, 3000)
                    this.actionmsg = 'Students imported and subjects assigned successfully'
                    
                    $('body')
                    .removeClass()
                    .removeAttr('style')
                    $('.modal-backdrop').remove()
                    
                })
            },

            importStudentByClass() {
                this.$http
                    .post(BASE_URL + '/api/import_students_by_class', {
                    
                        newClass: this.newClass,
                        oldClass: this.oldClass,
                        newTerm: this.newTerm,
                        oldTerm: this.oldTerm,

                })
                .then(data => {
                    this.succmsg = false
                    console.log(data)
                    this.newClass = ''
                     this.oldClass = ''
                    this.newTerm = ''
                    this.oldTerm= ''
                    var self = this
                    setTimeout(function() {
                    self.succmsg = true
                    }, 3000)
                    this.actionmsg = 'Students imported and subjects assigned successfully'
                    
                    $('body')
                    .removeClass()
                    .removeAttr('style')
                    $('.modal-backdrop').remove()
                    
                })
            },
         },
         props:['terms','class_'],
         mounted(){
             this.terms__ = this.terms;
             this.class__ = this.class_;
             console.log( this.terms__);
             console.log( this.class__);
             
         }
     }
</script>