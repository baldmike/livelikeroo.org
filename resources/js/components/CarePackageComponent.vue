<template>
    <div class="features-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <card type="background" raised color="transparent" style="background-image: url('images/unsplash-brindle-beach-leio-mclaren.jpg')">
                        <template slot="info">
                            <div class="icon icon-white">
                                <i class="now-ui-icons emoticons_satisfied"></i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">Request a Care Package</h4>
                                <h4 class="description">Our Roo Cancer Care Packages include some of Roo’s favorite items-including a blanket (which has become a favorite of the packages), a gift card for McDonald’s, toys, treats, and a tennis ball. We have found that people and animals that receive these packages have their spirits lifted during one of the most difficult times of their lives. Though they are labor-intensive, we know they are the most important thing that we do because of the emotion behind each and every one. We love to see the animals living like Roo.</h4>

                                <!-- <div class="section-space"></div> -->
                                <n-button @click.prevent.native="showCpForm" type="primary" size="lg" round>Request a Care Package</n-button>
                                
                                <div class="section-space"></div>

                                <p>Please note that Roo Cancer Care Packages cost our organization approximately $70 with shipping.  While we'll work to keep care packages free for anyone who makes a request, a suggested  donation of $10 will help offset shipping costs.</p>
                            </div>

                            <div class="section-space"></div>
                            
                        </template>
                    </card>

                    <br>

                    <div class="row">
                        <div class="col-md-3 offset-md-9 credit">
                            <h6>Photo by <a href = "https://unsplash.com/@leio">Leio McLaren</a> via <a href = "https://unsplash.com">Unsplash</a></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
</template>

<script>

    import { Button, FormGroupInput, Tabs, Card, TabPane, Parallax, Modal } from '@/components';

    import { EventBus } from '../event-bus.js';

    export default {
        name: 'Assistance',
        components: {
            Card,
            [Button.name]: Button,
            [FormGroupInput.name]: FormGroupInput,
            Modal
        },
        data() {
            return {
                loading: false,
            }
        },
        computed: {},
        methods: {
            init() {
                
            },
            showCpForm() {
                
                EventBus.$emit('showCpForm');
            },
            hideCpForm() {
                EventBus.$emit('hideModal');
            },
            startLoading() {
                this.loading = true;
            },
            endLoading() {
                this.loading = false;
            }
        },
        created() {
            this.init();
        }
    }
</script>

<style lang="scss" scoped>
   
</style>