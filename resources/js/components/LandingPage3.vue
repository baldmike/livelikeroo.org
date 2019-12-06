<template>
    <b-container fluid class="landing-page">
        <b-row class="landing-strip"></b-row>

        <b-row>
            <b-col lg="8">
                <b-img src="/images/roo2.jpg" fluid alt="Roosevelt"></b-img>
            </b-col>
            <b-col lg="4" class="text-center">
                
                <div class="quote">
                    <p>"To know that even one life has breathed easier because you lived here. This is to have succeeded." <small>-Ralph Waldo Emerson</small></p>
                </div>
                <div>
                    <b-button v-b-modal.donationFormModal block class="donate-button">
                        <b-img src="/images/llr_logo.png" width="40"></b-img>
                        Click HERE to donate today!
                    </b-button>

                </div>
            </b-col>
        </b-row>
        <br>

        <b-row>
            <b-col class="text-center title">
                <div>
                    <p>THE LIVE LIKE ROO FOUNDATION</p>
                </div>
            </b-col>
        </b-row>

        <hr>

        <b-row>
            <b-col md="4">
                <div class="info info-hover">
                    <h4 class="info-title text-center"> Who We Are </h4>
                    <p class="text-on-white">
                        We are an all-volunteer-run,  donation-based, 501C3 charitable organization who provides support and financial assistance to families whose pet faces a cancer diagnosis.
                    </p>
                </div>
            </b-col>
                
            <b-col md="4">
                <div class="info info-hover">
                    <h4 class="info-title text-center"> What We Do </h4>
                    <p class="text-on-white">
                        Through financial grants, care packages, special experiences and genuine human support and kindness, The Live Like Roo Foundation has been able to assist over 10,000 pets and their families through cancer diagnoses. Our goal is to be a real life sounding board and support system for people that need guidance and hope, sharing compassion and strength along the way.
                    </p>
                </div>
            </b-col>

            <b-col md="4">
                <div class="info">
                    <h4 class="info-title text-center"> Why We Do It </h4>
                    <p class="text-on-white">
                        Having experienced this devastation first-hand with the loss of Roosevelt, The Live Like Roo Foundation strives to be a helping hand in a difficult and sometimes confusing time. Ultimately, our mission is that you and your pet will #LiveLikeRoo.
                    </p>
                </div>
            </b-col>
        </b-row>

        <b-row>
            <b-col md="4">
                <div class="info">
                    <h4 class="info-title text-center"><b-img class="roo" src="/images/llr_logo.png" width="80"></b-img></h4>
                    <p class="text-on-white">Our amazing volunteers tirelessly put in over <strong>500</strong> hours <em>per month</em> - from making care packages to planning events to coodinating medical care, they do it all.</p>
                </div>
            </b-col>
                
            <b-col md="4">
                <div class="info">
                    <h4 class="info-title text-center"><b-img src="/images/llr_logo.png" width="80"></b-img></h4>
                        <ul>
                            <li>$10,000+ Medical expenses paid <em>per month</em></li>
                    
                            <li>$10,000+ spent on care packages <em>per month</em></li>
                        
                            <li>200+ care packages shipped out <em>per month</em></li>
                        </ul>
                </div>
            </b-col>

            <b-col md="4">
                <div class="info info-hover">
                    <h4 class="info-title text-center"><b-img src="/images/llr_logo.png" width="80"></b-img></h4>
                    <p class="text-on-white">We have assisted over 7
                        000 families and 10,000 animals, including dogs, cats, rabbits, horses and the luckiest hamster ever.
                    </p>
                </div>
            </b-col>
        </b-row>

        <hr>
    </b-container>
</template>

<script>
    export default {
        data() {
            return {

            }
        },
        methods: {

        }
    }
    
</script>

<style>
    .landing-page {
        margin: 100px 0;
    }

    .roo {
        animation: spin 6s linear;
    }

    @keyframes spin {
	0% {
		transform: rotateZ(0);
	}
	100% {
		transform: rotateZ(360deg);
	}
}
</style>