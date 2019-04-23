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
                    <h3 class="card-title" style="background-color: #fd7e14; color: white; opacity: .8; text-align: center;">Hot dude helps hospice dogs heal happily at home.</h3>
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


<!-- <div class="projects-1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 px-0">
                    <card type="background" class="card-background-product card-no-shadow">

                        <h3 class="card-title">
                            The Booker Fund
                        </h3>
                        <p class="card-description">
                             Hot dude helps hospice dogs heal happily at home.
                        </p>
                        <n-button type="danger" round>
                            <i class="now-ui-icons ui-1_send"></i> Booker!
                        </n-button>
                    </card>
                </div>
                <div class="col-md-6 px-0">
                    <card type="background" raised class="card-background-product card-no-shadow">

                        <h3 class="card-title">The Cappy Fund</h3>
                        <p class="card-description">
                            Fear not, rescue dogs - Here comes Captain Cowpants!
                        </p>
                        <n-button type="neutral" round>
                            <i class="now-ui-icons ui-1_send"></i> Cappy!
                        </n-button>
                    </card>
                </div>
                <div class="col-md-6 px-0">
                    <card type="background"
                            class="card-background-product card-no-shadow">
                        
                        <h3 class="card-title">Maggie's Mission</h3>
                        <p class="card-description">
                            The most commonly read works are works of fiction. Fiction books are ones that have been
                            made up...
                        </p>
                        <n-button type="neutral" round>
                            <i class="now-ui-icons ui-1_send"></i> Maggie!
                        </n-button>
                    </card>
                </div>
                <div class="col-md-6 px-0">
                    <card type="background"
                            class="card-background-product card-no-shadow">
                        
                        <h3 class="card-title">Serenity's Wish</h3>
                        <p class="card-description">
                            Living in South Central L.A., Socrates Fortlow is a sixty-year-old ex-convict, still
                            strong enough to kill men with...
                        </p>
                        <n-button type="danger" round>
                            <i class="now-ui-icons ui-1_send"></i> Serenity!
                        </n-button>
                    </card>
                </div>
            </div>
        </div>
    </div> -->
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
