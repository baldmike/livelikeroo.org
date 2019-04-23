<template>
    
    <transition name="fade">
        <div>

            <landing-page/>
    
            <donate-component/>
            <care-package/>        
            <assistance-component/>
            <team-component />
            <events-component />
            
            <br><br>
            <div class="separator-line separator-primary"></div>
            <br><br>
            
            <partner-component />

        </div>
    </transition>
    
</template>

<script>

    import LandingPage from '../components/LandingPage'
    import DonateComponent from '../components/DonateComponent'
    
    import CarePackage from '../components/CarePackageComponent'
    import AssistanceComponent from '../components/AssistanceComponent'
    import EventsComponent from '../components/EventsComponent'
    import PartnerComponent from '../components/PartnerComponent'
    import TeamComponent from '../components/TeamComponent'

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
            AssistanceComponent,
            PartnerComponent,
            TeamComponent
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
    @import "../../sass/now-ui-kit/variables";
</style>