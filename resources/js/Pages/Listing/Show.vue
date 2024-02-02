<template>
    <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
        <Box class="md:col-span-7 flex items-center w-full">
            <div class="w-full text-center font-medium text-gray-500">Images</div>
        </Box>
        <div class="md:col-span-5 flex flex-col gap-4">
            <Box>
                <template #header>
                    Basic Info
                </template>
                <Price :price="listing.price" class="text-2xl font-bold text-green-900 dark:text-gray-500"/>
                <ListingSpace :listing="listing" class="text-lg"/>
                <ListingAddress :listing="listing" class="text-green-900 dark:text-gray-500"/>
            </Box>
    
            <Box>
                <template #header>
                    Offer
                </template>
                Make an Offer
            </Box>
        </div>
    </div>
</template>

<script setup>
    import ListingAddress from '@/Components/ListingAddress.vue'
    import ListingSpace from '@/Components/ListingSpace.vue'
    import Price from '@/Components/Price.vue'
    import Box from '@/Components/UI/Box.vue';
    defineProps({
        listing: Object
    })
</script>