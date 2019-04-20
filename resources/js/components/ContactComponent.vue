<template>
    <div class="cd-section" id="contactus">
        <!--     *********    CONTACT US 1     *********      -->
        <div class="section-image" style="background-image: url('images/unsplash-alaska-dog-jf-brou.jpg'); height: 100vh;">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 ml-auto mr-auto">
                        <card type="contact" raised header-classes="text-center" style="margin-top: 100px;">
                            <h4 slot="header" class="card-title">Contact Us</h4>

                            <div class="row">
                                <div class="col-md-6 pr-2">
                                    <label>First Name</label>
                                    <fg-input
                                        type="text"
                                        v-model="form.firstNameContact"
                                        :state="!$v.form.firstNameContact.$invalid"
                                        placeholder="First Name"/>
                                        
                                </div>
                                <div class="col-md-6 pl-2">
                                    <label>Last Name</label>
                                    <fg-input
                                        type="text"
                                        v-model="form.lastNameContact"
                                        :state="!$v.form.lastNameContact.$invalid"
                                        placeholder="Last Name"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <fg-input
                                        type="text"
                                        v-model="form.emailContact"
                                        :state="!$v.form.emailContact.$invalid"
                                        placeholder="Email"/>
                            </div>
                            <div class="form-group">
                                <label>Your message</label>
                                <textarea 
                                        v-model="form.messageContact" 
                                        required
                                        class="form-control" 
                                        :state="!$v.form.messageContact.$invalid"
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
                                        :disabled="$v.$invalid || !robot"
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
                firstNameContact: {
                    required,
                },
                lastNameContact: {
                    required,
                },
                emailContact: {
                    required,
                    email
                },
                messageContact: {
                    required
                }
            }
        },
        data() {
            return {
                form: {
                    firstNameContact: '',
                    lastNameContact: '',
                    emailContact: '',
                    messageContact: ''
                },
                robot: false
            }
        },
        methods: {
            sendMessage() {
                console.log('[contactComponent] - send message');

                let fd = new FormData();

                fd.append('first_name', this.form.firstNameContact);
                fd.append('last_name', this.form.lastNameContact);
                fd.append('email', this.form.emailContact);
                fd.append('message', this.form.messageContact);

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

                    setTimeout(function(){ self.$store.dispatch('clearNotifications');; }, 3000);

                    console.log("[ContactComponent] - api/contact call: " + error);
                
                });
            },
        },
    }
</script>

<style>
</style>