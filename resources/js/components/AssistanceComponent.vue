<template>
    <div class="features-8 section-image background">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-4 offset-md-1 text-center">
                    <h2 class="title">Need some help?</h2>
                    <h4 class="description">We understand, first-hand, how difficult it is to receive a cancer diagnosis for your best friend, and we hope to be able to support you both emotionally and financially. Please fill out the grant form, and we will email you the details of the review process.</h4>
                </div>

                <div class="col-md-3 offset-md-3">
                    <n-button class="fin-button" @click.prevent.native="showFnForm" type="primary" size="lg" block round>Apply For Assistance</n-button>    
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

<style lang="scss" scoped>

    @media only screen and (max-width: 500px) {
        .background {
            background-image: url('/images/unsplash-dog-stick.jpg');

        }

        .fin-button {
            margin-top: 0;
        }
    }

    @media only screen and (min-width: 500px) {
        .background {
            background-image: url('/images/unsplash-dog-stick.jpg');
            height: 1000px;   
        }
        .fin-button {
            margin-top: 220px; 
        }

        .title {
            margin-top: 300px;
        }
    }

    
    

</style>
