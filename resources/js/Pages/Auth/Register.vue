<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};

const inputClass =
    'mt-1 block w-full rounded-md border-white/20 bg-white/10 px-3 py-2 text-white placeholder-white/40 focus:border-orange-500 focus:ring-orange-500';
</script>

<template>
    <GuestLayout title="Создание аккаунта">
        <Head title="Регистрация" />

        <form @submit.prevent="submit" class="space-y-5">
            <div>
                <InputLabel for="name" value="Имя" class="!text-white/80" />

                <TextInput
                    id="name"
                    type="text"
                    :class="inputClass"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2 !text-red-400" :message="form.errors.name" />
            </div>

            <div>
                <InputLabel for="email" value="Email" class="!text-white/80" />

                <TextInput
                    id="email"
                    type="email"
                    :class="inputClass"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2 !text-red-400" :message="form.errors.email" />
            </div>

            <div>
                <InputLabel for="password" value="Пароль" class="!text-white/80" />

                <TextInput
                    id="password"
                    type="password"
                    :class="inputClass"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2 !text-red-400" :message="form.errors.password" />
            </div>

            <div>
                <InputLabel
                    for="password_confirmation"
                    value="Подтверждение пароля"
                    class="!text-white/80"
                />

                <TextInput
                    id="password_confirmation"
                    type="password"
                    :class="inputClass"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />

                <InputError
                    class="mt-2 !text-red-400"
                    :message="form.errors.password_confirmation"
                />
            </div>

            <button
                type="submit"
                class="w-full rounded-md bg-orange-500 px-5 py-3 text-center font-medium text-white transition hover:bg-orange-400 disabled:opacity-50"
                :disabled="form.processing"
            >
                Зарегистрироваться
            </button>

            <div class="pt-2 text-center text-sm">
                <Link
                    :href="route('login')"
                    class="text-orange-400 transition hover:text-orange-300"
                >
                    Уже есть аккаунт? Войти
                </Link>
            </div>
        </form>
    </GuestLayout>
</template>
