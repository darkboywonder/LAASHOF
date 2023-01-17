<script setup>
import { computed } from 'vue';
import { XCircleIcon } from '@heroicons/vue/20/solid';
import { usePage } from '@inertiajs/inertia-vue3';

const errors = computed(() => usePage().props.value.errors);
</script>

<template>
    <div
        v-if="Object.keys(errors).length > 0"
        class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8"
    >
        <div class="rounded-md bg-red-200 p-4 mt-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <XCircleIcon
                        class="h-5 w-5 text-red-500"
                        aria-hidden="true"
                    />
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-800">
                        There
                        {{ Object.keys(errors).length > 1 ? 'were' : 'was' }}
                        {{ Object.keys(errors).length }}
                        {{
                            Object.keys(errors).length > 1 ? 'errors' : 'error'
                        }}
                        with your submission
                    </h3>
                    <div class="mt-2 text-sm text-red-700">
                        <ul role="list" class="list-disc space-y-1 pl-5">
                            <li v-for="(error, key) in errors">
                                {{ error }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
