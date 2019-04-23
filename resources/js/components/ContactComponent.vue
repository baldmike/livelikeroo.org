<template>
    <div class="cd-section" id="contactus">
        <!--     *********    CONTACT US 1     *********      -->
        <div class="section-image" style="background-image: url('images/unsplash-alaska-dog-jf-brou.jpg'); height: 100vh;">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 ml-auto mr-auto contact-box">
                        <card type="contact" raised header-classes="text-center">
                            <h4 slot="header" class="card-title">Contact Us</h4>

                            <div class="row">
                                <div class="form-group col-md-6 pr-2 has-success" :class="{ 'has-danger': $v.form.firstName.$invalid }">
                                    <label>First Name</label>
                                    <fg-input
                                        type="text"
                                        v-model="form.firstName"
                                        :state="!$v.form.firstName.$invalid"
                                        placeholder="First Name"/>
                                        
                                </div>
                                <div class="form-group col-md-6 pr-2 has-success" :class="{ 'has-danger': !$v.form.lastName.required }">
                                    <label>Last Name</label>
                                    <fg-input
                                        type="text"
                                        v-model="form.lastName"
                                        :state="!$v.form.lastName.$invalid"
                                        placeholder="Last Name"/>
                                </div>
                            </div>
                            
                            <br>

                            <div class="form-group has-success" :class="{ 'has-danger': $v.form.email.$invalid }">
                                <label>Email address</label>
                                <fg-input
                                        type="email"
                                        v-model="form.email"
                                        :state="!$v.form.email.$invalid"
                                        placeholder="Email Address"
                                        required/>
                            </div>

                            <div class="section-space"></div>
                            <div class="form-group has-success" :class="{ 'has-danger': !$v.form.message.required }">
                                <label>Your message</label>
                                <textarea 
                                        v-model="form.message" 
                                        required
                                        class="form-control" 
                                        :state="!$v.form.message.$invalid"
                                        rows="6"/>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <n-checkbox
                                        v-model="robot"
                                        required>
                                        I'm not a robot
                                    </n-checkbox>
                                </div>
                                <div class="col-md-6">
                                    <n-button 
                                        type="primary" 
                                        round 
                                        class="pull-right"
                                        :disabled="$v.form.$invalid || !robot"
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

                    setTimeout(function(){ self.$store.dispatch('clearNotifications');; }, 5000);
                })
                .catch(function (error) {

                    let payload = {
                        message: "There was an error sending your message, please try again.",
                        type: 'danger',
                    };

                    this.$store.dispatch('endLoading');
                    self.$store.dispatch('notify', payload);

                    setTimeout(function(){ self.$store.dispatch('clearNotifications');; }, 5000);

                    console.log("[ContactComponent] - api/contact call: " + error);
                
                });
            },
        },
    }
</script>

<style>
    .contact-box {
        position: fixed;
        top: 200;
        width: 500;
    }
</style>