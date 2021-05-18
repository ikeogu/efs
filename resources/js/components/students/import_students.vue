<template>
    
<div class="container-fluid">
    <div class="row justify-content-center">
      <div v-bind:class="{ succmsg: succmsg }">
        <div class="col-md-12 col-lg-12">
          <div class="alert alert-success cusmsg">{{ actionmsg }}</div>
        </div>
      </div>
    </div>
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