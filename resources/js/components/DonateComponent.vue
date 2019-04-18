<template>
 <!--     *********    PRICING 3     *********      -->
    <div class="pricing-3 section-image" style="background-image: url('images/unsplash-pugina-blanket.jpg'); min-height: 100%;" id="pricing-3">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h2 class="title">Donate to Live Like Roo</h2>
                    <h4 class="description">We have helped over 2000 pets through cancer diagnoses, and are only able to do this thanks to your generosity. Your one-time or monthly donation is tax-deductable, and will directly help a pet #LiveLikeRoo!</h4>
                    <!-- <div class="section-space"></div> -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 ml-auto">
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
                <div class="col-md-4 ml-auto mr-auto">
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
    <!--     *********    END PRICING 3      *********      -->
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
            EventBus.$emit('setOneTime');
        },

        monthly() {
            console.log("[DonateComponent] - MONTHLY")
            EventBus.$emit('setMonthly');
        }
    }
  }
</script>
