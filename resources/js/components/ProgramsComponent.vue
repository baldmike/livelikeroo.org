<template>
    <div class="wrapper blog-posts">
        <div class="page-header page-header-small">
            <parallax class="page-header-image">
            </parallax>
            <div class="content-center">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto text-center">
                        <h2 class="title">This is where Sarah eloquently explains the programs situation.</h2>
                        <a href="#button" class="btn btn-primary btn-round  btn-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#button" class="btn btn-primary btn-round  btn-icon">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="projects-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 px-0">
                        <card type="background" class="card-fashion"
                              style="background-image: url('images/booker1.jpg')">
                            <div class="card-title text-left">
                                <h2>
                                    <router-link to="booker">
                                        Hot dude helps hospice dogs heal happily at his home.
                                    </router-link>
                                </h2>
                            </div>
                            <div class="card-footer text-left">
                                <!-- <div class="stats">
                                        <span>
                                            <i class="now-ui-icons users_circle-08"></i>Nicholas Deleon
                                        </span>
                                    <span>
                                            <i class="now-ui-icons tech_watch-time"></i> June 2, 2017
                                        </span>
                                </div> -->
                                <div class="pull-right">
                                    <router-link to="booker">The Booker Fund</router-link>
                                </div>
                            </div>

                        </card>
                    </div>
                    <div class="col-md-3 px-0">
                        <card type="fashion">
                            <a slot="title" href="#pablo">
                                <h4>
                                    <a href="#pablo" style="color: black;">
                                        Why Early Sailors Were Stalled for Millennia in the...
                                    </a>
                                </h4>
                            </a>
                            <div class="card-footer">
                                <!-- <div class="stats">
                                        <span>
                                            <i class="now-ui-icons users_circle-08"></i>Jon Russell
                                        </span>
                                    <span>
                                            <i class="now-ui-icons tech_watch-time"></i> June 2, 2017
                                        </span>
                                </div> -->
                                <div class="stats-link pull-right">
                                    
                                    <router-link to="serenity">Serenity's Wish</router-link>
                                </div>
                            </div>
                        </card>
                    </div>
                    <div class="col-md-3 px-0">
                        <card type="background" class="card-fashion"
                              style="background-image: url('images/headline1.jpg')">
                        </card>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 px-0">
                        <card type="background" class="card-fashion"
                              style="background-image: url('images/headline1.jpg')">
                        </card>
                    </div>
                    <div class="col-md-3 px-0">
                        <div class="card card-fashion arrow-left">
                            <div class="card-title">
                                <h4>
                                    <a href="#pablo">
                                        My Depressing Summers in Belize
                                    </a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="card-footer">
                                    <div class="stats">
                                        <span>
                                            <i class="now-ui-icons users_circle-08"></i>John Bruno
                                        </span>
                                        <span>
                                            <i class="now-ui-icons tech_watch-time"></i> June 2, 2017
                                        </span>
                                    </div>
                                    <div class="stats-link pull-right">
                                        <a href="#pablo">Opinion</a>&sbquo;
                                        <a href="#pablo">Outdoor</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 px-0">
                        <card type="background" class="card-fashion"
                              style="background-image: url('images/cappy.jpg')">
                            <div class="card-title text-left">
                                <h2>
                                    <a href="#pablo">Fear Not, Rescue Dogs... Here Comes Captain Cowpants!</a>
                                </h2>
                            </div>
                            <div class="card-footer text-left">
                                <div class="stats">
                                        <span>
                                            <i class="now-ui-icons users_circle-08"></i>Joanna Klein
                                        </span>
                                    <span>
                                            <i class="now-ui-icons tech_watch-time"></i> June 2, 2017
                                        </span>
                                </div>
                                <div class="stats-link pull-right">
                                    <router-link class="footer-link" to="cappy">The Cappy Fund</router-link>
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
  import { Card, Button, FormGroupInput } from '@/components';

  export default {
    name: 'blog-posts',
    bodyClass: 'blog-posts',
    components: {
      Card,
      [Button.name]: Button,
      [FormGroupInput.name]: FormGroupInput
    },
    data() {
      return {
        year: new Date().getFullYear()
      }
    },
  }
</script>
<style>
</style>