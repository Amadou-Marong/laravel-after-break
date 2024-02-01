<template>
    <span class="dark:text-white">
        {{ listing.street }}, {{ listing.street_nr }}, {{ listing.city }}, for ${{ listing.price }}
    </span>
</template>

<script setup>
    defineProps({
        listing: Object,
    })
</script>