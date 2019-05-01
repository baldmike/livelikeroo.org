<template>
    <transition name="fade">
        <div class="container-fluid">
            <!--     *********     FEATURES 8      *********      -->
            <div class="features-8 section-image" style="background-image: url('images/asianTimesSq.jpeg')">
                <div class="col-md-4 ml-auto mr-auto text-center">
                    <h1 class="title">EVENTS</h1>
                    <h4 class="description" style="background-color: black; color: white; opacity: .7">Whether you're a dog lover looking for more of us, or just someone who likes a good, sometimes weird, time - our events always put the sing in fundraising! Click on an event and you'll be taken to that FaceBook page, where you can get more information, register/sign up or buy tickets. Come play with us!</h4>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            
                                <div class="fb-frame">
                                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FLiveLikeRoo%2F&tabs=events&width=380&height=520&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="400" height="500" style="border:1px solid black; padding: 20px; box-shadow: 10px 15px 30px white; overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                                </div>
                            
                        </div>
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
    .fb-frame {
        
    }
</style>