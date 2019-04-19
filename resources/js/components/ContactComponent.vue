<template>
    <div class="cd-section" id="contactus">
        <!--     *********    CONTACT US 1     *********      -->
        <div class="section-image" style="background-image: url('images/unsplash-alaska-dog-jf-brou.jpg'); height: 100vh;">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 ml-auto mr-auto">
                        <card type="contact" raised header-classes="text-center" style="margin-top: 100px;">
                            <h4 slot="header" class="card-title">Contact Us</h4>

                            <div class="row">
                                <div class="col-md-6 pr-2">
                                    <label>First Name</label>
                                    <fg-input placeholder="First Name">
                                    </fg-input>
                                </div>
                                <div class="col-md-6 pl-2">
                                    <label>Last Name</label>
                                    <fg-input placeholder="Last Name">
                                    </fg-input>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <fg-input placeholder="Email">
                                </fg-input>
                            </div>
                            <div class="form-group">
                                <label>Your message</label>
                                <textarea name="message" class="form-control" id="message" rows="6"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <n-checkbox>
                                        I'm not a robot
                                    </n-checkbox>
                                </div>
                                <div class="col-md-6">
                                    <n-button type="primary" round class="pull-right">Send Message</n-button>
                                </div>
                            </div>

                        </card>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  import { Card, Button, InfoSection, FormGroupInput, Checkbox } from '@/components';
  import { Carousel, CarouselItem } from 'element-ui'
  export default {
    components: {
      Card,
      InfoSection,
      [Button.name]: Button,
      [Checkbox.name]: Checkbox,
      [FormGroupInput.name]: FormGroupInput,
      [Carousel.name]: Carousel,
      [CarouselItem.name]: CarouselItem,
    },
    data() {
      return {
        options: {
          styles: [{
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [{
              "color": "#e9e9e9"
            }, {
              "lightness": 17
            }]
          }, {
            "featureType": "landscape",
            "elementType": "geometry",
            "stylers": [{
              "color": "#f5f5f5"
            }, {
              "lightness": 20
            }]
          }, {
            "featureType": "road.highway",
            "elementType": "geometry.fill",
            "stylers": [{
              "color": "#ffffff"
            }, {
              "lightness": 17
            }]
          }, {
            "featureType": "road.highway",
            "elementType": "geometry.stroke",
            "stylers": [{
              "color": "#ffffff"
            }, {
              "lightness": 29
            }, {
              "weight": 0.2
            }]
          }, {
            "featureType": "road.arterial",
            "elementType": "geometry",
            "stylers": [{
              "color": "#ffffff"
            }, {
              "lightness": 18
            }]
          }, {
            "featureType": "road.local",
            "elementType": "geometry",
            "stylers": [{
              "color": "#ffffff"
            }, {
              "lightness": 16
            }]
          }, {
            "featureType": "poi",
            "elementType": "geometry",
            "stylers": [{
              "color": "#f5f5f5"
            }, {
              "lightness": 21
            }]
          }, {
            "featureType": "poi.park",
            "elementType": "geometry",
            "stylers": [{
              "color": "#dedede"
            }, {
              "lightness": 21
            }]
          }, {
            "elementType": "labels.text.stroke",
            "stylers": [{
              "visibility": "on"
            }, {
              "color": "#ffffff"
            }, {
              "lightness": 16
            }]
          }, {
            "elementType": "labels.text.fill",
            "stylers": [{
              "saturation": 36
            }, {
              "color": "#333333"
            }, {
              "lightness": 40
            }]
          }, {
            "elementType": "labels.icon",
            "stylers": [{
              "visibility": "off"
            }]
          }, {
            "featureType": "transit",
            "elementType": "geometry",
            "stylers": [{
              "color": "#f2f2f2"
            }, {
              "lightness": 19
            }]
          }, {
            "featureType": "administrative",
            "elementType": "geometry.fill",
            "stylers": [{
              "color": "#fefefe"
            }, {
              "lightness": 20
            }]
          }, {
            "featureType": "administrative",
            "elementType": "geometry.stroke",
            "stylers": [{
              "color": "#fefefe"
            }, {
              "lightness": 17
            }, {
              "weight": 1.2
            }]
          }]

        }
      }
    }
  }
</script>

<style>
</style>