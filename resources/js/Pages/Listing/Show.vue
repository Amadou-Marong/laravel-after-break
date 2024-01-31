<template>
    <div>
        <Link>
           <!-- {{ listing.street }}, {{ listing.street_nr }}, {{ listing.city }}, for {{ listing.price }} -->
            <ListingAddress :listing="listing"/>

        </Link>
    </div>
</template>

<script setup>
    import { Link } from '@inertiajs/vue3';
    import ListingAddress from '@/Components/ListingAddress.vue'
    defineProps({
        listing: Object
    })
</script>