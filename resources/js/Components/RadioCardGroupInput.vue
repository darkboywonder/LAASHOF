<script setup>
import {
    RadioGroup,
    RadioGroupDescription,
    RadioGroupLabel,
    RadioGroupOption,
} from '@headlessui/vue';
import { CheckCircleIcon } from '@heroicons/vue/20/solid';

const emit = defineEmits(['update:modelValue']);

const props = defineProps({
    modelValue: String | Number,
    disabled: Boolean,
    options: {
        type: Array,
        default: [],
    },
    message: String,
    required: Boolean,
});
</script>

<template>
    <RadioGroup
        :disabled="disabled"
        :modelValue="modelValue"
        @update:modelValue="(value) => $emit('update:modelValue', value)"
        :required="required"
    >
        <RadioGroupLabel class="text-sm leading-5 text-gray-500">
            {{ message }}
        </RadioGroupLabel>

        <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
            <RadioGroupOption
                as="template"
                v-for="option in options"
                :key="option.id"
                :value="option.id"
                v-slot="{ checked, active, disabled }"
            >
                <div
                    :class="[
                        checked ? 'border-transparent' : 'border-gray-300',
                        active ? 'border-green-600 ring-2 ring-green-600' : '',
                        disabled
                            ? 'bg-gray-50 cursor-not-allowed'
                            : 'bg-white cursor-pointer',
                        'relative flex rounded-lg border p-4 shadow-sm focus:outline-none',
                    ]"
                >
                    <span class="flex flex-1">
                        <span class="flex flex-col">
                            <RadioGroupLabel
                                as="span"
                                class="block text-sm font-medium text-gray-900"
                                >{{ option.title }}</RadioGroupLabel
                            >
                            <RadioGroupDescription
                                as="span"
                                class="mt-1 flex items-center text-sm text-gray-500"
                                >{{ option.description }}</RadioGroupDescription
                            >
                        </span>
                    </span>
                    <CheckCircleIcon
                        :class="[
                            !checked ? 'invisible' : '',
                            'h-5 w-5 text-green-600',
                        ]"
                        aria-hidden="true"
                    />
                    <span
                        :class="[
                            active ? 'border' : 'border-2',
                            checked ? 'border-green-600' : 'border-transparent',
                            'pointer-events-none absolute -inset-px rounded-lg',
                        ]"
                        aria-hidden="true"
                    />
                </div>
            </RadioGroupOption>
        </div>
    </RadioGroup>
</template>
