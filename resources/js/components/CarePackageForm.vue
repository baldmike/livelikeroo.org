<template>
    <div class="container">
        <div class="row">
            <form>

                <h3 class="center">CARE PACKAGES!</h3>
                <img src="/images/headline4.jpg" fluid>
                <br><br>
                <h5 class="center text">Our Roo Cancer Care Packages include some of Roo’s favorite items, and are each made by hand by our volunteers. Get started by telling us about your your buddy!</h5>

                <div class="form-box">

                    <div class="col-md-12">
                        <h3 class="center">TELL US ABOUT YOUR PET!</h3>
                    </div>

                    <div class="form-group" :class="{ 'has-danger': !$v.form.petName.required }">
                        <label>Pet Name</label>
                        <fg-input
                                type="text"
                                :state="!$v.form.petName.$invalid"
                                v-model="form.petName"
                                placeholder="Pet's Name"
                                required/>
                    </div>

                    <div class="form-group" :class="{ 'has-danger': !$v.form.about.required }">
                        <label>Tell us about a little bit about <span v-if="form.petName">{{ form.petName }}</span><span v-if="!form.petName">your pet</span>!</label>
                        <textarea
                                rows="6"
                                class="form-control"
                                :state="!$v.form.about.$invalid"
                                v-model="form.about"
                                required/>
                    </div>
        
                    <div class="form-group" :class="{ 'has-danger': !$v.form.diagnosis.required }">
                        <label for="diagnosisCpForm">Medical diagnosis</label>
                        <textarea
                                id="diagnosisCpForm"
                                rows="6"
                                class="form-control"
                                :state="!$v.form.diagnosis.$invalid"
                                v-model="form.diagnosis"
                                required/>
                    </div>
                </div>

                <div class="form-box">
                    <h3 class="center">TELL US ABOUT YOURSELF!</h3>               
                    <div class="form-group" :class="{ 'has-danger': !$v.form.firstName.required }">
                        <label for="firstNameCpForm">First Name</label>
                        <fg-input
                                id="firstNamecpForm"
                                type="text"
                                :state="!$v.form.firstName.$invalid"
                                v-model="form.firstName"
                                placeholder="First Name"
                                required/>
                    </div>

                    <div class="form-group" :class="{ 'has-danger': !$v.form.lastName.required }">
                        <label for="lastNameCpForm">Last Name</label>
                        <fg-input
                                id="lastNameCpForm"
                                type="text"
                                :state="!$v.form.lastName.$invalid"
                                v-model="form.lastName"
                                placeholder="Last Name"
                                required/>
                    </div>

                    <div class="form-group" :class="{ 'has-danger': !$v.form.email.required }">
                        <label for="emailCpForm">Email</label>
                        <fg-input
                                id="emailCpForm"
                                type="email"
                                :state="!$v.form.email.$invalid"
                                v-model="form.email"
                                placeholder="Email"
                                required/>
                    </div>

                    <div class="form-group" :class="{ 'has-danger': !$v.form.address1.required }">
                        <label for="address1CpForm">Street Address</label>
                        <fg-input
                                id="address1CpForm"
                                type="text"
                                :state="!$v.form.address1.$invalid"
                                v-model="form.address1"
                                placeholder="Street Address"
                                required/>
                    </div>

                    <div class="form-group">
                        <label for="form.address2">Street Address 2</label>
                        <fg-input
                                type="text"
                                v-model="form.address2"
                                placeholder="Street Address 2"/>
                    </div>

                    <div class="form-group" :class="{ 'has-danger': !$v.form.city.required }">
                        <label for="cityCpForm">City</label>
                        <fg-input
                                id="cityCpForm"
                                type="text"
                                :state="!$v.form.city.$invalid"
                                v-model="form.city"
                                placeholder="City"
                                required/>
                    </div>
                    
                    <div class="form-group" :class="{ 'has-danger': !$v.form.zip.required }">
                        <label for="state">State</label>
                        <select 
                                required
                                :options="states"
                                class="form-control select-primary"
                                v-model="form.state">
                                <option value=null disabled>Select State</option>
                                <option v-for="state in states" :key="state.value" :value="state.value">
                                {{ state.label }}
                                </option>
                        </select>
                    </div>

                    <div class="form-group" :class="{ 'has-danger': !$v.form.zip.required || !$v.form.zip.between }">
                        <label>Zip Code</label>
                        <fg-input
                            type="text"
                            :state="!$v.form.zip.between"
                            v-model="form.zip"
                            placeholder="Zip Code"
                            required/>
                    </div>
    
                    <div class="sent" v-if="sent">This Form Has been submitted.</div>

                </div>

                <div v-if="!sent" style="text-align: center; margin-top: 2rem;">
                    <n-button 
                        type="primary" 
                        round 
                        :disabled="$v.form.$invalid"
                        @click.prevent.native="requestCarePackage">
                        Request A Care Package
                    </n-button>
                </div>

                <div style="text-align: center; margin: 2rem;">
                    <img src="/images/llr_logo.png">
                </div>
            </form>
        </div>
    </div>
</template>

<script>

    import { Button, FormGroupInput, Tabs, TabPane, Parallax } from '@/components';
    import {Select, Option} from 'element-ui'
    import { validationMixin } from "vuelidate";
    import { helpers, required, minLength, email, between } from "vuelidate/lib/validators";
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
                    about: '',
                    diagnosis: '',
                    image: null,
                    url: null,
                },
                sent: false,

                // states: ["AK", "AL", "AR", "AZ", "CA", "CO", "CT", "DC",  "DE", "FL", "GA", "HI", "IA", "ID", "IL", "IN", "KS", "KY", "LA", "MA", "MD", "ME", "MI", "MN", "MO", "MS", "MT", "NC", "ND", "NE", "NH", "NJ", "NM", "NV", "NY", "OH", "OK", "OR", "PA", "RI", "SC", "SD", "TN", "TX", "UT", "VA", "VT", "WA", "WI", "WV", "WY"],
                states: [
                    {value: "AK", label: "AK"},
                    {value: "AL", label: "AL"},
                    {value: "AR", label: "AR"},
                    {value: "AZ", label: "AZ"},
                    {value: "CA", label: "CA"},
                    {value: "CO", label: "CO"},
                    {value: "CT", label: "CT"},
                    {value: "DC", label: "DC"},
                    {value: "DE", label: "DE"},
                    {value: "FL", label: "FL"},
                    {value: "GA", label: "GA"},
                    {value: "HI", label: "HI"},
                    {value: "IA", label: "IA"},
                    {value: "ID", label: "ID"},
                    {value: "IL", label: "IL"},
                    {value: "IN", label: "IN"},
                    {value: "KS", label: "KS"},
                    {value: "KY", label: "KY"},
                    {value: "LA", label: "LA"},
                    {value: "MA", label: "MA"},
                    {value: "MD", label: "MD"},
                    {value: "ME", label: "ME"},
                    {value: "MI", label: "MI"},
                    {value: "MN", label: "MN"},
                    {value: "MO", label: "MO"},
                    {value: "MS", label: "MS"},
                    {value: "MT", label: "MT"},
                    {value: "NC", label: "NC"},
                    {value: "ND", label: "ND"},
                    {value: "NE", label: "NE"},
                    {value: "NH", label: "NH"},
                    {value: "NJ", label: "NJ"},
                    {value: "NM", label: "NM"},
                    {value: "NV", label: "NV"},
                    {value: "NY", label: "NY"},
                    {value: "OH", label: "OH"},
                    {value: "OK", label: "OK"},
                    {value: "OR", label: "OR"},
                    {value: "PA", label: "PA"},
                    {value: "RI", label: "RI"},
                    {value: "SC", label: "SC"},
                    {value: "SD", label: "SD"},
                    {value: "TN", label: "TN"},
                    {value: "TX", label: "TX"},
                    {value: "UT", label: "UT"},
                    {value: "VA", label: "VA"},
                    {value: "VT", label: "VT"},
                    {value: "WA", label: "WA"},
                    {value: "WI", label: "WI"},
                    {value: "WV", label: "WV"},
                    {value: "WY", label: "WY"},
                ],
                species: [ 'Dog', 'Cat', 'Rabbit', 'Bird', 'Other' ],
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
                    required,
                    between: between(10000, 99999)
                },
                petName: {
                    required
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

                let fd = new FormData();

                fd.append('first_name', this.form.firstName);
                fd.append('last_name', this.form.lastName);
                fd.append('email', this.form.email);
                fd.append('address_1', this.form.address1);
                fd.append('address_2', this.form.address2);
                fd.append('city', this.form.city);
                fd.append('state', this.form.state);
                fd.append('zip', this.form.zip);
                fd.append('pet_name', this.form.petName);
                fd.append('about', this.form.about);
                fd.append('diagnosis', this.form.diagnosis);

                this.$store.dispatch('cpFormSubmit');
                
                axios.post("/api/care_pkgs", fd, {headers: {'Content-Type': 'multipart/form-data'}}).then(({data}) => {

                    this.$store.dispatch('cpFormSuccess')

                }).catch((error) => {
                        this.$store.dispatch('cpFormError')
                })
            },
            onReset(evt) {
                evt.preventDefault()
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

                /* reset/clear native browser form validation state */
                this.show = false
                this.$nextTick(() => {
                    this.show = true
                })
            },
            hide() {

                /* reset/clear native browser form validation state */
                this.show = false
                this.$nextTick(() => {
                    this.show = true
                })
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

