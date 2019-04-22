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
                    <small>Fields marked with a red <span style="color: red;">X</span> are required</small>

                    <div class="form-group" :class="{ 'has-danger': !$v.form.firstName.required }" id="firstNameGroup">
                        
                        <label for="firstNameFnForm">First Name</label>
                        <fg-input
                                id="firstNameFnForm"
                                type="text"
                                v-model="form.firstName"
                                :state="!$v.form.firstName.$invalid"
                                placeholder="First Name"
                                required/>

                    </div>

                    <div class="form-group" id="lastNameGroup" :class="{ 'has-danger': !$v.form.lastName.required }">
                        <label for="lastNameFnForm">Last Name</label>
                        <fg-input
                                id="lastNameFnForm"
                                type="text"
                                v-model="form.lastName"
                                :state="!$v.form.lastName.$invalid"
                                placeholder="Last Name"
                                required/>
                    </div>

                    <div class="form-group success" id="emailGroupFnForm" :class="{ 'has-danger': !$v.form.email.required }">
                        <label for="emailFnForm">Email</label>
                        <fg-input
                                id="emailFnForm"
                                type="email"
                                v-model="form.email"
                                :state="!$v.form.email.$invalid"
                                placeholder="Email"
                                required/>
                    </div>

                    <div class="form-group success" id="address1GroupFnForm" :class="{ 'has-danger': !$v.form.address1.required }">
                        <label for="address1FnForm">Address 1</label>
                        <fg-input
                                id="address1FnForm"
                                type="text"
                                v-model="form.address1"
                                :state="!$v.form.address1.$invalid"
                                placeholder="Address 1"
                                required/>
                    </div>
                    <div class="form-group has-success" id="address2GroupFnForm">
                        <label for="address2FnForm">Address 2</label>
                        <fg-input
                                id="address2FnForm"
                                type="text"
                                v-model="form.address2"
                                placeholder="Address 2"/>
                    </div>

                    
                    <div class="form-group has-success" id="cityGroupFnForm" :class="{ 'has-danger': !$v.form.city.required }">
                        <label for="cityFnForm">City</label>
                        <fg-input
                                id="cityFnForm"
                                type="text"
                                v-model="form.city"
                                :state="!$v.form.city.$invalid"
                                placeholder="City"
                                required/>
                    </div>

                    
                    <div class="form-group has-success" id="stateGroupFnForm" :class="{ 'has-danger': !$v.form.state.required }">
                        <label for="stateFnForm">State</label>
                        <select 
                                id="stateFnForm"
                                :options="states"
                                class="form-control select-primary"
                                v-model="form.state"
                                :state="!$v.form.state.$invalid">
                                    <option value=null disabled>Select State</option>
                                    <option v-for="state in states" :key="state.value" :value="state.value">{{ state.label }}
                                    </option>
                        </select>
                    </div>

                    <div class="form-group has-success" id="zipGroupFnForm" :class="{ 'has-danger': !$v.form.zip.required || !$v.form.zip.between }">
                        <label for="zipFnForm">Zip Code</label>
                        <fg-input
                            id="zipFnForm"
                            type="text"
                            v-model="form.zip"
                            :state="!$v.form.zip.between"
                            placeholder="Zip Code"
                            required/>
                    </div>
                </div>




                        <!-- PET INFORMATION -->

                <div class="form-box">
                    <div class="col-md-12">
                        <h3 class="center">YOUR PET'S INFORMATION</h3>
                    </div>

                    <div class="form-group has-success" :class="{ 'has-danger': !$v.form.petName.required }">
                        <label>Pet Name</label>
                        <fg-input
                                type="text"
                                :state="!$v.form.petName.$invalid"
                                v-model="form.petName"
                                placeholder="Pet's Name"
                                required/>
                    </div>

                    <div class="form-group has-success" :class="{ 'has-danger': !$v.form.species.required }">
                        <label>Species</label>
                        <fg-input
                                type="text"
                                :state="!$v.form.species.$invalid"
                                v-model="form.species"
                                placeholder="Species"
                                required/>
                    </div>

                    <div class="form-group has-success">
                        <label>Breed</label>
                        <fg-input
                                type="text"
                                v-model="form.breed"
                                placeholder="Breed"/>
                    </div>

                    <div class="form-group has-success" :class="{ 'has-danger': !$v.form.age.required }">
                        <label for="ageFnForm">Age</label>
                        <fg-input
                                id="ageFnForm"
                                type="number"
                                v-model="form.age"
                                placeholder="Age"
                                required/>
                    </div>

                    <div class="form-group has-success" :class="{ 'has-danger': !$v.form.gender.required }">
                        <label for="gender">Gender</label>
                        <select 
                                required
                                :options="gender"
                                class="form-control select-primary"
                                v-model="form.gender">
                                <option value=null disabled>Select Gender</option>

                                <option v-for="gen in gender" :key="gen.value" :value="gen.value">
                                {{ gen.label }}
                                </option>
                        </select>
                    </div>

                    <div class="form-group has-success" :class="{ 'has-danger': !$v.form.altered.required }">
                        <label for="altered">Altered</label>
                        <select 
                                required
                                :options="alteredYON"
                                class="form-control select-primary"
                                v-model="form.altered">
                                <option value=null disabled>Spayed/Neutered</option>

                                <option v-for="selection in alteredYON" :key="selection.value" :value="selection.value">
                                {{ selection.label }}
                                </option>
                        </select>
                    </div>

                    <div class="form-group has-success">
                        <label>Tell us about a little bit about <span v-if="form.petName">{{ form.petName }}</span><span v-if="!form.petName">your pet</span>!</label>
                        <textarea
                                rows="6"
                                class="form-control"
                                v-model="form.about"
                                required/>
                    </div>

                    <!-- image input -->
                    <!-- <div class="form-group has-success">
                        <input
                                type="image"
                                accept="image/*"
                                placeholder="Choose a file..."
                                drop-placeholder="Drop file here..."
                                @change="onFileChange"/>

                        <div class="col-md-6">
                            <img v-if="url" :src="url" width="200" alt="uploaded image">
                        </div>
                    </div> -->

                </div>
                <div class="form-box">

                    <h3 class="form-headline">PET'S MEDICAL INFORMATION</h3>

                    <div class="form-group has-success" id="diagnosisGroup">
                        <label for="diagnosis">Medical Diagosis, if known</label>
                        <fg-input
                            id="diagnosis"
                            type="text"
                            v-model="form.diagnosis"
                            placeholder="Diagnosis" />
                    </div>

                    <div class="form-group has-success" id="diagnosisDateGroup">
                        <label for="diagnosisDate">Diagnosis Date, if known</label>
                        <fg-input
                            id="diagnosisDate"
                            type="date"
                            v-model="form.diagnosisDate"
                            placeholder="Diagnosis Date" />
                    </div>
                    <div class="form-group has-success" :class="{ 'has-danger': !$v.form.previousDiagnosis.required }">
                        <label for="previousDiagnosis">Has your pet previously been diagnosed with cancer?</label>
                        <select 
                                required
                                :options="prevDiagYON"
                                class="form-control select-primary"
                                v-model="form.previousDiagnosis">
                                <option value=null disabled>Please Select</option>

                                <option v-for="response in prevDiagYON" :key="response.value" :value="response.value">
                                {{ response.label }}
                                </option>
                        </select>
                    </div>

                    <div class="form-group has-success" id="primaryVetFirstNameGroup" :class="{ 'has-danger': !$v.form.primaryVetFirstName.required }">
                        <label for="primaryVetFirstName">Vet First Name</label>
                        <fg-input
                        id="primaryVetFirstName"
                        type="text"
                        v-model="form.primaryVetFirstName"
                        required />
                    </div>

                    <div class="form-group has-success" id="primaryVetLastNameGroup" :class="{ 'has-danger': !$v.form.primaryVetLastName.required }">
                        <label for="primaryVetLastName">Vet Last Name</label>
                        <fg-input
                        id="primaryVetLastName"
                        type="text"
                        v-model="form.primaryVetLastName"
                        required />
                    </div>

                    <div class="form-group has-success" id="primaryClinicGroup" :class="{ 'has-danger': !$v.form.primaryClinicName.required }">
                        <label for="primaryClinicName">Vet Clinic/Hospital Name</label>
                        <fg-input
                        id="primaryClinicName"
                        type="text"
                        v-model="form.primaryClinicName"
                        required />
                    </div>

                    <div class="form-group has-success" id="primaryClinicPhoneGroup" :class="{ 'has-danger': !$v.form.primaryClinicPhone.required }">
                        <label for="primaryClinicPhone">Clinic Phone Number</label>
                        <fg-input
                        id="primaryClinicPhone"
                        type="tel"
                        v-model="form.primaryClinicPhone"
                        required />
                    </div>

                    <div class="form-group has-success" id="primaryClinicEmailGroup">
                        <label for="primaryClinicEmail">Clinic Email</label>
                        <fg-input
                        id="primaryClinicEmail"
                        type="email"
                        v-model="form.primaryClinicEmail"/>
                    </div>

                    <br><br>

                    <label>Are you seeking the care of any specialist (i.e. oncologist), or any other medical provider?</label>

                    <div class="form-group has-success">
                        <textarea
                            rows="6"
                            class="form-control"
                            v-model="form.specialist"
                            placeholder="If yes, please provide any details you can in this space. This can include holistic care and alternative therapies." />
                    </div>

                    <br><br>

                    <div class="form-group has-success" id="otherHelpGroup">
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
                            @click.prevent.native="onSubmit">
                            Request Financial Assistance</n-button>
                    </div>
                </div>

                <div class="sent" v-if="sent">This form has been submitted</div>
                
                <!-- <div  style="text-align: center; margin-top: 2rem;">
                    <n-button @click.prevent.native="onSubmit"
                            style="background-color: #fd7e14; border: none;" >
                            Submit Application</n-button>
                </div> -->

                <div style="text-align: center; margin: 2rem;">
                    <img src="/images/llr_logo.png"></img>
                </div>
                
            </form>
        </div>
   </div>
</template>

<script>

    import { validationMixin } from "vuelidate";
    import { helpers, required, minLength, maxLength, email, between, sameAs } from "vuelidate/lib/validators";
    import {Select, Option} from 'element-ui'
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
            [Checkbox.name]: Checkbox
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
                species: {
                    required
                },
                age: {
                    required
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
                    required
                },
                primaryVetLastName: {
                    required
                },
                primaryClinicName: {
                    required
                },
                primaryClinicPhone: {
                    required,
                    phone
                },
                robot: {
                    required
                },
            }
        },
        computed: {
            hasSpecialist() {
                return this.form.specialist;
            }
        },
        methods: {
            onSubmit(evt) {
                
                let fd = new FormData();

                this.$emit('startLoading');

                fd.append('first_name', this.form.firstName);
                fd.append('last_name', this.form.lastName);
                fd.append('email', this.form.email);
                fd.append('address_1', this.form.address1);
                fd.append('address_2', this.form.address2);
                fd.append('city', this.form.city);
                fd.append('state', this.form.state);
                fd.append('zip', this.form.zip);
                fd.append('phone', this.form.phone);
                fd.append('pet_name', this.form.petName);
                fd.append('species', this.form.species);
                fd.append('breed', this.form.breed);
                fd.append('age', this.form.age);
                fd.append('gender', this.form.gender);
                fd.append('altered', this.form.altered);
                fd.append('about', this.form.about);
                fd.append('image', this.form.image);
                fd.append('diagnosis', this.form.diagnosis);
                fd.append('diagnosis_date', this.form.diagnosisDate);
                fd.append('previous_diagnosis', this.form.previousDiagnosis);
                fd.append('vet_first_name', this.form.primaryVetFirstName);
                fd.append('vet_last_name', this.form.primaryVetLastName);
                fd.append('primary_clinic_name', this.form.primaryClinicName);
                fd.append('primary_clinic_phone', this.form.primaryClinicPhone);
                fd.append('primary_clinic_fax', this.form.primaryClinicFax);
                fd.append('primary_clinic_email', this.form.primaryClinicEmail);
                fd.append('specialist', this.form.specialist);
                fd.append('other_help', this.form.otherHelp);

                this.$store.dispatch('fnFormSubmit');

                axios.post("/api/finreqs", fd, {headers: {'Content-Type': 'multipart/form-data'}}).then(({data}) => {
                    
                   this.$store.dispatch('fnFormSuccess')

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
