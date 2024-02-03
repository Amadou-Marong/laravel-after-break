<template>
    <h1>Index Page</h1>   
    <p>Message is: {{message}}</p> 
</template>
<script setup>

defineProps({
    message: String,
    required: true,
    default: 'Hello World', 
});
</script>

<!-- <script>
    import MainLayout from '../../Layouts/MainLayout.vue';

    export default {
        layout: MainLayout,
    }
</script> -->