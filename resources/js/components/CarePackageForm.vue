<template>
    <div class="container">
        <div class="row">
            <form>

                <h3 class="center">CARE PACKAGES!</h3>
                <img src="/images/care_package.jpg" fluid>
                <br><br>
                <h5 class="center text">Our Roo Cancer Care Packages include some of Roo’s favorite items, and are each made by hand by our volunteers. Get started by telling us about your your buddy!</h5>

                <div class="form-box">

                    <div class="col-md-12">
                        <h3 class="center">TELL US ABOUT YOUR PET!</h3>
                    </div>

                    <h6 class="center" v-if="$v.form.$dirty">Fields marked with a red <span style="color: red;">X</span> are required</h6>

                    <div class="form-group">
                        <label for="petNameCPForm">Pet Name</label>
                        <fg-input
                                id="petNameCPForm"
                                :class="{ 'has-danger': $v.form.petName.$invalid && $v.form.petName.$dirty, 'has-success': !$v.form.petName.$invalid }"
                                v-model="form.petName"
                                placeholder="Pet's Name"
                                maxlength="40"
                                required/>
                    </div>

                    <div class="form-group">
                        <label for="speciesCPForm">Species</label>
                        <fg-input
                                id="speciesCPForm"
                                :class="{ 'has-danger': $v.form.species.$invalid && $v.form.species.$dirty, 'has-success': !$v.form.species.$invalid }"
                                v-model="form.species"
                                placeholder="Dog, cat, rabbit, horse, chicken, frog..."
                                maxlength="40"
                                required/>
                    </div>


                    <div class="form-group" :class="{ 'has-danger': $v.form.about.$invalid && $v.form.about.$dirty, 'has-success': !$v.form.about.$invalid }">
                        <label>Tell us a little bit about <span v-if="form.petName">{{ form.petName }}</span><span v-if="!form.petName">your pet</span>!</label>
                        <textarea
                                rows="6"
                                class="form-control"
                                v-model="form.about"
                                maxlength="200"
                                required/>
                    </div>
        
                    <div class="form-group" :class="{ 'has-danger': $v.form.diagnosis.$invalid && $v.form.diagnosis.$dirty, 'has-success': !$v.form.diagnosis.$invalid }">
                        <label for="diagnosisCpForm">Medical diagnosis</label>
                        <textarea id="diagnosisCpForm"
                                rows="6"
                                class="form-control"
                                :state="!$v.form.diagnosis.$invalid"
                                v-model="form.diagnosis"
                                maxlength="200"
                                required/>
                    </div>

                    <b-form-group id="imageGroup" label="Send us a Picture of Your Pet" label-for="image">
                        <b-form-file id="image"
                            accept="image/*"
                            v-model="form.image"
                            placeholder="Choose a file..."
                            drop-placeholder="Drop file here..."
                            @change="onFileChange"/>

                        <b-col cols="6" offset="3" style="margin-top: 1rem;">
                            <img v-if="form.url" :src="form.url" width="200" alt="uploaded image">
                        </b-col>
                    </b-form-group>

                </div>

                <div class="form-box">
                    <h3 class="center">TELL US ABOUT YOURSELF!</h3>               
                    <div class="form-group">
                        <label for="firstNameCpForm">First Name</label>
                        <fg-input id="firstNamecpForm" 
                                :class="{ 'has-danger': $v.form.firstName.$invalid && $v.form.firstName.$dirty, 'has-success': !$v.form.firstName.$invalid }"
                                v-model="form.firstName"
                                placeholder="First Name"            
                                maxlength="50"
                                required/>
                    </div>

                    <div class="form-group">
                        <label for="lastNameCpForm">Last Name</label>
                        <fg-input id="lastNameCpForm"
                                :class="{ 'has-danger': $v.form.lastName.$invalid && $v.form.lastName.$dirty, 'has-success': !$v.form.lastName.$invalid }"
                                v-model="form.lastName"
                                placeholder="Last Name"
                                maxlength="50"
                                required/>
                    </div>

                    <div class="form-group">
                        <label for="emailCpForm">Email</label>
                        <fg-input id="emailCpForm"
                                :class="{ 'has-danger': $v.form.email.$invalid && $v.form.email.$dirty, 'has-success': !$v.form.email.$invalid }"
                                type="email"
                                v-model="form.email"
                                placeholder="Email"
                                required/>
                    </div>

                    <div class="form-group">
                        <label for="address1CpForm">Street Address</label>
                        <fg-input id="address1CpForm"
                                :class="{ 'has-danger': $v.form.address1.$invalid && $v.form.address1.$dirty, 'has-success': !$v.form.address1.$invalid }"
                                v-model="form.address1"
                                placeholder="Street Address"
                                required/>
                    </div>

                    <div class="form-group">
                        <label for="form.address2">Street Address 2</label>
                        <fg-input
                                v-model="form.address2"
                                placeholder="Street Address 2"/>
                    </div>

                    <div class="form-group">
                        <label for="cityCpForm">City</label>
                        <fg-input id="cityCpForm"
                                :class="{ 'has-danger': $v.form.city.$invalid && $v.form.city.$dirty, 'has-success': !$v.form.city.$invalid }"
                                v-model="form.city"
                                placeholder="City"
                                required/>
                    </div>
                    
                    <div class="form-group" id="stateGroupFnForm">
                        <label>State</label>
                        <fg-input
                                id="stateCpForm"
                                type="text"
                                v-model="form.state"
                                :class="{ 'has-danger': $v.form.state.$invalid && $v.form.state.$dirty, 'has-success': !$v.form.state.$invalid }"
                                placeholder="State"
                                minlength="2"
                                maxlength="2"
                                required/>
                    </div>

                    <div class="form-group">
                        <label>Zip Code</label>
                        <fg-input
                            :class="{ 'has-danger': $v.form.zip.$invalid && $v.form.zip.$dirty, 'has-success': !$v.form.zip.$invalid }"
                            v-model="form.zip"
                            placeholder="Zip Code"
                            minLength="5"
                            required/>
                    </div>
                    <div class="errors center" v-if="$v.form.$dirty">There are missing or incomplete fields.</div>
                    <div class="sent" v-if="form.sent">This Form Has been submitted.</div>

                    <!-- This is the submit button -->
                    <div style="text-align: center; margin-top: 2rem;">
                        <n-button 
                                type="primary" 
                                round 
                                @click.prevent.native="requestCarePackage">
                                Request A Care Package
                        </n-button>
                    </div>

                </div>

                

                <!-- <div class="col-md-12 center">
                    <n-button @click.prevent.native="resetForm" type="danger">RESET FORM</n-button>
                </div> -->

                <div style="text-align: center; margin: 2rem;">
                    <img src="/images/llr_logo.png">
                </div>
            </form>
        </div>
    </div>
</template>

<script>

    import { Button, FormGroupInput, Tabs, TabPane, Parallax } from '@/components';
    import { Select, Option, DatePicker, TimeSelect } from 'element-ui'
    import { validationMixin } from "vuelidate";
    import { helpers, required, minLength, maxLength, email, between } from "vuelidate/lib/validators";

    const zip = helpers.regex('zip', /(^\d{5}$)|(^\d{5}-\d{4}$)/);

    export default {

        data() {

            return {

                form: {
                    firstName: '',
                    lastName: '',
                    email: '',
                    address1: '',
                    address2: '',
                    city: '',
                    state: null,
                    zip: '',
                    petName: '',
                    species: '',
                    about: '',
                    diagnosis: '',
                    image: null,
                    url: null,
                    sent: false,
                },
                
                show: true
            }
        },
         components: {
            [Button.name]: Button,
            [FormGroupInput.name]: FormGroupInput,
            [Select.name]: Select,
            [Option.name]: Option
        },

        mixins: [
            validationMixin
        ],

        validations: {

            form: {
                firstName: {
                    required,
                    minLength: 1,
                },
                lastName: {
                    required,
                    minLength: 2,
                },
                email: {
                    email,
                    required,
                },
                address1: {
                    required
                },
                city: {
                    required
                },
                state: {
                    required
                },
                zip: {
                    zip,
                    required,
                },
                petName: {
                    required,
                    minLength: 1,
                    maxLength: 30
                },
                species: {
                    required,
                },
                about: {
                    required
                },
                diagnosis: {
                    required
                }
            }
        },

        methods: {
            requestCarePackage() {

                this.$v.form.$touch();

                if (!this.$v.form.$invalid) {
                    let formData = new FormData();

                    Object.keys(this.form).forEach(key => {
                        formData.append(key, this.form[key])
                    })

                    this.$store.dispatch('cpFormSubmit');
                    
                    axios.post("/api/care_pkgs", formData, {headers: {'Content-Type': 'multipart/form-data'}}).then(({data}) => {

                        this.$store.dispatch('cpFormSuccess')

                    }).catch((error) => {

                            if (error.response.status === 400) {
                
                            }
                            this.$store.dispatch('cpFormError')
                    })
                }
            },
            resetForm() {
                /* Reset our form values */
                this.form.firstName = ''
                this.form.lastName = ''
                this.form.email = ''
                this.form.address1 = ''
                this.form.address2 = ''
                this.form.city = ''
                this.form.state = ''
                this.form.zip = ''
                this.form.petName = ''
                this.form.about = '' 
                this.form.diagnosis = ''
                this.form.image = ''

                /* reset/clear native browser form validation state */
                this.show = false
                this.$nextTick(() => {
                    this.show = true;
                    this.$v.$reset();
                })
            },
            hide() {
                /* reset/clear native browser form validation state */
                this.show = false
                this.$nextTick(() => {
                    this.show = true
                })
            },

            onFileChange(e) {
                const file = e.target.files[0];
                this.form.url = URL.createObjectURL(file);

                this.form.image = file;
            },
        }

        
    }
</script>

<style lang="scss" scoped>
    .center {
        text-align: center;
    }

    .text {
        color: darkgrey;
    }
  
    .form-box {
        border: 1px solid #fd7e14;
        border-radius: 6px;
        margin: 1rem;
        padding: 1rem;
    }
    
   
</style>

