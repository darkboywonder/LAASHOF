<script setup>
import { reactive, computed } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import Label from '@/Components/Label.vue';
import PageHeader from '@/Components/PageHeader.vue';
import RadioGroupInput from '@/Components/RadioGroupInput.vue';
import RadioCardGroupInput from '@/Components/RadioCardGroupInput.vue';
import SelectInput from '@/Components/SelectInput.vue';
import TextInput from '@/Components/TextInput.vue';
import InputFile from '@/Components/InputFile.vue';
import Button from '@/Components/Button.vue';
import { Inertia } from '@inertiajs/inertia';
import { useAchievements } from '@/Composables/achievements.js';
import { useCategories } from '@/Composables/categories.js';
import { useGenders } from '@/Composables/genders.js';
import { useStates } from '@/Composables/states.js';
import { useYesNo } from '@/Composables/yesNo.js';
import ErrorAlert from '@/Components/ErrorAlert.vue';
import { usePage, useForm } from '@inertiajs/inertia-vue3';

const achievements = useAchievements();
const errors = computed(() => usePage().props.value.errors);
const categories = useCategories();
const generalOptions = useYesNo();
const genderOptions = useGenders();
const states = useStates();

const form = useForm({
    nominee: {
        first_name: '',
        middle_name: '',
        last_name: '',
        birthday: '',
        gender: 'male',
        profile: '',
        phone: '',
        email: '',
        address: '',
        city: '',
        state: 'KY',
        zip: '',
        category: 'athlete',
        achievements: [],
        attending: 'yes',
        deceased: '',
        absence_reason: '',
    },
    nominator: {
        first_name: '',
        middle_name: '',
        last_name: '',
        email: '',
        phone: '',
        address: '',
        city: '',
        state: 'KY',
        zip: '',
    },
    supporting_documents: null,
    accomplishment_summary: '',
    additional_factors: '',
    representative_attending: '',
});

function submit() {
    Inertia.post(route('nominate.individual.store'), form);
}
</script>

<template>
    <AppLayout>
        <PageHeader
            title="Individual Nomination"
            slug="Nominate an Athlete"
            description="Nominate an Individual for the upcoming induction class."
        />
        <ErrorAlert />
        <form @submit.prevent="submit">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-200" />
                    </div>
                </div>

                <div>
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3
                                    class="text-lg font-medium leading-6 text-gray-900"
                                >
                                    Nominee Information
                                </h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    Please provide information for the
                                    individual up for nomination.
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 md:col-span-2 md:mt-0">
                            <div class="overflow-hidden shadow sm:rounded-md">
                                <div class="bg-white px-4 py-5 sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-2">
                                            <Label
                                                for="nominee_first_name"
                                                value="First name"
                                                required
                                            />

                                            <!-- prettier-ignore-attribute -->
                                            <TextInput
                                                name="nominee_first_name"
                                                id="nominee_first_name"
                                                :disabled="form.processing"
                                                autocomplete="nominee_first_name"
                                                :error="errors['nominee.first_name']"
                                                v-model="form.nominee.first_name"
                                                required
                                            />
                                        </div>

                                        <div class="col-span-6 sm:col-span-2">
                                            <Label
                                                for="nominee_middle_name"
                                                value="Middle name"
                                            />

                                            <!-- prettier-ignore-attribute -->
                                            <TextInput
                                                name="nominee_middle_name"
                                                id="nominee_middle_name"
                                                :disabled="form.processing"
                                                autocomplete="nominee_middle_name"
                                                v-model="form.nominee.middle_name"
                                            />
                                        </div>

                                        <div class="col-span-6 sm:col-span-2">
                                            <Label
                                                for="nominee_last_name"
                                                value="Last name"
                                                required
                                            />

                                            <!-- prettier-ignore-attribute -->
                                            <TextInput
                                                name="nominee_last_name"
                                                id="nominee_last_name"
                                                :disabled="form.processing"
                                                autocomplete="nominee_last_name"
                                                v-model="form.nominee.last_name"
                                                :error="errors['nominee.last_name']"
                                                required
                                            />
                                        </div>

                                        <div class="col-span-6">
                                            <Label
                                                for="nominee_birthday"
                                                value="Birthday"
                                                required
                                            />

                                            <!-- prettier-ignore-attribute -->
                                            <TextInput
                                                type="date"
                                                name="nominee_birthday"
                                                id="nominee_birthday"
                                                :disabled="form.processing"
                                                autocomplete="nominee_birthday"
                                                v-model="form.nominee.birthday"
                                                :error="errors['nominee.birthday']"
                                                required
                                            />
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <div class="col-span-6">
                                                <Label
                                                    for="profile"
                                                    value="Profile Photo"
                                                />

                                                <!-- prettier-ignore-attribute -->
                                                <InputFile
                                                    :disabled="form.processing"
                                                    accept=".jpg,.jpeg,.png"
                                                    label="profile"
                                                    @update:model-value="(val) => (form.nominee.profile = val)"
                                                />
                                            </div>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <RadioGroupInput
                                                default-option-id="male"
                                                label="Gender"
                                                name="gender"
                                                message="Please provide your gender."
                                                :options="genderOptions"
                                                sr-legend="gender options"
                                                autocomplete="gender"
                                                v-model="form.nominee.gender"
                                                required
                                            />
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <Label
                                                for="nominee_email"
                                                value="Email Address"
                                                required
                                            />

                                            <TextInput
                                                name="nominee_email"
                                                id="email-address"
                                                :disabled="form.processing"
                                                autocomplete="nominee_email"
                                                v-model="form.nominee.email"
                                                :error="errors['nominee.email']"
                                                required
                                            />
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <Label
                                                for="nominee_phone"
                                                value="Phone Number"
                                                required
                                            />
                                            <TextInput
                                                type="text"
                                                name="nominee_phone"
                                                id="nominee_phone"
                                                :disabled="form.processing"
                                                autocomplete="nominee_phone"
                                                v-model="form.nominee.phone"
                                                :error="errors['nominee.phone']"
                                                required
                                            />
                                        </div>

                                        <div class="col-span-6">
                                            <Label
                                                for="nominee_address"
                                                value="Street Address"
                                                required
                                            />

                                            <!-- prettier-ignore-attribute -->
                                            <TextInput
                                                name="nominee_address"
                                                id="nominee_address"
                                                :disabled="form.processing"
                                                autocomplete="nominee_address"
                                                v-model="form.nominee.address"
                                                :error="errors['nominee.address']"
                                                required
                                            />
                                        </div>

                                        <div
                                            class="col-span-6 sm:col-span-6 lg:col-span-2"
                                        >
                                            <Label
                                                for="nominee_city"
                                                value="City"
                                                required
                                            />

                                            <TextInput
                                                name="nominee_city"
                                                id="nominee_city"
                                                :disabled="form.processing"
                                                autocomplete="nominee_city"
                                                v-model="form.nominee.city"
                                                :error="errors['nominee.city']"
                                                required
                                            />
                                        </div>

                                        <div
                                            class="col-span-6 sm:col-span-3 lg:col-span-2"
                                        >
                                            <Label
                                                for="nominee_state"
                                                value="State / Territory"
                                                required
                                            />
                                            <SelectInput
                                                name="nominee_state"
                                                id="nominee_state"
                                                :disabled="form.processing"
                                                autocomplete="nominee_state"
                                                :options="states"
                                                v-model="form.nominee.state"
                                                :error="errors['nominee.state']"
                                                required
                                            />
                                        </div>

                                        <div
                                            class="col-span-6 sm:col-span-3 lg:col-span-2"
                                        >
                                            <Label
                                                for="nominee_zip"
                                                value="Zip / Postal code"
                                                required
                                            />

                                            <TextInput
                                                name="nominee_zip"
                                                id="nominee_zip"
                                                :disabled="form.processing"
                                                autocomplete="nominee_zip"
                                                v-model="form.nominee.zip"
                                                :error="errors['nominee.zip']"
                                                required
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-200" />
                    </div>
                </div>

                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3
                                    class="text-lg font-medium leading-6 text-gray-900"
                                >
                                    Nominator Information
                                </h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    Please provide information for the person
                                    making the nomination.
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 md:col-span-2 md:mt-0">
                            <div class="overflow-hidden shadow sm:rounded-md">
                                <div class="bg-white px-4 py-5 sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-2">
                                            <Label
                                                for="nominator_first_name"
                                                value="First name"
                                                required
                                            />

                                            <!-- prettier-ignore-attribute -->
                                            <TextInput
                                                name="nominator_first_name"
                                                id="nominator_first_name"
                                                :disabled="form.processing"
                                                autocomplete="nominator_first_name"
                                                v-model="form.nominator.first_name"
                                                :error="errors['nominator.first_name']"
                                                required
                                            />
                                        </div>

                                        <div class="col-span-6 sm:col-span-2">
                                            <Label
                                                for="nominator_middle_name"
                                                value="Middle name"
                                            />

                                            <!-- prettier-ignore-attribute -->
                                            <TextInput
                                                name="nominator_middle_name"
                                                id="nominator_middle_name"
                                                :disabled="form.processing"
                                                autocomplete="nominator_middle_name"
                                                v-model="form.nominator.middle_name"
                                                required
                                            />
                                        </div>

                                        <div class="col-span-6 sm:col-span-2">
                                            <Label
                                                for="nominator_last_name"
                                                value="Last name"
                                                required
                                            />

                                            <!-- prettier-ignore-attribute -->
                                            <TextInput
                                                name="nominator_last_name"
                                                id="nominator_last_name"
                                                :disabled="form.processing"
                                                autocomplete="nominator_last_name"
                                                v-model="form.nominator.last_name"
                                                :error="errors['nominator.last_name']"
                                                required
                                            />
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <Label
                                                for="nominator_email"
                                                value="Email Address"
                                                required
                                            />

                                            <!-- prettier-ignore-attribute -->
                                            <TextInput
                                                name="nominator_email"
                                                id="nominator_email"
                                                :disabled="form.processing"
                                                autocomplete="nominator_email"
                                                v-model="form.nominator.email"
                                                :error="errors['nominator.email']"
                                                required
                                            />
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <Label
                                                for="nominator_phone"
                                                value="Phone Number"
                                                required
                                            />

                                            <!-- prettier-ignore-attribute -->
                                            <TextInput
                                                type="text"
                                                name="nominator_phone"
                                                id="nominator_phone"
                                                :disabled="form.processing"
                                                autocomplete="nominator_phone"
                                                v-model="form.nominator.phone"
                                                :error="errors['nominator.phone']"
                                                required
                                            />
                                        </div>

                                        <div class="col-span-6">
                                            <Label
                                                for="nominator_address"
                                                value="Street Address"
                                                required
                                            />

                                            <!-- prettier-ignore-attribute -->
                                            <TextInput
                                                name="nominator_address"
                                                id="nominator_address"
                                                :disabled="form.processing"
                                                autocomplete="nominator_address"
                                                v-model="form.nominator.address"
                                                :error="errors['nominator.address']"
                                                required
                                            />
                                        </div>

                                        <div
                                            class="col-span-6 sm:col-span-6 lg:col-span-2"
                                        >
                                            <Label
                                                for="nominator_city"
                                                value="City"
                                                required
                                            />

                                            <!-- prettier-ignore-attribute -->
                                            <TextInput
                                                name="nominator_city"
                                                id="nominator_city"
                                                :disabled="form.processing"
                                                autocomplete="nominator_city"
                                                v-model="form.nominator.city"
                                                :error="errors['nominator.city']"
                                                required
                                            />
                                        </div>

                                        <div
                                            class="col-span-6 sm:col-span-3 lg:col-span-2"
                                        >
                                            <Label
                                                for="nominator_state"
                                                value="State / Territory"
                                                required
                                            />

                                            <!-- prettier-ignore-attribute -->
                                            <SelectInput
                                                name="nominee_state"
                                                id="nominee_state"
                                                :disabled="form.processing"
                                                autocomplete="nominee_state"
                                                :options="states"
                                                v-model="form.nominator.state"
                                                :error="errors['nominator.state']"
                                                required
                                            />
                                        </div>

                                        <div
                                            class="col-span-6 sm:col-span-3 lg:col-span-2"
                                        >
                                            <Label
                                                for="nominator_zip"
                                                value="Zip / Postal code"
                                                required
                                            />

                                            <!-- prettier-ignore-attribute -->
                                            <TextInput
                                                name="nominator_zip"
                                                id="nominator_zip"
                                                :disabled="form.processing"
                                                autocomplete="nominator_zip"
                                                v-model="form.nominator.zip"
                                                :error="errors['nominator.zip']"
                                                required
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-200" />
                    </div>
                </div>

                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3
                                    class="text-lg font-medium leading-6 text-gray-900"
                                >
                                    Nomination Category
                                </h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    Please select a category for the nominee.
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 md:col-span-2 md:mt-0">
                            <div class="overflow-hidden shadow sm:rounded-md">
                                <div
                                    class="space-y-6 bg-white px-4 py-5 sm:p-6"
                                >
                                    <fieldset>
                                        <legend class="sr-only">
                                            Categories
                                        </legend>

                                        <Label
                                            for="categories"
                                            value="Categories"
                                            required
                                        />

                                        <RadioCardGroupInput
                                            :message="`Select a category`"
                                            :options="categories"
                                            :disabled="form.processing"
                                            v-model="form.nominee.category"
                                            required
                                        />
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-200" />
                    </div>
                </div>

                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3
                                    class="text-lg font-medium leading-6 text-gray-900"
                                >
                                    Accomplishments
                                </h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    Please select and list all accomplishments
                                    for the nominee.
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 md:col-span-2 md:mt-0">
                            <div class="overflow-hidden shadow sm:rounded-md">
                                <div
                                    class="space-y-6 bg-white px-4 py-5 sm:p-6"
                                >
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6">
                                            <Label
                                                for="achievements"
                                                value="Achievements"
                                                required
                                            />
                                            <!-- prettier-ignore -->
                                            <p class="text-sm leading-5 text-gray-500 mb-4">
                                                Please choose all that apply to the nominee:
                                            </p>

                                            <!-- prettier-ignore -->
                                            <div class="border-b border-gray-200"></div>

                                            <!-- prettier-ignore -->
                                            <div class="grid grid-cols-1 sm:grid-cols-2 sm:gap-x-4 lg:gap-x-8">
                                                <div
                                                    v-for="(achievement, achievementIdx) in achievements"
                                                    :key="achievementIdx"
                                                    class="relative flex items-start py-4 border-b border-gray-200"
                                                >
                                                    <!-- prettier-ignore -->
                                                    <div class="min-w-0 flex-1 text-sm">
                                                        <label
                                                            :for="`achievement-${achievementIdx}`"
                                                            class="select-none font-medium text-gray-700"
                                                            required
                                                            >{{ achievement }}
                                                        </label
                                                        >
                                                    </div>

                                                    <!-- prettier-ignore -->
                                                    <div class="ml-3 flex h-5 items-center">
                                                        <input
                                                            :id="`achievement-${achievementIdx}`"
                                                            name="achievements"
                                                            :value="achievement"
                                                            :disabled="form.processing"
                                                            type="checkbox"
                                                            v-model="form.nominee.achievements"
                                                            :class="[
                                                                'h-4 w-4 rounded border-gray-300 disabled:cursor-not-allowed text-green-600 focus:ring-green-600',
                                                                { 'border-red-500': errors['nominee.achievements'] ?.length > 0 },
                                                            ]"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-span-6">
                                            <Label
                                                for="accomplishment-summary"
                                                value="Summarize Accomplishments"
                                            />
                                            <p
                                                class="text-sm leading-5 text-gray-500"
                                            >
                                                Please summarize the nominee’s
                                                accomplishments as a coach,
                                                athlete, para-athlete, contest
                                                official, or
                                                contributor/benefactor.
                                            </p>
                                            <textarea
                                                id="accomplishment-summary"
                                                name="accomplishment-summary"
                                                rows="3"
                                                :disabled="form.processing"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm disabled:bg-gray-50 disabled:cursor-not-allowed"
                                                placeholder="Type here..."
                                                v-model="
                                                    form.accomplishment_summary
                                                "
                                            />
                                        </div>
                                        <div class="col-span-6">
                                            <Label
                                                for="additional-factors"
                                                value="Additional Factors"
                                            />
                                            <p
                                                class="text-sm leading-5 text-gray-500"
                                            >
                                                Please list any other factors
                                                about this individual that you
                                                would like for the Nomination or
                                                Selection Committees to
                                                consider.
                                            </p>
                                            <textarea
                                                id="additional-factors"
                                                name="additional-factors"
                                                rows="3"
                                                :disabled="form.processing"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm disabled:bg-gray-50 disabled:cursor-not-allowed"
                                                placeholder="Type here..."
                                                v-model="
                                                    form.additional_factors
                                                "
                                            />
                                        </div>
                                        <div class="col-span-6">
                                            <Label
                                                for="supporting_documents"
                                                value="Supporting Documents"
                                            />
                                            <InputFile
                                                :disabled="form.processing"
                                                accept=".doc,.docx,.pdf"
                                                label="supporting_documents"
                                                multiple
                                                @update:model-value="
                                                    (val) =>
                                                        (form.supporting_documents =
                                                            val)
                                                "
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-200" />
                    </div>
                </div>

                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3
                                    class="text-lg font-medium leading-6 text-gray-900"
                                >
                                    Attendance
                                </h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    Please provide preferences for attending.
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 md:col-span-2 md:mt-0">
                            <div class="overflow-hidden shadow sm:rounded-md">
                                <div
                                    class="space-y-6 bg-white px-4 py-5 sm:p-6"
                                >
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6">
                                            <RadioGroupInput
                                                default-option-id="yes"
                                                label="Attendance"
                                                name="attendance"
                                                message="If selected for induction into LAASHOF, will the nominee be able to attend the induction ceremony?"
                                                :options="generalOptions"
                                                sr-legend="attendance options"
                                                autocomplete="attendance"
                                                v-model="form.nominee.attending"
                                                required
                                            />
                                        </div>

                                        <div
                                            v-show="
                                                form.nominee.attending === 'no'
                                            "
                                            class="col-span-6"
                                        >
                                            <RadioGroupInput
                                                default-option-id="no"
                                                label=""
                                                name="deceased"
                                                message="Is this nominee deceased?"
                                                :options="generalOptions"
                                                sr-legend="attendance options"
                                                autocomplete="attendance"
                                                v-model="form.nominee.deceased"
                                            />
                                        </div>

                                        <div
                                            v-show="
                                                form.nominee.deceased ===
                                                    'no' &&
                                                form.nominee.attending === 'no'
                                            "
                                            class="col-span-6"
                                        >
                                            <p
                                                class="text-sm leading-5 text-gray-500"
                                            >
                                                If no, please explain why.
                                            </p>
                                            <textarea
                                                id="additional-factors"
                                                name="absence_reason"
                                                :disabled="form.processing"
                                                rows="3"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-600 focus:ring-green-600 sm:text-sm disabled:bg-gray-50 disabled:cursor-not-allowed"
                                                placeholder="Type here..."
                                                v-model="
                                                    form.nominee.absence_reason
                                                "
                                            />
                                        </div>

                                        <div
                                            v-show="
                                                form.nominee.attending === 'no'
                                            "
                                            class="col-span-6"
                                        >
                                            <RadioGroupInput
                                                default-option-id="no"
                                                label=""
                                                name="representative_attendance"
                                                message="Will a family member or representative of the nominee be able to attend the induction ceremony on his or her behalf?"
                                                :options="generalOptions"
                                                sr-legend="attendance options"
                                                autocomplete="attendance"
                                                v-model="
                                                    form.representative_attending
                                                "
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-200" />
                    </div>
                </div>

                <div class="py-3 text-right pb-10">
                    <Button :processing="form.processing"> Submit </Button>
                </div>
            </div>
        </form>
    </AppLayout>
</template>
