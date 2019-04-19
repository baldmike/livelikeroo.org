<template>
        <div class="row">
            <div class="col-md-12">
                <h1>Dashboard Component you see</h1>
                <h1>Dashboard Component you see</h1>
                <h1>Dashboard Component you see</h1>
                <h1>Dashboard Component you see</h1>
                <h1>Dashboard Component you see</h1>
                <h1>Dashboard Component you see</h1>
                <h1>Dashboard Component you see</h1>
            </div>
        </div>
</template>

<script>

    import { mapActions, mapGetters } from "vuex";

    export default {
        name: 'dashboard',
        components: {
          
        },
        data() {
            return {
                
            }
        },
        computed: mapGetters(['isAuthenticated']),
        methods: {
            init() {
                console.log("[Dashboard Comp -- init method");
            },
        },
        created() {
            this.init();
            console.log('Dashboard Component mounted.')
        }
    }
</script>

<style lang="scss" scoped>

    
</style>