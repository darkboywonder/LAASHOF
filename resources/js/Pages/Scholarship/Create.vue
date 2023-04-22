<script setup>
import { computed, ref, watch } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import Label from '@/Components/Label.vue';
import PageHeader from '@/Components/PageHeader.vue';
import SelectInput from '@/Components/SelectInput.vue';
import TextInput from '@/Components/TextInput.vue';
import Button from '@/Components/Button.vue';
import { Inertia } from '@inertiajs/inertia';
import { useStates } from '@/Composables/states.js';
import ErrorAlert from '@/Components/ErrorAlert.vue';
import { usePage, useForm, Link } from '@inertiajs/inertia-vue3';
import SuccessModal from '@/Components/SuccessModal.vue';
import InputFile from '@/Components/InputFile.vue';

const errors = computed(() => usePage().props.value.errors);
const success = computed(() => usePage().props.value.flash.success);
const states = useStates();
const modalOpen = ref(false);
const form = useForm({
    applicant: {
        first_name: '',
        last_name: '',
        birthday: '',
        phone: '',
        email: '',
        address: '',
        city: '',
        state: 'KY',
        zip: '',
        high_school: '',
        counselor_name: '',
        graduation_date: '',
        anticipated_major: '',
        college_name: '',
        semester_start_date: '',
        accomplishment_summary: '',
        barrier_summary: '',
        essay: '',
    },
    parent: {
        first_name: '',
        last_name: '',
        email: '',
        phone: '',
        address: '',
        city: '',
        state: 'KY',
        zip: '',
    },
    documents: null,
});

watch(success, (recent, old) => {
    modalOpen.value = true;
});

function returnHome() {
    modalOpen.value = false;
    Inertia.get(route('home'));
}

function submit() {
    Inertia.post(route('scholarship.store'), form);
}
</script>

<template>
    <AppLayout>
        <SuccessModal
            :open="modalOpen"
            type="Scholar"
            title="Thank you for applying!"
            message="Our Scholarship Committee will
            process it to verify it meets the
            three qualifications for selection."
            @home="returnHome"
        />
                    >Download the form here.
                </a>
            </p>
            <p>
                See here for
                <Link href="" class="text-green-600 hover:text-green-700"
                    >rules.</Link
                >
            </p>
        </PageHeader>
        <ErrorAlert />
        <form @submit.prevent="submit">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <h3
                    class="text-xl text-center font-medium leading-6 text-gray-900 mb-4"
                >
                    Qualifications
                </h3>
                <ol class="grid grid-cols-1 text-center">
                    <li class="col-span-1 text-gray-600">
                        Must be a Lexington, Kentucky resident
                    </li>
                    <li class="col-span-1 text-gray-600">
                        Must have a minimum 2.0 high school cumulative g.p.a.
                    </li>
                    <li class="col-span-1 text-gray-600">
                        Must provide proof of admission and an athletic letter
                        of intent (partial scholarship package) to an accredited
                        college or university
                    </li>
                </ol>

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
                                    Applicant Section
                                </h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    Please provide information for the
                                    applicant.
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 md:col-span-2 md:mt-0">
                            <div class="overflow-hidden shadow sm:rounded-md">
                                <div class="bg-white px-4 py-5 sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <Label
                                                for="applicant_first_name"
                                                value="First name"
                                                required
                                            />

                                            <!-- prettier-ignore-attribute -->
                                            <TextInput
                                                name="applicant_first_name"
                                                id="applicant_first_name"
                                                :disabled="form.processing"
                                                autocomplete="applicant_first_name"
                                                :error="errors['applicant.first_name']"
                                                v-model="form.applicant.first_name"
                                                required
                                            />
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <Label
                                                for="applicant_last_name"
                                                value="Last name"
                                                required
                                            />

                                            <!-- prettier-ignore-attribute -->
                                            <TextInput
                                                name="applicant_last_name"
                                                id="applicant_last_name"
                                                :disabled="form.processing"
                                                autocomplete="applicant_last_name"
                                                v-model="form.applicant.last_name"
                                                :error="errors['applicant.last_name']"
                                                required
                                            />
                                        </div>

                                        <div class="col-span-6">
                                            <Label
                                                for="applicant_birthday"
                                                value="Birthday"
                                                required
                                            />

                                            <!-- prettier-ignore-attribute -->
                                            <TextInput
                                                type="date"
                                                name="applicant_birthday"
                                                id="applicant_birthday"
                                                :disabled="form.processing"
                                                autocomplete="applicant_birthday"
                                                v-model="form.applicant.birthday"
                                                :error="errors['applicant.birthday']"
                                                required
                                            />
                                        </div>

                                        <!-- prettier-ignore-attribute -->
                                        <div
                                            class="grid grid-cols-6 gap-6 col-span-6"
                                        >
                                            <!-- prettier-ignore-attribute -->
                                            <div
                                                class="col-span-6 sm:col-span-3"
                                            >
                                                <Label
                                                    for="applicant_email"
                                                    value="Email Address"
                                                    required
                                                />

                                                <!-- prettier-ignore-attribute -->
                                                <TextInput
                                                    name="applicant_email"
                                                    id="email-address"
                                                    :disabled="form.processing"
                                                    autocomplete="applicant_email"
                                                    v-model="form.applicant.email"
                                                    :error="errors['applicant.email']"
                                                    required
                                                />
                                            </div>

                                            <!-- prettier-ignore-attribute -->
                                            <div
                                                class="col-span-6 sm:col-span-3"
                                            >
                                                <Label
                                                    for="applicant_phone"
                                                    value="Phone Number"
                                                    required
                                                />
                                                <!-- prettier-ignore-attribute -->
                                                <TextInput
                                                    type="text"
                                                    name="applicant_phone"
                                                    id="applicant_phone"
                                                    :disabled="form.processing"
                                                    autocomplete="applicant_phone"
                                                    v-model="form.applicant.phone"
                                                    :error=" errors['applicant.phone']"
                                                    required
                                                />
                                            </div>

                                            <div class="col-span-6">
                                                <Label
                                                    for="applicant_address"
                                                    value="Street Address"
                                                    required
                                                />

                                                <!-- prettier-ignore-attribute -->
                                                <TextInput
                                                    name="applicant_address"
                                                    id="applicant_address"
                                                    :disabled="form.processing"
                                                    autocomplete="applicant_address"
                                                    v-model="form.applicant.address"
                                                    :error="errors['applicant.address']"
                                                    required
                                                />
                                            </div>

                                            <!-- prettier-ignore-attribute -->
                                            <div
                                                class="col-span-6 sm:col-span-6 lg:col-span-2"
                                            >
                                                <Label
                                                    for="applicant_city"
                                                    value="City"
                                                    required
                                                />

                                                <!-- prettier-ignore-attribute -->
                                                <TextInput
                                                    name="applicant_city"
                                                    id="applicant_city"
                                                    :disabled="form.processing"
                                                    autocomplete="applicant_city"
                                                    v-model="form.applicant.city"
                                                    :error=" errors['applicant.city']"
                                                    required
                                                />
                                            </div>

                                            <!-- prettier-ignore-attribute -->
                                            <div
                                                class="col-span-6 sm:col-span-3 lg:col-span-2"
                                            >
                                                <Label
                                                    for="applicant_state"
                                                    value="State / Territory"
                                                    required
                                                />
                                                <!-- prettier-ignore-attribute -->
                                                <SelectInput
                                                    name="applicant_state"
                                                    id="applicant_state"
                                                    :disabled="form.processing"
                                                    autocomplete="applicant_state"
                                                    :options="states"
                                                    v-model="form.applicant.state"
                                                    :error="errors['applicant.state']"
                                                    required
                                                />
                                            </div>

                                            <!-- prettier-ignore-attribute -->
                                            <div
                                                class="col-span-6 sm:col-span-3 lg:col-span-2"
                                            >
                                                <Label
                                                    for="applicant_zip"
                                                    value="Zip / Postal code"
                                                    required
                                                />

                                                <!-- prettier-ignore-attribute -->
                                                <TextInput
                                                    name="applicant_zip"
                                                    id="applicant_zip"
                                                    :disabled="form.processing"
                                                    autocomplete="applicant_zip"
                                                    v-model="form.applicant.zip"
                                                    :error="errors['applicant.zip']"
                                                    required
                                                />
                                            </div>

                                            <!-- prettier-ignore-attribute -->
                                            <div class="col-span-6">
                                                <Label
                                                    for="applicant_high_school"
                                                    value="High School"
                                                    required
                                                />

                                                <!-- prettier-ignore-attribute -->
                                                <TextInput
                                                    name="applicant_high_school"
                                                    id="applicant_high_school"
                                                    :disabled="form.processing"
                                                    autocomplete="applicant_high_school"
                                                    v-model="form.applicant.high_school"
                                                    :error="errors['applicant.high_school']"
                                                    required
                                                />
                                            </div>

                                            <!-- prettier-ignore-attribute -->
                                            <div
                                                class="col-span-6 sm:col-span-3"
                                            >
                                                <Label
                                                    for="applicant_counselor_name"
                                                    value="Counselor's Name"
                                                    required
                                                />

                                                <!-- prettier-ignore-attribute -->
                                                <TextInput
                                                    name="applicant_counselor_name"
                                                    id="applicant_counselor_name"
                                                    :disabled="form.processing"
                                                    autocomplete="applicant_counselor_name"
                                                    v-model="form.applicant.counselor_name"
                                                    :error="errors['applicant.counselor_name']"
                                                    required
                                                />
                                            </div>

                                            <!-- prettier-ignore-attribute -->
                                            <div
                                                class="col-span-6 sm:col-span-3"
                                            >
                                                <Label
                                                    for="applicant_graduation_date"
                                                    value="Graduation Date"
                                                    required
                                                />

                                                <!-- prettier-ignore-attribute -->
                                                <TextInput
                                                    name="applicant_graduation_date"
                                                    type="date"
                                                    id="applicant_graduation_date"
                                                    :disabled="form.processing"
                                                    autocomplete="applicant_graduation_date"
                                                    v-model="form.applicant.graduation_date"
                                                    :error="errors['applicant.graduation_date']"
                                                    required
                                                />
                                            </div>

                                            <!-- prettier-ignore-attribute -->
                                            <div class="col-span-6">
                                                <Label
                                                    for="applicant_college_name"
                                                    value="College or University"
                                                    required
                                                />

                                                <!-- prettier-ignore-attribute -->
                                                <TextInput
                                                    name="applicant_college_name"
                                                    id="applicant_college_name"
                                                    :disabled="form.processing"
                                                    autocomplete="applicant_college_name"
                                                    v-model="form.applicant.college_name"
                                                    :error="errors['applicant.college_name']"
                                                    required
                                                />
                                            </div>

                                            <!-- prettier-ignore-attribute -->
                                            <div
                                                class="col-span-6 sm:col-span-3"
                                            >
                                                <Label
                                                    for="applicant_anticipated_major"
                                                    value="Anticipated Major"
                                                    required
                                                />

                                                <!-- prettier-ignore-attribute -->
                                                <TextInput
                                                    name="applicant_anticipated_major"
                                                    id="applicant_anticipated_major"
                                                    :disabled="form.processing"
                                                    autocomplete="applicant_anticipated_major"
                                                    v-model="form.applicant.anticipated_major"
                                                    :error="errors['applicant.anticipated_major']"
                                                    required
                                                />
                                            </div>

                                            <!-- prettier-ignore-attribute -->
                                            <div
                                                class="col-span-6 sm:col-span-3"
                                            >
                                                <Label
                                                    for="applicant_semester_start_date"
                                                    value="Semester Start Date"
                                                    required
                                                />

                                                <!-- prettier-ignore-attribute -->
                                                <TextInput
                                                    name="applicant_semester_start_date"
                                                    type="date"
                                                    id="applicant_semester_start_date"
                                                    :disabled="form.processing"
                                                    autocomplete="applicant_semester_start_date"
                                                    v-model="form.applicant.semester_start_date"
                                                    :error="errors['applicant.semester_start_date']"
                                                    required
                                                />
                                            </div>
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
                                    Documentation
                                </h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    Please list all sports-related
                                    accomplishments.
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
                                                for="applicant-accomplishment-summary"
                                                value="Summarize Accomplishments"
                                            />
                                            <p
                                                class="text-sm leading-5 text-gray-500"
                                            >
                                                In 500 words or less, please
                                                describe any honors,
                                                achievements, or leadership
                                                roles that have enhanced your
                                                high school experience.
                                            </p>
                                            <textarea
                                                id="applicant-accomplishment_summary"
                                                name="applicant-accomplishment_summary"
                                                rows="3"
                                                :disabled="form.processing"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm disabled:bg-gray-50 disabled:cursor-not-allowed"
                                                placeholder="Type here..."
                                                v-model="
                                                    form.applicant
                                                        .accomplishment_summary
                                                "
                                            />
                                        </div>
                                        <div class="col-span-6">
                                            <Label
                                                for="applicant-barrier_summary"
                                                value="Summarize Hardships"
                                                required
                                            />
                                            <p
                                                class="text-sm leading-5 text-gray-500"
                                            >
                                                In 500 words or less, please
                                                discuss any financial hardships,
                                                barriers, or challenges you have
                                                faced as a student-athlete.
                                            </p>
                                            <textarea
                                                id="applicant-barrier_summary"
                                                name="applicant-barrier_summary"
                                                rows="3"
                                                :disabled="form.processing"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm disabled:bg-gray-50 disabled:cursor-not-allowed"
                                                placeholder="Type here..."
                                                required
                                                v-model="
                                                    form.applicant
                                                        .barrier_summary
                                                "
                                            />
                                        </div>
                                        <div class="col-span-6">
                                            <Label
                                                for="applicant_essay"
                                                value="Essay"
                                                required
                                            />
                                            <p
                                                class="text-sm leading-5 text-gray-500"
                                            >
                                                In one page, please explain your
                                                most meaningful athletic
                                                accomplishment and what you
                                                learned about yourself. Be sure
                                                to include your academic,
                                                athletic, and/or career goals
                                                and how you plan to achieve
                                                them.
                                            </p>
                                            <textarea
                                                id="applicant_essay"
                                                name="applicant_essay"
                                                rows="3"
                                                :disabled="form.processing"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm disabled:bg-gray-50 disabled:cursor-not-allowed"
                                                placeholder="Type here..."
                                                required
                                                v-model="form.applicant.essay"
                                            />
                                        </div>
                                        <div class="col-span-6">
                                            <Label
                                                for="supporting_documents"
                                                value="Letters of Recommendations"
                                            />
                                            <InputFile
                                                :disabled="form.processing"
                                                accept=".doc,.docx,.pdf,.txt,.jpg,.jpeg,.png"
                                                label="supporting_documents"
                                                multiple
                                                @update:model-value="
                                                    (val) =>
                                                        (form.documents = val)
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
                                    Your Information
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
                                        <div class="col-span-6 sm:col-span-3">
                                            <Label
                                                for="parent_first_name"
                                                value="First name"
                                                required
                                            />

                                            <!-- prettier-ignore-attribute -->
                                            <TextInput
                                                name="parent_first_name"
                                                id="parent_first_name"
                                                :disabled="form.processing"
                                                autocomplete="parent_first_name"
                                                v-model="form.parent.first_name"
                                                :error="errors['parent.first_name']"
                                                required
                                            />
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <Label
                                                for="parent_last_name"
                                                value="Last name"
                                                required
                                            />

                                            <!-- prettier-ignore-attribute -->
                                            <TextInput
                                                name="parent_last_name"
                                                id="parent_last_name"
                                                :disabled="form.processing"
                                                autocomplete="parent_last_name"
                                                v-model="form.parent.last_name"
                                                :error="errors['parent.last_name']"
                                                required
                                            />
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <Label
                                                for="parent_email"
                                                value="Email Address"
                                                required
                                            />

                                            <!-- prettier-ignore-attribute -->
                                            <TextInput
                                                name="parent_email"
                                                id="parent_email"
                                                :disabled="form.processing"
                                                autocomplete="parent_email"
                                                v-model="form.parent.email"
                                                :error="errors['parent.email']"
                                                required
                                            />
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <Label
                                                for="parent_phone"
                                                value="Phone Number"
                                                required
                                            />

                                            <!-- prettier-ignore-attribute -->
                                            <TextInput
                                                type="text"
                                                name="parent_phone"
                                                id="parent_phone"
                                                :disabled="form.processing"
                                                autocomplete="parent_phone"
                                                v-model="form.parent.phone"
                                                :error="errors['parent.phone']"
                                                required
                                            />
                                        </div>

                                        <div class="col-span-6">
                                            <Label
                                                for="parent_address"
                                                value="Street Address"
                                                required
                                            />

                                            <!-- prettier-ignore-attribute -->
                                            <TextInput
                                                name="parent_address"
                                                id="parent_address"
                                                :disabled="form.processing"
                                                autocomplete="parent_address"
                                                v-model="form.parent.address"
                                                :error="errors['parent.address']"
                                                required
                                            />
                                        </div>

                                        <div
                                            class="col-span-6 sm:col-span-6 lg:col-span-2"
                                        >
                                            <Label
                                                for="parent_city"
                                                value="City"
                                                required
                                            />

                                            <!-- prettier-ignore-attribute -->
                                            <TextInput
                                                name="parent_city"
                                                id="parent_city"
                                                :disabled="form.processing"
                                                autocomplete="parent_city"
                                                v-model="form.parent.city"
                                                :error="errors['parent.city']"
                                                required
                                            />
                                        </div>

                                        <div
                                            class="col-span-6 sm:col-span-3 lg:col-span-2"
                                        >
                                            <Label
                                                for="parent_state"
                                                value="State / Territory"
                                                required
                                            />

                                            <!-- prettier-ignore-attribute -->
                                            <SelectInput
                                                name="applicant_state"
                                                id="applicant_state"
                                                :disabled="form.processing"
                                                autocomplete="applicant_state"
                                                :options="states"
                                                v-model="form.parent.state"
                                                :error="errors['parent.state']"
                                                required
                                            />
                                        </div>

                                        <div
                                            class="col-span-6 sm:col-span-3 lg:col-span-2"
                                        >
                                            <Label
                                                for="parent_zip"
                                                value="Zip / Postal code"
                                                required
                                            />

                                            <!-- prettier-ignore-attribute -->
                                            <TextInput
                                                name="parent_zip"
                                                id="parent_zip"
                                                :disabled="form.processing"
                                                autocomplete="parent_zip"
                                                v-model="form.parent.zip"
                                                :error="errors['parent.zip']"
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

                <div class="py-3 text-right pb-10">
                    <Button :processing="form.processing"> Submit </Button>
                </div>
            </div>
        </form>
    </AppLayout>
</template>
