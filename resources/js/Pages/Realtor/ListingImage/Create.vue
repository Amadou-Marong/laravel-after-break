<template>
    <Box>
        <template #header>Upload New Images</template>
        <!-- <form
            enctype="multipart/form-data" 
            method="POST"
            <input type="file" multiple name="images[]" />
            :action="route('realtor.listing.image.store', { listing: listing.id })" -->
        <form
            @submit.prevent="upload">
            <input type="file" multiple @input="addFiles"/>
            <button type="submit" class="btn-outline mx-2 disabled:opacity-25 disabled:cursor-not-allowed" :disabled="!canUpload">Upload</button>
            <button type="reset" class="btn-outline" @click="reset">Reset</button>
        </form>
    </Box>
    
</template>
<script setup>
    import { computed } from 'vue';
    import Box from '@/Components/UI/Box.vue';
    import { useForm } from '@inertiajs/vue3';
    
    const props = defineProps({listing: Object})

    const form = useForm({
        images: [],
    })

    const canUpload = computed(() => form.images.length)

    const upload = () => {
        form.post(
            route('realtor.listing.image.store', { listing: props.listing.id }),
            {
                onSuccess: () => form.reset('images')
            }
        )
    }
    const addFiles = (event) => {
        for (const image of event.target.files) {
            form.images.push(image)
        }
    }

    const reset = () => form.reset('images')
</script>