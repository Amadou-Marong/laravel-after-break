<template>
    <form @submit.prevent="filter">
        <div class="flex  flex-wrap mb-8 mt-4 gap-2">
            <div class="flex flex-nowrap items-center">
                <input v-model.number="filterForm.minPrice" type="text" placeholder="Min Price" 
                        class="input-filter-r"/>
                <input v-model.number="filterForm.maxPrice" type="text" placeholder="Max Price"
                        class="input-filter-l"/>
            </div>
            
            <div class="flex flex-nowrap items-center">
                <select v-model="filterForm.beds" class="input-filter-r">
                    <option :value="null">Bedrooms</option>
                    <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
                    <option>6+</option>
                </select>
                <select v-model="filterForm.baths" class="input-filter-l">
                    <option :value="null">Bathrooms</option>
                    <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
                    <option>6+</option>
                </select>
            </div>
            
            <div class="flex flex-nowrap items-center">
                <input v-model.number="filterForm.minArea" type="text" placeholder="Min Area"
                        class="input-filter-r"/>
                <input v-model.number="filterForm.maxArea" type="text" placeholder="Max Area"
                        class="input-filter-l"/>
            </div>

            <button class="btn-primary" type="submit">Filter</button>
            <button class="btn-secondary" type="reset" @click="clear">Reset</button>
        </div>
    </form>
</template>

<script setup>
import {useForm} from '@inertiajs/vue3';

const props = defineProps({
    filters: Object
})

const filterForm = useForm({
    minPrice: props.filters.minPrice ?? null,
    maxPrice:  props.filters.maxPrice ?? null,
    beds: props.filters.beds ?? null,
    baths: props.filters.baths ?? null,
    minArea: props.filters.minArea ?? null,
    maxArea: props.filters.maxArea ?? null
})  

const filter = () => {
   filterForm.get(
        route('listing.index'),
        {
            preserveState: true,
            preserveScroll: true
        }
   )
}

// const reset = () => {
//     filterForm.reset()
// }

const clear = () => {
    filterForm.minPrice = null
    filterForm.maxPrice = null
    filterForm.beds = null
    filterForm.baths = null
    filterForm.minArea = null
    filterForm.maxArea = null
    filter()
}

</script>