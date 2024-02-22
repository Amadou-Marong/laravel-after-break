<template>
    <form @submit.prevent="create">
      <div class="grid grid-cols-6 gap-4">
        <div class="col-span-2">
          <!-- <label class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">Beds</label> -->
          <label class="label">Beds</label>
          <!-- block w-full p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-700 text-gray-500 -->
          <input type="text" class="input" v-model.number="form.beds"/>
          <span class="input-error" v-if="form.errors.beds">{{form.errors.beds}}</span>
        </div>
  
        <div class="col-span-2">
          <label class="label">Baths</label>
          <input  class="input" type="text" v-model.number="form.baths"/>
          <span class="input-error" v-if="form.errors.baths">{{form.errors.baths}}</span>
        </div>
  
        <div class="col-span-2">
          <label class="label">Area</label>
          <input  class="input" type="text" v-model.number="form.area"/>
          <span class="input-error" v-if="form.errors.area">{{form.errors.area}}</span>
        </div>
  
        <div class="col-span-4">
          <label class="label">City</label>
          <input class="input" type="text" v-model="form.city"/>
          <span class="input-error" v-if="form.errors.city">{{form.errors.city}}</span>
        </div>
  
        <div class="col-span-2">
          <label class="label">Post Code</label>
          <input class="input" type="text" v-model.number="form.code"/>
          <span class="input-error" v-if="form.errors.code">{{form.errors.code}}</span>
        </div>
  
        <div class="col-span-4">
          <label class="label">Street</label>
          <input class="input" type="text" v-model="form.street"/>
          <span class="input-error" v-if="form.errors.street">{{form.errors.street}}</span>
        </div>
  
        <div class="col-span-2">
          <label class="label">Street Nr</label>
          <input class="input" type="text" v-model="form.street_nr"/>
          <span class="input-error" v-if="form.errors.street_nr">{{form.errors.street_nr}}</span>
        </div>
  
        <div class="col-span-6">
          <label class="label">Price</label>
          <input class="input" type="text" v-model.number="form.price"/>
          <span class="input-error" v-if="form.errors.price">{{form.errors.price}}</span>
        </div>
        
        <div class="col-span-6">
          <label class="label">Image Upload</label>
          <!-- <input class="input" type="file" @change="handleChange"> -->
          <!-- <input class="border rounded-md file:px-4 file:py-2 border-gray-200 dark:border-gray-600 file:text-gray-600 file:dark:text-gray-300 file:border-0 file:dark:bg-gray-600 file:bg-gray-100 file:hover:bg-gray-200 file:dark:hover:bg-gray-500" type="file" @input="addFile"/> -->
          <input class="border rounded-md file:px-4 file:py-2 border-gray-400 dark:border-gray-600 file:text-gray-600 file:dark:text-gray-300 file:border-0 file:dark:bg-gray-600 file:bg-gray-300 file:hover:bg-gray-400 file:dark:hover:bg-gray-500" type="file" @input="form.listing_image = $event.target.files[0]" name="listing_image"/>
          <span class="input-error" v-if="form.errors.listing_image">{{ form.errors.listing_image }}</span>
        </div>
  
        <div class="col-span-6">
          <button class="btn-primary" type="submit">Create</button>
        </div>
      </div>
    </form>
</template>
    
<script setup>
    // import {reactive} from 'vue';
    import { useForm } from '@inertiajs/vue3';

    // const addFile = (e) => {
    //   const file = e.target.files[0];
    //   this.form.listing_image = file;
    // }

    const form = useForm({
        beds: 0,
        baths: 0,
        area: 0,
        city: null,
        street: null,
        code: null,
        street_nr: null,
        price: 0,
        listing_image: null
    })

    // const create = () => form.post('/listing', form)

    //using ziggy route helper instead of the hard coded path
    const create = () => form.post(route('realtor.listing.store'))
</script>

  <style scoped>
  label {
    margin-right: 2em;
  }
  
  div {
    padding: 2px
  }
  </style>