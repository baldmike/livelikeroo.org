<template>
    <transition name="fade"> 
        <div class="features-4">
        <div class="container">
            <div class="row" id="faq">
                <br>
                <div class='col-md-6 offset-md-3'>
                    <br><br><br>
                    <h1>FAQ</h1>
                    <div class="fa-q"><span class="faq-highlight">Q</span> My pet was just diagnosed with cancer, where do I start?</div>
                    <div class="faq-answer"><span class="faq-highlight">a</span> Talk to your vet at length. Look for cancer specific groups on Facebook as true, real life experience is invaluable. Listen to others that have gone through it. Most importantly, snag a care package from us <router-link to="care_package">HERE</router-link>. </div>

                    <hr>

                    <div class="fa-q"><span class="faq-highlight">Q</span> Can I request a care package for someone else?</div>
                    <div class="faq-answer"><span class="faq-highlight">a</span> Yes, just use their name and address and your email. We humbly request a donation of at least $10, but our goal is help everyone we can, regardless of their ability to pay.</div>

                    <hr>

                    <div class="fa-q"><span class="faq-highlight">Q</span> Can you recommend vets or specialists?</div>
                    <div class="faq-answer"><span class="faq-highlight">A</span>  Because we are nationwide, it is tough to do that. Locally, however, we have a partnership with <a href="https://www.blvd.vet/river-north/" target="_blank">Boulevard Vet</a> in Chicago, but we are happy to research vets in your area that may be good once we've reviewed your application.</div>

                    <hr>

                    <div class="fa-q"><span class="faq-highlight">Q</span> How can I help?</div>
                    <div class="faq-answer"><span class="faq-highlight">A</span>  <router-link class="r-link" to="donate"> Donate! </router-link>. You can also help by visiting our <a href="https://www.amazon.com/gp/registry/wishlist/3AYP9KC33K3AU/ref=cm_sw_su_w" target="_blank"> Amazon Wish List. </a> We also always need blankets tied and handmade cards for our care packages! For more information, please <router-link class="r-link" to="contact"> contact us.</router-link></div>


                    <hr>

                    <div class="fa-q"><span class="faq-highlight">Q</span> Are you a rescue?</div>
                    <div class="faq-answer"><span class="faq-highlight">A</span>  No, we are a 501-c3 charitable foundation (EIN: 47-4770782) who assist pets and their families through cancer diagnoses. However, we have now partnered with Lulu’s Locker Rescue to assist and home animals that are in danger of euthanasia, face major medical issues or are no longer able to be cared for by their owner. For more on The Hot Mess Express, click <a href="www.facebook.com/The-Hot-Mess-Express-285509102269571/" target="_blank">HERE.</a></div>

                    <hr>

                    <div class="fa-q"><span class="faq-highlight">Q</span> Does Live Like Roo assist only dogs?</div>
                    <div class="faq-answer"><span class="faq-highlight">A</span> No! We have not only assisted with the care of dogs, but cats, rabbits, ferrets and horses as well!</div>

                    <hr>

                </div>
            </div>
        </div>
        </div>
    </transition>
</template>

<script>

    export default {
        name: 'FAQ',
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

    .fa-q {
        font-size: 1.2rem;
        text-transform: uppercase;
        color: black;
    }
    .faq-answer {
        color: gray;
    }

    .faq-highlight {
        text-transform: uppercase;
        font-weight: 900;
        font-size: 1.2rem;
        color: #fd7e14
    }
</style>