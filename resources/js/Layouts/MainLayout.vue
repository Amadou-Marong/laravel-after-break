<template>
    <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-slate-800 w-full">
        <div class="container mx-auto">
            <nav class="p-4 flex items-center justify-between">
                <div class="text-lg font-medium">
                    <Link :href="route('listing.index')">Listings</Link>
                </div>
                <div class="text-xl text-green-600 dark:text-green-300 font-bold text-center">
                    <!-- <Link :href="route('listing.index')">GNPC</Link> -->
                    <Link :href="route('listing.index')">
                        GNPC
                    </Link>
                </div>
                <div>
                    <Link :href="route('listing.create')" class="bg-green-600 hover:bg-green-500 p-2 rounded-md">+ New Listing</Link>
                </div>
            </nav>
        </div>
        
    </header>

    <main>
        <div class="container mx-auto">
            <div v-if="flashSuccess" class="alert alert-success">
                {{flashSuccess}}  
            </div>
            <slot />
        </div>
    </main>

    <footer class="p-20">
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
  /*  header {
        background-color: #ccc;
        padding: 10px;
    }
    footer {
        background-color: #ccc;
        padding: 10px;
    }*/
    .alert {
        padding: 10px;
    }
    .alert-success {
        background-color: #28a745;
        color: #fff;
    }
</style>