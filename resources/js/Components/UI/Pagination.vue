<template>
    <div class="flex gap-1">
        <Link 
            v-for="(link, index) in links" 
            :key="index" 
            :href="link.url" 
            class="py-2 px-4 rounded-md text-blue-500 hover:text-blue-700" 
            :class="{'bg-blue-500 dark:bg-blue-800 text-gray-300': link.active}"
            v-html="link.label"
        />   
    </div>
</template>

<script setup>
import {Link} from '@inertiajs/vue3'
defineProps({links: Array})
</script>