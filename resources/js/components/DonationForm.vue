<template>

    <div v-if="show">

        <form id="donation-form" @submit.prevent="pay()" @reset="resetForm()">
            
            <h3 class="center" v-if="isMonthly">MONTHLY DONATION</h3>
            <h3 class="center" v-if="isOneTime">ONE TIME DONATION</h3>

            <img v-if="isOneTime" src="/images/headline2.jpg" fluid>
            <img v-if="isMonthly" src="/images/headline3.jpg" fluid>
            
            <div class="form-box">

                <!-- DONATION AMOUNT -->
                <div class="row">
                        <div class="col-md-6 ml-auto mr-auto"><n-button @click.prevent.native="toggleOneTime" block type="primary">One Time</n-button></div>
                        <div class="col-md-6 ml-auto mr-auto"><n-button @click.prevent.native="toggleMonthly" type="primary" block>Monthly</n-button></div>
                    </div>
                
                
                
                <div class="col-md-12">
                    <h5 class="center">Your tax-deductable donation helps pets and their families through a cancer diagnosis. Please select one time or monthly donation with the buttons above, and choose your amount below. Thank You!</h5>
                </div>


            
                <div class="row">
                    <div class="col-md-3 ml-auto mr-auto"><n-button @click.prevent.native="donate($event,'10')"   outline round type="primary"><i class="fa fa-heart"></i>  $10</n-button></div>
                    <div class="col-md-3 ml-auto mr-auto"><n-button @click.prevent.native="donate($event,'25')"   outline round type="primary"><i class="fa fa-heart"></i> $25</n-button></div>
                    <div class="col-md-3 ml-auto mr-auto"><n-button @click.prevent.native="donate($event,'50')"   outline round type="primary"><i class="fa fa-heart"></i> $50</n-button></div>
                    <div class="col-md-3 ml-auto mr-auto"><n-button @click.prevent.native="donate($event,'100')" outline round type="primary"><i class="fa fa-heart"></i>$100</n-button></div>
                </div>

                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <h3 class="center">Or Enter an amount:</h3>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto" style="font-size: 2rem; text-align: center !important;">
                        <fg-input 
                        id="amount"
                        v-on:input="clearButtons"
                        type="number"
                        v-model="form.amount"
                        required/>
                    </div>
                </div>
            </div>

            <div class="form-box">
                <!-- DONATION TYPE == IN HONOR/MEMORY -->
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="center">DONATION TYPE: {{ donationType }}</h3>
                        <h5 style="text-align: center;">Choose whether this is a personal donation, or to be made in memory of a loved one.</h5>
                    </div>
                </div>  

                <div class="row center" id="donationType">
                    <div class="col-md-6"><n-button type="primary" @click.prevent.native="personalDonation" block>Personal</n-button></div>
                    <div class="col-md-6"><n-button type="primary" @click.prevent.native="memoryDonation" block>In Memory Of</n-button></div>
                </div>
            

                <div class="form-group" id="inMemoryGroup" v-if="form.inMemory" label="In Memory Of">
                    <label>In Memory Of</label>
                    <fg-input id="honoreeName"
                    placeholder="Honoree"
                    type="text"
                    v-model="form.honoreeName"
                    required/>
                </div>


                <div class="form-group" id="recipientInfoGroup" v-if="!isPersonal">
                    <h5 class="center">Would you like us to notify someone?</h5>
                </div>

                <div class="form-group" id="recipientGroup" v-if="!isPersonal" label="Recipient Name">
                    <label for="recipientNameDnForm">Recipient's Name</label>
                    <fg-input 
                        id="recipientNameDnForm"
                        placeholder="Recipient's Name"
                        type="text"
                        v-model="form.recipientName"/>
                </div>

                <!-- IF EMAIL -->
                <div class="form-group" id="recipientEmailGroup" v-if="!isPersonal" label="Recipient Email">
                    <label for="recipientEmailDnForm">Recipient's Email</label>
                    <fg-input 
                        id="recipientEmailDnForm"
                        placeholder="Recipient's Email"
                        type="email"
                        v-model="form.recipientEmail"/>
                </div>

                <div class="form-group" id="recipientMessageGroup" label="Message for recipient" v-if="!isPersonal">
                        <label>Message: </label>
                        <textarea name="message" class="form-control" id="recipientMessage" rows="6" v-model="form.recipientMessage"></textarea>
                </div>
            </div>
                    
            <div class="form-box">
                <h3 class="center">YOUR INFORMATION</h3>

                <div class="col-md-12" v-if="isMonthly">To begin automatic monthly donations, we'll need to create an account for you. With your email and password, you'll be able to log in and view, update or cancel your donation at any time.</div>
                
                <label for="firstNameDnForm">First Name</label>
                <fg-input 
                        id="firstNameDnForm"
                        class="input-lg"
                        placeholder="First Name"
                        v-model="form.firstNameDnForm">
                </fg-input>

                <label for="lastNameDnForm">Last Name</label>
                <fg-input
                        id="lastNameDnform"
                        class="input-lg"
                        placeholder="Last Name"
                        v-model="form.lastNameDnForm">
                </fg-input>

                <label for="emailDnForm">Email</label>
                <fg-input
                        id="emailDnForm"
                        class="input-lg"
                        placeholder="Email"
                        v-model="form.email">
                </fg-input>

                <div id="passwordLoginGroup" v-if="isMonthly">
            
                    <label for="passwordDnForm">Password</label>
                    <fg-input 
                    id="passwordDnForm"
                    type="password"
                    placeholder="Password"
                    v-model="form.password" 
                    required />
                
                    <fg-input 
                    id="repeatPassword"
                    type="password"
                    v-model="form.repeatPassword"
                    :state="!$v.form.repeatPassword.$invalid"/>
                </div>
            </div>

            <div class="form-box">
                <!-- CC/DONOR INFORMTION -->
                <h3 class="center">PAYMENT INFORMATION</h3>

                <div class="form-group" id="nameOnCardGroup">
                    <label for="card-element">Name on Card</label>
                    <fg-input 
                        placeholder="Name on Card"
                        id="name_on_card"
                        type="text"
                        v-model="form.name_on_card"
                        required/>
                </div>

                <!-- use Stripe's card element -->
                <div class="form-group" id="nameOnCardGroup">
                    <label for="card-element">Card Information</label>
                    <card-element></card-element>
                </div>

                <!-- CSRF Field -->
                <input type="hidden" name="_token" :value="csrf">

                <br>

                <div class="form-group">
                    <div class="col-md-12 center"><n-button v-if="isOneTime" type="primary" @click.prevent.native="pay">Make a One-Time Donation of ${{ form.amount }}</n-button></div>
                    <div class="col-md-12 center"><n-button v-if="isMonthly" type="primary" @click.native="pay">Begin Monthly Donation of ${{ form.amount }}</n-button></div>
                </div>
            </div>

            <div class="col-md-12 center"><img src="/images/llr_logo.png"></div>

        </form>
    </div>
</template>

<script>

    import { validationMixin } from "vuelidate";
    import { helpers, required, minLength, maxLength, email, between, sameAs } from "vuelidate/lib/validators";
    import { Button, FormGroupInput, Tabs, TabPane, Parallax } from '@/components';
    import { createToken, Card } from 'vue-stripe-elements-plus'
    import { EventBus } from '../event-bus.js';
    import CardElement from '../components/CardElement'

    export default {
        name: 'DonationForm',

        data () {
            return {

                form: {
                    amount: '10',
                    email: '',
                    password: '',
                    repeatPassword: '',
                    firstNameDnForm: '',
                    lastNameDnForm: '',

                    name_on_card: '',
                    personal: true,
                    inHonor: false,
                    inMemory: false,
                    honoreeName: 'Honoree',
                    // sendSnail: false,
                    // sendEmail: false,
                    recipientName: 'Recipient Name',
                    recipientEmail: 'recipient@example.com',
                    recipientMessage: 'Message to recipient'
                },
                show: true,
                isShow: false,                
                loading: false,
                
                csrf: document.head.querySelector('meta[name="csrf-token"]').content,
            }
        },
        mixins: [
            validationMixin
        ],
        validations: {

            form: {
                amount: {
                    required
                },
                name_on_card: {
                    required
                },
                email: {
                    email,
                    required
                },
                password: {
                    required,
                    minLength:minLength(8),
                },
                repeatPassword: {
                    sameAsPassword: sameAs('password')
                }
            }
        },
        components: {
            CardElement,
            [Button.name]: Button,
            [FormGroupInput.name]: FormGroupInput

        },
        computed: {
            isTen() {
                return !!(this.form.amount === '10');
            },
            isTwentyFive() {
                return !!(this.form.amount === '25');
            },
            isFifty() {
                return !!(this.form.amount == '50');
            },
            isHundred() {
                return !!(this.form.amount === '100');
            },
            isPersonal() {
                return this.form.personal;
            },
            donationType() {
                if (this.isPersonal) {
                    return "Personal"
                }

                return "Memorial"
            },
            isInMemory() {
                return this.form.inMemory;
            },
            isMonthly() {
                return this.$store.state.monthly;
            },
            isOneTime() {
                return this.$store.state.oneTime;
            },
            // isEmail() {
            //     return this.form.sendEmail;
            // },
            // isSnail() {
            //     return this.form.sendSnail;
            // }

        },
        methods: {
            pay() {
                this.$store.dispatch('dnFormSubmit');

                // createToken returns a Promise which resolves in a result object with
                // either a token or an error key.
                // See https://stripe.com/docs/api#tokens for the token object.
                // See https://stripe.com/docs/api#errors for the error object.
                // More general https://stripe.com/docs/stripe.js#stripe-create-token.
                const options = {
                    name: this.name_on_card,
                }
                createToken(options).then(result => {
                    console.log({result});
                    // create hidden input with stripe token to complete transaction
                    let hiddenInput = document.createElement('input');
                    
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', result.token.id);

                    //append to form
                    this.$el.appendChild(hiddenInput);

                    // build the FormData (web API) object
                    // cycle thru each form input
                    let fd = new FormData();
                    Object.keys(this.form).forEach(key => {
                        fd.append(key, this.form[key])
                    })

                    // append hidden input to FormData object
                    fd.append('stripeToken', result.token.id);

                    if(this.isOneTime) {

                        // send to our server to process onetime payment
                        axios.post("/api/make_donation", fd, {headers: {'Content-Type': 'multipart/form-data'}}).then(({data}) => {

                            this.$store.dispatch('dnFormSuccess');

                            console.log("[DONATION FORM MODAL - PAY()] -- PAYMENT PROCESSED")
                            console.log("TOKEN: " + result.token.id);

                            this.resetForm();
                        
                        }).catch((error) => {
                            console.log(error.response.data.message);

                            this.$store.dispatch('endLoading');

                        })

                    } else if(this.isMonthly) {
                        axios.post("/api/monthly_donation", fd, {headers: {'Content-Type': 'multipart/form-data'}}).then(({data}) => {
                            console.log("MONTHLY CALL MADE");
                            console.log(data);

                            // this.$notify({
                            //     group: 'notifications',
                            //     title: 'THANK YOU, ' +  this.form.firstName + '!',
                            //     text: 'Account information has been sent to ' + this.form.email + '.',
                            //     duration: '30000',
                            //     width: '100%',
                            // });

                            this.$emit('endLoading');

                        }).catch((error) => {
                            console.log(error.response.data.message);

                            this.$store.dispatch('endLoading')

                        })
                    }
                })
            },

            donate(event, amt) {
                
                this.donateClear();
                this.form.amount = amt;

                console.log(this.amount);
            }, 

            donateClear() {
                this.ten = false;
                this.twentyFive = false;
                this.fifty = false;
                this.hundred = false;
            },

            clearButtons() {
                console.log("clearButtons()");
                this.ten=false;
                this.twentyFive=false;
                this.fifty=false;
                this.hundred=false;
            },

            personalDonation(e) {
                e.preventDefault();
                console.log("[PERSONAL DONATION SELECTED]");

                this.form.honoreeName = 'honoree';
                this.form.recipientName = 'Recipient Name';
                this.form.recipientEmail = 'recipient@example.com';
                this.form.recipientMessage = 'Message to recipient';
                
                this.form.isEmail = false;
                this.form.isSnail = false;
                this.form.personal = true;
                this.form.inHonor = false;
                this.form.inMemory = false;
            },

            memoryDonation(e) {
                e.preventDefault();
                console.log("[IN MEMORY DONATION SELECTED]");
                this.form.personal = false;
                this.form.inHonor = false;
                this.form.inMemory = true;

                this.form.honoreeName = '';
                this.form.recipientName = '';
                this.form.recipientEmail = '';
                this.form.recipientMessage = '';
            },

            honorDonation(e) {
                e.preventDefault();
                console.log("[IN HONOR DONATION SELECTED]");
                this.form.personal = false;
                this.form.inHonor = true;
                this.form.inMemory = false;

                this.form.honoreeName = '';
                this.form.recipientName = '';
                this.form.recipientEmail = '';
                this.form.recipientMessage = '';
            },

            sendEmail(e) {
                e.preventDefault();

                this.form.sendEmail = true;
                this.form.sendSnail = false;
            },

            sendSnail(e) {
                e.preventDefault();

                this.form.sendEmail = false;
                this.form.sendSnail = true;
            },

            resetForm() {

                this.ten = true;
                this.twentyFive = false;
                this.fifty = false;
                this.hundred = false;

                this.form.amount = '10';
                this.form.emailDnForm = '';
                this.form.name_on_card = '';
                this.form.firstNameDnForm = '';
                this.form.lastNameDnForm = '';
                this.form.passwordDnForm = '';
                this.form.repeatPasswordDnForm = '';
                this.form.firstNameDnForm = '';
                this.form.lastNameDnForm = '';

                this.form.personal = true;
                this.form.inHonor = false;
                this.form.inMemory = false;
                this.form.honoreeName = 'honoree';
                this.form.recipientName = 'Recipient Name';
                this.form.recipientEmail = 'recipient@example.com';
                this.form.recipientMessage = 'Message to recipient';
                
                
                /* reset/clear native browser form validation state */
                this.show = false;
                
                this.$nextTick(() => {
                    this.show = true
                });
            },

            toggleMonthly(e) {
                e.preventDefault();

                this.form.password = '';
                this.form.password = '';
                this.$store.dispatch('setMonthly');
            },

            toggleOneTime(e) {
                e.preventDefault();

                this.form.password = 'password';
                this.form.repeatPassword = 'password';
                this.$store.dispatch('setOneTime');
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
  
    .form-box {
        border: 1px solid #fd7e14;
        border-radius: 6px;
        margin: 1rem;
        padding: 1rem;
    }
    
</style>
