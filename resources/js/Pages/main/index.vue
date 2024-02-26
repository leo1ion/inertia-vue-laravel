<script setup>
    import { reactive, ref } from "vue";
    import axios from 'axios';
    import { Link } from "@inertiajs/inertia-vue3";
    import { router } from '@inertiajs/vue3'

    // product variables
    const name = ref("");
    const price = ref();
    const quantity = ref();
    const description = ref("");
    const selectedCategories = ref([]);
    let productForm = reactive({
        name:null
    })

    // product categories
    let categories = ref([]);
    fetchNotes();

    // error message states
    let categoriesError = ref(false);

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
        router.post
    }

</script>

<template>
    <div style="display:flex">
        <div class = "column">
            <div class="row">
                <input for="name" placeholder="name">
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
                <button @click="createProduct()">Create New Category</button>
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