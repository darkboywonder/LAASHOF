<script setup>
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
    <div class="mx-auto max-w-7xl py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-lg font-semibold text-green-600">{{ title }}</h2>
            <p
                class="mt-1 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl lg:text-6xl"
            >
                {{ slug }}
            </p>
            <p class="mx-auto mt-5 max-w-xl text-xl text-gray-500">
                {{ description }}
            </p>
        </div>
    </div>
</template>
