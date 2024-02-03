<template>
    <form @submit.prevent="login">
        <div class="w-1/2 mx-auto">
            <div>
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
                <button class="btn-primary w-full" type="submit">Login</button>
            </div>
        </div>
    </form>
</template>

<script setup>
    import { useForm } from '@inertiajs/vue3';

    const form = useForm({
        email: null,
        password: null
    });

    const login = () => {
        form.post(route('login.store'));
    }
</script>