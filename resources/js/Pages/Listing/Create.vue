<template>
    <form @submit.prevent="create">
      <div class="grid grid-cols-6 gap-4">
        <div class="col-span-2">
          <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">Beds</label>
          <input type="text" class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-700 text-gray-500" v-model.number="form.beds"/>
          <div v-if="form.errors.beds">{{form.errors.beds}}</div>
        </div>
  
        <div class="col-span-2">
          <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">Baths</label>
          <input  class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-700 text-gray-500" type="text" v-model.number="form.baths"/>
          <div v-if="form.errors.baths">{{form.errors.baths}}</div>
        </div>
  
        <div class="col-span-2">
          <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">Area</label>
          <input  class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-700 text-gray-500" type="text" v-model.number="form.area"/>
          <div v-if="form.errors.area">{{form.errors.area}}</div>
        </div>
  
        <div class="col-span-4">
          <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">City</label>
          <input class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-700 text-gray-500" type="text" v-model="form.city"/>
          <div v-if="form.errors.city">{{form.errors.city}}</div>
        </div>
  
        <div class="col-span-2">
          <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">Post Code</label>
          <input class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-700 text-gray-500" type="text" v-model.number="form.code"/>
          <div v-if="form.errors.code">{{form.errors.code}}</div>
        </div>
  
        <div class="col-span-4">
          <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">Street</label>
          <input class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-700 text-gray-500" type="text" v-model="form.street"/>
          <div v-if="form.errors.street">{{form.errors.street}}</div>
        </div>
  
        <div class="col-span-2">
          <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">Street Nr</label>
          <input class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-700 text-gray-500" type="text" v-model="form.street_nr"/>
          <div v-if="form.errors.street_nr">{{form.errors.street_nr}}</div>
        </div>
  
        <div class="col-span-6">
          <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">Price</label>
          <input class="block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-700 text-gray-500" type="text" v-model.number="form.price"/>
          <div v-if="form.errors.price">{{form.errors.price}}</div>
        </div>
  
        <div class="col-span-6">
          <button class="bg-green-600 hover:bg-green-500 p-2 rounded-md text-white text-pretty" type="submit">Create</button>
        </div>
      </div>
    </form>
</template>
    
<script setup>
    // import {reactive} from 'vue';
    import { useForm } from '@inertiajs/vue3';


    const form = useForm({
        beds: 0,
        baths: 0,
        area: 0,
        city: null,
        street: null,
        code: null,
        street_nr: null,
        price: 0,
    })

    // const create = () => form.post('/listing', form)

    //using ziggy route helper instead of the hard coded path
    const create = () => form.post(route('listing.store'))
</script>

  <style scoped>
  label {
    margin-right: 2em;
  }
  
  div {
    padding: 2px
  }
  </style>