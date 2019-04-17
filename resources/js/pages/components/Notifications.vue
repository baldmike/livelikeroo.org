<template>
    <div id="notifications" >
        
        <div class="alert alert-success" role="alert" v-if="this.$store.state.alerts.success">
            <div class="container">
                <div class="alert-icon">
                    <i class="now-ui-icons ui-2_like"></i>
                </div>
                <strong>Well done!</strong> You successfully read this important alert message.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="now-ui-icons ui-1_simple-remove"></i>
                            </span>
                </button>
            </div>
        </div>
        <div class="alert alert-info" role="alert" v-if="this.$store.state.alerts.info">
            <div class="container">
                <div class="alert-icon">
                    <i class="now-ui-icons travel_info"></i>
                </div>
                <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="now-ui-icons ui-1_simple-remove"></i>
                            </span>
                </button>
            </div>
        </div>
        <div class="alert alert-warning" role="alert" v-if="this.$store.state.alerts.warning">
            <div class="container">
                <div class="alert-icon">
                    <i class="now-ui-icons ui-1_bell-53"></i>
                </div>
                <strong>Warning!</strong> Better check yourself, you're not looking too good.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="now-ui-icons ui-1_simple-remove"></i>
                            </span>
                </button>
            </div>
        </div>
        <div class="alert alert-danger" role="alert" v-if="this.$store.state.alerts.danger">
            <div class="container">
                <div class="alert-icon">
                    <i class="now-ui-icons objects_support-17"></i>
                </div>
                <strong>Oh snap!</strong> Change a few things up and try submitting again.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="now-ui-icons ui-1_simple-remove"></i>
                            </span>
                </button>
            </div>
        </div>
    </div>
</template>
<script>
    export default {}
</script>
<style>
</style>
