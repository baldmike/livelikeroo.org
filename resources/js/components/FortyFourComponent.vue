<template>
    <b-container>
      <b-row>
        <b-col>
          <b-img src="/images/fortyFour.jpg" class="item"></b-img>
        </b-col>
        </b-row>
        
        <b-row>

        <b-col>
          <p style="text-align: center">Hey! To celebrate our incredibly old founder’s 44th birthday, we are trying to raise $4400 in 44 hours! As Sarah likes to say when she volunteers you for something:</p>
          <br>
          <p style="text-align: center">"Come ON, it's for the DOGS!!"</p>
        </b-col>        
      </b-row>

      <b-col>
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

    .item {

        margin-top: 120px;
        text-align: center;

    }

</style>
