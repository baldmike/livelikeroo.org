<template>
   <div class="container" v-if="show">
        <div class="row">
            <form>
                <h3 class="col-4 mr-auto ml-auto"><img src="images/llr_logo.png" alt="Live Like Roo Logo"></h3>

                <!-- FORM STEP 1 -->
                <div class="col-12 mr-auto ml-auto step-box" v-if="formStep===1">

                    <h5 class="title">Financial Assistance</h5>
                    
                    <h5 class="description-box">Cancer SUCKS. We've been in your shoes, and we'd like to help. Please read the following carefully, and we'll help determine if you're eligible and guide you through the process.</h5>
                    
                    <h5 class="description-box">The Live Like Roo Foundation provides financial assistance to help cover healthcare costs related to cancer treatment in the form of grants, ranging from $500 - $1500 per qualified applicant and are awarded on a monthly basis after a complete review of this application and the <em>accompanying medical records.</em></h5>
                    
                    <h5 class="description-box">Upon approval, grants will typically be paid directly to veterinary offices, but may be paid directly to the applicant on a case by case basis. When you're ready, click the button below to begin the application.</h5>

                    <n-button 
                        type="primary"
                        round 
                        block
                        @click.prevent.native="nextStep">
                        Click here to get started</n-button>

                </div>

                <!-- FORM STEP 2 -->
                <div class="col-12 mr-auto ml-auto" v-if="formStep===2">
                    
                    <h5 class="description-box">
                        To qualify and be considered for a grant, you must meet the following requirements.
                    </h5> 
                    
                    <br>
                    
                    <h5 class="description-box">
                        Please check each one off as they apply.
                    </h5>
                    
                    <n-checkbox
                            v-model="requirement1"
                            required
                            style="text-align: center;">
                                <strong>Pet has a confirmed cancer diagnosis</strong>. (The board reserves the right to assist non confirmed cases, based on medical records and an established treatment plan, to confirm suspected diagnosis.)
                    </n-checkbox>
                        
                    <n-checkbox
                            v-model="requirement2"
                            required
                            style="text-align: center;">
                                <strong>Veterinary records, estimates and treatment plans will be submitted by the applicant with this application</strong>, and <em>we cannot process an application without medical records.</em> We will need the documents in a digital format, preferably PDF, and cannot accept fax. Application submisison/review will open on the 1st day of every month, and will continue until 11:59 p.m. CST on the third Sunday of that month.
                    </n-checkbox>

                    <n-button
                            type="primary"
                            round
                            block
                            disabled
                            v-if="!requirement1 || !requirement2">
                            Please check off the requirements to continue.</n-button>
                    
                    <n-button 
                            type="primary"
                            v-if="requirement1 && requirement2"
                            round 
                            block
                            @click.prevent.native="nextStep">
                            I understand, let's move on!</n-button>
                </div>
                
                <!-- FORM STEP 3-->
                <div class="col-12 mr-auto ml-auto" v-if="formStep===3">
                    <h4 class="description-box">
                        Great, let's get started on the grant application. First, we'll need some information about you.</h4>

                    <br><h6 class="center" v-if="$v.form.$dirty">Fields marked with a red <span style="color: red;">X</span> are required.</h6><br>

                    <div class="form-group" id="firstNameGroup">
                        <label for="firstNameFnForm">Your Name</label>
                        <fg-input
                                id="firstNameFnForm"
                                type="text"
                                v-model="form.firstName"
                                :class="{ 'has-danger': $v.form.firstName.$invalid && $v.form.firstName.$dirty, 'has-success': !$v.form.firstName.$invalid }"
                                placeholder="First Name"
                                maxlength="50"
                                minlength="2"
                                required/>
                    </div>

                    <div class="form-group" id="lastNameGroup">
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
                        <label for="emailFnForm">Your Email</label>
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
                        <label for="address1FnForm">Your Address</label>
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

                    <div class="form-group" id="stateGroupFnForm">
                        <label>State</label>
                        <fg-input
                                id="stateFnForm"
                                type="text"
                                v-model="form.state"
                                :class="{ 'has-danger': $v.form.state.$invalid && $v.form.state.$dirty, 'has-success': !$v.form.state.$invalid }"
                                placeholder="State"
                                minlength="2"
                                maxlength="2"
                                required/>
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
                    
                    <br><h6 class="center" v-if="$v.form.$dirty">Fields marked with a red <span style="color: red;">X</span> are required.</h6><br>
                    
                    <form-navigation v-on:nextStep="step4" v-on:backStep="backStep"></form-navigation>

                </div>
                        
                <!-- PET INFORMATION -->

                <!-- formStep 4 -->
                <div class="col-12 mr-auto ml-auto" v-if="formStep===4">
                    <h4 class="description-box">
                        Now, please tell us all about your best friend. Let's start with their name, a picture and what makes them special to you.
                    </h4>
                    <h6 class="center" v-if="$v.form.$dirty">Please provide a name and tell us a little about them.</h6>
                    <br>

                    <div class="form-group box">
                        <label>Your Pet's Name</label>
                        <fg-input
                                type="text"
                                :class="{ 'has-danger': $v.form.petName.$invalid && $v.form.petName.$dirty, 'has-success': !$v.form.petName.$invalid }"
                                v-model="form.petName"
                                placeholder="Pet's Name"
                                required/>
                    </div>

                    <div class="form-group box">
                        <label>Tell us a little bit about <span v-if="form.petName">{{ form.petName }}</span><span v-if="!form.petName">your pet</span>!</label>
                        <textarea
                                rows="6"
                                class="form-control"
                                v-model="form.about"
                                :class="{ 'has-danger': $v.form.about.$invalid && $v.form.about.$dirty, 'has-success': !$v.form.about.$invalid }"
                                minlength="30"
                                required/>
                    </div>

                    <!-- we are using Bootstrap-Vue for image input -->
                    <b-form-group id="imageGroup" label-for="imageFinReq" class="box">
                        <label>Send us a picture of <span v-if="form.petName">{{ form.petName }}</span><span v-if="!form.petName">your pet</span>!</label>
                        <b-form-file
                                id="imageFinReq"
                                accept="image/*"
                                v-model="form.image"
                                placeholder="Choose an image..."
                                @change="onFileChange"/>

                        <b-col cols="6" offset="3" style="margin-top: 1rem;">
                            <img v-if="url" :src="url" width="200" alt="uploaded image">
                        </b-col>
                    </b-form-group>

                    <!-- form navigation -->
                    <form-navigation v-on:nextStep="step5" v-on:backStep="backStep"></form-navigation>

                </div>

                <!-- FORM STEP 5 -->
                <div class="col-12 mr-auto ml-auto" v-if="formStep===5">
                    <h4 class="description-box">
                        What is {{ form.petName }}? If you know {{ form.petName }}'s breed, please list that as well.
                    </h4>
                    <h6 class="center" v-if="$v.form.$dirty">You must select a species.</h6>
                    <br>

                    <div class="form-group">    
                        <div class="row">
                            <div class="col-3 center">
                                <n-button @click.prevent.native="selectSpecies('dog')" type="primary" block><span :class="{ selected: isDog }"><i class="fa fa-dog"></i></span>
                                <br><br>DOG</n-button>
                            </div>
                            <div class="col-3 center">
                                <n-button @click.prevent.native="selectSpecies('cat')" type="primary" block><span :class="{ selected: isCat }"><i class="fa fa-cat"></i></span>
                                <br><br>CAT</n-button>
                            </div>
                            <div class="col-3 center">
                                <n-button @click.prevent.native="selectSpecies('horse')" type="primary" block><span :class="{ selected: isHorse }"><i class="fa fa-horse"></i></span>
                                <br><br>HORSE</n-button>
                            </div>
                            <div class="col-3 center">
                                <n-button @click.prevent.native="selectSpecies('other')" type="primary" block><span :class="{ selected: isOther }"><i class="fa fa-dragon"></i></span>
                                <br><br>OTHER</n-button>
                            </div>
                        </div>
                    </div> 

                    <div class="form-group">
                        <fg-input
                                type="text"
                                v-model="form.breed"
                                placeholder="Breed"/>
                    </div>

                    <!-- form navigation -->
                    <form-navigation v-on:nextStep="step6" v-on:backStep="backStep"></form-navigation>
                </div>
                    
                <div class="col-12 mr-auto ml-auto" v-if="formStep===6">
                    <h4 class="description-box">
                        Is {{ form.petName }} a boy {{ form.species }}, or a girl {{ form.species }}? Select the gender, and use the arrow keys at the bottom to advance.
                    </h4>
                    <h6 class="center" v-if="$v.form.$dirty">You must select a gender.</h6>
                    <br>

                    <div class="form-group">    
                        <div class="row">
                            <div class="col-4 ml-auto mr-auto">
                                <n-button @click.prevent.native="selectGender('m')" type="primary" block><span :class="{ selected: isMale }"><i class="fa fa-mars"></i></span>
                                <br><br>MALE</n-button>
                            </div>
                            <div class="col-4 ml-auto mr-auto">
                                <n-button @click.prevent.native="selectGender('f')" type="primary" block><span :class="{ selected: isFemale }"><i class="fa fa-venus"></i></span>
                                <br><br>FEMALE</n-button>
                            </div>
                        </div>
                    </div>

                    <form-navigation v-on:nextStep="step7" v-on:backStep="backStep"></form-navigation>
                </div>

                <div class="col-12 mr-auto ml-auto" v-if="formStep===7">

                    <h4 class="description-box">
                        Is {{ form.petName }} {{ procedure }}? Select below, and use the arrow keys at the bottom to advance.
                    </h4>
                    <h6 class="center" v-if="$v.form.$dirty">Please tell us if {{ form.petName }} is {{ procedure }}.</h6>
                    <br>

                    <div class="form-group">    
                        <div class="row">
                            <div class="col-4 ml-auto mr-auto">
                                <n-button @click.prevent.native="altered(0)" type="primary" block><span :class="{ selected: isUnaltered }"><i class="fa fa-times"></i></span>
                                <br><br>NOT {{ procedure }}</n-button>
                            </div>
                            <div class="col-4 ml-auto mr-auto">
                                <n-button @click.prevent.native="altered(1)" type="primary" block><span :class="{ selected: isAltered }"><i class="fa fa-check"></i></span>
                                <br><br>{{ procedure }}</n-button>
                            </div>
                        </div>
                    </div>

                    <form-navigation v-on:nextStep="step8" v-on:backStep="backStep"></form-navigation>
                </div>

                <div class="col-12 mr-auto ml-auto" v-if="formStep===8">

                    <h4 class="description-box">
                        Rounded to the nearest year, how old is {{ form.petName }}?
                    </h4>

                    <h6 class="center" v-if="$v.form.$dirty">Age must be between 1 and 25.</h6>
                    <br>

                    <div class="form-group col-6 ml-auto mr-auto">
                        <fg-input
                                id="ageFnForm"
                                class="age-box"
                                :class="{ 'has-danger': $v.form.age.$invalid && $v.form.age.$dirty, 'has-success': !$v.form.age.$invalid }"
                                type="number"
                                max="30"
                                v-model="form.age"
                                required/>
                    </div>

                    <form-navigation v-on:nextStep="step9" v-on:backStep="backStep"></form-navigation>
                </div>

                <div class="col-12 mr-auto ml-auto" v-if="formStep===9">
                    <h5 class="description-box">Now, we'll need {{ form.petName }}'s medical information and records.</h5>
                
                    <div class="form-group" id="diagnosisGroup">
                        <label for="diagnosis">Medical Diagosis</label>
                        <fg-input
                                id="diagnosis"
                                type="text"
                                v-model="form.diagnosis"
                                required
                                placeholder="Diagnosis" />
                    </div>

                    <div class="form-group" id="diagnosisDateGroup">
                        <label for="diagnosisDate">Diagnosis Date</label>
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
                                @input="$v.dateObject.$touch"
                                :class="{ 'has-danger': $v.dateObject.$invalid, 'has-success': !$v.dateObject.$invalid }"
                                placeholder="Diagnosis Date" />
                    </div>

                    <form-navigation v-on:nextStep="step10" v-on:backStep="backStep"></form-navigation>
                </div>

                <div class="col-12 mr-auto ml-auto" v-if="formStep===10">
                    <div class="form-group" :class="{ 'has-danger': $v.form.previousDiagnosis.$invalid && $v.form.previousDiagnosis.$dirty }">
                        <h5 class="description-box">Has {{ form.petName }} previously been diagnosed with cancer?</h5>
                        <div class="row">
                            <div class="col-4 ml-auto mr-auto">
                                <n-button @click.prevent.native="prevDiag(0)" type="primary" block><span :class="{ selected: noPriorDiag }"><i class="fa fa-times"></i></span>
                                <br><br>NO</n-button>
                            </div>
                            <div class="col-4 ml-auto mr-auto">
                                <n-button @click.prevent.native="prevDiag(1)" type="primary" block><span :class="{ selected: priorDiag }"><i class="fa fa-check"></i></span>
                                <br><br>YES</n-button>
                            </div>
                        </div>
                    </div>

                    <form-navigation v-on:nextStep="step11" v-on:backStep="backStep"></form-navigation>
                </div>

                <div class="col-12 mr-auto ml-auto" v-if="formStep===11">
                    <h4 class="description-box">
                        Now we'll need {{ form.petName }}'s veterinarian information and records.
                    </h4>
                    <h6 class="center" v-if="$v.form.$dirty">Please tell us if {{ form.petName }} is {{ procedure }}.</h6>
                    <br>

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

                    <form-navigation v-on:nextStep="step12" v-on:backStep="backStep"></form-navigation>
                </div>

                <div class="col-12 mr-auto ml-auto" v-if="formStep===12">

                    <h4 class="description-box">
                        And finally(!), we'll need copies of your pet's current vet bills. If you have them already stored on this device, you may send them as they are. If you have physical copies, you may either scan them, or simply take pictures with your phone and send those. We can accept image and PDF files.
                    </h4>
                    <h6 class="center" v-if="$v.form.$dirty">You must send medical records.</h6>
                    <br>

                    <b-form-group id="recordsGroup" label="Please upload your pet's medical records" label-for="recordsFinReq" class="box">
                        <b-form-file
                                id="recordsFinReq"
                                accept="application/pdf, image/*"
                                v-model="form.record1"
                                placeholder="Choose a file..."
                                drop-placeholder="Drop file here..."
                                @change="onRecordChange"/>
                    </b-form-group>

                    <b-col cols="6" offset="3" style="margin-top: 1rem;">
                        <img v-if="fileType==='image'" :src="recordUrl" width="200" alt="uploaded image">

                        <pdf v-if="fileType==='pdf'" :src="recordUrl" width="200" alt="uploaded record"></pdf>
                    </b-col>

                    <form-navigation v-on:nextStep="step13" v-on:backStep="backStep"></form-navigation>
                </div>

                <div class="col-12 mr-auto ml-auto" v-if="formStep>=13">

                    <h4 class="description-box">
                        That's it! If you need to check your submission, please use the back button or reset the form to start all over. You will receive an email from us with further information. 
                    </h4>
                    
                    <div class="col-12 ml-auto mr-auto">
                        <n-checkbox
                                v-model="robot"
                                required
                                style="text-align: center;">
                            By submitting this form, I certify that the information provided is true and accurate to the best of my knowledge.
                        </n-checkbox>
                    </div>
                    <br>
                    
                    <div class="col-12 ml-auto mr-auto">
                        <n-button 
                                type="primary" 
                                round 
                                block
                                :disabled="!robot"
                                @click.prevent.native="onSubmit">
                                Request Financial Assistance</n-button>
                

                        <div class="sent" v-if="sent">This form has been submitted</div>
                        <div class="error" v-if="$v.form.$dirty">You have missing fields, please check the form.</div>

                    </div>

                    <br><br><hr>

                    <div class="col-4 mr-auto ml-auto form-nav">
                        <n-button @click.prevent.native="backStep" type="primary" round block><i class="fas fa-arrow-circle-left"></i></n-button>
                        
                    </div> 
                
                    <div class="col-md-4 mr-auto ml-auto" v-if="formStep>8">
                        <n-button @click.prevent.native="resetForm" block type="danger">RESET FORM</n-button>
                    </div>
                </div>

            </form>
        </div> 
    </div>
</template>

<script>

    import { validationMixin } from "vuelidate";
    import { helpers, required, minLength, maxLength, minValue, maxValue, email, between, sameAs } from "vuelidate/lib/validators";
    import { Select, Option, DatePicker, TimeSelect, Table, TableColumn } from 'element-ui'
    import { Button, FormGroupInput, Tabs, TabPane, Radio, Checkbox } from '@/components';
    import FormNavigation from './FormNavigation'
    import pdf from 'vue-pdf'
    
    import { EventBus } from '../event-bus.js';
    
    const phone = helpers.regex('phone', /^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/);

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
                    state: '',
                    zip: '',
                    petName: '',
                    species: '',
                    breed: '',
                    age: '',
                    gender: '',
                    altered: null,
                    about: '',
                    image: null,
                    diagnosis: '',
                    diagnosisDate: '',
                    previousDiagnosis: null,
                    primaryVetFirstName: '',
                    primaryVetLastName: '',
                    primaryClinicName: '',
                    primaryClinicPhone: '',
                    primaryClinicEmail: '',
                    specialist: '',
                    otherHelp: '',
                    record1: null,
                    verify: false,
                },
                fileType: '',
                url: '',
                recordUrl: '',
                robot: false,
                show: true,
                formStep: 1,
                requirement1: false,
                requirement2: false,
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
            [TimeSelect.name]: TimeSelect,
            [Table.name]: Table,
            [TableColumn.name]: TableColumn,
            FormNavigation,
            pdf
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
                    required,
                    minLength: 2,
                    maxLength: 2
                },
                zip: {
                    required,
                    between: between(10000, 99999)
                },
                petName: {
                    required,
                    maxLength: 50
                },
                species: {
                    required,
                },
                age: {
                    required,
                    between: between(1, 25)
                },
                gender: {
                    required
                },
                altered: {
                    required
                },
                about: {
                    required,
                    minLength: 10
                },
                previousDiagnosis: {
                    required
                },
                primaryVetFirstName: {
                    required,
                    maxLength: 50
                },
                primaryVetLastName: {
                    required,
                    maxLength: 50
                },
                primaryClinicName: {
                    required
                },
                primaryClinicPhone: {
                    required,
                    phone,
                },
                record1: {
                    required
                }
            },
              
            dateObject: {
                maxValue: maxValue(new Date()),
                minValue: minValue(new Date().setFullYear(new Date().getFullYear() - 2))
            },
            
            robot: {
                required
            },
        },
        computed: {
            dateObject () {
                return this.form.diagnosisDate ? new Date(this.form.diagnosisDate) : null
            },
            formValid1() {
                return !!(!this.$v.form.email.$invalid && !this.$v.form.firstName.$invalid && !this.$v.form.lastName.$invalid && !this.$v.form.address1.$invalid && !this.$v.form.city.$invalid && !this.$v.form.state.$invalid && !this.$v.form.zip.$invalid);
            },

            formValid2() {
                return !!(!this.$v.form.about.$invalid && !this.$v.form.petName.$invalid);
            },

            isDog() {
                return !!(this.form.species === 'dog');
            },
            
            isCat() {
                return !!(this.form.species === 'cat');
            },

            isHorse() {
                return !!(this.form.species === 'horse');
            },

            isOther() {
                return !!(this.form.species === 'other');
            },

            isMale() {
                return !!(this.form.gender === 'm');
            },

            isFemale() {
                return !!(this.form.gender === 'f');
            },

            isAltered() {
                return !!(this.form.altered === 1)
            },

            isUnaltered() {
                return !!(this.form.altered === 0)
            },

            procedure() {
                if (this.form.gender === 'f') {
                    return "spayed"
                }
                return "neutered"
            },

            priorDiag() {
                return !!(this.form.previousDiagnosis === 1);
            },

            noPriorDiag() {
                return !!(this.form.previousDiagnosis === 0);
            },
        },
        methods: {
            onSubmit() {
                this.$v.form.$touch();

                if (!this.$v.form.$invalid) {

                    let formData = new FormData();
                
                    Object.keys(this.form).forEach(key => {
                        formData.append(key, this.form[key]);
                    })

                    this.$store.dispatch('fnFormSubmit');

                    axios.post("/api/fin_reqs", formData, {headers: {'Content-Type': 'multipart/form-data'}}).then(({data}) => {
                        
                        this.$store.dispatch('fnFormSuccess');
                        this.resetForm();

                    }).catch((error) => {
                        this.$store.dispatch('cpFormError')
                    })
                }
            },

            // *TODO* refactor steps into single method
            step4() {
                if(this.formValid1) {
                    // reset form validation for each new section
                    this.$nextTick(() => { this.$v.$reset() });
                    this.formStep += 1;
                }
                this.$v.form.$touch();
            },

            step5() {
                if(this.formValid2) {
                    // reset the form for each new section
                    this.$nextTick(() => { this.$v.$reset() });
                    this.formStep += 1;
                }
                this.$v.form.$touch();
            },

            step6() {
                if(!this.$v.form.species.$invalid) {
                    // reset the form for each new section
                    this.$nextTick(() => { this.$v.$reset() });
                    this.formStep += 1;
                }
                this.$v.form.$touch();
            },

            step7() {
                if(!this.$v.form.gender.$invalid) {
                    // reset the form for each new section
                    this.$nextTick(() => { this.$v.$reset() });
                    this.formStep += 1;
                }
                this.$v.form.$touch();
            },

            step8() {
                if(this.form.altered != null) {
                    // reset the form for each new section
                    this.$nextTick(() => { this.$v.$reset() });
                    this.formStep += 1;
                }
                this.$v.form.$touch();
            },

            step9() {
                if(!this.$v.form.age.$invalid) {
                    // reset the form for each new section
                    this.$nextTick(() => { this.$v.$reset() });
                    this.formStep += 1;
                }
                this.$v.form.$touch();
            },

            step10() {
                if(!this.$v.dateObject.$invalid) {
                    // reset the form for each new section
                    this.$nextTick(() => { this.$v.$reset() });
                    this.formStep += 1;
                }
                this.$v.form.$touch();
            },

            step11() {
                if(!this.$v.form.previousDiagnosis.$invalid) {
                    // reset the form for each new section
                    this.$nextTick(() => { this.$v.$reset() });
                    this.formStep += 1;
                }
                this.$v.form.$touch();
            },

            step12() {
                // if(!this.$v.form.previousDiagnosis.$invalid) {
                    // reset the form for each new section
                    this.$nextTick(() => { this.$v.$reset() });
                    this.formStep += 1;
                // }
                this.$v.form.$touch();
            },

            step13() {
                if(!this.$v.form.record1.$invalid) {
                    // reset the form for each new section
                    this.$nextTick(() => { this.$v.$reset() });
                    this.formStep += 1;
                }
                this.$v.form.$touch();
            },

            nextStep() {
                this.$nextTick(() => { this.$v.$reset() });
                this.formStep += 1;
            },

            backStep() {
                this.formStep -= 1;
            },

            selectSpecies(animal) {
                this.form.species = animal;
            }, 

            selectGender(gen) {
                this.form.gender = gen;
            },

            altered(value) {
                this.form.altered = value;
            },

            prevDiag(prev) {
                this.form.previousDiagnosis = prev;
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
                this.form.species = ''
                this.form.breed = ''
                this.form.age = ''
                this.form.gender = ''
                this.form.altered = ''
                this.form.image = ''
                this.form.about = '' 
                this.form.diagnosis = ''
                this.form.diagnosisDate = ''
                this.form.previousDiagnosis = null
                this.form.primaryVetFirstName = ''
                this.form.primaryVetLastName = ''
                this.form.primaryClinicName = ''
                this.form.primaryClinicPhone = ''
                this.form.primaryClinicEmail = ''
                this.form.specialist = '',
                this.form.otherHelp = '',
                this.form.record1 = '',
                this.form.verify = false,
                this.formStep = 1,
                this.fileType = '',
                this.url = '',
                this.recordUrl = '',
                this.robot = false,
                this.show = true,
                this.formStep = 1,
                this.requirement1 = false,
                this.requirement2 = false,
                this.show = true,
                this.sent = false

                /* reset/clear native browser form validation state */
                this.show = false
                this.$nextTick(() => {
                    this.show = true;
                    this.$v.$reset();
                })
            },

            onFileChange(e) {
                const file = e.target.files[0];
                console.log("ON FILE/IMAGE CHANGE --> FILE: " + file);
                this.url = URL.createObjectURL(file);
                console.log("The URL: " + this.url)

                this.form.image = file;
            },

            onRecordChange(e) {
                const record = e.target.files[0];
                console.log("ON RECORD CHANGE --> FILE: " + record);
                this.recordUrl = URL.createObjectURL(record);
                console.log("record url: " + this.recordUrl)

                if (record.type == 'image/jpeg' || record.type == 'image/png') {
                    this.fileType = 'image'
                } else {
                    this.fileType = 'pdf'
                }

                this.form.record1 = record;
            },
        }
    }

</script>

<style lang="scss" scoped>
    * {
        -webkit-transition: font-size .3s; /* Safari */
        transition: font-size .3s;
    }
    
    .center {
        text-align: center;
    }
  
    .form-box {
        border: 1px solid #fd7e14;
        border-radius: 6px;
        padding: 1rem;
    }

    .step-box {
        padding: 10px;
        text-align: center;
    }

    .selected {
        color: rgba(9, 247, 247, 1);
        font-size: 1.6rem;
    }

    .age-box {
        font-size: 3rem;
        text-shadow: #fd7e14;
    }

    .form-nav {
        text-align: center;
        font-size: 3rem;
        margin-top: 2rem;
        
    }

    .nav-box {
        border-top: 10px solid black;
        margin-top: 2rem;
    }

    .description-box {
        font-size: 1rem;
        text-align: center;
        font-weight: 500;
    }

</style>
