<template>  
    
    <div class="container-fluid">

        <div class="loader" v-if="this.$store.state.loading"></div>
        <notifications style="position: absolute; top: 45%; z-index: 100;"></notifications>
        <router-view name="header"/>
        <router-view/>
        <router-view name="footer"/>

        <!-- MODALS -->
        <modal :show.sync="this.$store.state.modals.dnForm" headerClasses="justify-content-center">
            <h4 slot="header" class="title title-up"></h4>
            
            <donation-form></donation-form>

            <template slot="footer">
                <n-button type="danger" @click.native="hideModal">Close</n-button>
            </template>
        </modal>

        <modal :show.sync="this.$store.state.modals.cpForm" headerClasses="justify-content-center">
            <h4 slot="header" class="title title-up"></h4>
            
            <care-package></care-package>

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

    export default {
        name: "mainApp",
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
            CarePackage
        },
        methods: {
            init() {
                this.$store.dispatch('getAllUsers');
                console.log("[MainApp] - init method");
            },
            startLoading() {
                this.loading = true;
            },
            endLoading() {
                this.loading = false;
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
            console.log('[MainApp] Component CREATED.')
        },
        mounted() {
            console.log('[MainApp] Component MOUNTED.')
            // if (window.auth.check()) {
            //     this.$router.push('dashboard');
            // }
            EventBus.$on('showDnForm', () => {
                console.log("[MainApp] --> showDnForm - EventBus");
                this.$store.dispatch('setOneTime');
            })

            EventBus.$on('setOneTime', () => {
                console.log("[MainApp] --> showDnForm - EventBus");
                this.$store.dispatch('setOneTime');
            })

            EventBus.$on('setMonthly', () => {
                console.log("[MainApp] --> showDnForm - EventBus");
                this.$store.dispatch('setMonthly');
            })

            EventBus.$on('dnFormSubmit', () => {
                console.log("[MainApp] --> dnFormSubmit - EventBus");
                this.$store.dispatch('hideModal');
            })

            EventBus.$on('startLoading', () => {
                console.log("[MainApp] --> startLoading - EventBus");
                this.$store.dispatch('startLoading');
            })

            EventBus.$on('endLoading', () => {
                console.log("[MainApp] --> endLoading - EventBus");
                this.$store.dispatch('endLoading');
            })

            EventBus.$on('showCpForm', () => {
                console.log("[MainApp] --> showCpForm - EventBus");
                this.$store.dispatch('showCpForm');
            })

            EventBus.$on('hideModal', () => {
                console.log("[MainApp] --> showCpForm - EventBus");
                this.$store.dispatch('hideModal');
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
