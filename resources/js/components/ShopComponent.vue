<template>
    <b-row>
        <b-col cols="12" style="margin-top: 100px; text-align: center;">
            <b-card
                title="Coloring Books are Here!"
                img-src="/images/IMG_4750.jpeg"
                img-alt="Image"
                
                tag="article"
                style="width: 20rem;"
                class="mb-2"
            >
                <b-card-text>
                Get yours before they sell out! They're $20 for the first one, and $10 for each additional one! Grab one while they last!
                </b-card-text>

        
                <b-button @click.prevent="buy" href="#" variant="primary">Get Yours Today!</b-button>
            </b-card>
        </b-col>
    </b-row>
</template>
 
<script>
    export default {
        data() {
            return {
 
            }
        },
        methods: {
            buy() {
                console.log("IN THE BUY");
                this.$router.push('coloring-book');
            }
        },
        computed: {
        
        },
        }
</script>

<style>
</style>