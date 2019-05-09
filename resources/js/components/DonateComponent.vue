<template>
    <div  class="features-8 section-image" style="background-image: url('images/unsplash-pugina-blanket.jpg'); height: 1200;" id="pricing-3">
        <div class="container-fluid">
            <!-- <div class="col-md-12 icon icon-white" style="text-align: center;">
                <h3 class="info-title">Donate To Live Like Roo</h3>
            </div> -->

            <div class="row" style="height: 0;">
                <div class="col-md-2 title">DONATE</div>
            </div>

            <div class="row">
                <div class="col-md-3 offset-md-2">
                    <h4 class="text">We have helped over 2000 pets through cancer diagnoses, and are only able to do this thanks to your generosity. Your one-time or monthly donation is tax-deductable, and will directly help a pet #LiveLikeRoo!</h4>
                    <!-- <div class="section-space"></div> -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 ml-auto mr-auto">
                    <card type="pricing">
                        <img src="/images/headline2.jpg">
                        <h3>Make a</h3>
                        <h1>
                           One Time
                        </h1>
                        <h3>Donation</h3>
                        <n-button @click.prevent.native="oneTime" type="primary" round>Select</n-button>
                    </card>
                </div>
                <div class="col-md-3 mr-auto ml-auto">
                    <card type="pricing" raised color="orange">
                        <img src="/images/headline3.jpg" style="margin-bottom: 15px;">
                        <h3>Make a</h3>
                        <h1>
                           Monthly
                        </h1>
                        <h3>Donation</h3>
                        <n-button @click.native="monthly" type="neutral" round>Select</n-button>

                    </card>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  import { Card, Button, Tabs, TabPane, Parallax } from '@/components';
  import { EventBus } from '../event-bus.js';

  export default {
    components: {
      Card,
      Tabs,
      TabPane,
      [Button.name]: Button
    },
    data() {
      return {
        
      }
    },
    methods: {
        oneTime() {
            console.log("[DonateComponent] - ONE TIME")
            let payload = {
                fund: 'roo',
                freq: 'oneTime'
            }
            this.$store.dispatch('showDnForm', payload)
        },

        monthly() {
            console.log("[DonateComponent] - MONTHLY")
            let payload = {
                fund: 'roo',
                freq: 'monthly'
            }
            this.$store.dispatch('showDnForm', payload)
        }
    }
  }
</script>

<style lang="scss" scoped>
    .text {
        color: orange;
    }

    .title {
            
        font-size: 13vw;
        transform: rotate(90deg);
    }
</style>
