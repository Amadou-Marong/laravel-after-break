<template>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        <Box v-for="listing in listings" :key="listing.id">
            <div>
                <Link :href="route('listing.show', {listing: listing.id})">
                    <Price :price="listing.price" class="text-2xl font-bold text-green-900 dark:text-gray-500"/>
                    <ListingSpace :listing="listing" class="text-lg"/>
                    <ListingAddress :listing="listing" class="text-green-900 dark:text-gray-500"/>
                </Link>
            </div>
            <div>
                <Link :href="route('listing.edit', {listing: listing.id})">Edit</Link>
            </div>
            <div>
                <Link :href="route('listing.destroy', {listing: listing.id})" method="DELETE" as="button">Delete</Link>
            </div>
        </Box>
    </div>
</template>

<script setup>
    import { Link } from '@inertiajs/vue3';
    import ListingSpace from '@/Components/ListingSpace.vue';
    import ListingAddress from '@/Components/ListingAddress.vue';
    import Box from '@/Components/UI/Box.vue';
    import Price from '@/Components/Price.vue';
    
    defineProps({
        listings: Array,
    })
</script>