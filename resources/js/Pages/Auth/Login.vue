<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};

const inputClass =
    'mt-1 block w-full rounded-md border-white/20 bg-white/10 px-3 py-2 text-white placeholder-white/40 focus:border-orange-500 focus:ring-orange-500';
</script>

<template>
    <GuestLayout title="Вход в аккаунт">
        <Head title="Вход" />

        <div
            v-if="status"
            class="mb-4 rounded-md border border-green-500/30 bg-green-500/10 px-3 py-2 text-sm text-green-400"
        >
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="space-y-5">
            <div>
                <InputLabel for="email" value="Email" class="!text-white/80" />

                <TextInput
                    id="email"
                    type="email"
                    :class="inputClass"
                    v-model="form.email"
                    required
                    autofocus
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
                    autocomplete="current-password"
                />

                <InputError class="mt-2 !text-red-400" :message="form.errors.password" />
            </div>

            <div class="flex items-center">
                <Checkbox
                    name="remember"
                    v-model:checked="form.remember"
                    class="!border-white/30 !bg-white/10 !text-orange-500 focus:!ring-orange-500"
                />
                <span class="ms-2 text-sm text-white/70">Запомнить меня</span>
            </div>

            <button
                type="submit"
                class="w-full rounded-md bg-orange-500 px-5 py-3 text-center font-medium text-white transition hover:bg-orange-400 disabled:opacity-50"
                :disabled="form.processing"
            >
                Войти
            </button>

            <div class="flex flex-col items-center gap-2 pt-2 text-sm">
                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="text-white/60 transition hover:text-white"
                >
                    Забыли пароль?
                </Link>

                <Link
                    :href="route('register')"
                    class="text-orange-400 transition hover:text-orange-300"
                >
                    Нет аккаунта? Зарегистрироваться
                </Link>
            </div>
        </form>
    </GuestLayout>
</template>
