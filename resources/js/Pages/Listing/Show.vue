<template>
    <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4">
        <Box class="md:col-span-7 flex items-center">
            <div v-if="listing.images.length" class="grid grid-cols-2 gap-1">
                <img 
                    v-for="image in listing.images" 
                    :key="image.id" 
                    :src="image.src" 
                    class="rounded-md" 
                    alt="" 
                />
            </div>

            <div v-else class="w-full text-center font-medium text-gray-500">No Images</div>
        </Box>

        <div class="md:col-span-5 flex flex-col gap-4">
            <Box>
                <template #header>
                    Basic Info
                </template>
                <Price :price="listing.price" class="text-2xl font-bold text-blue-900 dark:text-gray-500"/>
                <ListingSpace :listing="listing" class="text-lg"/>
                <ListingAddress :listing="listing" class="text-blue-900 dark:text-gray-500"/>
            </Box>

            <MakeOffer 
                v-if="user && !offerMade" 
                @offer-updated="offer = $event" 
                :listing-id="listing.id" 
                :price="listing.price"
            />
            <OfferMade v-if="user && offerMade" :offer="offerMade"/>
        </div>
    </div>
</template>

<script setup>
    import ListingAddress from '@/Components/ListingAddress.vue'
    import ListingSpace from '@/Components/ListingSpace.vue'
    import Price from '@/Components/Price.vue'
    import Box from '@/Components/UI/Box.vue';
    import MakeOffer from './Show/Components/MakeOffer.vue'
    import {Link, usePage} from '@inertiajs/vue3'
    import { computed } from 'vue';
    import OfferMade from './Show/Components/OfferMade.vue';
    import {ref} from 'vue';
    import {useMonthlyPayment} from '@/Composables/useMonthlyPayment'

    const interestRate = ref(2.5);
    const duration = ref(15);

    const props = defineProps({
        listing: Object,
        offerMade: Object,
    })

    const offer = ref(props.listing.price)

    const { monthlyPayment } = useMonthlyPayment(offer, interestRate, duration)

    const page = usePage();
    const user = computed(() => page.props.auth.user);

</script>