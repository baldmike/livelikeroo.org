<template>  
    <div>

        <!-- notification bar -->
        <div class="loader" v-if="loading"></div>

        <router-view name="header"/>
        <router-view/>
        <router-view name="footer"/>

    </div>

</template>

<script>   

    import { EventBus } from './event-bus.js'

    import { mapGetters, mapActions } from 'vuex';

    export default {
        name: "mainApp",
        data() {
            return {
                loading: false,
            }
        },
        components: {

            
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

</style>
