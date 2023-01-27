<script setup>
import { computed } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import Label from '@/Components/Label.vue';
import PageHeader from '@/Components/PageHeader.vue';
import RadioGroupInput from '@/Components/RadioGroupInput.vue';
import RadioCardGroupInput from '@/Components/RadioCardGroupInput.vue';
import SelectInput from '@/Components/SelectInput.vue';
import TextInput from '@/Components/TextInput.vue';
import Button from '@/Components/Button.vue';
import { Inertia } from '@inertiajs/inertia';
import { useLevels } from '@/Composables/levels.js';
import { useStates } from '@/Composables/states.js';
import { useYesNo } from '@/Composables/yesNo.js';
import ErrorAlert from '@/Components/ErrorAlert.vue';
import { usePage, useForm } from '@inertiajs/inertia-vue3';
import { MinusCircleIcon } from '@heroicons/vue/24/outline';

const errors = computed(() => usePage().props.value.errors);
const levels = useLevels();
const generalOptions = useYesNo();
const states = useStates();

const form = useForm({
    team: {
        name: '',
        sport: '',
        year: '',
        head_coach: '',
        assistant_coach: '',
        manager: '',
        accomplishment_summary: '',
        level: 'high-school',
        players: [
            {
                name: '',
                deceased: 'no',
            },
            {
                name: '',
                deceased: 'no',
            },
            {
                name: '',
                deceased: 'no',
            },
            {
                name: '',
                deceased: 'no',
            },
            {
                name: '',
                deceased: 'no',
            },
            {
                name: '',
                deceased: 'no',
            },
            {
                name: '',
                deceased: 'no',
            },
            {
                name: '',
                deceased: 'no',
            },
        ],
    },
    nominator: {
        first_name: '',
        last_name: '',
        email: '',
        phone: '',
        address: '',
        city: '',
        state: 'KY',
        zip: '',
    },
});

function submit() {
    Inertia.post(route('nominate.team.store'), form);
}

function addPlayer() {
    form.team.players.push({ name: '', deceased: 'no' });
}

function deletePlayer(index) {
    form.team.players.splice(index, 1);
}
</script>

<template>
    <AppLayout>
        <PageHeader
            slug="Team Nomination Form"
            description="Nominate a team for the upcoming induction class."
        />
        <ErrorAlert />
        <form @submit.prevent="submit">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
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
                                    Team Type
                                </h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    Please select a type for the team.
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 md:col-span-2 md:mt-0">
                            <div class="overflow-hidden shadow sm:rounded-md">
                                <div
                                    class="space-y-6 bg-white px-4 py-5 sm:p-6"
                                >
                                    <fieldset>
                                        <legend class="sr-only">Levels</legend>

                                        <Label
                                            for="level"
                                            value="Type"
                                            required
                                        />

                                        <RadioCardGroupInput
                                            :message="`Select a type`"
                                            :options="levels"
                                            :disabled="form.processing"
                                            v-model="form.team.level"
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

                <div>
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3
                                    class="text-lg font-medium leading-6 text-gray-900"
                                >
                                    Team Information
                                </h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    Please provide information for the team you
                                    are nominating.
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 md:col-span-2 md:mt-0">
                            <div class="overflow-hidden shadow sm:rounded-md">
                                <div class="bg-white px-4 py-5 sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <Label
                                                for="team_name"
                                                value="Team name"
                                                required
                                            />

                                            <!-- prettier-ignore-attribute -->
                                            <TextInput
                                                name="team_name"
                                                id="team_name"
                                                :disabled="form.processing"
                                                autocomplete="team_name"
                                                :error="errors['team.name']"
                                                v-model="form.team.name"
                                                required
                                            />
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <Label
                                                for="team_sport"
                                                value="Sport"
                                                required
                                            />

                                            <!-- prettier-ignore-attribute -->
                                            <TextInput
                                                name="team_sport"
                                                id="team_sport"
                                                :disabled="form.processing"
                                                autocomplete="team_sport"
                                                v-model="form.team.sport"
                                                :error="errors['team.sport']"
                                                required
                                            />
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <Label
                                                for="team_year"
                                                value="Year"
                                                required
                                            />

                                            <!-- prettier-ignore-attribute -->
                                            <TextInput
                                                name="team_year"
                                                id="team_year"
                                                :disabled="form.processing"
                                                autocomplete="team_year"
                                                v-model="form.team.year"
                                                :error="errors['team.year']"
                                                required
                                            />
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <Label
                                                for="team_head_coach"
                                                value="Head Coach"
                                                required
                                            />

                                            <!-- prettier-ignore-attribute -->
                                            <TextInput
                                                name="team_head_coach"
                                                id="team_head_coach"
                                                :disabled="form.processing"
                                                autocomplete="team_head_coach"
                                                v-model="form.team.head_coach"
                                                :error="errors['team.head_coach']"
                                                required
                                            />
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <Label
                                                for="team_assistant_coach"
                                                value="Assistant Coach"
                                                required
                                            />

                                            <!-- prettier-ignore-attribute -->
                                            <TextInput
                                                name="team_assistant_coach"
                                                id="team_assistant_coach"
                                                :disabled="form.processing"
                                                autocomplete="team_assistant_coach"
                                                v-model="form.team.assistant_coach"
                                                :error="errors['team.assistant_coach']"
                                                required
                                            />
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <Label
                                                for="team_manager"
                                                value="Manager"
                                                required
                                            />

                                            <!-- prettier-ignore-attribute -->
                                            <TextInput
                                                name="team_manager"
                                                id="team_manager"
                                                :disabled="form.processing"
                                                autocomplete="team_manager"
                                                v-model="form.team.manager"
                                                :error="errors['team.manager']"
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

                <div>
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3
                                    class="text-lg font-medium leading-6 text-gray-900"
                                >
                                    Team
                                </h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    Please provide team member names, etc.
                                </p>
                            </div>
                        </div>
                        <!-- prettier-ignore -->
                        <div class="mt-5 md:col-span-2 md:mt-0">
                            <div class="overflow-hidden shadow sm:rounded-md">
                                <div class="bg-white px-4 py-5 sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6">
                                            <div class="sm:flex sm:items-center">
                                                <div class="sm:flex-auto">
                                                    <Label
                                                        for=""
                                                        value="Team"
                                                        required
                                                    />
                                                    <p class="text-sm leading-5 text-gray-500" >
                                                        Please list all team members.
                                                    </p>
                                                </div>
                                                <div
                                                    class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none"
                                                >
                                                    <button
                                                        type="button"
                                                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-green-600 px-4 py-2 text-sm font-bold text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                                                        @click="addPlayer"
                                                    >
                                                        Add player
                                                    </button>
                                                </div>
                                            </div>
                                            <div
                                                class="mt-8 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg"
                                            >
                                                <div class="overflow-hidden rounded-md bg-white shadow">
                                                    <ul role="list" class="divide-y divide-gray-200">
                                                        <li
                                                            v-for="( player, index ) in form.team.players"
                                                            :key="index"
                                                            class="grid grid-cols-5 gap-6 px-6 py-4"
                                                        >
                                                            <div class="col-span-4 grid grid-cols-3 gap-6">
                                                                <div class="col-span-3 sm:col-span-2">
                                                                    <Label
                                                                        :for="`name-${index}`"
                                                                        value="Name"
                                                                        required
                                                                    />

                                                                    <!-- prettier-ignore-attribute -->
                                                                    <TextInput
                                                                        :name="`name-${index}`"
                                                                        :id="`name-${index}`"
                                                                        :disabled="false"
                                                                        autocomplete="team_name"
                                                                        v-model="form.team.players[index].name"
                                                                        required
                                                                    />
                                                                </div>

                                                                <div class="col-span-3 sm:col-span-1">
                                                                    <RadioGroupInput
                                                                        default-option-id="no"
                                                                        label="Deceased"
                                                                        :name="`deceased-${index}`"
                                                                        message=""
                                                                        :options="generalOptions"
                                                                        sr-legend="deceased options"
                                                                        autocomplete="deceased"
                                                                        v-model="form.team.players[index].deceased"
                                                                        required
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="col-span-1 flex justify-end items-center">
                                                                <MinusCircleIcon class="w-8 h-8 hover:cursor-pointer hover:text-red-800 text-red-600" @click="deletePlayer(index)" />
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
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
                                    Accomplishments
                                </h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    Please list noteworthy accomplishments for
                                    the team that merit recognition.
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
                                                for="nominee-accomplishment-summary"
                                                value="Summarize Accomplishments"
                                            />
                                            <p
                                                class="text-sm leading-5 text-gray-500"
                                            >
                                                Please summarize the team's
                                                accomplishments.
                                            </p>
                                            <textarea
                                                id="nominee-accomplishment-summary"
                                                name="nominee-accomplishment-summary"
                                                rows="3"
                                                :disabled="form.processing"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 sm:text-sm disabled:bg-gray-50 disabled:cursor-not-allowed"
                                                placeholder="Type here..."
                                                v-model="
                                                    form.team
                                                        .accomplishment_summary
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

                                        <div class="col-span-6 sm:col-span-3">
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

                <div class="py-3 text-right pb-10">
                    <Button :processing="form.processing"> Submit </Button>
                </div>
            </div>
        </form>
    </AppLayout>
</template>
