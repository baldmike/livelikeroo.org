<template>
    
    <transition name="fade">
        <div>

            <landing-page></landing-page>
            <donate-component></donate-component>
            <care-package></care-package>
            <assistance-component></assistance-component>
            <events-component></events-component>

        </div>
    </transition>
    
</template>

<script>

    import LandingPage from '../components/LandingPage'
    import DonateComponent from '../components/DonateComponent'
    import EventsComponent from '../components/EventsComponent'
    import CarePackage from '../components/CarePackageComponent'
    import AssistanceComponent from '../components/AssistanceComponent'
    
    import { EventBus } from '../event-bus.js';

    export default {
        name: 'website',
        data() {
            return {
                sent: false,
                loading: false
            }
        },
        components: {

            LandingPage,
            DonateComponent,
            EventsComponent,
            CarePackage,
            AssistanceComponent
        },
        computed: {

        },
        methods: {
            init() {
                console.log("[Website.vue init()]")
            },
            wishlist() {
                window.location.href = "https://www.amazon.com/gp/registry/wishlist/3AYP9KC33K3AU/ref=cm_sw_su_w";
            },
            
        },


        mounted() {
            this.init();
            
            console.log('Website Component created.');
        }
    }
</script>

<style lang="scss">
</style>