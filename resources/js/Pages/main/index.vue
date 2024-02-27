<script setup>
    import { ref } from "vue";
    import axios from 'axios';
    // import { router,Link,useForm  } from '@inertiajs/vue3'
    import { Inertia } from '@inertiajs/inertia';


    // product variables
    let name = ref("");
    let price = ref();
    let quantity = ref();
    let description = ref("");
    let selectedCategories = ref([]);

    // product categories
    let categories = ref([]);
    fetchNotes();

    // error message states
    let categoriesError = ref(false);
    let missingFieldError = ref(false);
    let submitError = ref(false);

    // api request to fetch categories
    function fetchNotes(){
        axios.get('/api/fetch-categories')
            .then(response => {
                categories.value = response.data;
            })
            .catch(error => {
                // create an error message for the user
                categoriesError.value = true;
                categories.value = null;
                console.error('Request failed:', error.response.data);
                return null;
            });
    }
    function createProduct(){
        // name, price, quantity, description, selected categories

        if(!name.value || !price.value || !quantity.value){
            missingFieldError.value = true;
            console.error("missing fields");
            return false;
        }
        var data = {
            name:name.value,
            price:price.value,
            quantity:quantity.value,
            description:description.value,
            selectedCategories:selectedCategories.value,
        }

        Inertia.post(
            route('save-product'), 
            data, 
            {
                // Optional visit options
                onSuccess: (data) => {
                    return;
                },
                onError: (error) => {
                    submitError.value = true;
                    console.error(error);
                },
            }
        );
        return;
    }

</script>

<template>
    <form @submit.prevent="form.post(route('save-product'))"></form>
    <div style="display:flex">
        <div class = "column">
            <div class="row">
                <input v-model="name" placeholder="name">
                <br>
            </div>
            <div class="row">
                <input v-model="price" type="number" placeholder="price">
                <br>
            </div>
            <div class="row">
                <textarea v-model="description" placeholder="description"></textarea>
                <br>
            </div>
            <div class="row">
                <button @click="createProduct()">Create Product</button>
                <br>
            </div>
        </div>

        <div class ="column">
            <div class="row">
                <select multiple v-model="selectedCategories">
                    <option v-for="category in categories">{{ category.name }}</option>
                </select>
                <br>
            </div>
            <div class="row">
                <input v-model="quantity" type="number" placeholder="quantity">
                <br>
            </div>
            <div class="row">
                <button @click="createCategory">Create New Category</button>
                <br>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .column{
        margin:100px;
    }
    .row{
        margin:20px;
    }
</style>