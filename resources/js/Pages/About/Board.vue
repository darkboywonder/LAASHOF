<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({ boardMembers: Array });
</script>

<template>
    <AppLayout>
        <div class="bg-white py-8">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="relative isolate">
                    <div
                        class="absolute inset-x-0 top-4 -z-10 flex transform-gpu justify-center overflow-hidden blur-3xl"
                    >
                        <svg
                            viewBox="0 0 1108 632"
                            class="w-[69.25rem] flex-none"
                            aria-hidden="true"
                        >
                            <path
                                fill="url(#eee5076e-98f8-4901-b4c5-181a87854225)"
                                fill-opacity=".25"
                                d="M235.233 402.61 57.541 321.574.83 631.051 235.233 402.61l320.018 145.945c-65.036-115.26-134.286-322.756 109.01-230.654C968.382 433.027 1031 651.248 1092.23 459.361c48.98-153.51-34.51-321.107-82.37-385.717l-198.908 250.58L648.261.089 235.233 402.61Z"
                            />
                            <defs>
                                <linearGradient
                                    id="eee5076e-98f8-4901-b4c5-181a87854225"
                                    x1="1220.59"
                                    x2="-85.053"
                                    y1="432.767"
                                    y2="638.715"
                                    gradientUnits="userSpaceOnUse"
                                >
                                    <stop stop-color="#fbbf24" />
                                    <stop offset="1" stop-color="#db2777" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>

                    <div class="px-6 pt-14 lg:px-8">
                        <div class="mx-auto max-w-4xl text-center">
                            <h2
                                class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl"
                            >
                                Board of Directors
                            </h2>
                        </div>
                    </div>
                    <ul
                        role="list"
                        class="mx-auto mt-20 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-14 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3 xl:grid-cols-4"
                    >
                        <li v-for="member in boardMembers" :key="member.id">
                            <img
                                class="aspect-[14/13] w-full rounded-2xl object-cover"
                                :src="
                                    member.profile
                                        ? `/storage/${member.profile}`
                                        : '/images/default.png'
                                "
                                :alt="
                                    member.profile
                                        ? `${member.name} headshot`
                                        : 'logo headshot placeholder'
                                "
                            />
                            <h3
                                class="mt-6 text-lg font-semibold leading-8 tracking-tight text-gray-900"
                            >
                                {{ member.name }}
                            </h3>
                            <p class="text-base leading-7 text-gray-700">
                                {{ member.title }}
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
