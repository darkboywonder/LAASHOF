<script setup>
import { onMounted, ref, computed } from 'vue';

const props = defineProps({
    modelValue: String,
    disabled: Boolean,
    type: {
        type: String,
        default: 'text',
    },
    error: {
        type: String,
        default: '',
    },
});

defineEmits(['update:modelValue']);

const input = ref(null);
const hasError = computed(() => {
    return props.error.length > 0 ?? false;
});

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        :type="type"
        :disabled="disabled"
        :class="[
            'mt-1 block w-full border-gray-300 focus:border-green-600 focus:ring-green-600 rounded-md shadow-sm disabled:cursor-not-allowed disabled:border-gray-200 disabled:bg-gray-50 disabled:text-gray-500',
            { 'border-red-500 ring-red-500': hasError },
        ]"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
    />
</template>
