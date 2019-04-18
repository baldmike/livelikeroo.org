<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto text-center">
                <h2 class="title">Financial Assistance</h2>
                <h4 class="description">We understand, first-hand, how difficult it is to receive a cancer diagnosis for your best friend, and we hope to be able to support you both emotionally and financially. Please fill out the grant form below, and we will email you the details of the review process.</h4>
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
                            <p>Fill out the Assistance Request Form below, and we will email you once your application has been reviewed.</p>

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
