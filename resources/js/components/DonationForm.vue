<template>

    <div v-if="show">

        <form>
            
            <h3 class="center" v-if="isMonthly">MONTHLY DONATION</h3>
            <h3 class="center" v-if="isOneTime">ONE TIME DONATION</h3>
            <h3 class="center">TO {{ getFund }}</h3>

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
                    <div class="col-md-3 ml-auto mr-auto"><n-button @click.prevent.native="donate('25')"   block round type="primary"><span :class="{ red: isTwentyFive }"><i class="fa fa-heart"></i></span>$25</n-button></div>
                    <div class="col-md-3 ml-auto mr-auto"><n-button @click.prevent.native="donate('50')"   block round type="primary"><span :class="{ red: isFifty }"><i class="fa fa-heart"></i></span>$50</n-button></div>
                    <div class="col-md-3 ml-auto mr-auto"><n-button @click.prevent.native="donate('100')" block round type="primary"><span :class="{ red: isHundred }"><i class="fa fa-heart"></i></span>$100</n-button></div>
                    <div class="col-md-3 ml-auto mr-auto"><n-button @click.prevent.native="donate('250')"   block round type="primary"><span :class="{ red: isTwoFifty }"><i class="fa fa-heart"></i></span>$250</n-button></div>
                </div>

                <div class="row">
                    <div class="col-md-12 center">
                        <h4 class="amount">Or Enter An Amount:</h4>
                    </div>
                
                    <div class="col-md-6 offset-md-3" style="font-size: 1.5rem;">
                        <fg-input
                                id="amount"
                                v-on:input="clearButtons"
                                :class="{ 'has-danger': $v.form.amount.$invalid && $v.form.amount.$dirty, 'has-success': !$v.form.amount.$invalid }"
                                type="number"
                                step="1"
                                min="10"
                                addon-left-icon="fa fa-dollar-sign"
                                v-model="form.amount"
                                required/>
                    </div>

                    <h4 class="ml-auto mr-auto" v-if="isMonthly">MONTHLY DONATION OF ${{ form.amount }}</h4>
                    <h4 class="ml-auto mr-auto" v-if="isOneTime">ONE TIME DONATION OF ${{ form.amount }}</h4>
                </div>
                
            </div>

            <div class="form-box">
                <!-- DONATION TYPE == IN HONOR/MEMORY -->
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="center">DONATION TYPE: {{ donationType }}</h3>
                        <h5 style="text-align: center;">Choose whether this donation is to be made in memory of a loved one.</h5>
                    </div>
                </div>  

                <div class="row center" id="donationType">
                    <div class="col-md-6"><n-button type="primary" @click.prevent.native="isPersonal" block>Personal</n-button></div>
                    <div class="col-md-6"><n-button type="primary" @click.prevent.native="isMemorial" block>In Memory Of</n-button></div>
                </div>

                <div class="form-group" id="inMemoryGroup" v-if="form.inMemory" label="In Memory Of">
                    <label>In Memory Of</label>
                    <fg-input id="honoreeName"
                    placeholder="Honoree"
                    type="text"
                    v-model="form.honoreeName"/>
                </div>

                <div class="form-group" id="recipientInfoGroup" v-if="form.inMemory">
                    <n-button v-if="!notify" type="primary" @click.prevent.native="toggleNotify" block>I'd like to notify someone</n-button>
                    <n-button v-if="notify" type="primary" @click.prevent.native="toggleNotify" block>Don't notify anyone</n-button>
                </div>

                <div class="form-group" id="recipientGroup" v-if="form.inMemory && isNotify" label="Recipient Name">
                    <label for="recipientNameDnForm">Recipient's Name</label>
                    <fg-input 
                        id="recipientNameDnForm"
                        placeholder="Recipient's Name"
                        type="text"
                        v-model="form.recipientName"/>
                </div>

                <!-- IF EMAIL -->
                <div class="form-group" id="recipientEmailGroup" v-if="form.inMemory && isNotify" label="Recipient Email">
                    <label for="recipientEmailDnForm">Recipient's Email</label>
                    <fg-input 
                        id="recipientEmailDnForm"
                        placeholder="Recipient's Email"
                        type="email"
                        v-model="form.recipientEmail"/>
                </div>

                <div class="form-group" id="recipientMessageGroup" label="Message for recipient" v-if="form.inMemory && isNotify">
                        <label>Message: </label>
                        <textarea name="message" class="form-control" id="recipientMessage" rows="6" v-model="form.recipientMessage"></textarea>
                </div>
            </div>
            
            <!-- YOUR INFORMATION  -->            

            <div class="form-box">
                <h3 class="center">YOUR INFORMATION</h3>

                <div class="col-md-12" v-if="isMonthly">To begin automatic monthly donations, we'll need to create an account for you. With your email and password, you'll be able to log in and view, update or cancel your donation at any time.</div>

                <h6 class="center" v-if="$v.form.$dirty">Fields marked with a red <span style="color: red;">X</span> are required</h6>
                
                <div class="form-group">
                    <label for="firstNameDnForm">First Name</label>
                    <fg-input 
                            id="firstNameDnForm"
                            :class="{ 'has-danger': $v.form.firstName.$invalid && $v.form.firstName.$dirty, 'has-success': !$v.form.firstName.$invalid}"
                            placeholder="First Name "
                            v-model="form.firstName"
                            required/>
                </div>

                <div class="form-group">
                    <label for="lastNameDnForm">Last Name</label>
                    <fg-input
                            id="lastNameDnform"
                            :class="{ 'has-danger': $v.form.lastName.$invalid && $v.form.lastName.$dirty, 'has-success': !$v.form.lastName.$invalid }"
                            placeholder="Last Name"
                            v-model="form.lastName"
                            required/>
                </div>

                <div class="form-group">
                    <label for="emailDnForm">Email</label>
                    <fg-input
                            id="emailDnForm"
                            :class="{ 'has-danger': $v.form.email.$invalid && $v.form.email.$dirty, 'has-success': !$v.form.email.$invalid }"
                            placeholder="Email"
                            v-model="form.email"
                            required/>
                </div>

                <!-- if monthly -->
                <div class="col-md-12" style="margin: 20px 0; padding: 20px; border: 1px solid black; " v-if="isMonthly">Please choose a secure password, of at least 8 characters. This will allow future functionality and access to your donation.</div>

                <div id="passwordLoginGroup" v-if="isMonthly">
                    
                    <div class="form-group">
                        <label for="passwordDnForm">Password</label>
                        <fg-input id="passwordDnForm"
                                :class="{ 'has-danger': $v.form.password.$invalid && $v.form.password.$dirty, 'has-success': !$v.form.password.$invalid }"
                                type="password"
                                placeholder="Password"
                                v-model="form.password" 
                                required/>
                    </div>
                    <div class="form-group">    
                        <label for="passwordDnForm">Repeat Password</label>
                        <fg-input id="repeatPassword"
                                :class="{ 'has-danger': $v.form.repeatPassword.$invalid && $v.form.repeatPassword.$dirty, 'has-success': !$v.form.repeatPassword.$invalid }"
                                type="password"
                                placeholder="Repeat Password"
                                v-model="form.repeatPassword"
                                required/>
                    </div>
                </div>
            </div>

                        <!--  PAYMENT INFO  -->
                        
            <div class="form-box">
                <!-- CC/DONOR INFORMTION -->
                <h3 class="center">PAYMENT INFORMATION</h3>

                <div class="form-group">
                    <label for="card-element">Name on Card</label>
                    <fg-input id="name_on_card"
                        :class="{ 'has-danger': $v.form.name_on_card.$invalid && $v.form.name_on_card.$dirty, 'has-success': !$v.form.name_on_card.$invalid }"
                        placeholder="Name on Card"
                        v-model="form.name_on_card"
                        required/>
                </div>

                <!-- use Stripe's card element -->
                <div class="form-group">
                    <label for="card-element">Card Information</label>
                    <card-element required></card-element>
                </div>

                <!-- CSRF Field -->
                <input type="hidden" name="_token" :value="csrf">

                <br>

                <div class="errors center" v-if="$v.form.$dirty">There are missing or incomplete fields.</div>

                <div class="form-group">
                    <div class="col-md-12 center">
                        <n-button
                                v-if="isOneTime" 
                                type="primary"
                                block
                                round
                                @click.prevent.native="makeDonation">
                                Make a One-Time Donation of ${{ form.amount }} 
                                <span v-if="form.inMemory"> In Memory of {{ form.honoreeName }} </span> to {{ getFund }}
                        </n-button>
                    </div>

                    <div class="col-md-12 center">
                        <n-button
                                v-if="isMonthly"
                                type="primary"
                                block
                                round
                                @click.prevent.native="makeDonation">
                                Begin Monthly Donation of ${{ form.amount }}
                                <span v-if="form.inMemory">In Memory of {{ form.honoreeName }} </span> to {{ getFund }}
                        </n-button>
                    </div>
                </div>
            </div>

            <div class="col-md-12 center">
                <n-button @click.prevent.native="resetForm" type="danger">RESET FORM</n-button>
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
                    fund: '',
                    amount: '25',
                    email: '',
                    password: 'password',
                    repeatPassword: 'password',
                    firstName: '',
                    lastName: '',
                    name_on_card: '',
                    inMemory: 0,
                    honoreeName: '',
                    recipientName: '',
                    recipientEmail: '',
                    recipientMessage: '',
                    fund: this.$store.state.fund,
                },
                show: true,
                notify: false,
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
                firstName: {
                    required,
                    minLength: minLength(1)
                },
                lastName: {
                    required,
                    minLength: minLength(2)
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
                    required,
                    minLength:minLength(8),
                    sameAsPassword: sameAs('password')
                },
                amount: {
                    required,
                    between: between(10, 10000)
                },
                name_on_card: {
                    required
                }
                
            }
        },
        components: {
            CardElement,
            [Button.name]: Button,
            [FormGroupInput.name]: FormGroupInput

        },
        computed: {
            isTwentyFive() {
                return !!(this.form.amount === '25');
            },
            isFifty() {
                return !!(this.form.amount === '50');
            },
            isHundred() {
                return !!(this.form.amount === '100');
            },
            isTwoFifty() {
                return !!(this.form.amount === '250');
            },

            donationType() {
                if (this.form.inMemory) {
                    return 'Memorial'
                }

                return 'Personal'
            },
            isMonthly() {
                return this.$store.state.monthly;
            },
            isOneTime() {
                return this.$store.state.oneTime;
            },
            isNotify() {
                return this.notify;
            },
            getFund() {
                let selectedFund = this.$store.state.fund;

                if (selectedFund === 'cappy') {
                    return 'THE CAPPY FUND';
                } else if (selectedFund === 'booker') {
                    return 'THE BOOKER FUND';
                } else if (selectedFund === 'maggie') {
                    return 'MAGGIE\'S MISSION';
                } else if (selectedFund === 'serenity') {
                    return 'SERENITY\'S WISH';
                } else {
                    return 'LIVE LIKE ROO'
                }
            },
        },
        methods: {
            makeDonation() {

                this.$v.form.$touch();

                if (!this.$v.form.$invalid) {
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

                        if(result.error) {
                            console.log(result.error);
                            this.$store.dispatch('cardSubmitError');
                        }
                        
                        // create hidden input with stripe token to complete transaction
                        let hiddenInput = document.createElement('input');
                        
                        hiddenInput.setAttribute('type', 'hidden');
                        hiddenInput.setAttribute('name', 'stripeToken');
                        hiddenInput.setAttribute('value', result.token.id);

                        //append to form
                        this.$el.appendChild(hiddenInput);

                        // check which fund 
                        if (!this.form.fund) {
                            this.form.fund = this.$store.state.fund;
                        };

                        // build the FormData object for each form key
                        let fd = new FormData();
                        Object.keys(this.form).forEach(key => {
                            fd.append(key, this.form[key])
                        })
                        
                        // append hidden input to FormData object
                        fd.append('stripeToken', result.token.id);

                        // Make the call to our server to process donation using Stripe result.token.id 

                        if(this.isOneTime) {

                            fd.append('role', 'donor');
                            
                            axios.post("/api/make_donation", fd, {headers: {'Content-Type': 'multipart/form-data'}}).then(({data}) => {

                                this.resetForm();
                                this.$store.dispatch('dnFormSuccess');

                            }).catch((error) => {
                                
                                this.$store.dispatch('dnFormError');

                            })

                        } else if(this.isMonthly) {

                            fd.append('role', 'monthly_donor');
                            
                            axios.post("/api/monthly_donation", fd, {headers: {'Content-Type': 'multipart/form-data'}}).then(({data}) => {

                                this.resetForm();
                                this.$store.dispatch('dnFormSuccess');

                            }).catch((error) => {

                                this.$store.dispatch('dnFormError');

                            })
                        }
                    })
                }
            },
            toggleNotify() {

                this.notify = !this.notify;

            },

            donate(amt) {
                this.form.amount = amt;

            }, 

            clearButtons() {
                this.ten=false;
                this.twentyFive=false;
                this.fifty=false;
                this.hundred=false;
            },

            isPersonal() {
                
                this.form.honoreeName = '';
                this.form.recipientName = '';
                this.form.recipientEmail = '';
                this.form.recipientMessage = '';
            
                this.form.inMemory = 0;
            },

            isMemorial() {

                this.form.honoreeName = '';
                this.form.recipientName = '';
                this.form.recipientEmail = '';
                this.form.recipientMessage = '';
            
                this.form.inMemory = 1;
            },

            resetForm() {

                this.form.amount = '25';
                this.form.name_on_card = '';
                this.form.firstName = '';
                this.form.lastName = '';
                this.form.email = '';
                this.form.password = 'password';
                this.form.repeatPassword = 'password';

                this.form.inMemory = 0;
                this.form.honoreeName = '';
                this.form.recipientName = '';
                this.form.recipientEmail = '';
                this.form.recipientMessage = '';
                
                /* reset/clear native browser form validation state */
                this.show = false;
                
                this.$nextTick(() => {
                    this.show = true;
                    this.$v.$reset();
                });
            },

            toggleMonthly() {

                this.form.password = '';
                this.form.repeatPassword = '';
                this.$store.dispatch('setMonthly');
            },

            toggleOneTime() {

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

    .amount {
        line-height: 1rem;
        text-align: center;
        margin: 1rem 0;
        padding: 0;
    }
  
    .form-box {
        border: 1px solid #fd7e14;
        border-radius: 6px;
        margin: 1rem;
        padding: 1rem;
    }

    .red {
        color: red !important;
    }
    
</style>
