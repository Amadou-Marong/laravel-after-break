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
                    Monthly Payment
                </template>
                <div>
                    <label class="label">Interest rate ({{ interestRate }} %)</label>
                    <input 
                        v-model.number="interestRate" type="range" min="0.1" max="30" step="0.1" class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                    
                    <label class="label">Duration ({{ duration }} years)</label>
                    <input 
                        v-model.number="duration" type="range" min="0.1" max="30" step="0.1" 
                        class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                    
                    <div class="text-gray-600 dark:text-gray-300 mt-2">
                        <div class="text-gray-500 dark:text-gray-400 mb-1">Your Monthly Payment</div>
                        <Price :price="monthlyPayment" class="text-2xl font-bold text-green-900 dark:text-gray-500"/>   
                    </div>
                </div>
            </Box>
        </div>
    </div>
</template>

<script setup>
    import ListingAddress from '@/Components/ListingAddress.vue'
    import ListingSpace from '@/Components/ListingSpace.vue'
    import Price from '@/Components/Price.vue'
    import Box from '@/Components/UI/Box.vue';

    // import {ref, computed} from 'vue';
    import {ref} from 'vue';

    // since we want to use composables so we would import the function from the composables
    import {useMonthlyPayment} from '@/Composables/useMonthlyPayment'

    const interestRate = ref(2.5);
    const duration = ref(15);

    const props = defineProps({
        listing: Object
    })

    // this is the simpler way to do it
    // const monthlyPayment = computed(() => {
    //     const rate = interestRate.value / 100 / 12;
    //     const n = duration.value * 12;
    //     return (props.listing.price * rate) / (1 - Math.pow(1 + rate, -n));
    // })
    

// we used this function to calculate the monthly payment
    // const monthlyPayment = computed(() => {
    //     const principle = props.listing.price;
    //     const monthlyInterest = interestRate.value / 100 / 12;
    //     const numberOfPaymentMonths = duration.value * 12;

    //     return principle * monthlyInterest * (Math.pow(1 + monthlyInterest, numberOfPaymentMonths)) / (Math.pow(1 + monthlyInterest, numberOfPaymentMonths) - 1) 
    // })

    // we would use the composables to calculate the monthly payment
   const { monthlyPayment } = useMonthlyPayment(props.listing.price, interestRate, duration)

</script>