<script setup>
import { TrophyIcon } from '@heroicons/vue/24/outline';
import { Link } from '@inertiajs/inertia-vue3';
</script>
<template>
    <div class="bg-red-800">
        <div class="mx-auto max-w-2xl py-16 px-6 text-center sm:py-20 lg:px-8">
            <h2
                class="flex flex-col justify-center items-center text-3xl font-bold tracking-tight text-white sm:text-4xl"
            >
                <div
                    class="flex justify-center items-center w-14 rounded-full bg-white py-2 mb-4"
                >
                    <TrophyIcon class="h-10 text-amber-500" />
                </div>
                <span class="text-lg font-semibold">Nominate</span>
                <span class="block text-amber-500">Nominate someone now!</span>
            </h2>
            <p class="mt-4 text-lg leading-6 text-white">
                All individual and team nominations will remain eligible for
                selection for five years after the submission date. Nominations
                received by October 31 will be considered for the next induction
                class.
            </p>
            <p class="sm:space-x-4">
                <Link
                    :href="route('nominate.individual.create')"
                    class="mt-8 inline-flex w-full items-center justify-center rounded-md border border-transparent bg-white px-5 py-3 text-base font-bold text-amber-600 hover:bg-red-50 sm:w-auto"
                >
                    Individual
                </Link>
                <a
                    :href="route('nominate.team.create')"
                    class="mt-8 inline-flex w-full items-center justify-center rounded-md border border-transparent bg-white px-5 py-3 text-base font-bold text-amber-600 hover:bg-red-50 sm:w-auto"
                    >Sports Team</a
                >
            </p>
        </div>
    </div>
</template>
