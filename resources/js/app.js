import Vue from 'vue';
import VueRouter from 'vue-router';

import axios from 'axios';
import VueAxios from 'vue-axios';
import App from './App.vue';

import Register from './components/Register.vue';
import Login from './components/Login.vue';
import store from './store';
import InfiniteScroll from 'v-infinite-scroll'
import 'v-infinite-scroll/dist/v-infinite-scroll.css';

import VueAuthenticate from 'vue-authenticate'
import students from './components/students/index.vue';

 import classes from './components/class/index.vue';
 import term from './components/class/term.vue';
 import subjectAssignment from './components/students/subjectAssignment.vue';
 import studentList from './components/result/studentList.vue';
 import subjects from './components/subjects/index.vue';
 import gradeSettings from './components/gradeSettings/index.vue';
 import marksFeeding from './components/marksFeeding/index.vue';
 import teachers from './components/teachers/index.vue';
 import Summative from './components/result/summative.vue';
 

 import studentclass from  './components/class/student-class.vue';
 
 import studentRecord from './components/students/student-record.vue';
 import termclasses from './components/class/termClass.vue';
 import studClass from './components/class/studClass.vue';
 import terms from './components/class/terms.vue';
 import termsheet from './components/students/term_sheet.vue';
 import Tboard from './components/teachers/tboard';
 import Stud from './components/teachers/stud_with_subject.vue';
 import classStudent from './components/class/classstudent.vue';
 import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
 import 'bootstrap/dist/css/bootstrap.css'
 import 'bootstrap-vue/dist/bootstrap-vue.css'
 import { BModal, VBModal } from 'bootstrap-vue'
 import Biodata from './components/students/biodata';
 import { AutoCompletePlugin } from '@syncfusion/ej2-vue-dropdowns';
 import { Query, DataManager, ODataV4Adaptor } from '@syncfusion/ej2-data';
 import SubjComment from './components/earlycomment/subcomment';
//  Vue.prototype.$userId = document.querySelector("meta[name='user_id']").getAttribute('content');
import moment from 'moment';
import student_class_T from  './components/class/class-ct.vue';
import import_students from './components/students/import_students.vue';
import Tooltip from "vue-directive-tooltip";
import "vue-directive-tooltip/dist/vueDirectiveTooltip.css";


Vue.use(Tooltip);
Vue.config.productionTip = false;


import _ from 'lodash'
Vue.prototype._ = _



Vue.use(AutoCompletePlugin);

Vue.use(InfiniteScroll);
 Vue.use(VueRouter);
Vue.component('pagination', require('laravel-vue-pagination'));

Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)
Vue.use(VueAxios, axios);
//vue-toaster
import Toaster from 'v-toaster';
import 'v-toaster/dist/v-toaster.css';
Vue.filter('formatDate', function(value) {
    if (value) {
      return moment(String(value)).format('DD MMMM, Y')
    }
  });

Vue.use(Toaster, {timeout: 2000});

const router = new VueRouter({
    mode: 'history',
    routes: [
  
    {
        path: '/students',
        name: 'students',
        component: students,
        meta: { requiresAuth: false }
    },
    {
        path: '/subjects',
        name: 'subjects',
        component: subjects,
        meta: { requiresAuth: false }
    }
]
});

App.router = Vue.router
// new Vue(App).$mount('#app');
new Vue({
    store,
    router,
    el: '#app',
    components: {
        'login':Login,
        'register':Register,
        'students':  students,
        'subjects': subjects,
        'terms':terms,
       'term-sheet':termsheet,
        'student-subjects': subjectAssignment,
        'grade-settings': gradeSettings,
        'marks-feeding': marksFeeding,
        'result-student-list': studentList,
        'teachers':teachers,
        'classes':classes,
        'student-class':studentclass,
        
        'stud_class':studClass,
        'student-record':studentRecord,
        'term':term,
        'termclasses':termclasses,
        'biodata':Biodata,
        'tboard':Tboard,
        'stud':Stud,
        'class-student':classStudent,
        'summative-test':Summative,
        'class-ct':student_class_T,
        'subcomment':SubjComment,
        'import_students':import_students
    },
    
});
