<script setup>
import { Head, Link } from '@inertiajs/vue3';
import logoSrc from '../../images/welcome/logo-food-ninja-white.svg';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});
</script>

<template>
    <Head title="Добро пожаловать" />

    <div
        class="relative flex min-h-screen items-center justify-center overflow-hidden bg-[#16181d]"
    >
        <div
            class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(255,255,255,0.06),_transparent_55%)]"
        />
        <div class="relative flex flex-col items-center gap-4">
            <img
                :src="logoSrc"
                alt="Food Ninja logo"
                class="mb-1 h-16 w-auto opacity-95"
            />
            <h1 class="mb-2 text-3xl font-semibold text-white">Food Ninja</h1>

            <Link
                v-if="canRegister && !$page.props.auth.user"
                :href="route('register')"
                class="w-56 rounded-md bg-orange-500 px-5 py-3 text-center font-medium text-white transition hover:bg-orange-400"
            >
                Зарегистрироваться
            </Link>

            <Link
                v-if="canLogin && !$page.props.auth.user"
                :href="route('login')"
                class="w-56 rounded-md border border-white/40 bg-transparent px-5 py-3 text-center font-medium text-white transition hover:bg-white/10"
            >
                Войти
            </Link>

            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="w-56 rounded-md bg-orange-500 px-5 py-3 text-center font-medium text-white transition hover:bg-orange-400"
            >
                В кабинет
            </Link>
        </div>
    </div>
</template>
