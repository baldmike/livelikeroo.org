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
                        <router-link to="login">LOGIN</router-link>
                    </li>
                </ul>
            </nav>
            <div class="copyright">
                &copy; {{year}}, The Live Like Roo Foundation - Designed and Coded by
                <a href="https://github.com/baldmike" target="_blank">Bald Mike</a>
            </div>
        </div>
    </footer>
</template>
<script>
  export default {
    props: {
      backgroundColor: String,
      type: String
    },
    data(){
      return {
        year: new Date().getFullYear()
      }
    }
  }
</script>
<style>
</style>
