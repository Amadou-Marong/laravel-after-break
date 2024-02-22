<template>
    <h1 class="text-3xl mb-4 dark:text-gray-300">My Listings</h1>
    <section>
        <RealtorFilters/> 
    </section>
    <section v-if="listings.data.length" class="grid grid-cols-1 lg:grid-cols-2 gap-2">
    <!-- <Box v-for="listing in listings" :key="listing.id"> -->
        <Box v-for="listing in listings.data" :key="listing.id">
            <div class="flex flex-col md:flex-row gap-2 md:items-center justify-between">
                <div>

                    <!-- <div v-if="listing.sold_at != null" class="font-bold uppercase text-sm border border-dashed p-1 border-green-300 text-green-500 dark:border-green-500 dark:text-green-500 inline-block rounded-md mb-1">Sold</div> -->
                    <div v-if="listing.sold_at != null" class="flex items-center gap-1">	
                        <img src="C:\Users\Amadou.Marong\laravel-after-break\resources\assets\images\sold.webp" alt="sold" class="w-40 h-20"/>
                    </div>

                    <div class="xl:flex items-center gap-2">
                        <Price :price="listing.price" class="text-2xl font-medium"/>
                        <ListingSpace :listing="listing"/>
                    </div>

                    <ListingAddress :listing="listing" class="text-gray-500"/>
                </div>
                <section>
                    <div class="flex items-center gap-1 text-gray-600 dark:text-gray-300">
                        <a 
                            class="btn-outline text-xs font-medium"
                            :href="route('listing.show', {listing: listing.id})"
                            target="_blank" 
                        >Preview</a>
                        <Link class="btn-outline text-xs font-medium" :href="route('realtor.listing.edit', {listing: listing.id})">Edit</Link>
                        <Link class="btn-outline text-xs font-medium" 
                            :href="route('realtor.listing.destroy', {listing: listing.id})" 
                            as="button" method="delete">Delete
                        </Link>
                    </div>
                    <div class="mt-2">
                        <Link 
                            class="block w-full text-center btn-outline text-xs font-medium" 
                            :href="route('realtor.listing.image.create', {listing: listing.id})"
                        >Images ({{ listing.images_count }})</Link>
                    </div>
                    
                    <div class="mt-2">
                        <Link 
                            class="block w-full text-center btn-outline text-xs font-medium" 
                            :href="route('realtor.listing.show', {listing: listing.id})"
                        >Offers ({{ listing.offers_count }})</Link>
                    </div>
                </section>
            </div>
        </Box>        
    </section>
    <EmptyState v-else>No Listings yet</EmptyState>

    <section v-if="listings.data.length" class="w-full flex justify-center mt-4 mb-4">
        <Pagination :links="listings.links"/>
    </section>
</template>

<script setup>
    import Box from '@/Components/UI/Box.vue';
    import Price from '@/Components/Price.vue';
    import ListingSpace from '@/Components/ListingSpace.vue';
    import ListingAddress from '@/Components/ListingAddress.vue';
    import RealtorFilters from '@/Pages/Realtor/Components/RealtorFilters.vue';
    import { Link } from '@inertiajs/vue3';
    import Pagination from '@/Components/UI/Pagination.vue';
import EmptyState from '@/Components/UI/EmptyState.vue';

    defineProps({
        // listings: Array,
        listings: Object,
        filters: Object,
    })
</script>