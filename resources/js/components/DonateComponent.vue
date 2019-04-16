<template>
 <!--     *********    PRICING 3     *********      -->
    <div class="pricing-3 section-image" style="background-image: url('images/pricing3.jpg')" id="pricing-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto text-center">
                    <h2 class="title">Donate to Live Like Roo</h2>
                    <h4 class="description">We have helped over 2000 pets through cancer diagnoses, and are only able to do this thanks to your generosity. Your one-time or monthly donations are tax-deductable, and will directly help a pet #LiveLikeRoo!</h4>
                    <div class="section-space"></div>
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
                        <n-button type="primary" round>Select</n-button>
                    </card>
                </div>
                <div class="col-md-4 mr-auto">
                    <card type="pricing" raised color="orange">
                        <img src="/images/headline3.jpg" style="margin-bottom: 15px;">
                        <h3>Make a</h3>
                        <h1>
                           Monthly
                        </h1>
                        <h3>Donation</h3>
                        <n-button type="neutral" round>Select</n-button>

                    </card>
                </div>
            </div>
        </div>
    </div>
    <!--     *********    END PRICING 3      *********      -->
</template>

<script>
  import { Card, Button, Tabs, TabPane, Parallax } from '@/components';

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
    }
  }
</script>
