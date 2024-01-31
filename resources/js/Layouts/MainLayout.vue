<template>
    <header>
        <Link href="/">Main Page</Link>&nbsp;
        <Link href="/hello">Show Page</Link>
    </header>
    <div>The Page Timer is: {{timer}}</div>
    <slot />
    <footer>
        <p>copyright &copy; 2024 by Ahmad</p>
    </footer>
</template>

<script setup>
import {Link} from '@inertiajs/vue3'
import { ref } from 'vue';
// setInterval(() => {
//     timer.value++;
// }, 1000);
setInterval(() => timer.value++, 1000);
const timer = ref(0);
</script>
