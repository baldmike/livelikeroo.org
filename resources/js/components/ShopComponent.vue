<template>
    <b-container fluid>

        <b-row style="margin-top: 200px; margin-bottom: 20px;">
            <b-col v-for="(item, index) in items" :key="index" cols="12" lg="3" md="4" sm="6">
                <b-card v-if="item.quantity > 1" :img-src="item.image" :img-alt="item.description" style="height: 500px; text-align: center;">
                    <p class="item-title"> {{ item.color }} {{ item.title }} ${{ item.price }}</p>
                    <p class="item-description">{{ item.description }} </p>

                    
                    <b-btn class="select-button" @click="addToCart(item)">ADD TO CART</b-btn>
                </b-card>
            </b-col>
        </b-row>


        <b-row>
            <b-col>
                <div class="shopping-cart">
                    <p class="headline">Your Shopping Cart</p>
                    <!-- <b-col v-for="(item, index) in cart" :key="index" cols="12">
                        <b-img :src="item.image"/>
                        <p>{{ item.color }} {{ item.title }}, {{ item.description }}</p>
                    </b-col> -->

                    {{ subtotal }}


                </div>
            </b-col>
        </b-row>

    </b-container>
</template>
 
<script>
    export default {
        data() {
            return {
                items: [],
                cart: [],
                subtotal: 0,

            }
        },
        methods: {
            addToCart(item) {
                this.cart.push(item);

                this.subtotal += item.price

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
    height: 110%;
    display: block;
}

.select-button {
    width: 160px;
    position: absolute;
    bottom: 10;
    left: 50%;
    margin-left: -80px;
}

.item-title {
    font-size: 1.4vw;
}

.item-description {
    font-size: 1vw;
}

</style>