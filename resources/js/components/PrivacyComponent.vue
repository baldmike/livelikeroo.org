<template>
    <transition name="fade">  
        <div class="row">
            <div class="col-md-6 offset-md-3" style="margin-top: 6rem;">
                <h1>Privacy Policy</h1>
                <p class="body-text">This privacy notice discloses the privacy practices for www.livelikeroo.org. This privacy notice applies solely to information collected by this website. It will notify you of the following:</p>
                <ul>
                    <li> What personally identifiable information is collected from you through the website, how it is used and with whom it may be shared.</li>
                    <li>What choices are available to you regarding the use of your data.</li>
                    <li>The security procedures in place to protect the misuse of your information.</li>
                    <li>How you can correct any inaccuracies in the information.</li>
                </ul>
                <h4>Information Collection, Use, and Sharing</h4>
                <p class="body-text">We are the sole owners of the information collected on this site. We only have access to/collect information that you voluntarily give us via email or other direct contact from you. We will not sell or rent this information to anyone.</p>
                
                <p class="body-text">We are the sole owners of the information collected on this site. We only have access to/collect information that you voluntarily give us via email or other direct contact from you. We will not sell or rent this information to anyone.</p>

                <p class="body-text">We will use your information to respond to you, regarding the reason you contacted us. We will not share your information with any third party outside of our organization, other than as necessary to fulfill your request, e.g. to ship an order.</p>

                <p class="body-text">Unless you ask us not to, we may contact you via email in the future to tell you about specials, new products or services, or changes to this privacy policy.</p>

                <h4>Your Access to and Control Over Information</h4>

                <p class="body-text">You may opt out of any future contacts from us at any time. You can do the following at any time by contacting us :</p>

                <ul>
                    <li>See what data we have about you, if any. Change/correct any data we have about </li>
                    <li>Change/correct any data we have about you.</li>
                    <li>Have us delete any data we have about you.</li>
                    <li>Express any concern you have about our use of your data.</li>
                </ul>

                <h4>Security</h4>

                <p class="body-text">We take precautions to protect your information. When you submit sensitive information via the website, your information is protected both online and offline. We use Stripe to process your donations and purchases, which means your credit card information is NOT stored on our servers - this is the ultimate level of safety.</p>

                <p class="body-text">Wherever we collect sensitive information (such as credit card data), that information is encrypted and transmitted in a secure way. You can verify this by looking for a lock icon in the address bar and looking for "https" at the beginning of the address of the Web page.</p>

                <p class="body-text">While we use encryption to protect sensitive information transmitted online, we also protect your information offline. Only employees who need the information to perform a specific job (for example, billing or customer service) are granted access to personally identifiable information. The computers/servers in which we store personally identifiable information are kept in a secure environment.</p>

                <p class="body-text"> This website contains links to other sites. Please be aware that we are not responsible for the content or privacy practices of such other sites. We encourage our users to be aware when they leave our site and to read the privacy statements of any other site that collects personally identifiable information.</p>
            </div>
        </div>
    </transition>
</template>

<script>

    export default {
        name: 'Privacy',
        components: {

        },
        data() {
            return {
                
            }
        },
        methods: {
            init() {
                console.log("[Privacy Comp -- init method");
            },
        },
        created() {
            this.init();
            console.log('Privacy Component mounted.')
        }
    }
</script>

<style lang="scss" scoped>
    
</style>