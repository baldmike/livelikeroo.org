<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
            </div>
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