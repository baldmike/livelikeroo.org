<template>
    
    <transition name="fade">
        <div>

            
            <landing-page/>
            
            <cta-component/>

            <donate-component/>
            
            <care-package/>    

            <!-- <gallery/> -->

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
    import CtaComponent from '../components/CTAComponent'
    import CarePackage from '../components/CarePackageComponent'
    import AssistanceComponent from '../components/AssistanceComponent'
    import EventsComponent from '../components/EventsComponent'
    import PartnerComponent from '../components/PartnerComponent'
    import TeamComponent from '../components/TeamComponent'
    import Gallery from '../components/Gallery'

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
            TeamComponent,
            Gallery,
            CtaComponent
        },
        computed: {

        },
        methods: {
            init() {
            },
            wishlist() {
                window.location.href = "https://www.amazon.com/gp/registry/wishlist/3AYP9KC33K3AU/ref=cm_sw_su_w";
            },  
        },


        mounted() {
            this.init();
        }
    }
</script>

<style lang="scss">
    @import "../../sass/now-ui-kit/variables";

    .fade-enter-active, .fade-leave-active {
       transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
</style>