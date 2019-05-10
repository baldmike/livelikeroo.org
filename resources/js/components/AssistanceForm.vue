<template>
   <div class="container" v-if="show">
        <div class="row">
            <form>

                <h3 class="center">FINANCIAL ASSISTANCE REQUEST</h3>

                <img src="/images/headline1.jpg" fluid>
                <br><br>
                <h5 class="center text">Cancer SUCKS. We've been in your shoes, and we'd like to help you through this difficult time. To be considered for a grant, please tell us about you and your pet!</h5>
                <br>

                <div class="form-box">
                    <h3 class="center">YOUR INFORMATION</h3>
                    <h6 class="center">Fields marked with a red <span style="color: red;">X</span> are required.</h6>
                    <br>

                    <div class="form-group" id="firstNameGroup">
                        
                        <label for="firstNameFnForm">First Name</label>
                        <fg-input
                                id="firstNameFnForm"
                                type="text"
                                v-model="form.firstName"
                                :class="{ 'has-danger': $v.form.firstName.$invalid && $v.form.firstName.$dirty, 'has-success': !$v.form.firstName.$invalid }"
                                placeholder="First Name"
                                maxlength="50"
                                required/>
                    </div>

                    <div class="form-group" id="lastNameGroup">
                        <label for="lastNameFnForm">Last Name</label>
                        <fg-input
                                id="lastNameFnForm"
                                type="text"
                                v-model="form.lastName"
                                :class="{ 'has-danger': $v.form.lastName.$invalid && $v.form.lastName.$dirty, 'has-success': !$v.form.lastName.$invalid }"
                                placeholder="Last Name"
                                maxlength="50"
                                required/>
                    </div>

                    <div class="form-group" id="emailGroupFnForm">
                        <label for="emailFnForm">Email</label>
                        <fg-input
                                id="emailFnForm"
                                type="email"
                                v-model="form.email"
                                :class="{ 'has-danger': $v.form.email.$invalid && $v.form.email.$dirty, 'has-success': !$v.form.email.$invalid }"
                                placeholder="Email"
                                maxlength="100"
                                required/>
                    </div>

                    <div class="form-group" id="address1GroupFnForm">
                        <label for="address1FnForm">Address 1</label>
                        <fg-input
                                id="address1FnForm"
                                type="text"
                                v-model="form.address1"
                                :class="{ 'has-danger': $v.form.address1.$invalid && $v.form.address1.$dirty, 'has-success': !$v.form.address1.$invalid }"
                                placeholder="Address 1"
                                maxlength="100"
                                required/>
                    </div>

                    <div class="form-group" id="address2GroupFnForm">
                        <label for="address2FnForm">Address 2</label>
                        <fg-input
                                id="address2FnForm"
                                type="text"
                                v-model="form.address2"
                                
                                maxlength="100"
                                placeholder="Address 2"/>
                    </div>

                    <div class="form-group" id="cityGroupFnForm">
                        <label for="cityFnForm">City</label>
                        <fg-input
                                id="cityFnForm"
                                type="text"
                                v-model="form.city"
                                :class="{ 'has-danger': $v.form.city.$invalid && $v.form.city.$dirty, 'has-success': !$v.form.city.$invalid }"
                                placeholder="City"
                                maxlength="50"
                                required/>
                    </div>

                    
                    <div class="form-group" id="stateGroupFnForm" :class="{ 'has-danger': $v.form.state.$invalid && $v.form.state.$dirty }">
                        <label>State</label>
                        <el-select class="select-primary"
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

                    <div class="form-group" id="zipGroupFnForm">
                        <label for="zipFnForm">Zip Code</label>
                        <fg-input
                            id="zipFnForm"
                            type="text"
                            v-model="form.zip"
                            :class="{ 'has-danger': $v.form.zip.$invalid && $v.form.zip.$dirty, 'has-success': !$v.form.zip.$invalid }"
                            placeholder="Zip Code"
                            maxlength="5"
                            required/>
                    </div>
                </div>

                <!-- PET INFORMATION -->

                <div class="form-box">
                    <div class="col-md-12">
                        <h3 class="center">YOUR PET'S INFORMATION</h3>
                    </div>

                    <div class="form-group">
                        <label>Pet Name</label>
                        <fg-input
                                type="text"
                                :class="{ 'has-danger': $v.form.petName.$invalid && $v.form.petName.$dirty, 'has-success': !$v.form.petName.$invalid }"
                                v-model="form.petName"
                                placeholder="Pet's Name"
                                required/>
                    </div>

                    <div class="form-group" :class="{ 'has-danger': $v.form.species.$invalid && $v.form.species.$dirty }">
                        <label>Species</label>
                        <el-select class="select-primary"
                                    placeholder="Select Species"
                                    v-model="form.species">

                                <el-option v-for="option in types"
                                        class="select-primary"
                                        :key="option.label"
                                        :value="option.value"
                                        :label="option.label"> 
                                </el-option>
                        </el-select>
                    </div>

                    <div class="form-group">
                        <label>Breed</label>
                        <fg-input
                                type="text"
                                v-model="form.breed"
                                placeholder="Breed"/>
                    </div>

                    <div class="form-group">
                        <label for="ageFnForm">Age</label>
                        <fg-input
                                id="ageFnForm"
                                :class="{ 'has-danger': $v.form.age.$invalid && $v.form.age.$dirty, 'has-success': !$v.form.age.$invalid }"
                                type="number"
                                max="30"
                                v-model="form.age"
                                placeholder="Age"
                                required/>
                    </div>

                    <div class="form-group" :class="{ 'has-danger': $v.form.gender.$invalid && $v.form.gender.$dirty }">
                        <label for="gender">Gender</label>
                        <el-select class="select-primary"
                                    placeholder="Select Gender"
                                    v-model="form.gender">

                                <el-option v-for="option in gender"
                                        class="select-primary"
                                        :key="option.label"
                                        :value="option.value"
                                        :label="option.label"> 
                                </el-option>
                        </el-select>
                    </div>

                    <div class="form-group" :class="{ 'has-danger': $v.form.altered.$invalid && $v.form.altered.$dirty }">
                        <label for="altered">Altered</label>
                        <el-select class="select-primary"
                                    placeholder="Is your pet Spayed/Neutered?"
                                    v-model="form.altered">

                                <el-option v-for="option in alteredYON"
                                        class="select-primary"
                                        :key="option.label"
                                        :value="option.value"
                                        :label="option.label"> 
                                </el-option>
                        </el-select>
                    </div>

                    <div class="form-group">
                        <label>Tell us about a little bit about <span v-if="form.petName">{{ form.petName }}</span><span v-if="!form.petName">your pet</span>!</label>
                        <textarea
                                rows="6"
                                class="form-control"
                                v-model="form.about"
                                required/>
                    </div>

                    <!-- we are using Bootstrap-Vue for image input -->
                    <b-form-group id="imageGroup" label="Send us a Picture of Your Pet" label-for="imageCP">
                        <b-form-file
                                id="imageCP"
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
                    <h3 class="form-headline">PET'S MEDICAL INFORMATION</h3>

                    <div class="form-group" id="diagnosisGroup">
                        <label for="diagnosis">Medical Diagosis, if known</label>
                        <fg-input
                                id="diagnosis"
                                type="text"
                                v-model="form.diagnosis"
                                placeholder="Diagnosis" />
                    </div>

                    <div class="form-group" id="diagnosisDateGroup">
                        <label for="diagnosisDate">Diagnosis Date, if known</label>
                        <!-- <fg-input>
                            <el-date-picker v-model="form.diagnosisDate"
                                            type="date"
                                            placeholder="Click to select Diagnosis Date">
                            </el-date-picker>
                        </fg-input> -->
                        <fg-input
                                id="diagnosisDate"
                                type="date"
                                v-model="form.diagnosisDate"
                                placeholder="Diagnosis Date" />
                    </div>

                    <div class="form-group" :class="{ 'has-danger': $v.form.previousDiagnosis.$invalid && $v.form.previousDiagnosis.$dirty }">
                        <label for="previousDiagnosis">Has your pet previously been diagnosed with cancer?</label>
                        <el-select class="select-primary"
                                    placeholder="Previous Diagnosis"
                                    v-model="form.previousDiagnosis">

                                <el-option v-for="option in prevDiagYON"
                                        class="select-primary"
                                        :key="option.label"
                                        :value="option.value"
                                        :label="option.label">
                                </el-option>
                        </el-select>
                    </div>

                    <div class="form-group" id="primaryVetFirstNameGroup">
                        <label for="primaryVetFirstName">Vet First Name</label>
                        <fg-input
                                id="primaryVetFirstName"
                                type="text"
                                :class="{ 'has-danger': $v.form.primaryVetFirstName.$invalid && $v.form.primaryVetFirstName.$dirty, 'has-success': !$v.form.primaryVetFirstName.$invalid }"
                                v-model="form.primaryVetFirstName"
                                placeholder="Primary Vet First Name"
                                required />
                    </div>

                    <div class="form-group" id="primaryVetLastNameGroup">
                        <label for="primaryVetLastName">Vet Last Name</label>
                        <fg-input
                                id="primaryVetLastName"
                                type="text"
                                :class="{ 'has-danger': $v.form.primaryVetLastName.$invalid && $v.form.primaryVetLastName.$dirty, 'has-success': !$v.form.primaryVetLastName.$invalid }"
                                v-model="form.primaryVetLastName"
                                placeholder="Primary Vet Last Name"
                                required />
                    </div>

                    <div class="form-group" id="primaryClinicGroup">
                        <label for="primaryClinicName">Vet Clinic/Hospital Name</label>
                        <fg-input
                                id="primaryClinicName"
                                type="text"
                                :class="{ 'has-danger': $v.form.primaryClinicName.$invalid && $v.form.primaryClinicName.$dirty, 'has-success': !$v.form.primaryClinicName.$invalid }"
                                v-model="form.primaryClinicName"
                                placeholder="Primary Clinic Name"
                                required />
                    </div>

                    <div class="form-group" id="primaryClinicPhoneGroup">
                        <label for="primaryClinicPhone">Clinic Phone Number</label>
                        <fg-input
                                id="primaryClinicPhone"
                                type="tel"
                                :class="{ 'has-danger': $v.form.primaryClinicPhone.$invalid && $v.form.primaryClinicPhone.$dirty, 'has-success': !$v.form.primaryClinicPhone.$invalid }"
                                v-model="form.primaryClinicPhone"
                                placeholder="(XXX) XXX-XXXX"
                                required />
                    </div>

                    <div class="form-group" id="primaryClinicEmailGroup">
                        <label for="primaryClinicEmail">Clinic Email</label>
                        <fg-input
                                id="primaryClinicEmail"
                                type="email"
                                v-model="form.primaryClinicEmail"
                                placeholder="Primary Clinic Email" />
                    </div>

                    <br><br>

                    <label>Are you seeking the care of any specialist (i.e. oncologist), or any other medical provider?</label>

                    <div class="form-group">
                        <textarea
                                rows="6"
                                class="form-control"
                                v-model="form.specialist"
                                placeholder="If yes, please provide any details you can in this space. This can include holistic care and alternative therapies." />
                    </div>

                    <br><br>

                    <div class="form-group" id="otherHelpGroup">
                        <label for="otherHelp">Please list any other organizations you have contacted for assistance or separate fundraising you have done.</label>
                        <textarea
                                id="otherHelp"
                                rows="6"
                                class="form-control"
                                v-model="form.otherHelp"
                                placeholder="If applicable, please list any grants that you have received and the amount." />
                    </div>
                </div>

                
                <br><br>

                <div class="row">
                    <div class="col-md-6">
                        <n-checkbox
                                v-model="robot"
                                v-if="!$v.form.$invalid"
                                required>
                            I'm not a robot
                        </n-checkbox>
                    </div>
                    <div class="col-md-6">
                        <n-button 
                                type="primary" 
                                round 
                                class="pull-right"
                                @click.prevent.native="onSubmit">
                                Request Financial Assistance</n-button>
                    </div>                    
                    <br>
                </div>

                <div class="sent" v-if="sent">This form has been submitted</div>

                <div style="text-align: center; margin: 2rem;">
                    <img src="/images/llr_logo.png">
                </div>

                <!-- <div class="error" style="margin-top: 20px;" v-if="$v.form.$invalid">A required field isn't correctly filled out.</div>                 -->
            </form>
        </div>
   </div>
</template>

<script>

    import { validationMixin } from "vuelidate";
    import { helpers, required, minLength, maxLength, email, between, sameAs } from "vuelidate/lib/validators";
    import { Select, Option, DatePicker, TimeSelect } from 'element-ui'
    import { Button, FormGroupInput, Tabs, TabPane, Radio, Checkbox } from '@/components';
    
    import { EventBus } from '../event-bus.js';
    const phone = helpers.regex('phone', /^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/)

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
                    phone: '',
                    petName: '',
                    species: '',
                    breed: '',
                    age: '',
                    gender: null,
                    altered: null,
                    about: '',
                    image: null,
                    diagnosis: '',
                    diagnosisDate: null,
                    previousDiagnosis: null,
                    primaryVetFirstName: '',
                    primaryVetLastName: '',
                    primaryClinicName: '',
                    primaryClinicPhone: '',
                    primaryClinicFax: '',
                    primaryClinicEmail: '',
                    specialist: '',
                    specialistDetails: '',
                    otherHelp: '',
                    verify: false,
                },
                url: null,
                robot: false,
                show: true,

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
                types: [
                    {value: "Dog", label: "Dog"},
                    {value: "Cat", label: "Cat"},
                    {value: "Rabbit", label: "Rabbit"},
                    {value: "Horse", label: "Horse"},
                    {value: "Other", label: "Other"}
                ],
                prevDiagYON: [
                    {value: "Yes", label: "Yes, previously diagnosed"},
                    {value: "No", label: "No, never diagnosed previously"}
                ],
                alteredYON: [
                    {value: "1", label: "Yes, my pet is spayed/neutered"},
                    {value: "0", label: "No, my pet is not spayed/neutered"}
                ],

                gender: [
                    // {value: null, label: "Select Gender"},
                    {value: "M", label: "Male"},
                    {value: "F", label: "Female"}
                ],

                species: [ 'Dog', 'Cat', 'Rabbit', 'Bird', 'Other' ],
                show: true,
                sent: false
            }
        },
        components: {
            [Button.name]: Button,
            [FormGroupInput.name]: FormGroupInput,
            [Select.name]: Select,
            [Option.name]: Option,
            [Radio.name]: Radio,
            [Checkbox.name]: Checkbox,
            [DatePicker.name]: DatePicker,
            [TimeSelect.name]: TimeSelect
        },
        mixins: [
            validationMixin
        ],

        validations: {

            form: {
                firstName: {
                    required,
                    minLength: 1,
                    maxLength: 50,
                },
                lastName: {
                    required,
                    minLength: 2,
                    maxLength: 50,
                },
                email: {
                    email,
                    required,
                    maxLength: 100
                },
                address1: {
                    required,
                    maxLength: 50,
                },
                city: {
                    required,
                    maxLength: 50,
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
                    maxLength: 50,
                },
                species: {
                    required,
                },
                age: {
                    required,
                    between: between(0, 25)
                },
                gender: {
                    required
                },
                altered: {
                    required
                },
                previousDiagnosis: {
                    required
                },
                primaryVetFirstName: {
                    required,
                    maxLength: 50,
                },
                primaryVetLastName: {
                    required,
                    maxLength: 50,
                },
                primaryClinicName: {
                    required
                },
                primaryClinicPhone: {
                    required,
                    phone
                },
            },
                robot: {
                    required
                },
        },
        computed: {},
        methods: {
            onSubmit() {
                this.$v.form.$touch();

                if (!this.$v.form.$invalid) {

                    let fd = new FormData();
                
                    Object.keys(this.form).forEach(key => {
                        fd.append(key, this.form[key])
                    })

                    this.$store.dispatch('fnFormSubmit');

                    axios.post("/api/fin_reqs", fd, {headers: {'Content-Type': 'multipart/form-data'}}).then(({data}) => {
                        
                        this.$store.dispatch('fnFormSuccess')

                    }).catch((error) => {
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
                this.form.phone = ''
                this.form.petName = ''
                this.form.species = ''
                this.form.breed = ''
                this.form.age = ''
                this.form.gender = ''
                this.form.altered = ''
                this.form.image = ''
                this.form.about = '' 
                this.form.diagnosis = ''
                this.form.diagnosisDate = ''
                this.form.previousDiagnosis = ''
                this.form.primaryVetFirstName = ''
                this.form.primaryVetLastName = ''
                this.form.primaryClinicName = ''
                this.form.primaryClinicPhone = ''
                this.form.primaryClinicFax = ''
                this.form.primaryClinicEmail = ''
                this.form.verify = null
                this.url = null

                this.sent = false;

                /* reset/clear native browser form validation state */
                this.show = false
                this.$nextTick(() => {
                    this.show = true
                })
            },
            onFileChange(e) {
                const file = e.target.files[0];
                this.url = URL.createObjectURL(file);
                console.log("THE URL: " + this.url)

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
