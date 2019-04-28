<template>
    <div class="wrapper landing-page" style="z-index: 10;">
        <div class="page-header header-filter">
            <parallax class="page-header-image"
                 style="background-image: url('images/banner1.jpg')">
            </parallax>
            <div class="row">
                <div class="col-md-3 offset-md-1" style="position: absolute; bottom: 40%; text-align: right;">
                    <h4>"To know that even one life has breathed easier because you lived here. This is to have succeeded."</h4>
                    <small>Ralph Waldo Emerson</small>
                </div>

                <!-- <div class="col-md-2 offset-md-8" style="position: absolute; top: 20%; color: #fd7e14; z-index: 4;">
                    
                    <n-button type="primary" block @click.native="showDnForm" style="height: 100px;"><h6>Donate</h6><h6>to</h6><h3>Live Like Roo!</h3></n-button>
                </div> -->
                <div class="col-md-3 offset-md-8" style="position: absolute; top: 20%; z-index: 4">
                    <div class="donate-box">
                        <h3 style="color: #384666">
                            <p>DONATE</p> 
                            <p>TO</p> 
                            <p>LIVE LIKE ROO</p>
                        </h3>
                        <n-button style="background-color: #fd7e14;  !important; color: white !important" @click.prevent.native="showDnForm" type="neutral" size="lg" block round>DONATE</n-button>    
                    </div>
                </div>
            </div>

            <div class="row">
                <h1 style="color: #fd7e14; position: absolute; bottom: 30px; left: 20vw; font-size: 10vw;">#LiveLikeRoo</h1>

            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <br><br><br><br>
                    <div class="separator-line separator-primary"></div>
                    <br>
                    <h2 class="title">The Live Like Roo Foundation</h2>
                    <h5 class="textOnWhite">We are an all-volunteer-run, 501C3 charitable organization who provides support and financial assistance to families whose pet faces a cancer diagnosis. Through grants, care packages, special experiences and genuine human support and kindness, The Live Like Roo Foundation has been able to assist over 2000 pets and their families through cancer diagnoses. Having experienced this devastation first-hand with the loss of Roosevelt, The Live Like Roo Foundation strives to be a helping hand in a difficult and sometimes confusing time. Ultimately, our mission is that you and your pet will #LiveLikeRoo.</h5>

                    <h5 class="textOnWhite">We strive to be a real life sounding board and support system for people that need guidance and hope, sharing compassion and strength along the way.</h5>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                        <div class="info info-hover">
                            <div class="icon icon-info">
                                <i class="now-ui-icons sport_user-run"></i>
                            </div>
                            <h4 class="info-title">Volunteer Run</h4>
                            <p class="description">Our amazing volunteers tirelessly put in over <strong>500</strong> hours <em>per month</em> - from making care packages to planning events to coodinating medical care.. they do it ALL.</p>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="info info-hover">
                            <div class="icon icon-success">
                                <i class="now-ui-icons objects_support-17"></i>
                            </div>
                            <h4 class="info-title">Meaningful Support</h4>
                            <p class="description">
                                $10,000+ Medical expenses paid <em>per month</em>
                        
                                $10,000+ spent on care packages <em>per month</em>
                            
                                200+ care packages shipped out <em>per month</em>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="info info-hover">
                            <div class="icon icon-danger">
                                <i class="now-ui-icons ui-2_favourite-28"></i>
                            </div>
                            <h4 class="info-title">Real Impact</h4>
                            <p class="description">We have assisted over 6000 families and 8200 animals, including dogs, cats, rabbits, horses and the luckiest hamster ever.
                            </p>
                        </div>
                    </div>
                    
                </div>

                
            <div class="separator separator-primary"></div>
            <div class="section-story-overview">
                <div class="row">
                    <div class="col-md-6">
                        <!-- First image on the left side -->
                        <div class="image-container image-left" style="background-image: url('images/rooTooPage17.jpg')">
                            <p class="blockquote blockquote-primary">Your one-time or monthly donation is tax-deductable and will go to work immediately to help pets worldwide #LiveLikeRoo! 
                                <br>
                                <br>
                                <n-button type="primary" round block @click.native="showDnForm">Donate Today</n-button>
                            </p>
                        </div>
                        <!-- Second image on the left side of the article -->
                        <div class="image-container image-left-bottom"
                                style="background-image: url('images/rooTooPage12.jpg')"></div>
                    </div>
                    <div class="col-md-5">
                        <!-- First image on the right side, above the article -->
                        <div class="image-container image-right"
                                style="background-image: url('images/homeTooPic7.jpg')"></div>
                        <h2 class="title">All About Roo</h2>
                        <p class="textOnWhite">
                            Roosevelt was rescued from Chicago Animal Care and Control in April 2015. I saw him relaxing quietly in his cage as all the other dogs were barking and jumping to get my attention. He looked so sad.  His owner surrender card said “has issues urinating.” Once outside, Roosevelt peed for a long time and it was mostly just dribbling out. His teeth were totally ground down, probably from eating rocks or trying to escape his crate. We felt so helpless and so sad for him. Immediately we tried to find him a foster, so we could get him out and get him healthy. One Tail at a Time committed to rescue him and we were able to foster.
                        </p>
                        <p class="textOnWhite">
                            Unfortunately, even after a neuter, his urinating issues were still a problem. During his dental, the vet discovered that Roo had terminal bone cancer. Our hearts were shattered, but we knew what we had to do. Roo lived life to the FULLEST for the next 5 months. Hotel stays, boat rides, long walks, belly rubs, ice cream, even attending an LFL game...  And so much more. To Live Like Roo became a way of life, and we made sure we didn't lose one second of the time we had left.
                        </p>
                    </div>
                </div>
                <div class="col-md-11">
                    <br>
                    <br>
                    <p class="textOnWhite">
                        Roo passed away on September 8th, 2015. It was one of the toughest days, but it was time to let go. While he didn't have a good start to life, his eyes told us how loved he felt at the end. We miss him so much and we will always have a place in our hearts for this boy that changed the way thousands of people approach life. He is one in a million and we are so grateful that he was ours and that we were able to share him with all of you. #LiveLikeRoo
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
  import { Card, Button, FormGroupInput, Tabs, TabPane, Parallax, Modal } from '@/components';

  import { EventBus } from '../event-bus.js';

  export default {
    name: 'landing-page',
    bodyClass: 'landing-page',
    components: {
      Card,
      Tabs,
      TabPane,
      Parallax,
      Modal,
      [Button.name]: Button,
      [FormGroupInput.name]: FormGroupInput
    },
    data() {
      return {
        form: {
          firstName: '',
          email: '',
          message: ''
        },
      }
    },
    methods: {
        showDnForm() {
            console.log("[HomeComponent] - showDnForm");
            
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
    .white-box {
        
        background-color: white;
        color: orange;
    }

    .textOnWhite {
        color: #333333 !important;
    }

    .donate-box {
        padding: 30px;
        text-align: center;
        background-color: white;
        color: #fd7e14;
        position: absolute; top: 40%
    }
</style>
