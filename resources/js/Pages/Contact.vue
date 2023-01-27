<script setup>
import { computed } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import TextInput from '@/Components/TextInput.vue';
import Label from '@/Components/Label.vue';
import { Inertia } from '@inertiajs/inertia';
import { usePage, useForm } from '@inertiajs/inertia-vue3';
import PageHeader from '@/Components/PageHeader.vue';
import ErrorAlert from '@/Components/ErrorAlert.vue';

const errors = computed(() => usePage().props.value.errors);

const form = useForm({
    first_name: '',
    last_name: '',
    email: '',
    subject: '',
    message: '',
});

function submit() {
    Inertia.post(route('contact.store'), form);
}
</script>

<template>
    <AppLayout>
        <div class="overflow-hidden pb-16">
            <div class="relative mx-auto max-w-xl">
                <svg
                    class="absolute left-full translate-x-1/2 transform"
                    width="404"
                    height="404"
                    fill="none"
                    viewBox="0 0 404 404"
                    aria-hidden="true"
                >
                    <defs>
                        <pattern
                            id="85737c0e-0916-41d7-917f-596dc7edfa27"
                            x="0"
                            y="0"
                            width="20"
                            height="20"
                            patternUnits="userSpaceOnUse"
                        >
                            <rect
                                x="0"
                                y="0"
                                width="4"
                                height="4"
                                class="text-gray-200"
                                fill="currentColor"
                            />
                        </pattern>
                    </defs>
                    <rect
                        width="404"
                        height="404"
                        fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)"
                    />
                </svg>
                <svg
                    class="absolute right-full bottom-0 -translate-x-1/2 transform"
                    width="404"
                    height="404"
                    fill="none"
                    viewBox="0 0 404 404"
                    aria-hidden="true"
                >
                    <defs>
                        <pattern
                            id="85737c0e-0916-41d7-917f-596dc7edfa27"
                            x="0"
                            y="0"
                            width="20"
                            height="20"
                            patternUnits="userSpaceOnUse"
                        >
                            <rect
                                x="0"
                                y="0"
                                width="4"
                                height="4"
                                class="text-gray-200"
                                fill="currentColor"
                            />
                        </pattern>
                    </defs>
                    <rect
                        width="404"
                        height="404"
                        fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)"
                    />
                </svg>

                <PageHeader
                    slug="Let's Talk"
                    description="Contact us to learn more about our organization or
                        scholarship opportunities."
                />

                <ErrorAlert />

                <div class="shadow sm:rounded-md bg-white px-4 py-5 sm:p-6">
                    <form
                        @submit.prevent="submit"
                        class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8"
                    >
                        <div>
                            <Label
                                for="first_name"
                                value="First name"
                                required
                            />

                            <!-- prettier-ignore-attribute -->
                            <TextInput
                                name="first_name"
                                id="first_name"
                                :disabled="form.processing"
                                autocomplete="first_name"
                                :error="errors.first_name"
                                v-model="form.first_name"
                                required
                            />
                        </div>
                        <div>
                            <Label
                                for="last_name"
                                value="First name"
                                required
                            />

                            <!-- prettier-ignore-attribute -->
                            <TextInput
                                name="last_name"
                                id="last_name"
                                :disabled="form.processing"
                                autocomplete="last_name"
                                :error="errors.last_name"
                                v-model="form.last_name"
                                required
                            />
                        </div>
                        <!-- prettier-ignore-attribute -->
                        <div class="sm:col-span-2">
                            <Label for="email" value="Email Address" required />

                            <!-- prettier-ignore-attribute -->
                            <TextInput
                                name="nominee_email"
                                id="email"
                                :disabled="form.processing"
                                autocomplete="email"
                                v-model="form.email"
                                :error="errors.email"
                                required
                            />
                        </div>
                        <div class="sm:col-span-2">
                            <Label for="subject" value="Subject" required />

                            <!-- prettier-ignore-attribute -->
                            <TextInput
                                name="nominee_email"
                                id="subject"
                                :disabled="form.processing"
                                autocomplete="subject"
                                v-model="form.subject"
                                :error="errors.subject"
                                required
                            />
                        </div>
                        <div class="sm:col-span-2">
                            <Label for="message" value="Message" required />

                            <div class="mt-1">
                                <textarea
                                    id="message"
                                    name="message"
                                    rows="4"
                                    :disabled="form.processing"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm disabled:bg-gray-50 disabled:cursor-not-allowed"
                                    placeholder="Type here..."
                                    v-model="form.message"
                                />
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <button
                                type="submit"
                                class="inline-flex w-full items-center justify-center rounded-md border border-transparent bg-green-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            >
                                Send
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
