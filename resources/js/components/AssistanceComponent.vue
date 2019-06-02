<template>
    <div class="features-8 section-image background">
        
            
        <div class="container-fluid">

            <div class="row center" style="height: 0;">
                <div class="col-md-2 title">ASSISTANCE</div>
            </div>
            

            <div class="row">
                <div class="col-md-3 offset-md-2 text-center">
                    
                    <h2 class="header" style="margin-top: 100px;">Need some help?</h2>

                    <h4 class="description" style="margin-top: 240px;">We understand, first-hand, how difficult it is to receive a cancer diagnosis for your best friend, and we hope to be able to provide financial support. We accept financial assistance requests until 11:59 CST on the third Sunday of each month. To get started, click Apply For Assistance.</h4>

                    
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
    },
    computed: {
        thirdSunday() {
            // let today = new Date().toLocaleDateString();
            
            // return today;
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

        .header {
            color: white;
        }

        .title {
            display: none;
        }

        .description {
            font-size: 1rem;
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
            font-size: 11vw;
            transform: rotate(90deg);
            font-weight: 2000;
            font-size: 8vw;
            color: white;
            margin: 0;
            padding: 0;
        
        }
        .header {
            
            color: white;
        }

        .center {
            text-align: center;
        }
    }

    
    

</style>
