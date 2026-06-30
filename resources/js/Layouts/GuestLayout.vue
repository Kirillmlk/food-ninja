<script setup>
import { Link } from '@inertiajs/vue3';
import logoSrc from '../../images/welcome/logo-food-ninja-white.svg';

defineProps({
    title: {
        type: String,
        default: '',
    },
});
</script>

<template>
    <div
        class="relative flex min-h-screen items-center justify-center overflow-hidden bg-[#16181d] px-4 py-10"
    >
        <div
            class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(255,255,255,0.06),_transparent_55%)]"
        />

        <div class="relative w-full max-w-md">
            <div class="mb-8 flex flex-col items-center text-center">
                <Link href="/" class="mb-4">
                    <img
                        :src="logoSrc"
                        alt="Food Ninja"
                        class="h-14 w-auto opacity-95"
                    />
                </Link>
                <h1 class="text-2xl font-semibold text-white">Food Ninja</h1>
                <p v-if="title" class="mt-2 text-sm text-white/60">
                    {{ title }}
                </p>
            </div>

            <div
                class="rounded-xl border border-white/10 bg-white/5 p-6 backdrop-blur-sm sm:p-8"
            >
                <slot />
            </div>
        </div>
    </div>
</template>
