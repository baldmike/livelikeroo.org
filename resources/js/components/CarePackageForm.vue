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

                    <div class="form-group" :class="{ 'has-danger': $v.form.about.$invalid && $v.form.about.$dirty, 'has-success': !$v.form.about.$invalid }">
                        <label>Tell us about a little bit about <span v-if="form.petName">{{ form.petName }}</span><span v-if="!form.petName">your pet</span>!</label>
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
                    
                    <div class="form-group" :class="{ 'has-danger': $v.form.state.$invalid && $v.form.state.$dirty, 'has-success': !$v.form.state.$invalid }">
                        <label for="state">State</label>
                        <el-select
                                class="select-primary"
                                placeholder="Select State"
                                v-model="form.state"
                                required>

                                <el-option v-for="option in states"
                                        class="select-primary"
                                        :key="option.label"
                                        :value="option.value"
                                        :label="option.label"> 
                                </el-option>
                        </el-select>
                    </div>

                    <div class="form-group">
                        <label>Zip Code</label>
                        <fg-input
                            :class="{ 'has-danger': $v.form.zip.$invalid && $v.form.zip.$dirty, 'has-success': !$v.form.zip.$invalid }"
                            v-model="form.zip"
                            placeholder="Zip Code"
                            required/>
                    </div>
                    <div class="errors center" v-if="$v.form.$dirty">We're gonna need to know more than that!</div>
                    <div class="sent" v-if="sent">This Form Has been submitted.</div>

                    <div v-if="!sent" style="text-align: center; margin-top: 2rem;">
                        <n-button 
                                type="primary" 
                                round 
                                @click.prevent.native="requestCarePackage">
                                Request A Care Package
                        </n-button>
                    </div>

                </div>

                

                <div class="col-md-12 center">
                    <n-button @click.prevent.native="resetForm" type="danger">RESET FORM</n-button>
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
    import { Select, Option, DatePicker, TimeSelect } from 'element-ui'
    import { validationMixin } from "vuelidate";
    import { helpers, required, minLength, maxLength, email, between } from "vuelidate/lib/validators";
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

                states: [
                    {value: "AK", label: "Alaska"},
                    {value: "AL", label: "Alabama"},
                    {value: "AR", label: "Arkansas"},
                    {value: "AZ", label: "Arizona"},
                    {value: "CA", label: "California"},
                    {value: "CO", label: "Colorado"},
                    {value: "CT", label: "Connecticut"},
                    {value: "DC", label: "DC"},
                    {value: "DE", label: "Deleware"},
                    {value: "FL", label: "Florida"},
                    {value: "GA", label: "Georgia"},
                    {value: "HI", label: "Hawaii"},
                    {value: "IA", label: "Iowa"},
                    {value: "ID", label: "Idaho"},
                    {value: "IL", label: "Illinois"},
                    {value: "IN", label: "Indiana"},
                    {value: "KS", label: "Kansas"},
                    {value: "KY", label: "Kentucky"},
                    {value: "LA", label: "Louisiana"},
                    {value: "MA", label: "Massachusetts"},
                    {value: "MD", label: "Maryland"},
                    {value: "ME", label: "Maine"},
                    {value: "MI", label: "Michigan"},
                    {value: "MN", label: "Minnesota"},
                    {value: "MO", label: "Missouri"},
                    {value: "MS", label: "Mississippi"},
                    {value: "MT", label: "Montana"},
                    {value: "NC", label: "North Carolina"},
                    {value: "ND", label: "North Dakota"},
                    {value: "NE", label: "Nebraska"},
                    {value: "NH", label: "New Hampshire"},
                    {value: "NJ", label: "New Jersey"},
                    {value: "NM", label: "New Mexico"},
                    {value: "NV", label: "Nevada"},
                    {value: "NY", label: "New York"},
                    {value: "OH", label: "Ohio"},
                    {value: "OK", label: "Oklahoma"},
                    {value: "OR", label: "Oregon"},
                    {value: "PA", label: "Pennsylvania"},
                    {value: "RI", label: "Rhode Island"},
                    {value: "SC", label: "South Carolina"},
                    {value: "SD", label: "South Dakota"},
                    {value: "TN", label: "Tennessee"},
                    {value: "TX", label: "Texas"},
                    {value: "UT", label: "Utah"},
                    {value: "VA", label: "Virginia"},
                    {value: "VT", label: "Vermont"},
                    {value: "WA", label: "Washington"},
                    {value: "WI", label: "Wisconson"},
                    {value: "WV", label: "West Virginia"},
                    {value: "WY", label: "Wyoming"},
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
                    required,
                    minLength: 1,
                    maxLength: 30
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
                    fd.append('image', this.form.image);

                    this.$store.dispatch('cpFormSubmit');
                    
                    axios.post("/api/care_pkgs", fd, {headers: {'Content-Type': 'multipart/form-data'}}).then(({data}) => {

                        this.$store.dispatch('cpFormSuccess')

                    }).catch((error) => {
                            console.log("WE HAVE AN ERROR: " + error)
                            this.$store.dispatch('cpFormError')
                    })
                }
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

