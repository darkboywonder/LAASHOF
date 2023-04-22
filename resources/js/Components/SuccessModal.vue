<script setup>
import {
    Dialog,
    DialogPanel,
    DialogTitle,
    TransitionChild,
    TransitionRoot,
} from '@headlessui/vue';
import { CheckIcon } from '@heroicons/vue/24/outline';

const emit = defineEmits(['home', 'again']);

defineProps({
    title: String,
    message: String,
    canRepeat: {
        type: Boolean,
        default: false,
    },
    type: String,
    open: {
        type: Boolean,
        default: false,
    },
});
</script>

<template>
    <TransitionRoot as="template" :show="open">
        <Dialog as="div" class="relative z-10" @close="open = false">
            <TransitionChild
                as="template"
                enter="ease-out duration-300"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="ease-in duration-200"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div
                    class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                />
            </TransitionChild>

            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div
                    class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0"
                >
                    <TransitionChild
                        as="template"
                        enter="ease-out duration-300"
                        enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        enter-to="opacity-100 translate-y-0 sm:scale-100"
                        leave="ease-in duration-200"
                        leave-from="opacity-100 translate-y-0 sm:scale-100"
                        leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    >
                        <DialogPanel
                            class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6"
                        >
                            <div>
                                <div
                                    class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-green-100"
                                >
                                    <CheckIcon
                                        class="h-6 w-6 text-green-600"
                                        aria-hidden="true"
                                    />
                                </div>
                                <div class="mt-3 text-center sm:mt-5">
                                    <DialogTitle
                                        as="h3"
                                        class="text-lg font-medium leading-6 text-gray-900"
                                        >{{ title }}</DialogTitle
                                    >
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">
                                            {{ message }}
                                        </p>
                                        <p
                                            v-if="
                                                type === 'individual' ||
                                                type === 'Team'
                                            "
                                            class="text-xs font-bold text-gray-600 mt-4"
                                        >
                                            Nominees are up for consideration up
                                            to five years.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div
                                :class="[
                                    canRepeat
                                        ? 'sm:grid-cols-2'
                                        : 'sm:grid-cols-1',
                                    'mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3',
                                ]"
                            >
                                <button
                                    v-if="canRepeat"
                                    type="button"
                                    class="inline-flex w-full justify-center rounded-md border border-transparent bg-green-600 px-4 py-2 text-base font-bold text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 sm:col-start-2 sm:text-sm"
                                    @click="emit('again')"
                                >
                                    Nominate Another {{ type }}
                                </button>
                                <button
                                    type="button"
                                    :class="[
                                        canRepeat
                                            ? 'border-gray-300 bg-white text-gray-700 hover:bg-gray-50'
                                            : 'border-transparent bg-green-600 text-white hover:bg-green-700',
                                        'mt-3 inline-flex w-full justify-center rounded-md border  px-4 py-2 text-base font-medium shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 sm:col-start-1 sm:mt-0 sm:text-sm',
                                    ]"
                                    @click="emit('home')"
                                    ref="cancelButtonRef"
                                >
                                    Home
                                </button>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>
