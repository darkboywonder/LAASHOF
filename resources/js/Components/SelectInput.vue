<script setup>
import { computed } from 'vue';

const props = defineProps({
    modelValue: String,
    disabled: Boolean,
    options: Object,
    required: Boolean,
    error: {
        type: String,
        default: '',
    },
});
const hasError = computed(() => {
    return props?.error?.length > 0 ?? false;
});

defineEmits(['update:modelValue']);
</script>

<template>
    <div>
        <select
            id="location"
            name="location"
            :disabled="disabled"
            :class="[
                'mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-green-600 focus:outline-none focus:ring-green-600 sm:text-sm disabled:cursor-not-allowed disabled:border-gray-200 disabled:bg-gray-50 disabled:text-gray-500',
                { 'border-red-500 ring-red-500': hasError },
            ]"
            @change="(event) => $emit('update:modelValue', event.target.value)"
            :required="required"
        >
            <option
                v-for="(value, key) in options"
                :selected="key === modelValue"
                :value="key"
            >
                {{ value }}
            </option>
        </select>
    </div>
</template>
