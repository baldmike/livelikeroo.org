<template>
    <!-- form navigation -->
        <div class="row nav-box">
                <div class="col-6 mr-auto ml-auto form-nav">
                    <n-button @click.prevent.native="$emit('backStep')" type="primary" round block><i class="fas fa-arrow-circle-left"></i></n-button>
                    <span style="font-size: 1rem">BACK</span>
                </div>                    
                
                <div class="col-6 mr-auto ml-auto form-nav">
                    <n-button @click.prevent.native="$emit('nextStep')" type="primary" round block><i class="fas fa-arrow-circle-right"></i></n-button>
                    <span style="font-size: 1rem">NEXT</span>
                </div>
            
        </div>    
</template>

<script>

    import { Button } from '@/components';

    export default {
        components: {
            [Button.name]: Button,
        },
    }
</script>

<style lang="scss" scoped>
    .form-nav {
        text-align: center;
        font-size: 3rem;
        margin-top: 2rem;
        
    }

    .nav-box {
        border-top: 10px solid black;
        margin-top: 2rem;
    }
</style>
