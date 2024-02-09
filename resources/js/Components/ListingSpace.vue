<template>
    <div>
        <span class="font-bold">{{ listing.beds }} </span> beds <span class="text-gray-400">| </span> 
        <span class="font-bold">{{ listing.baths }} </span> bathrooms 
        <span class="text-gray-400">| </span>
        <span class="font-bold">{{ listing.area }} </span> sqft 
       
    </div>
</template>

<script setup>
    defineProps({
        listing: Object
    })
</script>