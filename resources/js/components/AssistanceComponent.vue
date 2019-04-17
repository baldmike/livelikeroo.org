<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6 ml-auto mr-auto text-center">
                <h2 class="title">Financial Assistance</h2>
                <h4 class="description">We have helped over 2000 pets through cancer diagnoses, and are only able to do this thanks to your generosity. Your one-time or monthly donations are tax-deductable, and will directly help a pet #LiveLikeRoo!</h4>
                <div class="section-space"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- Photo by Jamie Street on Unsplash -->
                <card type="background" raised color="transparent" style="background-image: url('images/unsplash-dog-stick.jpg')">
                    <template slot="info">
                        <!-- <div class="icon icon-white">
                            <i class="now-ui-icons business_bulb-63"></i>
                        </div> -->
                        <div class="description">
                            <h4>Need Some Help?</h4>
                            <p>Your designer will come back to you with an initial set of ideas.</p>

                            <n-button @click.prevent.native="showCpForm" type="primary">Request Assistance</n-button>
                        </div>
                    </template>
                </card>
            </div>
        </div>
    </div>
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

<style>

</style>
