<script setup>
import Label from '@/Components/Label.vue';

const emit = defineEmits(['update:modelValue']);

const props = defineProps({
    modelValue: String | Boolean,
    label: String,
    name: String,
    message: String,
    options: Array,
    srLegend: String,
    required: Boolean,
});
</script>

<template>
    <div>
        <Label :for="name" :value="label" :required="required" />
        <p class="text-sm leading-5 text-gray-500">
            {{ message }}
        </p>
        <fieldset class="mt-4">
            <legend class="sr-only">{{ srLegend }}</legend>
            <div
                class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10"
            >
                <div
                    v-for="option in options"
                    :key="option.id"
                    class="flex items-center"
                >
                    <input
                        :id="option.id"
                        :name="name"
                        type="radio"
                        :checked="option.id === modelValue"
                        class="h-4 w-4 border-gray-300 disabled:bg-gray-50 disabled:cursor-not-allowed text-green-600 focus:ring-green-600"
                        @input="$emit('update:modelValue', option.id)"
                        :required="required"
                    />
                    <label
                        :for="option.id"
                        class="ml-3 block text-sm font-medium text-gray-700"
                        >{{ option.title }}
                    </label>
                </div>
            </div>
        </fieldset>
    </div>
</template>
