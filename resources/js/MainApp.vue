<template>  
    
    <div class="container-fluid">

        <div class="loader" v-if="this.$store.state.loading"></div>
        
        <router-view name="header"/>
        <router-view/>
        <router-view name="footer"/>

        <notifications style="position: fixed; bottom: 0; z-index: 100;"></notifications>
        
        <!-- MODALS -->
        
        <modal :show.sync="this.$store.state.modals.dnForm" headerClasses="justify-content-center">
            <h4 slot="header" class="title title-up"></h4>
            
            <donation-form></donation-form>

            <template slot="footer">
                <n-button type="danger" @click.native="hideModal">Close</n-button>
            </template>
        </modal>

        <modal :show.sync="this.$store.state.modals.cpForm" headerClasses="justify-content-center" data-backdrop="static" 
             data-keyboard="false">
            <h4 slot="header" class="title title-up"></h4>
            
            <care-package></care-package>

            <template slot="footer">
                <n-button type="danger" @click.native="hideModal">Close</n-button>
            </template>
        </modal>

        <modal :show.sync="this.$store.state.modals.fnForm" headerClasses="justify-content-center">
            <h4 slot="header" class="title title-up"></h4>
            
            <assistance-form></assistance-form>

            <template slot="footer">
                <n-button type="danger" @click.native="hideModal">Close</n-button>
            </template>
        </modal>

        <modal :show.sync="this.$store.state.modals.login" modal-classes="modal-mini" headerClasses="justify-content-center" class="modal-default">
            <h4 slot="header" class="title title-up"></h4>
            
            <login/>

            <template slot="footer">
                <n-button type="danger" @click.native="hideModal">Close</n-button>
            </template>
        </modal>

        

    </div>
</template>

<script>   

    import { EventBus } from './event-bus.js'

    import { mapGetters, mapActions } from 'vuex';
    import { Card, Button, FormGroupInput, Tabs, TabPane, Parallax, Modal } from '@/components';
    
    import Notifications from './pages/components/Notifications'
    import DonationForm from './components/DonationForm.vue'
    import CarePackage from './components/CarePackageForm.vue'
    import AssistanceForm from './components/AssistanceForm.vue'
    import Login from './components/LoginComponent.vue'

    export default {
        name: "MainApp",
        data() {
            return {
                loading: false,
            }
        },
        components: {
            Modal,
            [Button.name]: Button,
            DonationForm,
            Notifications,
            CarePackage,
            AssistanceForm,
            Login,
        },
        methods: {
            init() {
                this.$store.dispatch('getAllUsers');
            },
            
            hideModal() {
                this.$store.dispatch('hideModal');
            }
        },
        computed: mapGetters(['isAuthenticated', 'isMonthly', 'isOneTime']),
        
        // methods: mapActions(['login']),
        created() {
            if (this.$store.state.users.length === 0) {
                this.init();
            }
        },
        mounted() {
            // if (window.auth.check()) {
            //     this.$router.push('dashboard');
            // }
            EventBus.$on('showDnForm', () => {
                this.$store.dispatch('setOneTime');
            })

            EventBus.$on('showFnForm', () => {
                this.$store.dispatch('showFnForm');
            })

            EventBus.$on('showCpForm', () => {
                this.$store.dispatch('showCpForm');
            })


            EventBus.$on('setOneTime', () => {
                this.$store.dispatch('setOneTime');
            })

            EventBus.$on('setMonthly', () => {
                this.$store.dispatch('setMonthly');
            })

            
            EventBus.$on('dnFormSubmit', () => {
                this.$store.dispatch('hideModal');
            })

            EventBus.$on('showLogin', () => {
                this.$store.dispatch('showLogin');
            })

            EventBus.$on('hideModal', () => {
                this.$store.dispatch('hideModal');
            })

            EventBus.$on('startLoading', () => {
                this.$store.dispatch('startLoading');
            })

            EventBus.$on('endLoading', () => {
                this.$store.dispatch('endLoading');
            })

            EventBus.$on('logout', () => {
                this.$store.dispatch('logout');
            })


        }
    }

</script>

<style>
    * {
        margin: 0;
        padding: 0;
        max-width: 100vw;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .credit {
        font-size: .7rem;
        color: white;
        z-index: 100;
        position: absolute;
        bottom: 0;
        right: 10;
    }

    .StripeElement {
        box-sizing: border-box;

        height: 40px;

        padding: 10px 12px;

        border: 1px solid #ccd0d2;
        border-radius: 4px;
        background-color: white;

        box-shadow: inset 0 1px 1px rgba(0, 0, 0,.075);
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }

    /* animations and transitions */
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8*/ {
        opacity: 0;
    }

</style>
