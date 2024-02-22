<template>
   <h1 class="text-3xl mb-4">Notifications</h1>
   <section v-if="notifications.data.length" class="text-gray-700 dark:text-gray-400">
        <div v-for="notification in notifications.data" :key="notification.id" class="border-b border-gray-200 dark:border-gray-700 py-4 flex items-center justify-between">
            <div>
                <span v-if="notification.type === 'App\\Notifications\\OfferMade'">Offer <Price :price="notification.data.amount"/> </span>
            </div>
            <div>
                <button v-if="!notification.read_at" class="btn-outline text-xs font-medium uppercase">Mark as Read</button>
            </div>
        </div>
   </section>
</template>

<script setup>
import Price from '@/Components/Price.vue';

defineProps({
    notifications: Object,
})

</script>