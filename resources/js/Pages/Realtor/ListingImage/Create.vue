<template>
    <Box>
        <template #header>Upload New Images</template>
        <form
            enctype="multipart/form-data" 
            method="POST" 
            :action="route('realtor.listing.image.store', { listing: listing.id })">
            <input type="file" multiple name="images[]" />
            <button type="submit">Upload</button>
        </form>
    </Box>
    
</template>
<script setup>
    import Box from '@/Components/UI/Box.vue';
    import { useForm } from '@inertiajs/vue3';
    
    const props = defineProps({listing: Object})

    const form = useForm({
        images: [],
    })

    const upload = () => {
        form.post(
            route('realtor.listing.image.store', { listing: props.listing.id }),
            {
                onSuccess: () => form.reset('images')
            }
        )
    }
    const addFiles = (e) => {
        form.setData('images', e.target.files)
    }
</script>