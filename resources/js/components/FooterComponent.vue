<template>
    <footer class="footer"
            :class="{[`footer-${type}`]: type}"
            :data-background-color="backgroundColor">
        <div class="container">
            <nav>
                <ul>
                    <li>
                        <router-link to="faq">FAQ</router-link>
                    </li>
                    <li>
                        <router-link to="privacy">PRIVACY POLICY</router-link>
                    </li>
                    <li>
                        <router-link to="contact">CONTACT</router-link>
                    </li>
                    <li>
                        <router-link to="" v-if='!isAuthenticated'>
                            <span v-on:click="showLogin">LOGIN</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link to="dashboard" v-if="isAuthenticated">DASHBOARD
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/" v-if="isAuthenticated">
                            <span v-on:click="logout">LOGOUT</span>
                        </router-link>
                    </li>
                </ul>
            </nav>

            <div class="copyright">
                &copy; {{year}}, The Live Like Roo Foundation - From the Fingers of 
                <a href="https://github.com/baldmike" target="_blank">Bald Mike</a>
            </div>
        </div>
    </footer>
</template>

<script>

    import { mapActions, mapGetters } from "vuex";
    import { EventBus } from '../event-bus.js';

    export default {
        props: {
        backgroundColor: String,
        type: String
    },
    data(){
        return {
            year: new Date().getFullYear()
        }
    },
    methods: {
        showLogin(){
            console.log('LOGIN ATTEMPTED');
            EventBus.$emit('showLogin');
        },
        logout(){
            console.log('[FooterComponent] - logout');
            EventBus.$emit('logout');

            // let payload = {
            //     message: "You have successfully logged out.",
            //     type: 'info',
            // }

            // this.$store.dispatch('notify', payload);
            let self = this;

            setTimeout(function(){ self.$store.dispatch('clearNotifications');; }, 3000);
        }
    },
    computed: mapGetters(['isAuthenticated', 'isMonthly', 'isOneTime']),
    }
</script>

<style>
</style>
