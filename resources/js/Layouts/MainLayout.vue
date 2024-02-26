<template>
    <header class="border-b-2 border-gray-300 dark:border-gray-700 bg-white dark:bg-slate-800 w-full shadow-lg">
        <div class="container mx-auto">
            <nav class="p-4 flex items-center justify-between">
                
                <div class="text-xl text-blue-600 dark:text-blue-300 font-bold text-center">
                    <Link :href="route('listing.index')">
                        <!-- <span class="text-2xl font-bold">LOGO</span> -->
                        <img src="https://logodix.com/logo/483978.png" alt="logo" class="w-24"/>   
                    </Link>
                </div>
                <div class="text-lg font-medium hidden sm:block">
                    <Link class="dark:text-white font-bold text-blue-600" :href="route('home')">Home</Link>
                </div>
                <div class="text-lg font-medium hidden sm:block">
                    <Link class="dark:text-white font-bold text-blue-600" :href="route('listing.index')">Listings</Link>
                </div>

                <div v-if="user" class="items-center gap-4 flex">
                    <Link :href="route('notification.index')" class="text-gay-500 relative text-md p-2 cursor-pointer">     
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                        </svg> <span v-if="notificationCount" class="absolute right-0 top-0 w-5 h-5 bg-red-700 text-center dark:bg-red-400 text-sm text-white border border-white rounded-full">{{ notificationCount }}</span>
                    </Link>
                    <!-- <Link :href="route('notification.index')" class="text-gay-500 relative text-md p-2 cursor-pointer">     
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M5.25 9a6.75 6.75 0 0 1 13.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 0 1-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 1 1-7.48 0 24.585 24.585 0 0 1-4.831-1.244.75.75 0 0 1-.298-1.205A8.217 8.217 0 0 0 5.25 9.75V9Zm4.502 8.9a2.25 2.25 0 1 0 4.496 0 25.057 25.057 0 0 1-4.496 0Z" clip-rule="evenodd" />
                        </svg> <span v-if="notificationCount" class="absolute right-0 top-0 w-5 h-5 bg-red-700 text-center dark:bg-red-400 text-sm text-white border border-white rounded-full">{{ notificationCount }}</span>
                    </Link> -->

                    <Link class="dark:text-white hidden sm:block font-bold text-blue-600" :href="route('realtor.listing.index')">My Listings</Link>
                    <div class="text-sm hidden sm:block text-gray-500">{{user.name}}</div>
                    <Link :href="route('realtor.listing.create')" class="bg-blue-600 px-4 py-1.5 rounded-full text-white hidden sm:block">+ New Listing</Link>
                    <div class="hidden sm:block">
                        <Link :href="route('logout')" method="delete" as="button">Logout</Link>
                    </div>
                </div>
                <div v-else class="flex items-center gap-4">
                    <Link :href="route('user-account.create')">Register</Link>
                    <Link :href="route('login')">Sign In</Link>
                </div>
                <!-- BEGIN: Navbar for smaller screens -->
                <div class="sm:hidden">
                    <button @click="toggleNavbar" class="text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-gray-100 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    <div v-if="showNavbar" class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
                        <div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
                            <div class="px-5 pt-4 flex items-center justify-between">
                                <div>
                                    <!-- <Link :href="route('listing.index')" class="text-blue-600 dark:text-blue-300 font-bold text-center">
                                        <span>LOGO</span>
                                    </Link> -->
                                </div>
                                <div class="-mr-2">
                                    <button @click="toggleNavbar" type="button" class="bg-white dark:bg-slate-800 rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                                        <span class="sr-only">Close menu</span>
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="px-2 pt-2 pb-3 space-y-1">
                                <Link :href="route('home')" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100 hover:bg-gray-50 dark:hover:bg-gray-700">Home</Link>
                                <Link :href="route('listing.index')" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100 hover:bg-gray-50 dark:hover:bg-gray-700">Listings</Link>
                                <Link :href="route('realtor.listing.index')" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100 hover:bg-gray-50 dark:hover:bg-gray-700">My Listings</Link>
                                <Link :href="route('realtor.listing.create')" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100 hover:bg-gray-50 dark:hover:bg-gray-700">+ New Listing</Link>
                                <Link :href="route('logout')" method="delete" as="button" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100 hover:bg-gray-50 dark:hover:bg-gray-700">Logout</Link>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Navbar for smaller screens -->
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

    <!-- <footer class="p-20">
        <p>copyright &copy; 2024 by Ahmad @ GNPC</p>
    </footer> -->
</template>

<script setup>

import {Link, usePage} from '@inertiajs/vue3'
import { computed, ref } from 'vue';

const page = usePage();
const flashSuccess = computed(() => page.props.flash.success);
const user = computed(() => page.props.auth.user);

const notificationCount = computed(
    () => page.props.auth.user.notificationCount
    // () => Math.min(page.props.auth.user.notificationCount, 9)
)

const showNavbar = ref(false);

function toggleNavbar() {
    showNavbar.value = !showNavbar.value;
}

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
        background-color: #a4dfb2;
        color: #fff;
        font-weight: bold;
        text-align: center;
    }
    .text-blue-600 {
        color: #3182ce;
    }
    .dark:text-blue-300 {
        color: #a0aec0;
    }
    .dark:bg-slate-800 {
        background-color: #1a202c;
    }
    .dark:text-white {
        color: #fff;
    }
    .btn-primary {
        background-color: #3182ce;
        color: #fff;
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
    }
    .btn-primary:hover {
        background-color: #2c5282;
    }
</style>