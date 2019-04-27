<template>

    <div v-if="show">

        <form id="donation-form" @submit.prevent="pay()" @reset="resetForm()">
            
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
                    <div class="col-md-3 ml-auto mr-auto"><n-button @click.prevent.native="donate($event,'10')"   outline round type="primary" :class="{ red: isTen }"><i class="fa fa-heart"></i>  $10</n-button></div>
                    <div class="col-md-3 ml-auto mr-auto"><n-button @click.prevent.native="donate($event,'25')"   outline round type="primary" :class="{ red: isTwentyFive }"><i class="fa fa-heart"></i> $25</n-button></div>
                    <div class="col-md-3 ml-auto mr-auto"><n-button @click.prevent.native="donate($event,'50')"   outline round type="primary" :class="{ red: isFifty }"><i class="fa fa-heart"></i> $50</n-button></div>
                    <div class="col-md-3 ml-auto mr-auto"><n-button @click.prevent.native="donate($event,'100')" outline round type="primary" :class="{ red: isHundred }"><i class="fa fa-heart"></i>$100</n-button></div>
                </div>

                <div class="row">
                    <div class="col-md-12 center">
                        <h4 class="amount">Or Enter An Amount:</h4>
                    </div>
                
                    <div class="col-md-6 offset-md-3" style="font-size: 1.5rem;">
                        <fg-input
                        style="text-align: center !important;"
                        class="amount"
                        id="amount"
                        v-on:input="clearButtons"
                        type="number"
                        v-model="form.amount"
                        required/>
                    </div>

                    <h4 class="ml-auto mr-auto" v-if="isMonthly">MONTHLY DONATION OF ${{ form.amount }}.00</h4>
                    <h4 class="ml-auto mr-auto" v-if="isOneTime">ONE TIME DONATION OF ${{ form.amount }}.00</h4>
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
                    <n-button v-if="notify" type="primary" @click.prevent.native="toggleNotify" block>Shh! Don't tell anyone!</n-button>
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

                <br><br>
                <small>Fields marked with a red <span style="color: red;">X</span> are required</small>
                
                <div class="form-group has-success" :class="{ 'has-danger': !$v.form.firstName.required }">
                    <label for="firstNameDnForm">First Name</label>
                    <fg-input 
                            id="firstNameDnForm"
                            class="input-lg"
                            placeholder="First Name "
                            v-model="form.firstName"
                            required
                            :state="!$v.form.firstName.required">
                    </fg-input>
                </div>

                <div class="form-group has-success" :class="{ 'has-danger': $v.form.lastName.$invalid }">
                    <label for="lastNameDnForm">Last Name</label>
                    <fg-input
                            id="lastNameDnform"
                            class="input-lg"
                            placeholder="Last Name"
                            v-model="form.lastName"
                            required
                            :state="!$v.form.lastName.$invalid">
                    </fg-input>
                </div>

                <div class="form-group has-success" :class="{ 'has-danger': $v.form.email.$invalid }">
                    <label for="emailDnForm">Email</label>
                    <fg-input
                            id="emailDnForm"
                            class="input-lg"
                            placeholder="Email"
                            v-model="form.email"
                            :state="!$v.form.email.$invalid">
                    </fg-input>
                </div>

                

                <!-- if monthly -->

                <div class="col-md-12" style="margin: 20px 0; padding: 20px; border: 1px solid black; " v-if="isMonthly">Please choose a secure password below. Your email and password will allow you to log in, view and edit your account from the website.</div>


                <div id="passwordLoginGroup" v-if="isMonthly">
                    
                    <div class="form-group has-success" :class="{ 'has-danger': $v.form.password.$invalid }">
                        <label for="passwordDnForm">Password</label>
                        <fg-input id="passwordDnForm"
                                type="password"
                                placeholder="Password"
                                v-model="form.password" 
                                required 
                                :state="!$v.form.password.$invalid"/>
                    </div>
                    <div class="form-group has-success" :class="{ 'has-danger': $v.form.repeatPassword.$invalid }">    
                        <label for="passwordDnForm">Repeat Password</label>
                        <fg-input id="repeatPassword"
                                type="password"
                                placeholder="Repeat Password"
                                v-model="form.repeatPassword"
                                :state="!$v.form.repeatPassword.$invalid"
                                required/>
                    </div>
                </div>
            </div>

                        <!--  PAYMENT INFO  -->
                        
            <div class="form-box">
                <!-- CC/DONOR INFORMTION -->
                <h3 class="center">PAYMENT INFORMATION</h3>

                <div class="form-group has-success" :class="{ 'has-danger': $v.form.name_on_card.$invalid }">
                    <label for="card-element">Name on Card</label>
                    <fg-input 
                        placeholder="Name on Card"
                        id="name_on_card"
                        type="text"
                        v-model="form.name_on_card"
                        required
                        :state="!$v.form.name_on_card.$invalid"/>
                </div>

                <!-- use Stripe's card element -->
                <div class="form-group" :class="{ 'has-danger': $v.form.$invalid }" id="nameOnCardGroup">
                    <label for="card-element">Card Information</label>
                    <card-element required></card-element>
                </div>

                <!-- CSRF Field -->
                <input type="hidden" name="_token" :value="csrf">

                <br>

                <div class="form-group">
                    <div class="col-md-12 center">
                        <n-button :disabled="$v.form.$invalid"        v-if="isOneTime" type="primary"      @click.prevent.native="pay">Make a One-Time Donation of ${{ form.amount }} 
                            <span v-if="form.inMemory"> In Memory of {{ form.honoreeName }} </span> to {{ getFund }}
                        </n-button>
                    </div>
                    <div class="col-md-12 center">
                        <n-button :disabled="$v.form.$invalid" v-if="isMonthly" type="primary" @click.native="pay">Begin Monthly Donation of ${{ form.amount }}
                            <span v-if="form.inMemory">In Memory of {{ form.honoreeName }} </span> to {{ getFund }}
                        </n-button>
                    </div>
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
                    fund: '',
                    amount: 25,
                    email: '',
                    password: 'password',
                    repeatPassword: 'password',
                    firstName: '',
                    lastName: '',
                    ten: false,
                    twentyFive: false,
                    fifty: true,
                    hundred: false,
                    name_on_card: '',
                    inMemory: 0,
                    honoreeName: '',
                    recipientName: '',
                    recipientEmail: '',
                    recipientMessage: '',
                    fund: 'roo'
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
                    required
                },
                lastName: {
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
                },
                amount: {
                    required
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
            isTen() {
                return !!(this.form.amount = 10);
            },
            isTwentyFive() {
                return !!(this.form.amount = 25);
            },
            isFifty() {
                return !!(this.form.amount = 50);
            },
            isHundred() {
                return !!(this.form.amount = 100);
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

                    if(result.error) {
                        this.$store.dispatch('cardSubmitError');
                    }
                    
                    console.log({result});
                    // create hidden input with stripe token to complete transaction
                    let hiddenInput = document.createElement('input');
                    
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', result.token.id);

                    //append to form
                    this.$el.appendChild(hiddenInput);

                    // build the FormData object - by using forEach, we won't miss any inputs
                    let fd = new FormData();
                    Object.keys(this.form).forEach(key => {
                        fd.append(key, this.form[key])
                    })

                    // append hidden input to FormData object
                    fd.append('stripeToken', result.token.id);

                    if(this.isOneTime) {

                        // send to our server to process onetime payment
                        axios.post("/api/make_donation", fd, {headers: {'Content-Type': 'multipart/form-data'}}).then(({data}) => {

                            this.resetForm();
                            console.log("----------->[DONATION FORM MODAL - PAY()] -- PAYMENT PROCESSED")
                            this.$store.dispatch('dnFormSuccess');

                            console.log("[DONATION FORM MODAL - PAY()] -- PAYMENT PROCESSED")
                            console.log("TOKEN: " + result.token.id);

                            
                        
                        }).catch((error) => {
                            console.log(error.response.data.message);
                            
                            this.$store.dispatch('endLoading');

                        })

                    } else if(this.isMonthly) {
                        axios.post("/api/monthly_donation", fd, {headers: {'Content-Type': 'multipart/form-data'}}).then(({data}) => {

                            this.resetForm();
                            this.$store.dispatch('endLoading');
                            this.$store.dispatch('dnFormSuccess');

                        }).catch((error) => {
                            console.log(error.response.data.message);

                            this.$store.dispatch('endLoading')

                        })
                    }
                })
            },
            toggleNotify() {
                this.notify = !this.notify;
            },

            donate(event, amt) {
                
                this.donateClear();
                console.log("THE AMT IS---------->  " + amt);
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

            isPersonal() {
                
                this.form.honoreeName = 'honoree';
                this.form.recipientName = 'Recipient Name';
                this.form.recipientEmail = 'recipient@example.com';
                this.form.recipientMessage = 'Message to recipient';
            
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

                this.ten = true;
                this.twentyFive = false;
                this.fifty = false;
                this.hundred = false;

                this.form.amount = '10';
                this.form.name_on_card = '';
                this.form.firstName = '';
                this.form.lastName = '';
                this.form.email = '';
                this.form.password = 'password';
                this.form.repeatPassword = 'password';

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

            toggleMonthly() {

                this.form.password = '';
                this.form.password = '';
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
        color: red;
    }
    
</style>
