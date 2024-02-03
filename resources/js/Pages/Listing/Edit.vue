<template>
    <form @submit.prevent="update">
      <div class="grid grid-cols-6 gap-4">
        <div class="col-span-2">
          <label class="label">Beds</label>
          <input class="input" type="text" v-model.number="form.beds"/>
          <span class="input-error" v-if="form.errors.beds">{{form.errors.beds}}</span>
        </div>
  
        <div class="col-span-2">
          <label class="label">Baths</label>
          <input class="input" type="text" v-model.number="form.baths"/>
          <span class="input-error" v-if="form.errors.baths">{{form.errors.baths}}</span>
        </div>
  
        <div class="col-span-2">
          <label class="label">Area</label>
          <input class="input" type="text" v-model.number="form.area"/>
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
          <button class="btn-primary" type="submit">Update</button>
        </div>
      </div>
    </form>
</template>
    
<script setup>
    // import {reactive} from 'vue';
    import { useForm } from '@inertiajs/vue3';

    const props = defineProps({
        listing: Object,
    });



    const form = useForm({
        beds: props.listing.beds,
        baths: props.listing.baths,
        area: props.listing.area,
        city: props.listing.city,
        street: props.listing.street,
        code: props.listing.code,
        street_nr: props.listing.street_nr,
        price: props.listing.price,
    });

    // const update = () => form.put(`/listing/${props.listing.id}`);

    // using ziggy route helper
    const update = () => form.put(route('listing.update', {listing: props.listing.id}));
</script>

  <style scoped>
  label {
    margin-right: 2em;
  }
  
  div {
    padding: 2px
  }
  </style>