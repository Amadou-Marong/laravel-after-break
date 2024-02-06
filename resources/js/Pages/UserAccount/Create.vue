<template>
    <form @submit.prevent="register">
        <div class="w-1/2 mx-auto">
            <div>
                <label class="label" for="name">Full Name</label>
                <input class="input" type="text" id="name" v-model="form.name"/>
                <span class="input-error" v-if="form.errors.name">{{form.errors.name}}</span>
            </div>
            <div class="mt-4">
                <label class="label" for="email">E-mail</label>
                <input class="input" type="email" id="email" v-model="form.email"/>
                <span class="input-error" v-if="form.errors.email">{{form.errors.email}}</span>
            </div>
            <div class="mt-4">
                <label class="label" for="password">Password</label>
                <input class="input" type="password" id="password" v-model="form.password"/>
                <span class="input-error" v-if="form.errors.password">{{form.errors.password}}</span>
            </div>
            <div class="mt-4">
                <label class="label" for="password_confirmation">Confirm Password</label>
                <input class="input" type="password" id="password_confirmation" v-model="form.password_confirmation"/>
                <!-- <span class="input-error" v-if="form.errors.password_confirmation">{{form.errors.password_confirmation}}</span> -->
            </div>
            <div class="mt-4">
                <button class="btn-primary w-full" type="submit">Create Account</button>
            </div>
            <div class="mt-2 text-center">
                <Link :href="route('login')" class="text-sm text-gray-500">Already have an account! Sign In</Link>
            </div>
        </div>
    </form>
</template>

<script setup>
    import { useForm, Link } from '@inertiajs/vue3';

    const form = useForm({
        name: null,
        email: null,
        password: null,
        password_confirmation: null
    });

    const register = () => {
        form.post(route('user-account.store'));
    }
</script>