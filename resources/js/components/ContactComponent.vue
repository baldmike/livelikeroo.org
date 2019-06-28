<template>
    <div class="cd-section" id="contactus">
        <div class="section-image" style="background-image: url('images/unsplash-alaska-dog-jf-brou.jpg'); height: 100vh;">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 ml-auto mr-auto contact-box">
                        <card type="contact" raised header-classes="text-center">
                            <h4 slot="header" class="card-title">Contact Us</h4>

                            <div class="row">
                                <div class="form-group col-md-6 pr-2" >
                                    <label>First Name</label>
                                    <fg-input
                                        type="text"
                                        v-model="form.firstName"
                                        :class="{ 'has-danger': $v.form.firstName.$invalid && $v.form.firstName.$dirty, 'has-success': !$v.form.firstName.$invalid }"
                                        placeholder="First Name"/>
                                        
                                </div>
                                <div class="form-group col-md-6 pr-2">
                                    <label>Last Name</label>
                                    <fg-input
                                        type="text"
                                        v-model="form.lastName"
                                        :class="{ 'has-danger': $v.form.lastName.$invalid && $v.form.lastName.$dirty, 'has-success': !$v.form.lastName.$invalid }"
                                        placeholder="Last Name"/>
                                </div>
                            </div>
                            
                            <br>

                            <div class="form-group">
                                <label>Email address</label>
                                <fg-input
                                        type="email"
                                        v-model="form.email"
                                        :class="{ 'has-danger': $v.form.email.$invalid && $v.form.email.$dirty, 'has-success': !$v.form.email.$invalid }"
                                        placeholder="Email Address"
                                        required/>
                            </div>

                            <div class="section-space"></div>
                            <div class="form-group">
                                <label>Your message</label>
                                <textarea 
                                        v-model="form.message" 
                                        required
                                        class="form-control" 
                                        :class="{ 'has-danger': $v.form.message.$invalid && $v.form.message.$dirty, 'has-success': !$v.form.message.$invalid }"
                                        placeholder="Write your message here."
                                        rows="6"/>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <n-checkbox
                                        v-model="robot"
                                        required>
                                        I am not a robot!
                                    </n-checkbox>
                                </div>
                                <div class="col-md-6">
                                    <n-button 
                                        type="primary" 
                                        round 
                                        class="pull-right"                                    
                                        @click.prevent.native="sendMessage">
                                        Send Message</n-button>
                                </div>
                            </div>

                        </card>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { Card, Button, InfoSection, FormGroupInput, Checkbox } from '@/components';
    import { Carousel, CarouselItem } from 'element-ui'
    import { validationMixin } from "vuelidate";
    import { required, minLength, email } from "vuelidate/lib/validators";
    
    export default {

        components: {
            Card,
            InfoSection,
            [Button.name]: Button,
            [Checkbox.name]: Checkbox,
            [FormGroupInput.name]: FormGroupInput,
            [Carousel.name]: Carousel,
            [CarouselItem.name]: CarouselItem,
        },
        mixins: [
            validationMixin
        ],
        validations: {
            form: {
                firstName: {
                    required,
                },
                lastName: {
                    required,
                },
                email: {
                    required,
                    email
                },
                message: {
                    required
                }
            }
        },
        data() {
            return {
                form: {
                    firstName: '',
                    lastName: '',
                    email: '',
                    message: ''
                },
                robot: false
            }
        },
        methods: {
            sendMessage() {

                this.$v.form.$touch();

                if (!this.$v.form.$invalid) {
                    console.log('[contactComponent] - send message');

                    let fd = new FormData();

                    fd.append('first_name', this.form.firstName);
                    fd.append('last_name', this.form.lastName);
                    fd.append('email', this.form.email);
                    fd.append('message', this.form.message);

                    this.$store.dispatch('startLoading');

                    let self = this;
                    axios.post("/api/contact", fd, {headers: {'Content-Type': 'multipart/form-data'}}).then(({data}) => {
                        
                        this.$store.dispatch('endLoading');
                        this.$router.push({path: 'donate'});

                        let payload = {
                            message: "Your message has been sent, thank you for reaching out!",
                            type: 'success',
                        }

                        this.$store.dispatch('notify', payload);

                        setTimeout(function(){ self.$store.dispatch('clearNotifications'); }, 5000);
                    })
                    .catch(function (error) {

                        let payload = {
                            message: "There was an error sending your message, please try again.",
                            type: 'danger',
                        };

                        this.$store.dispatch('endLoading');
                        self.$store.dispatch('notify', payload);

                        setTimeout(function(){ self.$store.dispatch('clearNotifications'); }, 5000);

                        console.log("[ContactComponent] - api/contact call: " + error);
                    
                    });
                }
            },
        },
    }
</script>

<style>
    .contact-box {
        position: relative;
        top: 100;
        width: 300;
    }
</style>