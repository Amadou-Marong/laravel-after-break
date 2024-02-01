<template>
    <div v-for="listing in listings" :key="listing.id">
        <div>
            <!-- <Link :href="`/listing/${listing.id}`"> -->

             <!-- Now  we can use the route in the Link instead of the hard coded path -->
            <!-- <Link :href="route('listing.show', listing.id)"> -->

            <Link :href="route('listing.show', {listing: listing.id})">
                <!-- {{ listing.street }}, {{ listing.street_nr }}, {{ listing.city }}, for {{ listing.price }} -->
                <ListingAddress :listing="listing"/>
            </Link>
        </div>
        <div>
            <!-- <Link :href="`/listing/${listing.id}/edit`">Edit</Link> -->
            
            <Link :href="route('listing.edit', {listing: listing.id})">Edit</Link>
        </div>
        <div>
            <!-- <Link :href="`/listing/${listing.id}`" method="DELETE" as="button">Delete</Link> -->

            <Link :href="route('listing.destroy', {listing: listing.id})" method="DELETE" as="button">Delete</Link>
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