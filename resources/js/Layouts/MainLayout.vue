<template>
    <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-slate-800 w-full">
        <div class="container mx-auto">
            <nav class="p-4 flex items-center justify-between">
                
                <div class="text-xl text-green-600 dark:text-green-300 font-bold text-center">
                    <Link :href="route('listing.index')">
                        <img class="w-16" src="/resources/assets/images/logo.jpg" alt="">
                    </Link>
                </div>
                <div class="text-lg font-medium">
                    <Link class="dark:text-white font-bold text-green-600" :href="route('listing.index')">Listings</Link>
                </div>
                <div v-if="user" class="flex items-center gap-4">
                    <div class="text-sm text-gray-500">{{user.name}}</div>
                    <Link :href="route('listing.create')" class="btn-primary">+ New Listing</Link>
                    <div>
                        <Link :href="route('logout')" method="delete" as="button">Logout</Link>
                    </div>
                </div>
                <!-- <div v-else class="flex items-center gap-4">
                    <Link :href="route('user-account.create')">Register</Link>
                    <Link :href="route('login')">Sign In</Link>
                </div> -->
            </nav>
        </div>
        
    </header>

    <main>
        <div class="container mx-auto p-4 w-full">
            <div v-if="flashSuccess" class="alert alert-success">
                {{flashSuccess}}  
            </div>
            <slot />
        </div>
    </main>

    <footer class="p-20">
        <p>copyright &copy; 2024 by Ahmad @ GNPC</p>
    </footer>
</template>

<script setup>

import {Link, usePage} from '@inertiajs/vue3'
import { computed } from 'vue';

const page = usePage();

// I used this instead of the above flash alert line
const flashSuccess = computed(() => page.props.flash.success);
const user = computed(() => page.props.auth.user);

// import { ref } from 'vue';

// setInterval(() => {
//     timer.value++;
// }, 1000);

// setInterval(() => timer.value++, 1000);
// const timer = ref(0);
</script>

<style scoped>
  /* header {
        background-color: #ccc;
        padding: 10px;
    }
    footer {
        background-color: #ccc;
        padding: 10px;
    }*/
    .alert {
        padding: 10px;
        margin-bottom: 12px;
        border-radius: 4px;
    }
    .alert-success {
        background-color: #28a745;
        color: #fff;
        font-weight: bold;
        text-align: center;
    }
</style>