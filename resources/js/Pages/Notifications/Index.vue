<template>
   <h1 class="text-3xl mb-4 text-center font-medium text-gray-700 dark:text-gray-400">Notifications</h1>
   <section v-if="notifications.data.length" class="text-gray-700 dark:text-gray-400">
        <div v-for="notification in notifications.data" :key="notification.id" class="border-b border-gray-200 dark:border-gray-700 py-4 flex items-center justify-between">
            <div>
                <span v-if="notification.type === 'App\\Notifications\\OfferMade'">
                    Offer <Price :price="notification.data.amount"/> for <Link :href="route('listing.show', {listing: notification.data.listing_id})" 
                    class="text-indigo-600 dark:text-indigo-300 font-bold">Listing</Link>
                </span>
            </div>
            <div>
                <Link v-if="!notification.read_at"
                    :href="route('notification.read', {notification: notification.id})" 
                    class="btn-outline text-xs font-medium uppercase"
                    as="button" method="put">Mark as Read</Link>
            </div>
        </div>
   </section>
    <EmptyState v-else>No Notifications yet</EmptyState>
    <section v-if="notifications.data.length" class="w-full flex justify-center mt-4 mb-4">
        <Pagination :links="notifications.links"/>
    </section>
</template>

<script setup>
import Price from '@/Components/Price.vue';
import {Link} from '@inertiajs/vue3'
import Pagination from '@/Components/UI/Pagination.vue';
import EmptyState from '@/Components/UI/EmptyState.vue';

defineProps({
    notifications: Object,
})

</script>