<template>
    <b-container fluid>
        <b-form style="margin-top: 200px;">
            <b-form-group
                id="itemGroup"
                label="Item Title:"
                label-for="title">
                <b-form-input
                    id="title"
                    v-model="form.title"
                    type="email"
                    required
                    placeholder="Enter title"/>
            </b-form-group>

            <b-form-group 
                id="descriptionGroup" 
                label="Description:" 
                label-for="description">
                <b-form-textarea
                    id="description"
                    v-model="form.description"
                    required
                    placeholder="Enter description"/>
            </b-form-group>

            <b-form-group 
                id="priceGroup" 
                label="Price:" 
                label-for="price">
                <b-form-input
                    id="price"
                    type="number"
                    v-model="form.price"
                    required
                    placeholder="Enter price"
                ></b-form-input>
            </b-form-group>

            <b-form-group 
                id="sizeGroup" 
                label="Size:" 
                label-for="size">
                <b-form-input
                    id="size"
                    type="number"
                    v-model="form.size"
                    placeholder="Enter size"
                ></b-form-input>
            </b-form-group>

            <b-form-group 
                id="quantityGroup" 
                label="Quantity:" 
                label-for="quantity">
                <b-form-input
                    id="quantity"
                    type="number"
                    v-model="form.quantity"
                    required
                    placeholder="Enter quantity"
                ></b-form-input>
            </b-form-group>

            <b-form-group 
                id="colorGroup" 
                label="Color:" 
                label-for="color">
                <b-form-input
                    id="color"
                    v-model="form.color"
                    placeholder="Enter color"
                ></b-form-input>
            </b-form-group>

            <b-form-group id="imageGroup" label-for="imageFinReq" class="box">
                        <label>Send us a picture of <span v-if="form.petName">{{ form.petName }}</span><span v-if="!form.petName">your pet</span>!</label>
                        <b-form-file
                                id="imageFinReq"
                                accept="image/*"
                                v-model="form.image"
                                placeholder="Choose an image..."
                                @change="onImageChange"/>

                        <b-col cols="6" offset="3" style="margin-top: 1rem;">
                            <img v-if="url" :src="url" width="200" alt="uploaded image">
                        </b-col>
                    </b-form-group>
                    
        </b-form>
    </b-container>
</template>
 
<script>
    export default {
        data() {
            return {
                form: {
                    title: '',
                    description: '',
                    price: '',
                    size: '',
                    quantity: '',
                    color: ''
                }
            }
        },
        methods: {

        },
        computed: {

        },
    }
</script>

<style>

.container-fluid {
    background-color: black;
    color: white;
    padding: 60px;
}
</style>