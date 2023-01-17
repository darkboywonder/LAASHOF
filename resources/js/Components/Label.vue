<script setup>
import { InformationCircleIcon } from '@heroicons/vue/24/outline';
import { Popover, PopoverButton, PopoverPanel } from '@headlessui/vue';

defineProps({
    for: String,
    value: String,
    hasInfo: {
        type: Boolean,
        default: false,
    },
    info: String,
    required: Boolean,
});
</script>

<template>
    <Popover v-slot="{ open }" v-if="hasInfo">
        <div v-if="open && hasInfo">
            <PopoverPanel
                class="absolute z-10 mb-3 w-screen pl-8 md:pl-0 md:w-64 transform"
                static
            >
                <div
                    class="overflow-hidden rounded-lg shadow-lg ring-1 ring-black ring-opacity-5"
                >
                    <div class="relative bg-white p-7">
                        <p>
                            {{ info }}
                        </p>
                    </div>
                </div>
            </PopoverPanel>
        </div>
        <PopoverButton>
            <label
                class="flex flex-1 items-center text-sm font-medium text-gray-700"
            >
                <span v-if="value">{{ value }}</span>
                <span v-else><slot /></span>
                <span v-show="hasInfo" class="ml-2">
                    <InformationCircleIcon
                        class="text-brand-purple-500 w-5 h-5 cursor-pointer"
                    />
                </span>
            </label>
        </PopoverButton>
    </Popover>
    <label
        :for="for"
        v-else
        class="flex flex-1 items-center text-sm font-medium text-gray-700"
    >
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
        <span v-if="required" class="text-red-500 ml-1">*</span>
    </label>
</template>
