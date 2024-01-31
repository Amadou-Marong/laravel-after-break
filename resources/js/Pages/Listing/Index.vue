<template>
    <div v-for="listing in listings" :key="listing.id">
        <div>
            <Link :href="`/listing/${listing.id}`">
                <!-- {{ listing.street }}, {{ listing.street_nr }}, {{ listing.city }}, for {{ listing.price }} -->
                <ListingAddress :listing="listing"/>
            </Link>
        </div>
        
    </div>
</template>

<script setup>
    import { Link } from '@inertiajs/vue3';
    import ListingAddress from '@/Components/ListingAddress.vue'
    defineProps({
        listings: Array,
    })
</script>