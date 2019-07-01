<template>
    <div class="container">
        <div class="col-md-8 ml-auto mr-auto">
            <card type="login" plain>
                <div slot="header" class="logo-container">
                    <img v-lazy="'images/llr_logo.png'" alt="Live Like Roo Logo" class="col-md-6 offset-md-3">
                </div>
                <br>
                <div class="error" v-if="errors">Invalid Credentials. Please try again.</div>
                <br>
                <h2 class="text-center">LOGIN</h2>

                <fg-input id="emailLogin"
                        type="email"
                        v-model="form.emailLogin"
                        :state="!$v.form.emailLogin.$invalid"
                        placeholder="Email" />

                
                <fg-input id="password"
                        type="password"
                        v-model="form.password" 
                        :state="!$v.form.password.$invalid"
                        placeholder="Password"/>
        
                <n-button type="primary" block @click.prevent.native="login" :disabled="$v.form.$invalid">
                    LOGIN
                </n-button>
            </card>
        </div>
    </div>
</template>


<script>

import { mapActions, mapGetters } from "vuex";
import { validationMixin } from "vuelidate";
import { required, minLength, email } from "vuelidate/lib/validators";
import { Button, FormGroupInput, Card } from '@/components';

import { EventBus } from '../event-bus.js';

export default {
    name: "login",
    data() {
        return {
            
            form: {
            emailLogin: "",
            password: "",
            },
        }
    },
    components: {
        [Button.name]: Button,
        [FormGroupInput.name]: FormGroupInput,
        Card
    },
    mixins: [
      validationMixin
    ],
    validations: {
        form: {
            password: {
            required,
            minLength: minLength(8)
            },
            emailLogin: {
            required,
            email
            }
        }
    },
    methods: {
        login() {
            console.log('[LoginComponent] - login');

            const formData = {
                email: this.form.emailLogin,
                password: this.form.password,
            };

            this.$store.dispatch('hideModal');
            this.$store.dispatch('startLoading');

            console.log("[LoginComponent] - LOGIN - FORM DATA SET");

            // to access this inside .catch
            let self = this;

            axios.post("/api/login", formData).then(({data}) => {

                console.log("login api hit: " + data.user);
                this.$cookie.set('token', data.token);
                this.$cookie.set('user', data.user.email);
                
                this.$store.dispatch('endLoading');

                auth.setAuthToken(data.token);
                auth.login(data.token, data.user.email);
                
                
                this.$router.push({path: 'dashboard'});
                
            })
            .catch(function (error) {

                let payload = {
                    message: "Invalid Credentials, please try again.",
                    type: 'danger',
                }

                self.$store.dispatch('endLoading');
                self.$store.dispatch('notify', payload);

                setTimeout(function(){ self.$store.dispatch('clearNotifications'); }, 3000);            
            });
        
        },
        register() {
            
        }
    },
    computed: {
        errors() {
            return this.loginError;
        },
    ...mapGetters(['isAuthenticated']),
    },
    mounted() {
      
    }
}
</script>

<style>
    .error {
        width: 100%;
        background: red;
        text-align: center;
        color: white;
        border: 1px solid black;
        
    }
</style>
