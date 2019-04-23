<template>
    <div class="container-fluid">
        <div class="jumbotron" style="background-image: url('images/cappy.jpg');
        background-size: cover;
        background-repeat: repeat;
        height: 1400px;
        margin-top: 120px">

           
                <div class="col-md-3" style="position: sticky; top: 100px;">
                    <h5 class="card-title" style="background-color: #384666; color: white; opacity: .9; padding: 20px; text-align: center;">"The Cappy Fund" named for our dear friend who passed too soon Captain Cowpants. Cappy was a bright light and a therapy dog, who recently passed away from cancer, leaving many people absolutely crushed. 

                    This Fund is specifically for rescue dogs. As you know, we always cover any animal that is in a shelter or foster situation 100%, so we are honored that we can be a small part of Cappy's Legacy by helping to sponsor animals and organizations that really could use our funding. 

                    We love you Melissa and Adam and we are so sorry for the loss of your buddy, but we are so honored to provide this to others!</h5>
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
