<script setup>
import { AcademicCapIcon } from '@heroicons/vue/24/outline';
</script>

<template>
    <div class="relative bg-zinc-900">
        <div
            class="h-56 bg-indigo-600 sm:h-72 md:absolute md:left-0 md:h-full md:w-1/2"
        >
            <img
                class="h-full w-full object-cover"
                src="/images/atheletic_runner.png?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1920&q=60&blend=6366F1&sat=-100&blend-mode=multiply"
                alt=""
            />
        </div>
        <div class="relative mx-auto max-w-7xl py-12 px-6 lg:px-8 lg:py-16">
            <div class="md:ml-auto md:w-1/2 md:pl-10">
                <div
                    class="flex justify-center items-center w-14 rounded-full bg-white py-2 mb-4"
                >
                    <AcademicCapIcon class="h-10 text-amber-500" />
                </div>
                <h2 class="text-lg font-semibold text-gray-300">
                    Scholarships
                </h2>
                <p
                    class="mt-2 text-3xl font-bold tracking-tight text-amber-500 sm:text-4xl"
                >
                    We support future hall of famers!
                </p>
                <p class="mt-3 text-lg text-gray-300">
                    It is our goal to award five graduating student-athletes who
                    will be attending an accredited college or university with a
                    scholarship.
                </p>
                <div class="mt-8">
                    <div class="inline-flex rounded-md shadow">
                        <a
                            class="inline-flex items-center justify-center rounded-md border border-transparent bg-white px-5 py-3 text-base font-bold text-amber-600 hover:bg-gray-50"
                        >
                            Opening in May
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
