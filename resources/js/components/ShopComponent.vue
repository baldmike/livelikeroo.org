<template>
    <b-row style="margin-top: 200px;">
        <b-col v-for="(item, index) in items" :key="index" cols="12" md="2">
            <b-card v-if="item.quantity > 10" :img-src="item.image" img-alt="Shop Item">
                <h6>{{ item.title }} ${{ item.price }}</h6>
                <b-btn class="select-button">{{ item.description }}</b-btn>
                <b-btn class="select-button">ADD TO CART</b-btn>
            </b-card>
        </b-col>
    </b-row>
</template>
 
<script>
    export default {
        data() {
            return {
                items: []
            }
        },
        methods: {

        },
        computed: {
        
        },
        created() {
            axios.get('/api/items')
            .then((response) => {
                console.log("SHOP COMPONENT --> CREATED --> GET ITEMS --> RESPONSE:")
                console.log(response.data);
                this.items = response.data.data
            })
            .catch(function (error) {
                console.log(error);
            });    
        }
    }
</script>

<style>

</style>