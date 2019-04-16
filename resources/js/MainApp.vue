<template>  
    <div class="container-fluid">

        <!-- add notification bar -->
        
        <div class="loader" v-if="loading"></div>

        <router-view name="header"/>
        <router-view/>
        <router-view name="footer"/>

        <!-- MODALS -->
        <modal :show.sync="this.$store.state.modals.dnForm" headerClasses="justify-content-center">
            <h4 slot="header" class="title title-up">Modal title</h4>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
            the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large
            language ocean. A small river named Duden flows by their place and supplies it with the necessary
            regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your
            mouth.</p>
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
