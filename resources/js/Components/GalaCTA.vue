<script setup>
import { TicketIcon } from '@heroicons/vue/24/outline';
import { Countdown } from 'vue3-flip-countdown';
</script>

<template>
    <div class="bg-zinc-900">
        <div class="mx-auto max-w-2xl py-16 px-6 text-center sm:py-20 lg:px-8">
            <h2
                class="flex flex-col justify-center items-center text-3xl font-bold tracking-tight text-white sm:text-4xl"
            >
                <div
                    class="flex justify-center items-center w-14 rounded-full bg-white py-2 mb-4"
                >
                    <TicketIcon class="h-10 text-amber-500" />
                </div>
                <span class="text-lg font-semibold">Gala Tickets</span>
                <span class="block text-amber-500">Purchase tickets now!</span>
            </h2>
            <p class="mx-auto mt-6 max-w-xl text-lg leading-8 text-gray-300">
                Purchase tickets to attend our gala this fall!
            </p>
            <Countdown
                :deadlineDate="new Date('2023-09-23')"
                labelColor="#fff"
                mainColor="#f59e0b"
                mainFlipBackgroundColor="#3f3f46"
                secondFlipBackgroundColor="#71717a"
            />
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a
                    :href="'https://www.ticketmaster.com/event/16005E6B1534836F'"
                    class="mt-8 inline-flex w-full items-center justify-center rounded-md border border-transparent bg-white px-5 py-3 text-base font-bold text-amber-600 hover:bg-red-50 sm:w-auto"
                    >Purchase Tickets</a
                >
            </div>
            <svg
                viewBox="0 0 1024 1024"
                class="absolute left-1/2 top-1/2 -z-10 h-[64rem] w-[64rem] -translate-x-1/2 [mask-image:radial-gradient(closest-side,white,transparent)]"
                aria-hidden="true"
            >
                <circle
                    cx="512"
                    cy="512"
                    r="512"
                    fill="url(#827591b1-ce8c-4110-b064-7cb85a0b1217)"
                    fill-opacity="0.7"
                />
                <defs>
                    <radialGradient id="827591b1-ce8c-4110-b064-7cb85a0b1217">
                        <stop stop-color="#7775D6" />
                        <stop offset="1" stop-color="#E935C1" />
                    </radialGradient>
                </defs>
            </svg>
        </div>
    </div>
</template>
