<template>
    <div class="container-fluid" style="background-image: url('images/cappy.jpg');
        background-size: contain;
        background-repeat: no-repeat;
        height: 1200px;
        ">

           
        <div class="row">
            <div class="col-md-3 offset-md-8" style="margin-top: 140px">
                <h5 class="card-title cappy-box">"The Cappy Fund" named for our dear friend who passed too soon Captain Cowpants. Cappy was a bright light and a therapy dog, who recently passed away from cancer, leaving many people absolutely crushed. 

                This Fund is specifically for rescue dogs. As you know, we always cover any animal that is in a shelter or foster situation 100%, so we are honored that we can be a small part of Cappy's Legacy by helping to sponsor animals and organizations that really could use our funding. 

                We love you Melissa and Adam and we are so sorry for the loss of your buddy, but we are so honored to provide this to others!</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 offset-md-8">
                <div class="donate-box">
                    <h3 style="color: #384666">
                        <p>DONATE</p> 
                        <p>TO</p> 
                        <p>THE CAPPY FUND</p>
                    </h3>
                    <n-button style="background-color: #384666 !important; color: white !important" @click.prevent.native="showDnForm" type="neutral" size="lg" block round>DONATE</n-button>    
                </div>
            </div>
        </div>

    </div>
</template>

<script>
  import { Card, InfoSection,  Badge, Button, Tabs, TabPane, Parallax } from '@/components';

  export default {
    components: {
      Card,
      Tabs,
      TabPane,
      Badge,
      InfoSection,
      [Button.name]: Button
    },
    methods: {
        showDnForm() {

            let payload = {
                fund: 'cappy',
                freq: 'oneTime'
            };

            this.$store.dispatch('showDnForm', payload);
      }
    }
  }
</script>

<style>
    .cappy-box {
        background-color: #384666; 
        color: white; 
        opacity: .9; 
        padding: 20px; 
        text-align: center;
    }

</style>
