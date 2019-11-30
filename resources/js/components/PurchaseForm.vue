<template>

    <div v-if="show">



        <form>
        
            <!-- YOUR INFORMATION  -->            

            <div class="form-box">

                <h3 class="center">How Many You Want?</h3>

                <fg-input 
                    id="quantity"
                    :class="{ 'has-danger': $v.form.quantity.$invalid && $v.form.quantity.$dirty, 'has-success': !$v.form.quantity.$invalid}"
                    placeholder="quantity"
                    v-model="form.quantity"
                    type="number"
                    min="1"
                    max="10"
                    required/>

                <div class="order-total">
                    <p v-if="this.form.quantity">{{ orderTotal }}</p>
                </div>

                <h3 class="center">YOUR INFORMATION</h3>

                <h6 class="center" v-if="$v.form.$dirty">Fields marked with a red <span style="color: red;">X</span> are required</h6>
                
                <div class="form-group">
                    <label for="firstNameDnForm">First Name</label>
                    <fg-input 
                            id="firstNameDnForm"
                            :class="{ 'has-danger': $v.form.firstName.$invalid && $v.form.firstName.$dirty, 'has-success': !$v.form.firstName.$invalid}"
                            placeholder="First Name "
                            v-model="form.firstName"
                            required/>
                
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
                                type="primary"
                                block
                                round
                                @click.prevent.native="makeDonation">
                                Send me the goods!
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

    const zip = helpers.regex('zip', /(^\d{5}$)|(^\d{5}-\d{4}$)/);

    export default {
        name: 'DonationForm',
        

        data () {
            return {

                form: {
                    amount: '',
                    quantity: '',
                    email: '',
                    firstName: '',
                    lastName: '',
                    address1: '',
                    address2: '',
                    city: '',
                    state: '',
                    zip: '',
                    name_on_card: '',
                  
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
                address1: {
                    required
                },
                address2: {

                },
                city: {
                    required
                },
                state: {
                    required
                },
                zip: {
                    zip,
                    required
                },
                amount: {
                    required,
                    between: between(5, 10000)
                },
                quantity: {
                    required,
                    between: between(1, 10)
                },
                name_on_card: {
                    required
                },
            }
        },
        components: {
            CardElement,
            [Button.name]: Button,
            [FormGroupInput.name]: FormGroupInput

        },
        computed: {
            orderTotal() {
                return ((this.form.quantity * 10) + 10)
            },
        },
        methods: {
            makeDonation() {

                console.log("PAYMENT")

                this.$v.form.$touch();

                if (!this.$v.form.$invalid) {

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

                        //append stripe token noto form
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
                        
                        axios.post("/api/make_donation", fd, {headers: {'Content-Type': 'multipart/form-data'}}).then(({data}) => {

                            this.resetForm();
                            this.$store.dispatch('dnFormSuccess');

                        }).catch((error) => {
                            
                            this.$store.dispatch('dnFormError');

                        })

                        
                    })
                }
            },

            resetForm() {

                this.form.amount = '25';
                this.form.name_on_card = '';
                this.form.firstName = '';
                this.form.lastName = '';
                this.form.email = '';
                // this.form.password = 'password';
                // this.form.repeatPassword = 'password';
                
                /* reset/clear native browser form validation state */
                this.show = false;
                
                this.$nextTick(() => {
                    this.show = true;
                    this.$v.$reset();
                });
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
