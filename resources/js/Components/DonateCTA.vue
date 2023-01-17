<script setup>
import { CurrencyDollarIcon } from '@heroicons/vue/24/outline';
</script>

<template>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:max-h-[454px]">
        <div
            class="col-span-1 row-start-2 sm:row-auto lg:max-h-[454px] py-12 px-6 lg:px-8 lg:py-16 bg-green-800"
        >
            <div class="flex justify-start lg:justify-end">
                <div>
                    <div
                        class="flex justify-center items-center w-14 rounded-full bg-white py-2 mb-4"
                    >
                        <CurrencyDollarIcon class="h-10 text-amber-500" />
                    </div>
                    <h2 class="text-lg font-semibold text-gray-300">
                        Donations
                    </h2>
                    <p
                        class="mt-2 text-3xl font-bold tracking-tight text-amber-500 sm:text-4xl"
                    >
                        Help make our legends shine!
                    </p>
                    <p class="mt-3 text-lg text-gray-300 max-w-[600px]">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua. Eget nunc lobortis mattis aliquam
                        faucibus.
                    </p>
                    <div class="mt-8">
                        <div class="inline-flex rounded-md shadow">
                            <a
                                href="#"
                                class="inline-flex items-center justify-center rounded-md border border-transparent bg-white px-5 py-3 text-base font-bold text-amber-600 hover:bg-gray-50"
                            >
                                Donate Today
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="col-span-1 row-start-1 sm:row-auto h-56 sm:h-72 md:h-[518px] lg:h-[454px]"
        >
            <img
                class="h-full w-full object-cover"
                src="/images/nate_northington.jpg?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1920&q=60&blend=6366F1&sat=-100&blend-mode=multiply"
                alt=""
            />
        </div>
    </div>
</template>
