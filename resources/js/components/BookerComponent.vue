<template>
    <div class="container-fluid">
        <div class="jumbotron" style="background-image: url('images/booker1.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        height: 100vh;
        margin-top: 100px">

            <div class="row">
                <div class="col-md-4 offset-md-1">
                    <h1 class="card-title" style="background-color: #fd7e14; color: white; opacity: .8; text-align: center;">The Booker Fund</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 offset-md-2">
                    <h3 class="card-title" style="background-color: #fd7e14; color: white; opacity: .8; text-align: center;">Hot dude hustles to help hospice dogs heal happily at his home.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 offset-md-9">
                    <h5 class="card-title" style="background-color: #fd7e14; color: white; opacity: .9; padding: 20px; text-align: center;">The Booker Fund allows us to spoil hospice dogs with a cancer diagnosis. This Fund, an arm of the Live Like Roo Foundation, pays for hotel rooms, wagons, dog beds and anything a dog needs in the final days or months. We have sent many dogs and their owners to hotel stays to forget about cancer for awhile and we have found that it TRULY helps them. This Fund is named for a dude named Booker, who takes in hospice dogs and gives them the best life!</h5>
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
    }
  }
</script>

<style>

</style>
