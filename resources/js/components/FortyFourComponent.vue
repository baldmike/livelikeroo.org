<template>
    <b-container>
      <b-row>
        <b-col>
          <b-img src="/images/fortyFour.jpg" class="item"></b-img>
        </b-col>

        <b-col class="item">
          <h3>To celebrate our amazing founder’s 44th birthday, we are trying to raise $4400 in 44 hours. As Sarah likes to say when she volunteers me for something:</h3>
          <br><h3>"Come ON, it's for the DOGS."</h3>

          <n-button style="background-color: #fd7e14;  !important; color: white !important; margin-top: 100px" @click.prevent.native="showDnForm" type="neutral" size="lg" block round>CLICK TO DONATE TODAY!</n-button>
        </b-col>

      </b-row>
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
  max-height: 50vh;
}

</style>
