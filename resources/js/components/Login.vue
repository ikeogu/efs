
<template>
    <div class="bg-gradient-secondary">
        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                        </div>
                                        <div class="progress" v-if="isProgress">
                                            <div class="indeterminate"></div>
                                        </div>
                                        <div class="alert alert-danger" v-if="loginError && errors.message">
                                            <span>{{ errors.message[0] }}</span>
                                        </div>
                                        <!-- <form autocomplete="off" @submit.prevent="login" method="post"> -->
                                            <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="user@example.com" v-model="email" required name="email"  autofocus>
                                            <span class="text text-danger" v-if="loginError && errors.email">{{ errors.email[0] }}</span>
                                        
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user"  id="exampleInputPassword" placeholder="Password" name="password" v-model="password" required >
                                                <span class="text text-danger" v-if="loginError && errors.password">{{ errors.password[0] }}</span>
                                        
                                            </div>
                                            <button class="btn btn-block waves-effect waves-light submit btn-success" type="button" name="action" @click="login()">Login</button>
                                        <!-- </form> -->
                                        <hr>
                                        
                                    
                                    </div>
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
    // import GSignInButton from 'vue-google-signin-button'
    // Vue.use(GSignInButton)
    import store from '../store'
    export default {
        data() {
            return {
                email: '',
                password: '',
                loginError: false,
                errors: {},
                isProgress: false,
                googleSignInParams: {
                    client_id: '519675463204-7bc7lvaqti1teo41im6e5he5lbjjvthk.apps.googleusercontent.com'
                }
            }
        },
        methods: {
            login() {
                this.loginError = false;
                this.axios.post('api/auth/login', {
                    email: this.email,
                    password: this.password
                }).then(response => {
                    this.isProgress = true;
                    if(response.data.success == true)
                    {
                        setTimeout(() => {
                            this.isProgress = false;
                            store.commit('LoginUser', response.data);
                            
                            this.$router.push({name: 'dashboard'})
                        },2000);
                    }
                    else{

                        this.isProgress = true;
                        setTimeout(() => {
                            this.isProgress = false;
                            this.loginError = true;
                            this.errors = response.data.errors
                        },1000);
                    }
                }).catch(error => {
                    this.isProgress = false;
                    this.loginError = true;
                    this.errors = error.response.data.errors
                });
            },
        }
    }
</script>

<style scoped>
    .form-wrapper {
        min-height: 100%;
        min-height: 100vh;
        display: flex;
        align-items: center;
    }
    .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
    }
    .form-signin .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
    }
    .form-signin .form-control:focus {
        z-index: 2;
    }
    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }
    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
    .google{

        color:red;
        font-size:30px;
    }

    .heading{
        color: white;
        background: #ED9E9E;
        padding: 30px;
        border: none;
    }
    .login-form{
        background: white;
        padding: 30px;
    }
    .submit:hover{
        color:white;
    }
    
    .btn:focus{
        color:white;
    }
    .progress{
        margin:0px;
        background-color:green;
    }
    .alert{
        margin-bottom:0px;
    }
    .g-signin-btn{
        display: inline-block;
        padding: 4px 8px;
        border-radius: 3px;
        background-color: #3c82f7;
        color: #fff;
        box-shadow: 0 3px 0 #0f69ff;
    }
</style>