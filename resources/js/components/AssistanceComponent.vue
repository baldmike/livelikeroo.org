<template>
<transition name="fade">

    <div class="pricing-3 section-image" style="background-image: url('images/unsplash-dog-stick.jpg'); height: 100vh;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="section-space"></div>
                    <div class="section-space"></div>
                    <div class="section-space"></div>
                    <div class="section-space"></div>
                    <div class="section-space"></div>
                    <h2 class="title">Financial Assistance</h2>
                    <h4 class="description">We understand, first-hand, how difficult it is to receive a cancer diagnosis for your best friend, and we hope to be able to support you both emotionally and financially. Please fill out the grant form below, and we will email you the details of the review process.</h4>
                    <div class="section-space"></div>
                </div>


                <div class="col-md-3 offset-md-5">
                    <div class="section-space"></div>
                    <div class="section-space"></div>
                    <div class="section-space"></div>
                    <n-button @click.prevent.native="showFnForm" type="primary" block>Request Financial Assistance</n-button>
                </div>
            </div>

            

           <!-- <n-button @click.prevent.native="showCpForm" type="primary">Request Assistance</n-button> -->
        </div>
    </div>
</transition>
</template>

<script>
  import { Card, Button, Tabs, TabPane, Parallax } from '@/components';
  
  import { EventBus } from '../event-bus.js';

  export default {
    components: {
      Card,
      Tabs,
      TabPane,
      [Button.name]: Button,
      Parallax
    },
    data() {
      return {
        
      }
    }
  }
</script>

<style>

</style>
