<template>
    <b-container>
      <b-row>
        <b-col cols="12" md="6" ml-auto mr-auto class="pic"> 
          <b-img src="/images/fortyFour.jpg" class="item"></b-img>
        </b-col>
        
        <b-col cols="12" md="6" class="item">
          <p>Hey! To celebrate our incredibly old founder’s 44th birthday, we are trying to raise $4400 in 44 old hours! As Sarah likes to say when she volunteers you for something:</p>
          <br>
          <p>"Come ON, it's for the DOGS!!"</p>
        </b-col>        
      </b-row>

      <b-col cols="12">
            <n-button style="background-color: #fd7e14;  !important; color: white !important;" @click.prevent.native="showDnForm" type="neutral" size="lg" block round>CLICK TO DONATE!</n-button>
      </b-col>


    </b-container>
</template>

<script>
  import { Card, InfoSection,  Badge, Button, Tabs, TabPane } from '@/components';

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
              fund: 'roo',
              freq: 'oneTime'
          };

          this.$store.dispatch('showDnForm', payload);

      },
    }
  }
</script>

<style>

    @media only screen and (max-width: 500px) {
        .item {
            margin-top: 0px;
        }

        .pic {
            margin-top: 120px;
        }
    }
    
    @media only screen and (min-width: 500px) {
        .item {

            margin-top: 220px;
            text-align: center;

        }
    }

</style>
