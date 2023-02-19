<script setup>
import { computed } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import SelectInput from '@/Components/SelectInput.vue';
import Label from '@/Components/Label.vue';
import { useStates } from '@/Composables/states.js';
import ErrorAlert from '@/Components/ErrorAlert.vue';

import { Head, Link, useForm, usePage } from '@inertiajs/inertia-vue3';

const form = useForm({
    first_name: '',
    last_name: '',
    phone: '',
    email: '',
    address: '',
    city: '',
    state: '',
    zip: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const states = useStates();

const errors = computed(() => usePage().props.value.errors);

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />
        <ErrorAlert />
        <form @submit.prevent="submit">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <Label for="first_name" value="First Name" required />

                    <!-- prettier-ignore-attribute -->
                    <TextInput
                        name="first_name"
                        id="first_name"
                        :disabled="form.processing"
                        autocomplete="first_name"
                        v-model="form.first_name"
                        :error="errors['first_name']"
                        required
                    />
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <Label for="last_name" value="Last Name" required />

                    <!-- prettier-ignore-attribute -->
                    <TextInput
                        name="last_name"
                        id="last_name"
                        :disabled="form.processing"
                        autocomplete="last_name"
                        v-model="form.last_name"
                        :error="errors['last_name']"
                        required
                    />
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <Label for="email" value="Email Address" required />

                    <!-- prettier-ignore-attribute -->
                    <TextInput
                        name="email"
                        id="email"
                        :disabled="form.processing"
                        autocomplete="email"
                        v-model="form.email"
                        :error="errors['email']"
                        required
                    />
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <Label for="phone" value="Phone Number" required />

                    <!-- prettier-ignore-attribute -->
                    <TextInput
                        type="text"
                        name="phone"
                        id="phone"
                        :disabled="form.processing"
                        autocomplete="phone"
                        v-model="form.phone"
                        :error="errors['phone']"
                        required
                    />
                </div>

                <div class="col-span-6">
                    <Label for="address" value="Street Address" required />

                    <!-- prettier-ignore-attribute -->
                    <TextInput
                        name="address"
                        id="address"
                        :disabled="form.processing"
                        autocomplete="address"
                        v-model="form.address"
                        :error="errors['address']"
                        required
                    />
                </div>

                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <Label for="city" value="City" required />

                    <!-- prettier-ignore-attribute -->
                    <TextInput
                        name="city"
                        id="city"
                        :disabled="form.processing"
                        autocomplete="city"
                        v-model="form.city"
                        :error="errors['city']"
                        required
                    />
                </div>

                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                    <Label for="state" value="State / Territory" required />

                    <!-- prettier-ignore-attribute -->
                    <SelectInput
                        name="nominee_state"
                        id="nominee_state"
                        :disabled="form.processing"
                        autocomplete="nominee_state"
                        :options="states"
                        v-model="form.state"
                        :error="errors['state']"
                        required
                    />
                </div>

                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                    <Label for="zip" value="Zip / Postal Code" required />

                    <!-- prettier-ignore-attribute -->
                    <TextInput
                        name="zip"
                        id="zip"
                        :disabled="form.processing"
                        autocomplete="zip"
                        v-model="form.zip"
                        :error="errors.zip"
                        required
                    />
                </div>

                <div class="col-span-6">
                    <Label for="password" value="Password" required />

                    <!-- prettier-ignore-attribute -->
                    <TextInput
                        name="password"
                        id="password"
                        :disabled="form.processing"
                        autocomplete="password"
                        v-model="form.password"
                        :error="errors.password"
                        required
                    />
                </div>

                <div class="col-span-6">
                    <Label
                        for="password_confirmation"
                        value="Password Confirmation"
                        required
                    />

                    <!-- prettier-ignore-attribute -->
                    <TextInput
                        name="password_confirmation"
                        id="password_confirmation"
                        :disabled="form.processing"
                        autocomplete="password_confirmation"
                        v-model="form.password_confirmation"
                        :error="errors.password_confirmation"
                        required
                    />
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link
                    :href="route('login')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Already registered?
                </Link>

                <PrimaryButton
                    class="ml-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Register
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
