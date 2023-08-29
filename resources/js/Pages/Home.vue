<script setup>
import { defineComponent } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import SponsorCloud from '@/Components/SponsorCloud.vue';
import ScholarshipCTA from '@/Components/ScholarshipCTA.vue';
import NominateCTA from '@/Components/NominateCTA.vue';
import DonateCTA from '@/Components/DonateCTA.vue';
import GalaCTA from '@/Components/GalaCTA.vue';
import 'vue3-carousel/dist/carousel.css';
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';
import WordedLogoAlt from '@/Components/WordedLogoAlt.vue';
import Banner from '@/Components/Banner.vue';

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

defineProps({
    sponsorImages: {
        type: Object,
    }
});

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
        <Banner
            event-title="Donate Today"
            message="Support our hall of fame with a donation"
            button-title="Donate here"
            link="https://www.paypal.com/donate/?hosted_button_id=YHDQSBNK7TSKS"
        />
        <div class="relative grid grid-cols-7">
            <div class="absolute top-0 left-0 z-0">
                <!--prettier-ignore-->
                <img
                    class="relative cover z-[1]"
                    srcset="
                        /images/laashof_collage383x164.jpg 383w,
                        /images/laashof_collage769x331.jpg 769w,
                        /images/laashof_collage1273x546.jpg 1273w,
                        /images/laashof_collage2544x1091.jpg 2544w
                    "
                    sizes="
                        (max-width: 480px) 383w,
                        (max-width: 768px) 769w,
                        (max-width: 1024px) 1273w,
                        2544w
                    "
                    src="/images/laashof_collage1273x546.jpg"
                    alt="collage of hall of famers"
                />
                <div
                    class="absolute top-0 left-0 inset-0 bg-gray-500 bg-opacity-75 z-[2] min-h-full min-w-fit"
                ></div>
            </div>
            <div class="col-start-3 col-span-3 z-[3]">
                <WordedLogoAlt />
            </div>
        </div>

        <GalaCTA />
        <div class="bg-white">
            <div class="mx-auto max-w-7xl py-16 px-6 sm:py-10 lg:px-8">
                <div class="text-center mb-5">
                    <h2 class="text-lg font-semibold text-green-600">
                        Hall of Fame
                    </h2>
                    <p
                        class="mt-1 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl lg:text-6xl"
                    >
                        2023 Inductees
                    </p>
                    <p class="mx-auto mt-5 max-w-xl text-xl text-gray-500">
                        We congratulate and welcome the 2023 class of inductees
                        into the hall of fame. We also thank our sponsors for
                        their support.
                    </p>
                </div>
                <div class="flex justify-center items-center">
                    <img src="/images/2023_inductee_flyer.jpg" />
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

        <SponsorCloud :sponsor-images="sponsorImages" />
        <NominateCTA />
        <ScholarshipCTA />
        <DonateCTA />
    </AppLayout>
</template>
