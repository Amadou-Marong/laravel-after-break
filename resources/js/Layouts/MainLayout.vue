<template>
    <header>
        <Link href="/">Main Page</Link>&nbsp;
        <Link href="/hello">Show Page</Link>
    </header>
    <!-- <div>The Page Timer is: {{timer}}</div> -->

    <!-- <div v-if="page.props.flash.success" class="alert alert-success">
        {{page.props.flash.success}}  
    </div> -->
    
    <div v-if="flashSuccess" class="alert alert-success">
        {{flashSuccess}}  
    </div>
    <slot />
    <footer>
        <p>copyright &copy; 2024 by Ahmad</p>
    </footer>
</template>

<script setup>
import {Link, usePage} from '@inertiajs/vue3'
import { computed } from 'vue';

const page = usePage();

// I used this instead of the above flash alert line
const flashSuccess = computed(() => page.props.flash.success);

// import { ref } from 'vue';

// setInterval(() => {
//     timer.value++;
// }, 1000);

// setInterval(() => timer.value++, 1000);
// const timer = ref(0);
</script>

<style scoped>
    header {
        background-color: #ccc;
        padding: 10px;
    }
    footer {
        background-color: #ccc;
        padding: 10px;
    }
    .alert {
        padding: 10px;
    }
    .alert-success {
        background-color: #28a745;
        color: #fff;
    }
</style>