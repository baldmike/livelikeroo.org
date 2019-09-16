<template>
    <div>
        <h1 style="margin-top: 200px;">ITEMS</h1>
        <h1 v-for="(item, index) in items" :key="index">{{ item.title }}</h1>
    </div>
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