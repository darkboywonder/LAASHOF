<script setup>
import { Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue';
import { ChevronDownIcon } from '@heroicons/vue/20/solid';
import { WrenchScrewdriverIcon } from '@heroicons/vue/24/outline';
</script>

<template>
    <div class="relative bg-amber-600">
        <div class="mx-auto max-w-7xl py-3 px-3 sm:px-6 lg:px-8">
            <Disclosure
                as="div"
                v-slot="{ open }"
                class="sm:text-center flex flex-col items-center"
            >
                <div class="flex justify-center items-center space-x-2">
                    <WrenchScrewdriverIcon class="text-white w-5 h-5" />
                    <span class="text-white text-sm font-bold"
                        >WEBSITE UNDER CONSTRUCTION!</span
                    >
                </div>
                <DisclosureButton class="flex justify-center items-center">
                    <span class="text-white">more info</span>
                    <ChevronDownIcon
                        class="text-white w-6 h-6"
                        :class="open && 'rotate-180 transform'"
                    />
                </DisclosureButton>
                <DisclosurePanel>
                    <p class="text-white">
                        While our website is updating, the donation and
                        nomination forms are available.
                    </p>
                    <p class="text-white">
                        To make a donation or nomination, please click on either
                        the donation link or nominations links below and follow
                        the directions on the screen.
                    </p>
                </DisclosurePanel>
            </Disclosure>
        </div>
    </div>
</template>
