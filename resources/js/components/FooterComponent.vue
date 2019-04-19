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
                        <router-link to="/">
                            <span v-on:click="showLogin">LOGIN</span>
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
        }
    },
  }
</script>
<style>
</style>
