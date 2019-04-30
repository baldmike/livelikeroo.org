<template>
    <div class="container-fluid">
        <div class="jumbotron" style="background-image: url('images/serenity.jpg');
        background-size: contain;
        background-repeat: no-repeat;
        height: 1380px;
        margin-top: 100px">

            <div class="row">
                <div class="col-md-3 offset-md-9" style="position: relative; top: 100px;">
                    <h5 class="card-title" style="background-color: #3d3293; color: white; opacity: .9; padding: 20px; text-align: center; font-size; 1.4rem;">
                        Serenity's Wish is a grant based fund, available to Live Like Roo applicants. Serenity's Wish is intended to assist pet parents through end of life care and decision making, for their pets. This assistance will be limited to hospice consults, palliative care, and humane euthanasia and cremation.
                    </h5>

                    <h5 class="card-title" style="background-color: #3d3293; color: white; opacity: .9; padding: 20px; text-align: center; font-size; 1.4rem;">
                        To inquire about assistance from Serenity's Wish, please click the button below and fill out the Financial Assistance form.

                    <n-button @click.prevent.native="showFnForm" type="info" size="lg" block round>REQUEST ASSISTANCE</n-button> 
                    </h5>
                </div>
            </div>
            
        </div>
    </div>
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
        showFnForm() {
            this.$store.dispatch('showFnForm');
        }
    }
  }
</script>

<style>

</style>
