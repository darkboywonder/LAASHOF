<script setup>
import { defineComponent, h, ref } from 'vue';
import { Dialog, DialogPanel } from '@headlessui/vue';
import { Bars3Icon, XMarkIcon } from '@heroicons/vue/24/outline';
import AppLayout from '@/Layouts/AppLayout.vue';

const stats = [
    { label: 'Individual and team inductions', value: '22' },
    { label: 'Nominations awaiting induction', value: '200+' },
    { label: 'Raised in support for a permanent museum', value: '$46,000+' },
];
</script>

<template>
    <AppLayout>
        <div class="bg-white">
            <!-- Header -->

            <main class="isolate">
                <!-- Hero section -->
                <div class="relative isolate -z-10">
                    <div
                        class="absolute top-0 left-1/2 right-0 -z-10 -ml-24 transform-gpu overflow-hidden blur-3xl lg:ml-24 xl:ml-48"
                    >
                        <svg
                            viewBox="0 0 801 1036"
                            aria-hidden="true"
                            class="w-[50.0625rem]"
                        >
                            <path
                                fill="url(#70656b7e-db44-4b9b-b7d2-1f06791bed52)"
                                fill-opacity=".3"
                                d="m282.279 843.371 32.285 192.609-313.61-25.32 281.325-167.289-58.145-346.888c94.5 92.652 277.002 213.246 251.009-45.597C442.651 127.331 248.072 10.369 449.268.891c160.956-7.583 301.235 116.434 351.256 179.39L507.001 307.557l270.983 241.04-495.705 294.774Z"
                            />
                            <defs>
                                <linearGradient
                                    id="70656b7e-db44-4b9b-b7d2-1f06791bed52"
                                    x1="508.179"
                                    x2="-28.677"
                                    y1="-116.221"
                                    y2="1091.63"
                                    gradientUnits="userSpaceOnUse"
                                >
                                    <stop stop-color="#fbbf24" />
                                    <stop offset="1" stop-color="#db2777" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                    <div class="overflow-hidden">
                        <div
                            class="mx-auto max-w-7xl px-6 pb-32 pt-36 sm:pt-60 lg:px-8 lg:pt-32"
                        >
                            <div
                                class="mx-auto max-w-2xl gap-x-14 lg:mx-0 lg:flex lg:max-w-none lg:items-center"
                            >
                                <div
                                    class="w-full max-w-xl lg:shrink-0 xl:max-w-2xl"
                                >
                                    <h1
                                        class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl"
                                    >
                                        We're shining a light on our
                                        african-american sports heros
                                    </h1>
                                    <p
                                        class="relative mt-6 text-lg leading-8 text-gray-600 sm:max-w-md lg:max-w-none"
                                    >
                                        The Lexington African-American Sports
                                        Hall of Fame, Inc. (LAASHOF, Inc.,
                                        pronounced "lay-shoff") is comprised of
                                        a group of like-minded individuals who
                                        believe our local African-American
                                        sports heroes deserve to be commemorated
                                        in a special way. We are a nonprofit,
                                        501(c)(3) corporation striving to
                                        uplift, unite, and reinvigorate our
                                        community by shining the spotlight on
                                        our sports stars from days gone by.
                                    </p>
                                </div>
                                <div
                                    class="mt-14 flex justify-end gap-8 sm:-mt-44 sm:justify-start sm:pl-20 lg:mt-0 lg:pl-0"
                                >
                                    <div
                                        class="ml-auto w-44 flex-none space-y-8 pt-32 sm:ml-0 sm:pt-80 lg:order-last lg:pt-36 xl:order-none xl:pt-80"
                                    >
                                        <div class="relative">
                                            <img
                                                src="/images/about/about_1.svg"
                                                alt=""
                                                class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg"
                                            />
                                            <div
                                                class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10"
                                            />
                                        </div>
                                    </div>
                                    <div
                                        class="mr-auto w-44 flex-none space-y-8 sm:mr-0 sm:pt-52 lg:pt-36"
                                    >
                                        <div class="relative">
                                            <img
                                                src="/images/about/about_2.svg"
                                                alt=""
                                                class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg"
                                            />
                                            <div
                                                class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10"
                                            />
                                        </div>
                                        <div class="relative">
                                            <img
                                                src="/images/about/about_3.svg"
                                                alt=""
                                                class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg"
                                            />
                                            <div
                                                class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10"
                                            />
                                        </div>
                                    </div>
                                    <div
                                        class="w-44 flex-none space-y-8 pt-32 sm:pt-0"
                                    >
                                        <div class="relative">
                                            <img
                                                src="/images/about/about_4.svg"
                                                alt=""
                                                class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg"
                                            />
                                            <div
                                                class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10"
                                            />
                                        </div>
                                        <div class="relative">
                                            <img
                                                src="/images/about/about_5.svg"
                                                alt=""
                                                class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg"
                                            />
                                            <div
                                                class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content section -->
                <div
                    class="mx-auto -mt-12 max-w-7xl px-6 sm:mt-0 lg:px-8 xl:-mt-8 mb-16"
                >
                    <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
                        <h2
                            class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"
                        >
                            Our mission
                        </h2>
                        <div
                            class="mt-6 flex flex-col gap-y-20 gap-x-8 lg:flex-row"
                        >
                            <div class="lg:w-full lg:max-w-2xl lg:flex-auto">
                                <p class="text-xl leading-8 text-gray-600">
                                    Annually host a sports hall of fame awards
                                    induction ceremony/banquet and donation
                                    events for supportors.
                                </p>
                                <div
                                    class="mt-10 max-w-xl text-base leading-7 text-gray-700"
                                >
                                    <p>
                                        Provide supplemental scholarships to
                                        local student-athletes who receive
                                        partial sports scholarships to college
                                        and could use additional financial
                                        assistance to pursue their academic and
                                        athletic goals.
                                    </p>
                                    <p class="mt-10">
                                        Secure a site for a permanent
                                        display/museum of the LAASHOF awards as
                                        presented.
                                    </p>
                                </div>
                            </div>
                            <div class="lg:flex lg:flex-auto lg:justify-center">
                                <dl class="w-64 space-y-8 xl:w-80">
                                    <div
                                        v-for="stat in stats"
                                        :key="stat.label"
                                        class="flex flex-col-reverse gap-y-4"
                                    >
                                        <dt
                                            class="text-base leading-7 text-gray-600"
                                        >
                                            {{ stat.label }}
                                        </dt>
                                        <dd
                                            class="text-5xl font-semibold tracking-tight text-gray-900"
                                        >
                                            {{ stat.value }}
                                        </dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </AppLayout>
</template>
