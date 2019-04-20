<template>

    <div v-if="show">
    
        <form id="carePackageForm" @submit.prevent="onSubmit" @reset="resetForm()">
            <img src="/images/headline4.jpg" fluid>
            
            <h3 class="center">CARE PACKAGES!</h3>
            <div class="row">
                <div class="col-md-12">
                    <p style="text-align: center;">Our Roo Cancer Care Packages include some of Roo’s favorite items, and are each made by hand by our volunteers.</p>
                </div>
            </div>
            

            
                <h3 class="form-headline">TELL US ABOUT YOUR PET</h3>

                <hr>

            <div class="form-group" id="petNameGroup" label="Pet Name:" label-for="petName">
                <fg-input
                id="petName"
                type="text"
                v-model="form.petName"
                required>
                </fg-input>
            </div>

            <div class="form-group" id="aboutGroup" label="Tell us everything!" label-for="about">
                <textarea
                    id="about"
                    rows="6"
                    v-model="form.about"
                    required
                    placeholder="Tell us their favorite activities, toys, food, and what makes them special. We want to hear all about them!" />
            </div>
            
            <div class="form-group" id="imageGroup" label="Send us a Picture of Your Pet" label-for="image">
                <input class="file-form"
                    id="image"
                    accept="image/*"
                    v-model="form.image"
                    placeholder="Choose a file..."
                    drop-placeholder="Drop file here..."
                    @change="onFileChange"/>
                <!-- <col>   #### </col>  -->
                <div cols="6" offset="3" style="margin-top: 1rem;">
                    <img v-if="form.url" :src="form.url" width="200" alt="uploaded image">
                </div>
            </div>
        </form>

        <div class="section-box">
            <h3 class="form-headline">MEDICAL INFORMATION</h3>
            <hr>

            <div class="form-group" id="diagnosisGroup" label="Medical diagnosis" label-for="diagnosis">
                <textarea
                    rows="6"
                    id="diagnosis"
                    v-model="form.diagnosis"
                    required/>
            </div>
        </div>

        <div class="section-box">
            <h3 class="form-headline">YOUR INFORMATION</h3>
            <hr>
            <div class="form-group" id="firstNameGroup" label="Your First Name:" label-for="firstName">
                <fg-input
                id="firstName"
                type="text"
                v-model="form.firstName"
                required/>
            </div>

            <div class="form-group" id="lastNameGroup" label="Your Last Name:" label-for="lastName">
                <fg-input
                id="lastName"
                type="text"
                v-model="form.lastName"
                required/>
            </div>

            <div class="form-group" id="exampleInputGroup1" label="Email Address:" label-for="email">
                <fg-input
                    id="email"
                    type="email"
                    v-model="form.email"
                    required/>
            </div>

            <div class="form-group" id="address1Group" label="Address 1" label-for="address1">
                <fg-input
                id="address1"
                type="text"
                v-model="form.address1"
                required/>
            </div>

            <div class="form-group" id="address2Group" label="Address 2" label-for="address2">
                <fg-input
                id="address2"
                type="text"
                v-model="form.address2"
                />
            </div>

            <div class="form-group" id="cityGroup" label="City" label-for="city">
                <fg-input
                    id="city"
                    type="text"
                    v-model="form.city"
                    required/>
            </div>

            
            <div class="form-group" id="stateGroup" label="State" label-for="state">
                <select id="state" 
                    :options="states" 
                    required
                    v-model="form.state" />
            </div>

            <div class="form-group" id="zipGroup" label="Zip" label-for="zip">
                <fg-input
                    id="zip"
                    type="text"
                    v-model="form.zip"
                    required/>
            </div>
        </div>
    

        <div class="sent" v-if="sent">This Form Has been submitted.</div>
        <div v-if="!sent" style="text-align: center; margin-top: 2rem;">
            <button type="submit" 
            style="background-color: #fd7e14; border: none;" >Request a Care Package</button>
        </div>

        <div style="text-align: center; margin: 2rem;">
            <img src="/images/llr_logo.png">
        </div>
    </div>
</template>

<script>

    import { Button, FormGroupInput, Tabs, TabPane, Parallax } from '@/components';
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

                states: ["AK", "AL", "AR", "AZ", "CA", "CO", "CT", "DC",  "DE", "FL", "GA", "HI", "IA", "ID", "IL", "IN", "KS", "KY", "LA", "MA", "MD", "ME", "MI", "MN", "MO", "MS", "MT", "NC", "ND", "NE", "NH", "NJ", "NM", "NV", "NY", "OH", "OK", "OR", "PA", "RI", "SC", "SD", "TN", "TX", "UT", "VA", "VT", "WA", "WI", "WV", "WY"],

                species: [ 'Dog', 'Cat', 'Rabbit', 'Bird', 'Other' ],
                show: true
            }
        },
         components: {
            [Button.name]: Button,
            [FormGroupInput.name]: FormGroupInput

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
                about: {
                    required
                },
                diagnosis: {
                    required
                }
            }
        },

        methods: {
            onSubmit(evt) {
                evt.preventDefault()

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
                fd.append('image', this.form.image);
                fd.append('diagnosis', this.form.diagnosis);

                this.$emit('cpFormSubmit');
                this.$emit('startLoading');
                


                axios.post("/api/care_pkgs", fd, {headers: {'Content-Type': 'multipart/form-data'}}).then(({data}) => {
                    this.$emit('cpFormSubmit');
                    

                    this.sent = true;
                    this.$emit('endLoading');
                    
                    console.log("Care Pkg Modal Component -- store - DATA: " + data.toString());
                    }).catch((error) => {
                        console.log(error);
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
                this.form.about = '' 
                this.form.diagnosis = ''
                this.form.image = ''
                this.form.url = ''

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
            onFileChange(e) {
                const file = e.target.files[0];
                this.form.url = URL.createObjectURL(file);

                this.form.image = file;
            },
        }

        
    }
</script>

<style lang="scss" scoped>
    
    
   
</style>

