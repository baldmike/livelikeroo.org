<template>
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-6 ml-auto mr-auto">
                <img id="image1" class="image  " :src="image1"  fluid alt="Roo Impact">
            </div>
        </div>
    
        
    
    </div>    
</template>

<script>


    export default {
        name: 'gallery',
        data() {
            return {
                image1:'images/LLR_impact1.jpg', 
                image2:'images/LLR_impact2.jpg',
                image3:'images/LLR_impact3.jpg',
                image4:'images/LLR_impact4.jpg',
                images:[],
                show: true,
                transitionName: 'fade'
            }
            
        },
        created(){        
            let self = this;
            let images = [{image:"images/LLR_impact1.jpg"}, {image:"images/LLR_impact2.jpg"}, { image:"images/LLR_impact3.jpg"},{ image:"images/LLR_impact4.jpg"},{ image:"images/LLR_impact5.jpg"},{ image:"images/LLR_impact6.jpg"},{ image:"images/LLR_impact7.jpg"},{ image:"images/LLR_impact8.jpg"},{ image:"images/LLR_impact9.jpg"} ,{ image:"images/LLR_impact10.jpg"},
             { image:"images/LLR_impact11.jpg"}, { image:"images/LLR_impact12.jpg"}];
            
            setInterval(function() {
                self.image1 = images[Math.floor(Math.random() * 3)].image;
            },14000);
            setInterval(function() {
                self.image2 = images[Math.floor(Math.random() * 3) + 3].image;
            },12000);
            setInterval(function() {
                self.image3 = images[Math.floor(Math.random() * 3) + 6].image;
            },10000);
            setInterval(function() {
                self.image4 = images[Math.floor(Math.random() * 3) + 9].image;
            },16000);   
        }
    }

</script>
<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.container-fluid {
    background: url('/images/bg22.jpg');
    background-size: cover;
    margin-bottom: 120px;
}
.image {
    margin: 80px 0;
}

.slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}

</style>