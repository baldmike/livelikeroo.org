<template>
    <div class="container-fluid">
        <div class="jumbotron" style="background-image: url('images/booker1.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        min-height: 1000px;
        margin-top: 100px">

            <div class="row">
                <div class="col-md-4">
                    <h1 class="card-title booker-tile tilt">The Booker Fund</h1>
                
                    <div class="donate-box">
                        <h5>
                            <p>DONATE</p>
                            <p>TO</p>
                            <p>THE BOOKER FUND</p>
                        </h5>
                        <n-button @click.prevent.native="showDnForm" type="primary" size="lg" block round>DONATE</n-button>    
                    </div>                    
                </div>

                <div class="col-md-4 offset-md-4">
                    <h5 class="card-title booker-tile add-opacity noPhone" style="padding: 20px; margin-top: 100px;">The Booker Fund allows us to spoil hospice dogs with a cancer diagnosis. This Fund, an arm of the Live Like Roo Foundation, pays for hotel rooms, wagons, dog beds and anything a dog needs in the final days or months. We have sent many dogs and their owners to hotel stays to forget about cancer for awhile and we have found that it TRULY helps them. This Fund is named for a dude named Booker, who takes in hospice dogs and gives them the best life. #NBD</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <h3 class="card-title booker-tile headline" >Hot dude hustles to help hospice dogs heal happily at his home.</h3>
                </div>
        
            </div>
                                  
        </div>
    </div>
</template>

<script>
  import { Card, InfoSection,  Badge, Button, Tabs, TabPane, Parallax } from '@/components';

  import { EventBus } from '../event-bus.js';

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
                fund: 'booker',
                freq: 'oneTime'
            }
            this.$store.dispatch('showDnForm', payload);
        }
    }
  }
</script>

<style lang="scss" scoped>
    @media only screen and (max-width: 500px) {
        .noPhone {
            display: none;
        }
    
        .tilt {
            transform: rotate(-15deg);
        }

        .booker-tile {
            background-color: #fd7e14;
            color: white; 
            opacity: .8; 
            text-align: center;    
        }

        .headline {
            margin: 40px;
            padding: 10px;
        }

        .add-opacity {
            opacity: .9
        }
        
        .donate-box {
            margin-top: 20px;
            padding: 30px;
            text-align: center;
            background-color: white;
            color: #fd7e14;
        }

    }

    @media only screen and (min-width: 500px) {
        .tilt {
            transform: rotate(-15deg);
        }

        .booker-tile {
            background-color: #fd7e14;
            color: white; 
            opacity: .8; 
            text-align: center;    
        }

        .headline {
            margin: 40px;
            padding: 10px;
        }

        .add-opacity {
            opacity: .9
        }
        
        .donate-box {
            margin-top: 20px;
            padding: 30px;
            text-align: center;
            background-color: white;
            color: #fd7e14;
        }
    }
</style>
