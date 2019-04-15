<template>
    <transition name="fade">
        <div class="container-fluid">
            <!--     *********     FEATURES 8      *********      -->
            <div class="features-8 section-image" style="background-image: url('images/AsianTimesSq.jpeg')">
                <div class="col-md-4 ml-auto mr-auto text-center">
                    <h2 class="title">Come Play With Us</h2>
                    <h4 class="description" style="background-color: black; color: white; opacity: .7">Whether you're a dog lover looking for more of your kind, or just someone who likes a good, often weird, time, Our events always put the FUN in fundraising! Click on an event and you'll be taken to that FaceBook page, where you can get more information, register/sign up or buy tickets.</h4>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <card>
                                <div class="fb-frame">
                                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FLiveLikeRoo%2F&tabs=events&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="300" height="500" style="border:5px solid; box-shadow: 5px 10px 25px #888888; overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                                </div>
                            </card>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>

    import { EventBus } from '../event-bus.js';
    import { Card, Button, FormGroupInput, Tabs, TabPane, Parallax } from '@/components';

    export default {
        name: 'Events',
        components: {
        
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
    .fb-frame {
        
    }
</style>