<template>
    <transition name="fade">
        <div class="container-fluid">
            <!--     *********     FEATURES 8      *********      -->
            <div class="features-8 section-image" style="background-image: url('images/unsplash-pug-floor-matthew-henry.jpg'); min-height: 120%;">
                <div class="row">
                    <div class="col-md-2 title">EVENTS</div>
                </div>
                <div class="row">

                
                <!-- <div class="row"> -->
                    <div class="col-md-4 offset-md-4 text-center" style="z-index: 10; margin-top: 140px;">
                        <iframe class="fb-frame" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FLiveLikeRoo%2F&tabs=events&width=380&height=520&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="420" height="500" style="border:1px solid black; padding: 20px; box-shadow: 10px 15px 30px white; overflow:scroll" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                    </div>

                    <div class="col-md-3 text-center" style="padding: 30px; margin: 30px;">
                        
                        <h4 class="description">Whether you're a dog lover looking for more of us, or just someone who likes a good, sometimes weird, time - our events always put the sing in fundraising! Click on an event and you'll be taken to that FaceBook page, where you can get more information, register/sign up or buy tickets. Come play with us!</h4>

                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>

    import { EventBus } from '../event-bus.js';
    import { Card, Button, FormGroupInput, Tabs, TabPane, Parallax, Modal } from '@/components';

    export default {
        name: 'Events',
        components: {
            Card,
        },
        data() {
            return {
        
            }
        },
        computed: {},
        methods: {
            init() {
                console.log("[Events Comp -- init method");
            },
        },
        created() {
            this.init();
            console.log('Events Component mounted.')
        }
    }
</script>

<style lang="scss" scoped>

    @media only screen and (max-width: 500px) {
        .fb-frame {
            margin-left: -30;
        }
        .fb-link {
            display: inline-block;
        }

        .title {
            font-size: 20vw;
            text-align: center;
        }
    
    }

    @media only screen and (min-width: 500px) {

        .text {
            color: #fd7e14;
            font-weight: 1200;
        }

        .fb-frame {
            margin-top: -200px;
        }

        .title {
            
            font-size: 13vw;
            transform: rotate(90deg);
        }
    }

</style>