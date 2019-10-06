<template>
    <b-container>
        

        <b-row style="margin-top: 200px;">
            <!-- <b-col>
                <div class="shopping-cart">
                    <p class="headline">Your Shopping Cart</p>
                </div>
            </b-col> -->
            <b-col v-for="(item, index) in items" :key="index" cols="12" lg="2" md="4" sm="6">
                <b-card v-if="item.quantity > 1" :img-src="item.image" :img-alt="item.description" style="height: 600px; text-align: center;">
                    <p class="item-title"> {{ item.color }} {{ item.title }} ${{ item.price }}</p>
                    <p class="item-description">{{ item.description }} </p>
                    
                    <b-btn class="select-button" @click="addToCart">ADD TO CART</b-btn>
                </b-card>
            </b-col>
        </b-row>

    </b-container>
</template>
 
<script>
    export default {
        data() {
            return {
                items: []
            }
        },
        methods: {
            addToCart() {
                console.log("ADDED TO CART")
            }
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

<style scoped>

.shopping-cart {
    border: 1px solid black;
    height: 50vh;
}

.select-button {
    width: 100%;
    position: absolute;
    bottom: 0;
    left: 0;
}

.item-title {
    font-size: 1.4vw;
}

.item-description {
    font-size: 1vw;
}

</style>