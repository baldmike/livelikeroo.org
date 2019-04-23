<template>
    <div class="container-fluid">
        <div class="jumbotron" style="background-image: url('images/maggiesmission.jpg');
        background-size: 100%;
        background-repeat: no-repeat;
        height: 1380px;
        margin-top: 100px">

            
            <div class="row">
                <div class="col-md-3 offset-md-9" style="position: relative; top: 300px;">
                    <h5 class="card-title" style="background-color: #93c844; color: white; opacity: .9; padding: 20px; text-align: center; font-size; 1.4rem;">Maggie's Mission funds cats with cancer 100%. It is named for a gorgeous cat that was taken way too soon because of a cancer diagnosis. Under this mission, we can cover cat cancer costs in full for most cases. Please apply by emailing us at livelikeroo@gmail.com with "Maggie's Mission" in the subject line. We love you Brandi! </h5>
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
    }
  }
</script>

<style>

</style>
