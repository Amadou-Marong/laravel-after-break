<template>
    <Box>
      <template #header>Make an Offer</template>
      <div>
        <form @submit.prevent="confirmSubmit">
          <input v-model.number="form.amount" type="text" class="input">
          <input 
            v-model.number="form.amount"
            type="range" :min="min" :max="max" step="10000" 
            class="w-full mt-2 h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
          <button type="submit" class="btn-outline w-full text-sm mt-2">Submit Offer</button>
          <div class="flex justify-between text-gray-500 mt-2">
            <span>Difference</span>
            <span> <Price :price="difference" /> </span>
          </div>
          <span>{{form.errors.amount}}</span>
        </form>
      </div>
    </Box>
  </template>
  
  <script setup>
  import Box from '@/Components/UI/Box.vue';
  import Price from '@/Components/Price.vue';
  import { useForm } from '@inertiajs/vue3';
  import { computed } from 'vue';
  
  const props = defineProps({
    listingId: Number,
    price: Number,
  });
  
  const form = useForm({
    amount: props.price,
  });
  
  const confirmSubmit = () => {
    if (window.confirm('Are you sure you want to submit this offer?')) {
      // Proceed with form submission
      makeOffer();
    }
  };
  
  const makeOffer = () => {
    form.post(route('listing.offer.store', { listing: props.listingId }), {
      preserveScroll: true,
      preserveState: true,
    });
  };
  
  const difference = computed(() => form.amount - props.price);
  const min = computed(() => props.price / 2);
  const max = computed(() => props.price * 2);
  </script>
  