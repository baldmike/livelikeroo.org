<template>
    <div class="wrapper landing-page" style="z-index: 10;">
        <div class="page-header header-filter">
            <parallax class="page-header-image"
                 style="background-image: url('images/banner1.jpg')">
            </parallax>
            <div class="row">
                <div class="col-md-3 offset-md-1" style="position: absolute; bottom: 40%; text-align: right;">
                    <h4 class="description">"To know that even one life has breathed easier because you lived here. This is to have succeeded."</h4>
                    <small>Ralph Waldo Emerson</small>
                    <small>Ralph Waldo Emerson</small><small>Ralph Waldo Emerson</small><small>Ralph Waldo Emerson</small>
                </div>

                <div class="col-md-2 offset-md-8" style="position: absolute; top: 20%; color: #fd7e14; z-index: 4;">
                    <n-button type="primary" block @click.native="showDnForm">Donate</n-button>
                </div>
            </div>

            <div class="row">
                <h1 style="color: #fd7e14; position: absolute; bottom: 30px; left: 20vw; font-size: 10vw;">#LiveLikeRoo</h1>

            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <h2 class="title">The Live Like Roo Foundation</h2>
                    <h5 class="description">We are an all-volunteer-run, 501C3 charitable organization who provides support and financial assistance to families whose pet faces a cancer diagnosis. Through grants, care packages, special experiences and genuine human support and kindness, The Live Like Roo Foundation has been able to assist over 2000 pets and their families through cancer diagnoses. Having experienced this devastation first-hand with the loss of Roosevelt, The Live Like Roo Foundation strives to be a helping hand in a difficult and sometimes confusing time. Ultimately, our mission is that you and your pet will #LiveLikeRoo.</h5>

                    <h5 class="description">We strive to be a real life sounding board and support system for people that need guidance and very specific help depending on the diagnosis timeline.</h5>
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
                        <p class="description">
                            Roosevelt was rescued from Chicago Animal Care and Control in April 2015. I saw him relaxing quietly in his cage as all the other dogs were barking and jumping to get my attention. He looked so sad.  His owner surrender card said “has issues urinating.” Once outside, Roosevelt peed for a long time and it was mostly just dribbling out. His teeth were totally ground down, probably from eating rocks or trying to escape his crate. We felt so helpless and so sad for him. Immediately we tried to find him a foster, so we could get him out and get him healthy. One Tail at a Time committed to rescue him and we were able to foster.
                        </p>
                        <p class="description">
                            Unfortunately, even after a neuter, his urinating issues were a problem. During his dental, the vet discovered that Roo had bone cancer. Our hearts were shattered. Roo lived life to the FULLEST for the next 5 months. Hotel stays, boat rides, ice cream, attending an LFL game and so much more. Live Like Roo became a way of life.
                        </p>
                    </div>
                </div>
                <div class="col-md-11">
                    <br>
                    <br>
                    <p class="description">
                        Roo passed away on September 8th, 2015. It was one of the toughest days, but it was time to let go. We miss him so much and we will always have a place in our hearts for this boy that changed the way thousands of people lived. He is one in a million and we are so grateful that he was ours and that we were able to share him with all of you.
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
            console.log("[HomeComponent] - showDnForm")
            EventBus.$emit('showDnForm');
        },
    }
  }
</script>
<style>
</style>
