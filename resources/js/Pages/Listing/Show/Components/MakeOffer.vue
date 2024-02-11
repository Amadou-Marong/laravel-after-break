<template>
    <Box>
        <template>Make an Offer</template>
        <div>
            <form action="">
                <input type="text" class="input">
                <input 
                    type="range" min="0.1" max="30" step="0.1" 
                    class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                <button type="submit" class="btn-outline w-full text-sm mt-2">Make Offer</button>
                <div class="flex justify-between text-gray-500 mt-2">
                    <span>Difference</span>
                    <span> <Price :price="100" /> </span>
                </div>
            </form>
        </div>
    </Box>
</template>
<script setup>
   import Box from '@/Components/UI/Box.vue';
   import Price from '@/Components/Price.vue';
</script>