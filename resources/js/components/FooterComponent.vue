<template>
    <footer class="footer"
            :class="{[`footer-${type}`]: type}"
            :data-background-color="backgroundColor">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-12 col-md-2 ml-auto mr-auto">
                    <a href="https://www.amazon.com/gp/registry/wishlist/3AYP9KC33K3AU/ref=cm_sw_su_w" target="_blank"><img src="images/amazonWishlist.jpeg" alt="Amazon wishlist link"></a>
                </div>
            </div>

            <div class="row social-footer">
                <div class="col-12 ml-auto mr-auto">        
                    <a href="https://www.facebook.com/LiveLikeRoo/" target="_blank" class="social-links"><i class="fab fa-facebook-square"></i></a>
                    
                    <a href="https://www.instagram.com/livelikeroofoundation/?hl=en" target="_blank" class="social-links"><i class="fab fa-instagram"></i></a>

                    <a href="https://www.twitter.com/livelikeroo/?hl=en" target="_blank" class="social-links"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            
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
                    <!-- <li>
                        <a href="/nova">LOGIN</a>
                    </li> -->
                    
                    <li>
                        <router-link to="" v-if='!isAuthenticated'>
                            <span v-on:click="showLogin">DONOR LOGIN</span>
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
                &copy; {{year}}, The <a href="/nova">Live Like Roo</a> Foundation - Designed and Developed with Love by 
                <a href="https://noproblemsonly.solutions" target="_blank">Bald Mike</a>
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
            EventBus.$emit('showLogin');
        },
        logout(){
            EventBus.$emit('logout');

            let self = this;
            setTimeout(function(){ self.$store.dispatch('clearNotifications'); }, 3000);
        }
    },
    computed: mapGetters(['isAuthenticated', 'isMonthly', 'isOneTime']),
    }
</script>

<style lang="scss">
    @import "../../sass/now-ui-kit/variables";

    .social-footer {
        height: 80px;
        font-size: 3rem;
        margin-bottom: 50px;
        color: black;
     
    }

    .social-links {
        margin: 0 5vw;
    }
</style>
