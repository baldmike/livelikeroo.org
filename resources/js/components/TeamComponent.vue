<template>
    <div class="about-team team-4">
        <div class="container">

            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <h2 class="title">Meet The Board!</h2>
                    <!-- <h4 class="description">Making moves by day, saving dogs by night. Here is our team.</h4> -->
                </div>
            </div>
            
            <div class="row">
                <div class="col-xl-6 col-lg-7 ml-auto mr-auto">
                    <card type="profile" plain>
                        <div slot="raw-content" class="row">
                            <div class="col-md-5">
                                <div class="card-image">
                                    <a href="#">
                                        <img class="img img-raised rounded" src="images/sarah_new.jpg"/>
                                    </a>
                                </div>

                                <!-- <div class="card-footer">
                                    <a href="https://www.instagram.com/instasarah/" target="_blank" class="btn btn-icon btn-neutral btn-instagram"><i
                                            class="fab fa-instagram"></i></a>
                                    <a href="https://www.twitter.com/sarahlauch" target="_blank" class="btn btn-icon btn-neutral btn-twitter"><i
                                            class="fab fa-twitter"></i></a>
                                </div> -->
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h4 class="card-title">Sarah Lauch</h4>
                                    <h6 class="category">Founder/Executive Director</h6>
                                    <p class="card-description textOnWhite">
                                        Sarah grew up in Pennsylvania with tons of pets, including pot-bellied pigs. When she moved to Chicago, she volunteered at an open-admission shelter, 
                                    </p>
                                        
                                    <p v-if="sarah" class="card-description textOnWhite">
                                        and decided she wanted to make a difference in the lives of animals that were in dire need of rescue. As a transfer team member, she assisted rescues in evaluating dogs for their programs. Dogs that she interacted with were often euthanized. Sarah grew a thick skin. When she met Roo at the same shelter, she had no idea the crazy turn her life would take in the next 6 months. Live Like Roo is the epitome of everything that she believes in and she is happy to carry on his legacy through this Foundation. Her full-time job is in sports television as an Executive Producer at NBC Sports and she is married to a very patient man we call Schipp. They have 3 dogs - Steve, Mac and Cheese.
                                    </p>
                                    
                                    <n-button type="primary" @click.prevent.native="showBioSarah"><span v-if="sarah">Show Less</span><span v-if="!sarah">...Read Full Bio</span></n-button>
                                </div>
                            </div>
                        </div>
                    </card>
                </div>
               
                <div class="col-xl-6 col-lg-7 ml-auto mr-auto">
                    <card type="profile" plain>
                        <div slot="raw-content" class="row">
                            <div class="col-md-5">
                                <div class="card-image">
                                    <a href="#">
                                        <img class="img img-raised rounded" src="images/teamNicole.jpg"/>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h4 class="card-title">Nicole Cadwell</h4>
                                    <!-- <h6 class="category">City Event Director</h6> -->
                                    <p class="card-description textOnWhite">
                                        Nicole, a Chicago native who works in Remote Operations for the BIG Ten Network, grew up with rescue dogs and cats.
                                    </p>

                                    <p v-if="nicole">
                                         After graduating from college in 2005, Nicole and her now husband Caddy adopted Mia, an 8-month-old Rottweiler Sheppard Mix from the Anti Cruelty Society. After adopting Mia, Nicole felt like she was always trying to find the courage to volunteer at a shelter, but consistently resorted to volunteering at fundraising and awareness events out of fear of what she would see in the shelters. Then in 2009, their family grew with the adoption of a 7-week-old shepherd mix, Ole. While trying to attend as many fundraisers for local rescue groups as possible, Nicole came across the social media craze that was baby Jane and from there found the Live Like Roo Foundation. Meeting Sarah and the wonderful people on the LLR team helped her grow the strength she needed to step into the rescue world. “Sarah and the LLR Foundation work so hard to help so many people and their pets in desperate times of need. Being a part of this team is a true honor to me.”” 
                                    </p>


                                    <n-button type="primary" @click.prevent.native="showBioNicole"><span v-if="nicole">Show Less</span><span v-if="!nicole">...Read Full Bio</span></n-button>
                                </div>
                            </div>
                        </div>
                    </card>
                </div>

                <div class="col-xl-6 col-lg-7 ml-auto mr-auto">
                    <card type="profile" plain>
                        <div slot="raw-content" class="row">
                            <div class="col-md-5">
                                <div class="card-image">
                                    <a href="#">
                                        <img class="img img-raised rounded"
                                                src="images/joe_riley.jpg"/>
                                    </a>
                                </div>

                                <!-- <div class="card-footer">
                                    <a href="https://www.linkedin.com/in/sara-depasquale-99794710/" class="btn btn-icon btn-neutral btn-linkedin"><i
                                            class="fab fa-linkedin"></i></a>
                                    <a href="https://www.instagram.com/sarafina85/" target="_blank" class="btn btn-icon btn-neutral btn-instagram"><i
                                            class="fab fa-instagram"></i></a>
                                </div> -->
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h4 class="card-title">Joe Riley</h4>
                                    <!-- <h6 class="category">Run Like Roo Director</h6> -->
                                    <p class="card-description textOnWhite">
                                        Joe joined the Live Like Roo board in 2019, bringing a very sporty business perspective.</p>                            

                                        <p v-if="joe">  Joe actually met his rescue dog, Jinx at the 2015 “Holiday Craft Bazaar.”  Jinx was being fostered by Laura Krill at the time and came up to Joe while he was visiting the Live Like Roo booth.  They have been bros ever since.  When he isn’t bragging about Jinx winning the Tiny Dog 500, Joe loves attending sporting events, concerts and vacationing to warm places in the winter. Joe’s full-time job is in sports television as a Senior Vice President at Stadium and he is also an Adjunct Professor at DePaul University (Jinx won't let him borrow his bow ties).   Live Like Roo tries to add a sibling for Jinx to the Riley family, but Joe loves having a one dog household.
                                    </p>

                                    <n-button type="primary" @click.prevent.native="showBioJoe"><span v-if="joe">Show Less</span><span v-if="!joe">...Read Full Bio</span></n-button>
                                </div>
                            </div>
                        </div>
                    </card>
                </div>

                <div class="col-xl-6 col-lg-7 ml-auto mr-auto">
                    <card type="profile" plain>
                        <div slot="raw-content" class="row">
                            <div class="col-md-5">
                                <div class="card-image">
                                    <a href="#">
                                        <img class="img img-raised rounded"
                                                src="images/brandi_ferguson.jpg"/>
                                    </a>
                                </div>

                                <!-- <div class="card-footer">
                                    <a href="https://www.instagram.com/daebreyk/" target="_blank" class="btn btn-icon btn-neutral btn-instagram"><i
                                            class="fab fa-instagram"></i></a>
                                    <a href="https://www.linkedin.com/in/dawnmm/" target="_blank" class="btn btn-icon btn-neutral btn-linkedin"><i
                                            class="fab fa-linkedin"></i></a>
                                </div> -->
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h4 class="card-title">Brandi Ferguson</h4>
                                    <!-- <h6 class="category">Graphic Designer</h6> -->
                                    <p class="card-description textOnWhite">
                                        A Texas native, Brandi grew up with rescue animals.  She never knew there was another way.
                                    </p>

                                    <p v-if="brandi">
                                          She and her now husband Tony raised their cat Maggie and their dog Choo through college in Austin and transplanted with them to Dallas after graduation.  They lost Maggie to lymphoma at 21 and Choo to bladder cancer just recently at 16.  Live Like Roo’s mission is very close to Brandi’s heart, and she is honored to be a donor and remote participant, helping spread the word of Roo.  Brandi’s home is currently ruled by 3 sassy cats and 2 happy dogs, and she loves nothing more than staying in with them and watching movies.  She also shares an office with Jet, a feral kitten turned best co-worker, who keeps her sane day after day.
                                    </p>

                                    <n-button type="primary" @click.prevent.native="showBioBrandi"><span v-if="brandi">Show Less</span><span v-if="!brandi">...Read Full Bio</span></n-button>
                                </div>
                            </div>
                        </div>
                    </card>
                </div>
            </div>


            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <h2 class="title">Meet The Team!</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-7 ml-auto mr-auto">
                    <card type="profile" plain>
                        <div slot="raw-content" class="row">
                            <div class="col-md-5">
                                <div class="card-image">
                                    <a href="#">
                                        <img class="img img-raised rounded" src="images/teamLaura.jpg"/>
                                    </a>
                                </div>

                                <!-- <div class="card-footer">
                                    <a href="https://www.instagram.com/instasarah/" target="_blank" class="btn btn-icon btn-neutral btn-instagram"><i
                                            class="fab fa-instagram"></i></a>
                                    <a href="https://www.twitter.com/sarahlauch" target="_blank" class="btn btn-icon btn-neutral btn-twitter"><i
                                            class="fab fa-twitter"></i></a>
                                </div> -->
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h4 class="card-title">Laura Krill</h4>
                                    <h6 class="category">Medical Director</h6>
                                    <p class="card-description textOnWhite">
                                        Laura grew up with pets and has always shared her home with dogs, cats, and even a rabbit. In 2014, Laura's dog
                                    </p>
                                        
                                    <p v-if="laura" class="card-description textOnWhite">
                                        Elmer and her foster dog, Herman, were each diagnosed with cancer. She adopted Herman and made him an official member of her pack (even though he already knew he was right where he belonged). In 2015 she sadly said goodbye to both boys, within 4 months of each other. After Roo's inception, when Laura was asked to serve on the board, she knew it was an obvious choice for her. Having worked the last 17 years in the veterinary field, both general practice and now rehabilitation, Laura serves by reviewing the medical records of our applicants, and helps with selecting recipients for our financial grants. Laura knows the financial burden that comes with a sick pet, but she prides herself on lending an ear and being a sounding board for our applicants. 'Emotional support and backing, with a cancer diagnosis in a pet, is as important, if not more then, the financial aspect,' says Laura. When not volunteering for Roo or working, you'll catch her with a glass of wine and watching something on Netflix.  Each shoulder, has a spot for cats, Fozzie and Frieda, and her lap is filled with her Chihuahuas, Henri and Suzy, and more then likely a foster dog.
                                    </p>
                                    
                                    <n-button type="primary" @click.prevent.native="showBioLaura"><span v-if="laura">Show Less</span><span v-if="!laura">...Read Full Bio</span></n-button>
                                </div>
                            </div>
                        </div>
                    </card>
                </div>
               
                <div class="col-xl-6 col-lg-7 ml-auto mr-auto">
                    <card type="profile" plain>
                        <div slot="raw-content" class="row">
                            <div class="col-md-5">
                                <div class="card-image">
                                    <a href="#">
                                        <img class="img img-raised rounded" src="images/vicki_ruf.jpg"/>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h4 class="card-title">Vicki Ruf</h4>
                                    <h6 class="category">Care Package Director</h6>
                                    <p class="card-description textOnWhite">
                                        Vicki, better known as Chunk’s mom, is also mom to Stitch, Penelope, Abraham and Juice. In addition to Vicki's full time 
                                    </p>

                                    <p v-if="vicki">
                                          job and Live Like Roo she fosters/volunteers for various Chicagoland pitbull rescues. It was over 5 years ago when she took in a litter of puppies. That was the beginning of her pitbull obsession. However rescuing dogs didn’t start there - she’s been taking in unwanted dogs and finding them new homes since she was a kid. Lucky for her she has a very supportive other half, Keith.
                                    </p>


                                    <n-button type="primary" @click.prevent.native="showBioVicki"><span v-if="vicki">Show Less</span><span v-if="!vicki">...Read Full Bio</span></n-button>
                                </div>
                            </div>
                        </div>
                    </card>
                </div>

                <div class="col-xl-6 col-lg-7 ml-auto mr-auto">
                    <card type="profile" plain>
                        <div slot="raw-content" class="row">
                            <div class="col-md-5">
                                <div class="card-image">
                                    <a href="#">
                                        <img class="img img-raised rounded"
                                                src="images/caragh_reilly.jpg"/>
                                    </a>
                                </div>

                                <!-- <div class="card-footer">
                                    <a href="https://www.linkedin.com/in/sara-depasquale-99794710/" class="btn btn-icon btn-neutral btn-linkedin"><i
                                            class="fab fa-linkedin"></i></a>
                                    <a href="https://www.instagram.com/sarafina85/" target="_blank" class="btn btn-icon btn-neutral btn-instagram"><i
                                            class="fab fa-instagram"></i></a>
                                </div> -->
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h4 class="card-title">Caragh Reilly</h4>
                                    <h6 class="category">Booker Fund Manager</h6>
                                    <p class="card-description textOnWhite">
                                        -- BIO COMING SOON --
                                    </p>                            

                                    <p v-if="caragh">  
                                        
                                    </p>

                                    <n-button type="primary" @click.prevent.native="showBioCaragh"><span v-if="caragh">Show Less</span><span v-if="!caragh">...Read Full Bio</span></n-button>
                                </div>
                            </div>
                        </div>
                    </card>
                </div>

                <div class="col-xl-6 col-lg-7 ml-auto mr-auto">
                    <card type="profile" plain>
                        <div slot="raw-content" class="row">
                            <div class="col-md-5">
                                <div class="card-image">
                                    <a href="#">
                                        <img class="img img-raised rounded"
                                                src="images/bianca_parra.jpg"/>
                                    </a>
                                </div>

                                <!-- <div class="card-footer">
                                    <a href="https://www.instagram.com/daebreyk/" target="_blank" class="btn btn-icon btn-neutral btn-instagram"><i
                                            class="fab fa-instagram"></i></a>
                                    <a href="https://www.linkedin.com/in/dawnmm/" target="_blank" class="btn btn-icon btn-neutral btn-linkedin"><i
                                            class="fab fa-linkedin"></i></a>
                                </div> -->
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h4 class="card-title">Bianca Parra</h4>
                                    <h6 class="category">Event Director</h6>
                                    <p class="card-description textOnWhite">
                                        -- BIO COMING SOON --
                                    </p>

                                    <p v-if="bianca">
                                          
                                    </p>

                                    <n-button type="primary" @click.prevent.native="showBioBianca"><span v-if="bianca">Show Less</span><span v-if="!bianca">...Read Full Bio</span></n-button>
                                </div>
                            </div>
                        </div>
                    </card>
                </div>

                <div class="col-xl-6 col-lg-7 ml-auto mr-auto">
                    <card type="profile" plain>
                        <div slot="raw-content" class="row">
                            <div class="col-md-5">
                                <div class="card-image">
                                    <a href="#">
                                        <img class="img img-raised rounded"
                                                src="images/stephanie_thomas.jpg"/>
                                    </a>
                                </div>

                                <!-- <div class="card-footer">
                                    <a href="https://www.linkedin.com/in/sara-depasquale-99794710/" class="btn btn-icon btn-neutral btn-linkedin"><i
                                            class="fab fa-linkedin"></i></a>
                                    <a href="https://www.instagram.com/sarafina85/" target="_blank" class="btn btn-icon btn-neutral btn-instagram"><i
                                            class="fab fa-instagram"></i></a>
                                </div> -->
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h4 class="card-title">Stephanie Thomas</h4>
                                    <h6 class="category">Event Coordinator</h6>
                                    <p class="card-description textOnWhite">
                                        -- BIO COMING SOON --
                                    </p>                            

                                    <p v-if="stephanie">  
                                        
                                    </p>

                                    <n-button type="primary" @click.prevent.native="showBioStephanie"><span v-if="stephanie">Show Less</span><span v-if="!stephanie">...Read Full Bio</span></n-button>
                                </div>
                            </div>
                        </div>
                    </card>
                </div>
            </div>
        </div>

        <h2 class="title text-center">Meet Our Partners!</h2>
    </div>
</template>

<script>
  import { Card, Button, Badge, InfoSection, FormGroupInput, Checkbox } from '@/components';
  import { Select, Option } from 'element-ui'

  export default {
    name: 'about-us',
    bodyClass: 'about-us',
    components: {
      Card,
      InfoSection,
      Badge,
      [Button.name]: Button,
      [Checkbox.name]: Checkbox,
      [FormGroupInput.name]: FormGroupInput,
      [Select.name]: Select,
      [Option.name]: Option,
    },
    data() {
        return {
            sarah: false,
            nicole: false,
            joe: false,
            brandi: false,
            laura: false,
            vicki: false,
            caragh: false,
            bianca: false,
            stephanie: false
        }
    },
    methods: {
        showBioSarah() {
            this.sarah = !this.sarah;
        },
        showBioNicole() {
            this.nicole = !this.nicole;
        },
        showBioJoe() {
            this.joe = !this.joe;
        },
        showBioBrandi() {
            this.brandi = !this.brandi;
        },
        showBioLaura() {
            this.laura = !this.laura;
        },
        showBioVicki() {
            this.vicki = !this.vicki;
        },
        showBioCaragh() {
            this.caragh = !this.caragh;
        },
        showBioBianca() {
            this.bianca = !this.bianca;
        },
        showBioStephanie() {
            this.stephanie = !this.stephanie;
        },
    }
  }
</script>

<style>
    .textOnWhite {
        color: #333333 !important;
    }
</style>
