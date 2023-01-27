<script setup>
import FlatLogo from './FlatLogo.vue';

defineProps({
    title: {
        type: String,
        default: 'title',
    },
    slug: {
        type: String,
        default: 'Add Slug Here',
    },
    description: {
        type: String,
        default: 'Add Description Here',
    },
});
</script>

<template>
    <div
        class="relative flex justify-center mx-auto max-w-7xl py-16 px-4 sm:py-24 sm:px-6 lg:px-8"
    >
        <FlatLogo
            class="absolute w-64 h-64 sm:w-80 sm:h-80 fill-amber-200 top-0 mx-auto"
        />
        <div class="relative text-center">
            <p
                class="mt-1 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl lg:text-6xl"
            >
                {{ slug }}
            </p>
            <p class="mx-auto mt-5 max-w-xl text-xl text-gray-500">
                {{ description }}
            </p>
        </div>
        <div class="absolute flex justify-center top-0 left-9 z-1"></div>
    </div>
</template>
