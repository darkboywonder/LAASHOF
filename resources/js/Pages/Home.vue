<script setup>
import { defineComponent } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import WordedLogo from '@/Components/WordedLogo.vue';
import SponsorCloud from '@/Components/SponsorCloud.vue';
import ScholarshipCTA from '@/Components/ScholarshipCTA.vue';
import NominateCTA from '@/Components/NominateCTA.vue';
import DonateCTA from '@/Components/DonateCTA.vue';
import 'vue3-carousel/dist/carousel.css';
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';
import ConstructionBanner from '@/ConstructionBanner.vue';

const carouselSettings = {
    itemsToShow: 1,
    snapAlign: 'center',
};

const carouselBreakpoints = {
    700: {
        itemsToShow: 3.5,
        snapAlign: 'center',
    },
    // 1024 and up
    1024: {
        itemsToShow: 5,
        snapAlign: 'start',
    },
};

defineComponent({
    name: 'Basic',
    components: {
        Carousel,
        Slide,
        Pagination,
        Navigation,
    },
});
</script>

<template>
    <AppLayout>
        <ConstructionBanner />
        <div class="grid grid-cols-7">
            <!-- <div class="isolate bg-white">
                <div
                    class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]"
                >
                    <svg
                        class="relative left-[calc(50%-11rem)] -z-10 h-[21.1875rem] max-w-none -translate-x-1/2 rotate-[30deg] sm:left-[calc(50%-30rem)] sm:h-[42.375rem]"
                        viewBox="0 0 1155 678"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill="url(#45de2b6b-92d5-4d68-a6a0-9b9b2abad533)"
                            fill-opacity=".3"
                            d="M317.219 518.975L203.852 678 0 438.341l317.219 80.634 204.172-286.402c1.307 132.337 45.083 346.658 209.733 145.248C936.936 126.058 882.053-94.234 1031.02 41.331c119.18 108.451 130.68 295.337 121.53 375.223L855 299l21.173 362.054-558.954-142.079z"
                        />
                        <defs>
                            <linearGradient
                                id="45de2b6b-92d5-4d68-a6a0-9b9b2abad533"
                                x1="1155.49"
                                x2="-78.208"
                                y1=".177"
                                y2="474.645"
                                gradientUnits="userSpaceOnUse"
                            >
                                <stop stop-color="#9089FC" />
                                <stop offset="1" stop-color="#FF80B5" />
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
            </div> -->
            <div class="col-start-3 col-span-3">
                <WordedLogo />
            </div>
        </div>

        <div class="bg-white">
            <div class="mx-auto max-w-7xl py-16 px-6 sm:py-10 lg:px-8">
                <div class="text-center">
                    <h2 class="text-lg font-semibold text-green-600">
                        Hall of Fame
                    </h2>
                    <p
                        class="mt-1 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl lg:text-6xl"
                    >
                        2022 Inductees
                    </p>
                    <p class="mx-auto mt-5 max-w-xl text-xl text-gray-500">
                        We congratulate and welcome the 2022 class of inductees
                        into the hall of fame. We also thank our sponsors for
                        their support.
                    </p>
                </div>
            </div>
        </div>

        <!-- <div class="bg-white h-[400px] flex flex-col justify-center">
            <Carousel items-to-show="5.5" :wrap-around="true" :autoplay="3000">
                <Slide v-for="slide in 22" :key="slide">
                    <div class="bg-gray-200 w-full h-[300px] mx-2">
                        <span>Inductee</span> {{ slide }}
                    </div>
                </Slide>

                <template #addons>
                    <Navigation />
                </template>
            </Carousel>
        </div> -->

        <SponsorCloud />
        <NominateCTA />
        <ScholarshipCTA />
        <DonateCTA />
    </AppLayout>
</template>
