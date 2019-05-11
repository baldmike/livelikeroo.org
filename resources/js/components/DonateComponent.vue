<template>
    <div  class="features-8 section-image background">
        <div class="container-fluid">
            
            <div class="row" style="height: 0;">
                <div class="col-md-2 title">DONATE</div>
            </div>

            <div class="row">
                <div class="col-8 offset-2 col-md-3 offset-md-2">
                    <h4 class="text">We have helped over 8200 pets through cancer diagnoses, and are only able to do this thanks to your generosity. Your one-time or monthly donation is tax-deductable, and will directly help a pet #LiveLikeRoo!</h4>
                    
                </div>
            </div>

            <div class="section-space"></div>

            <div class="row donate-cards">
                <div class="col-md-3 ml-auto noPhone">
                    <card type="pricing">
                        <!-- <img src="/images/headline2.jpg"> -->
                        <h3>Make a</h3>
                        <h1>
                           One Time
                        </h1>
                        <h3>Donation</h3>
                        <n-button @click.prevent.native="oneTime" type="primary" size="lg" round>ONE TIME DONATION</n-button>
                    </card>
                </div>

                <div class="col-md-8 ml-auto mr-auto phonely">
                    <n-button @click.prevent.native="oneTime" type="primary" size="lg" round block>ONE TIME DONATION</n-button>
                </div>
                
                <div class="col-md-3 mr-auto noPhone">
                    <card type="pricing" raised color="orange">
                        <!-- <img src="/images/headline3.jpg" style="margin-bottom: 15px;"> -->
                        <h3>Make a</h3>
                        <h1>
                           Monthly
                        </h1>
                        <h3>Donation</h3>
                        <n-button @click.native="monthly" type="neutral" size="lg" round>MONTHLY DONATION</n-button>
                    </card>
                </div>

                <div class="col-md-8 ml-auto mr-auto phonely">
                    <n-button @click.native="monthly" type="neutral" size="lg" round block>MONTHLY DONATION</n-button>
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

    @media only screen and (max-width: 500px) {
        .background {
            background-image: url('/images/unsplash-pugina-blanket.jpg');
        }
        .title {
            display: none;
        }

        .donate-cards {
            margin-top: 300px;
        }

        .noPhone {
            display: none;
        }

        .text {
            font-size: 1rem;
            position: absolute;
            top: 100;
            color: orange;
        }

    }

    @media only screen and (min-width: 500px) {
        .background {
            background-image: url('/images/unsplash-pugina-blanket.jpg');
            min-height: 1100px;
        }
        .text {
            color: orange;
        }

        .title {    
            font-size: 11vw;
            transform: rotate(90deg);
        }

        .phonely {
            display: none;
        }
    }
    
</style>
