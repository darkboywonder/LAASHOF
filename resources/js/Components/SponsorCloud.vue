<script setup>
    defineProps({
        sponsorImages: {
            type: Object,
        }
    });
</script>

<template>
    <div class="bg-white">
        <div class="mx-auto max-w-7xl pt-8 pb-16 px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
                <div
                    v-for="(image, index) in sponsorImages"
                    :key="index"
                    class="col-span-1 flex justify-center md:col-span-1 lg:col-span-1"
                >
                    <img
                        class="h-28"
                        :src="image.path"
                        :alt="image.name"
                    />
                </div>
            </div>
        </div>
    </div>
</template>
