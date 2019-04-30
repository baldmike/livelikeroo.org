<template>
<transition name="fade">

    <div class="pricing-3 section-image" style="background-image: url('images/unsplash-dog-stick.jpg'); height: 100vh;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 ml-auto mr-auto">
                    <div class="icon icon-white" style="text-align: center;">
                        <h3 class="info-title">Financial Assistance</h3>
                    </div>
              </div>
                                
                
            </div>
            <div class="row">
                <div class="col-md-4 text-center">
                    <h2 class="title" style="margin-top: 200px;">Need some help?</h2>
                    <h4 class="description">We understand, first-hand, how difficult it is to receive a cancer diagnosis for your best friend, and we hope to be able to support you both emotionally and financially. Please fill out the grant form below, and we will email you the details of the review process.</h4>
                </div>


                <div class="col-md-3 offset-md-9" style="position: absolute; top: 15%;">
                    
                    <!-- <div class="col-md-3 offset-md-8" style="position: absolute; top: 20%; z-index: 4"> -->
                        <div class="donate-box">
                            <h3 style="color: #384666">
                                <p>REQUEST</p>
                                <p>FINANCIAL</p>
                                <p>ASSISTANCE</p>
                            </h3>
                            <n-button style="background-color: #fd7e14;  !important; color: white !important" @click.prevent.native="showFnForm" type="neutral" size="lg" block round>SELECT</n-button>    
                        </div>
                    <!-- </div> -->
                    <!-- <n-button @click.prevent.native="showFnForm" type="primary" block>Request Financial Assistance</n-button> -->
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
    },
    methods: {
      showFnForm() {
        EventBus.$emit('showFnForm');
      }
    }
  }
</script>

<style>

</style>
