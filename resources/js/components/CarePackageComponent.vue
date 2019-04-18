<template>
    <transition name="fade">

         <div class="features-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto text-center">
                        <h2 class="title">Care Packages</h2>
                        <h4 class="description">Our Roo Cancer Care Packages include some of Roo’s favorite items-including a blanket (which has become a favorite of the packages), a gift card for McDonald’s, toys, treats, and a tennis ball. We have found that people and animals that receive these packages have their spirits lifted during one of the most difficult times of their lives. Though they are labor-intensive, we know they are the most important thing that we do because of the emotion behind each and every one. We love to see the animals living like Roo.</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <card type="background" raised color="transparent" style="background-image: url('images/unsplash-brindle-beach-leio-mclaren.jpg')">
                            <template slot="info">
                                <div class="icon icon-white">
                                    <i class="now-ui-icons emoticons_satisfied"></i>
                                </div>
                                <!-- <div class="description">
                                    <h4 class="info-title">Request a Care Package</h4>
                                    <p>Please note that due to extremely high demand and very limited resources, we must ask for a donation of at least $10 in order to be able to continue to send care packages. If you're unable to afford this, we can still help.</p>

                                    <n-button @click.prevent.native="showCpForm" type="primary">Request a Care Package</n-button>
                                </div> -->

                                <div class="section-space"></div>
                                
                                <div class="info info-hover">
                                    <div class="icon icon-primary icon-circle">
                                        <i class="now-ui-icons shopping_box"></i>
                                    </div>
                                    <h4 class="info-title">Request a Care Package</h4>
                                    <p class="description">Please note that due to extremely high demand and very limited resources, we must ask for a donation of at least $10 in order to be able to continue to send care packages. If you're unable to afford this, we can still help.</p>
                                </div>
                            <!-- </div> -->
                            </template>
                        </card>
                    </div>
                </div>
            </div>
        </div>
        <!--     *********    END FEATURES 4      *********      -->

    </transition>
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
                console.log("[Assistance Comp -- init method");
            },
            showCpForm() {
                console.log("[CarePackageComponent] - showCpForm")
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
            console.log('Assistance Component mounted.')
        }
    }
</script>

<style lang="scss" scoped>
   
</style>