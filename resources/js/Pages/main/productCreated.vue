<script setup>
 import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
    Product Created Successfully!

    <Link :href="route('add-products')">Back to Form</Link>
</template>