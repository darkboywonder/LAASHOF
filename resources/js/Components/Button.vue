<script setup>
import Spinner from '@/Components/Spinner.vue';

defineProps({
    disabled: Boolean,
    processing: Boolean,
    type: {
        type: String,
        default: 'submit',
    },
});
</script>
<template>
    <button
        :disabled="disabled || processing"
        type="submit"
        class="inline-flex justify-center rounded-md border border-transparent disabled:bg-gray-300 hover:bg-green-700 bg-green-600 py-2 px-4 text-sm font-bold text-white shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
    >
        <slot />
        <Spinner class="h-6 w-6 text-white ml-2" v-show="processing" />
    </button>
</template>
