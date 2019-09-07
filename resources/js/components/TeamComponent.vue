<template>
    <div class="about-team team-4">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <h2 class="title">Meet The Board</h2>
                    <h4 class="description">Making moves by day, saving dogs by night. Here is our team.</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-7 ml-auto mr-auto">
                    <card type="profile" plain>
                        <div slot="raw-content" class="row">
                            <div class="col-md-5">
                                <div class="card-image">
                                    <a href="#">
                                        <img class="img img-raised rounded" src="images/teamSarah.jpg"/>
                                    </a>
                                </div>

                                <div class="card-footer">
                                    <a href="https://www.instagram.com/instasarah/" target="_blank" class="btn btn-icon btn-neutral btn-instagram"><i
                                            class="fab fa-instagram"></i></a>
                                    <a href="https://www.twitter.com/sarahlauch" target="_blank" class="btn btn-icon btn-neutral btn-twitter"><i
                                            class="fab fa-twitter"></i></a>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h4 class="card-title">Sarah Lauch</h4>
                                    <h6 class="category">Founder</h6>
                                    <p class="card-description textOnWhite">
                                        Sarah grew up in Pennsylvania with tons of pets, including pot-bellied pigs. When she moved to Chicago, she volunteered at an open-admission shelter, 
                                    </p>
                                        
                                    <p v-if="sarah" class="card-description textOnWhite">
                                        and decided she wanted to make a difference in the lives of animals that were in dire need of rescue. As a transfer team member, she assisted rescues in evaluating dogs for their programs. Dogs that she interacted with were often euthanized. Sarah grew a thick skin. When she met Roo at the same shelter, she had no idea the crazy turn her life would take in the next 6 months. Live Like Roo is the epitome of everything that she believes in and she is happy to carry on his legacy through this Foundation. Her full-time job is in sports television as an Executive Producer at NBC Sports and she is married to a very patient man we call Schipp. They have 4 dogs-Mac, Cheese, Steve and Zoey.
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
                                        <img class="img img-raised rounded" src="images/teamLaura.jpg"/>
                                    </a>
                                </div>

                                
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h4 class="card-title">Laura Krill</h4>
                                    <h6 class="category">VP/Medical Case Manager</h6>
                                    <p class="card-description textOnWhite">
                                        Laura grew up with pets and has always shared her home with dogs, cats, and even a rabbit. In 2014, Laura's dog
                                    </p>
                                        
                                    <p v-if="laura">
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
                                        <img class="img img-raised rounded" src="images/teamNicole.jpg"/>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h4 class="card-title">Nicole Cadwell</h4>
                                    <h6 class="category">City Event Director</h6>
                                    <p class="card-description textOnWhite">
                                        Nicole, a Chicago native who works in Remote Operations for the BIG Ten Network, grew up with rescue dogs and cats. After graduating from college
                                    </p>

                                    <p v-if="nicole">
                                        in 2005, Nicole and her now husband Caddy adopted Mia, an 8-month-old Rottweiler Sheppard Mix from the Anti Cruelty Society. After adopting Mia, Nicole felt like she was always trying to find the courage to volunteer at a shelter, but consistently resorted to volunteering at fundraising and awareness events out of fear of what she would see in the shelters. Then in 2009, their family grew with the adoption of a 7-week-old shepherd mix, Ole. While trying to attend as many fundraisers for local rescue groups as possible, Nicole came across the social media craze that was baby Jane and from there found the Live Like Roo Foundation. Meeting Sarah and the wonderful people on the LLR team helped her grow the strength she needed to step into the rescue world. Nicole is now a Barn Leader Assistant at Alive Rescue’s Little Barn and tries to attend every LLR Chicagoland Rescue Intervention and Support Program shift that she can.“Sarah and the LLR Foundation work so hard to help so many people and their pets in desperate times of need. Being a part of this team is a true honor to me.” 
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
                                                src="images/kathyBill.jpg"/>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-7">
                                <div class="card-body">
                                    <h4 class="card-title">Kathy Lesinski</h4>
                                    <h6 class="category">City Event Planner</h6>
                                    <p class="card-description textOnWhite">
                                        Kathy has loved dogs her entire life. Although she did not get her first rescue dog, Aria, until she was 14, her childhood in Warsaw Poland was spent bringing 
                                    </p>

                                    <p v-if="kathy">
                                        home stray dogs and trying to help as many as she could. Kathy has been volunteering with local rescues and fostering dogs in Chicago since 2006.  She and her only foster fail, Bill the Peanut, love being part of the Chicago rescue community. Kathy is thrilled she gets to utilize her love of event planning and fundraising to help the Live Like Roo Foundation.

                                        Kathy works full time at a local university and recently finished a master’s degree in public administration. In her spare time she enjoys hanging with dogs, yoga, biking, a nice glass of rose, and quality Bravo programming.
                                    </p>

                                    <n-button type="primary" @click.prevent.native="showBioKathy"><span v-if="kathy">Show Less</span><span v-if="!kathy">...Read Full Bio</span></n-button>
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
                                                src="images/teamSara.jpg"/>
                                    </a>
                                </div>

                                <div class="card-footer">
                                    <a href="https://www.linkedin.com/in/sara-depasquale-99794710/" class="btn btn-icon btn-neutral btn-linkedin"><i
                                            class="fab fa-linkedin"></i></a>
                                    <a href="https://www.instagram.com/sarafina85/" target="_blank" class="btn btn-icon btn-neutral btn-instagram"><i
                                            class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h4 class="card-title">Sara DePasquale</h4>
                                    <h6 class="category">Run Like Roo Director</h6>
                                    <p class="card-description textOnWhite">
                                        One of Sara’s first words was “doggie”. Coincidence? We think not. Sara has always had a passion for pups, especially the “Bully Breeds”. Her hunk, Rocco </p>                            

                                        <p v-if="sara">(a Pittie), has shown her the love and companionship these dogs are truly known to give. Wanting to help change the minds of so many people regarding the breed, Sara started volunteering in animal rescue. Soon after starting to volunteer, she became a foster (fail) with her first foster ~ #BlancheTheBeagle. In 2018, the one thing that Sara feared, happened ~ Rocco had a Mast Cell Tumor. After working with LLR – Sara truly saw what it was like on the other side of rescue. The side where she needed to learn on Roo & friends for support. Sara is happy to say that Rocco had tumor removal and is now cancer free!

                                        In her free time, Sara likes to do Bikram Yoga, try new restaurants, drink wine & dirty martinis (not in the same sitting of course), spend time with her friends, pups & live her life to the fullest ~ living like Roo.

                                        For more on our running team: sara.depasquale@gmail.com
                                    </p>

                                    <n-button type="primary" @click.prevent.native="showBioSara"><span v-if="sara">Show Less</span><span v-if="!sara">...Read Full Bio</span></n-button>
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
                                                src="images/teamDawn.png"/>
                                    </a>
                                </div>

                                <div class="card-footer">
                                    <a href="https://www.instagram.com/daebreyk/" target="_blank" class="btn btn-icon btn-neutral btn-instagram"><i
                                            class="fab fa-instagram"></i></a>
                                    <a href="https://www.linkedin.com/in/dawnmm/" target="_blank" class="btn btn-icon btn-neutral btn-linkedin"><i
                                            class="fab fa-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h4 class="card-title">Dawn Mueller</h4>
                                    <h6 class="category">Graphic Designer</h6>
                                    <p class="card-description textOnWhite">
                                        Aside from having incredible fashion sense and sporting the most spectacular hairstyles, Dawn has always had a soft spot for big dogs. After moving to
                                    </p>

                                    <p v-if="dawn">
                                        Chicago 22 years ago, the first dog she adopted was Mousse, a Labrador Retriever from the Anti Cruelty Society. She volunteered there for a bit but found that, as an introvert, she was not well-suited to work the adoption floor. It wasn’t until several years later when she adopted Daryl Blu, who was saved during a CRISP shift at CACC, that she started really getting introduced to the Chicago rescue community. She learned about Live Like Roo and went to a couple blanket tying events and, when asked to help with some graphics, finally found her place in the rescue community.
                                        When not pounding away at the computer, she’s posting pictures of Daryl on Instagram, running a half marathon, or dodging tourists on the bike path.
                                    </p>

                                    <n-button type="primary" @click.prevent.native="showBioDawn"><span v-if="dawn">Show Less</span><span v-if="!dawn">...Read Full Bio</span></n-button>
                                </div>
                            </div>
                        </div>
                    </card>
                </div>

                <!-- <div class="col-xl-6 col-lg-7 ml-auto mr-auto">
                    <card type="profile" plain>
                        <div slot="raw-content" class="row">
                            <div class="col-md-5">
                                <div class="card-image">
                                    <a href="#">
                                        <img class="img img-raised rounded"
                                                src="images/teamLindsay.jpg"/>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h4 class="card-title">Lindsay Griffith</h4>
                                    <h6 class="category">Advisory Board Director</h6>
                                    <p class="card-description textOnWhite">    
                                        After a lifetime of crossing the street just to pet other people’s dogs, Lindsay finally got her own dog, Low, in 2011.  He’d been at a municipal, high-kill shelter 
                                    </p>
                                    <p v-if="lindsay">
                                        for more than three months and it’s hard to say who got luckier the day Low was adopted.  When Lindsay shifted gears professionally, she started volunteering with One Tail at a Time and realized that helping dogs get second chances was some of the most fulfilling work she’d ever done.  Lindsay lives for CRISP shifts and is elated to be part of Team Roo, helping animals and owners who would give anything for more time together.
                                        To pay for her late-night Facebook fundraiser donation habits, Lindsay trains English Language Arts teachers around the country.  When not volunteering with dogs, Lindsay can be found throwing parties for The Birthday Party Project, reading trashy novels, or renting sparkly dresses and making high-profile mischief with her sister.  Lindsay and her incredibly tolerant husband have two dogs: Low, the best boy ever, and Fancy, an elderly, she-devil Pomeranian who uses her remaining few teeth to bite those who love her most.
                                    </p>

                                    <n-button type="primary" @click.prevent.native="showBioLindsay"><span v-if="lindsay">Show Less</span><span v-if="!lindsay">...Read Full Bio</span></n-button>
                                </div>
                            </div>
                        </div>
                    </card>
                </div> -->

                <div class="col-xl-6 col-lg-7 ml-auto mr-auto">
                    <card type="profile" plain>
                        <div slot="raw-content" class="row">
                            <div class="col-md-5">
                                <div class="card-image">
                                    <a href="#">
                                        <img class="img img-raised rounded"
                                                src="images/stairs2.jpg"/>
                                    </a>
                                </div>

                                <div class="card-footer">
                                    <a href="https://www.linkedin.com/in/baldmike/" target="_blank" class="btn btn-icon btn-neutral btn-linkedin"><i
                                            class="fab fa-linkedin"></i></a>
                                    <a href="https://www.instagram.com/baldmikesees/" target="_blank" class="btn btn-icon btn-neutral btn-instagram"><i
                                            class="fab fa-instagram"></i></a>
                                    <a href="https://www.twitter.com/baldmikesays/" target="_blank" class="btn btn-icon btn-neutral btn-twitter"><i
                                            class="fab fa-twitter"></i></a>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h4 class="card-title">Bald Mike</h4>
                                    <h6 class="category">Nerd</h6>
                                    <p class="card-description textOnWhite">    
                                        Bald Mike is a computer nerd who loves shelter dogs, roots for the underdogs and, despite being from Chicago, puts ketchup on his hot dogs. He is an Aries.
                                    </p>
                                    <p v-if="mike">
                                        As a rescue/foster/adoption advocate, Bald Mike loves all dogs, but has a soft spot for the silly bully breeds, like his knucklehead, Chopper - who himself is a cancer survivor, with help from Live Like Roo. After fostering several dogs including Dog Mike (now Duke), Screwball (now Steel) and Mr. Bananas (still Mr. Bananas), he foster-failed with Chopper because you would have, too.  Professionally, Bald Mike is a software developer, working currently with PHP/Laravel and JavaScript/Vue.js. His goal is to assist as many rescues and shelters as he can with their technology. After years of involvement in the rescue community, he FINALLY got a date out of it, and Bald Mike and Chopper are now over the moon for Mia and Coco Louise. That's a person and a dog.
                                    </p>

                                    <n-button type="primary" @click.prevent.native="showBioMike"><span v-if="mike">Show Less</span><span v-if="!mike">...Read Full Bio</span></n-button>
                                </div>
                            </div>
                        </div>
                    </card>
                </div>
            </div>
        </div>
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
            laura: false,
            nicole: false,
            kathy: false,
            dawn: false,
            sara: false,
            lindsay: false,
            mike: false
        }
    },
    methods: {
        showBioSarah() {
            this.sarah = !this.sarah;
        },
        showBioLaura() {
            this.laura = !this.laura;
        },
        showBioNicole() {
            this.nicole = !this.nicole;
        },
        showBioKathy() {
            this.kathy = !this.kathy;
        },
        showBioDawn() {
            this.dawn = !this.dawn;
        },
        showBioSara() {
            this.sara = !this.sara;
        },
        showBioLindsay() {
            this.lindsay = !this.lindsay;
        },
        showBioMike() {
            this.mike = !this.mike;
        }
    }
  }
</script>

<style>
    .textOnWhite {
        color: #333333 !important;
    }
</style>
