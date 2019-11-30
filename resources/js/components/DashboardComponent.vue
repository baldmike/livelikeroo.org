<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>WELCOME</h1>
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
    
            },
        },
        created() {
            this.init();
        }
    }
</script>

<style lang="scss" scoped>

    
</style>