<template>
    <Box>
        <div>
            <Link :href="route('listing.show', {listing: listing.id})">
                <img :src="listing.listing_image" alt="listing image" class="w-full h-64 object-cover"/>
                <div class="flex items-center gap-1">
                    <Price :price="listing.price" class="text-2xl font-bold text-blue-900 dark:text-gray-500"/>
                    <div class="text-xs text-gray-500">
                        <Price :price="monthlyPayment" class="text-blue-900 dark:text-gray-500"/> per month
                    </div>
                </div>
                
                <ListingSpace :listing="listing" class="text-lg"/>
                <ListingAddress :listing="listing" class="text-blue-900 dark:text-gray-500"/>
            </Link>
        </div>
        <div>
            <!-- <Link :href="route('listing.edit', {listing: listing.id})">Edit</Link> -->
        </div>
        <!-- <div>
            <Link :href="route('listing.destroy', {listing: listing.id})" method="DELETE" as="button">Delete</Link>
        </div> -->
    </Box>
</template>

<script setup>
    import { Link } from '@inertiajs/vue3';
    import ListingSpace from '@/Components/ListingSpace.vue';
    import ListingAddress from '@/Components/ListingAddress.vue';
    import Box from '@/Components/UI/Box.vue';
    import Price from '@/Components/Price.vue';

    import {useMonthlyPayment} from '@/Composables/useMonthlyPayment'


    const props = defineProps({
        listing: Object
    })

    const {monthlyPayment} = useMonthlyPayment(props.listing.price, 2.5, 15);
  
</script>
