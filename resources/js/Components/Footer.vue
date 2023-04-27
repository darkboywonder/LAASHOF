<template>
    <footer class="bg-black" aria-labelledby="footer-heading">
        <h2 id="footer-heading" class="sr-only">Footer</h2>
        <div class="mx-auto max-w-7xl py-12 px-6 lg:py-16 lg:px-8">
            <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                <div class="space-y-6 xl:col-span-1">
                    <Link :href="route('home')">
                        <FlatLogo class="w-14 h-14 fill-white" />
                    </Link>
                    <!-- <p class="text-base text-gray-300">
                        Lexington African American Sports Hall of Fame. Where
                        legends shine.
                    </p> -->
                    <P class="text-base text-gray-300"> </P>
                    <P class="text-base text-gray-300">
                        <a
                            class="text-base hover:text-white"
                            href="mailto:info@laashof.com"
                            >info@laashof.com</a
                        >
                        <br />
                        <a
                            class="text-base hover:text-white"
                            href="telto:859-608-2175"
                            >859-608-2175</a
                        >
                        <br />
                        1588 Leestown Road <br />
                        P.O. Box 130-312 <br />
                        Lexington, KY 40511
                    </P>
                    <div class="flex space-x-6">
                        <a
                            v-for="item in navigation.social"
                            :key="item.name"
                            :href="item.href"
                            class="text-gray-300 hover:text-white"
                        >
                            <span class="sr-only">{{ item.name }}</span>
                            <component
                                :is="item.icon"
                                class="h-6 w-6"
                                aria-hidden="true"
                            />
                        </a>
                    </div>
                </div>
                <div class="mt-12 grid grid-cols-2 gap-8 xl:col-span-2 xl:mt-0">
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h3 class="text-base font-bold text-white">
                                About
                            </h3>
                            <ul role="list" class="mt-4 space-y-4">
                                <li
                                    v-for="item in navigation.about"
                                    :key="item.name"
                                >
                                    <a
                                        :href="item.href"
                                        class="text-base text-gray-300 hover:text-white"
                                        >{{ item.name }}</a
                                    >
                                </li>
                            </ul>
                        </div>
                        <div class="mt-12 md:mt-0">
                            <h3 class="text-base font-bold text-white">
                                Support
                            </h3>
                            <ul role="list" class="mt-4 space-y-4">
                                <li
                                    v-for="item in navigation.support"
                                    :key="item.name"
                                >
                                    <a
                                        :href="item.href"
                                        class="text-base text-gray-300 hover:text-white"
                                        >{{ item.name }}</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h3 class="text-base font-bold text-white">
                                Engage
                            </h3>
                            <ul role="list" class="mt-4 space-y-4">
                                <li
                                    v-for="item in navigation.engage"
                                    :key="item.name"
                                >
                                    <a
                                        :href="item.href"
                                        class="text-base text-gray-300 hover:text-white"
                                        >{{ item.name }}</a
                                    >
                                </li>
                            </ul>
                        </div>
                        <!-- <div class="mt-12 md:mt-0">
                            <h3 class="text-base font-bold text-white">
                                Legal
                            </h3>
                            <ul role="list" class="mt-4 space-y-4">
                                <li
                                    v-for="item in navigation.legal"
                                    :key="item.name"
                                >
                                    <a
                                        :href="item.href"
                                        class="text-base text-gray-300 hover:text-white"
                                        >{{ item.name }}</a
                                    >
                                </li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>

            <!-- <div
                class="border-t border-gray-700 pt-8 lg:flex lg:items-center lg:justify-between mt-8"
            >
                <div>
                    <h3 class="text-base font-bold text-white">
                        Subscribe to our newsletter
                    </h3>
                    <p class="mt-2 text-base text-gray-300">
                        The latest news, articles, and resources, sent to your
                        inbox weekly.
                    </p>
                </div>
                <form class="mt-4 sm:flex sm:max-w-md lg:mt-0">
                    <label for="email-address" class="sr-only"
                        >Email address</label
                    >
                    <input
                        type="email"
                        name="email-address"
                        id="email-address"
                        autocomplete="email"
                        required=""
                        class="w-full min-w-0 appearance-none rounded-md border border-transparent bg-white py-2 px-4 text-base text-gray-900 placeholder-gray-500 focus:border-white focus:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 sm:max-w-xs"
                        placeholder="Enter your email"
                    />
                    <div
                        class="mt-3 rounded-md sm:mt-0 sm:ml-3 sm:flex-shrink-0"
                    >
                        <button
                            type="submit"
                            class="flex w-full items-center justify-center rounded-md border border-transparent bg-green-600 py-2 px-4 text-base font-bold text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 focus:ring-offset-gray-800"
                        >
                            Subscribe
                        </button>
                    </div>
                </form>
            </div> -->
            <div
                class="mt-8 border-t border-gray-700 pt-8 md:flex md:items-center md:justify-center"
            >
                <p class="mt-8 text-base text-gray-400 md:order-1 md:mt-0">
                    &copy; 2023 LAASHOF, Inc. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</template>

<script setup>
import { defineComponent, h } from 'vue';
import FlatLogo from './FlatLogo.vue';
import { Link } from '@inertiajs/inertia-vue3';

const navigation = {
    about: [
        { name: 'Our Story', href: route('about.story') },
        { name: "Founder's Message", href: route('about.message') },
        { name: 'Founding Members', href: route('about.founding-members') },
        { name: 'Board of Directors', href: route('about.board') },
    ],
    support: [
        {
            name: 'Gala Tickets',
            href: 'https://www.ticketmaster.com/event/16005E6B1534836F',
        },
        {
            name: 'Donate',
            href: 'https://www.paypal.com/donate/?hosted_button_id=YHDQSBNK7TSKS',
        },
        {
            name: 'Corporate Sponsorship Package',
            href: '/sponsorship_proposal.pdf',
        },
        { name: 'Become a member', href: route('register') },
    ],
    engage: [
        {
            name: 'Nominate Individual',
            href: route('nominate.individual.create'),
        },
        { name: 'Nominate Team', href: route('nominate.team.create') },
        { name: 'Submit Scholarship', href: route('scholarship.create') },
    ],
    legal: [
        { name: 'Claim', href: '#' },
        { name: 'Privacy', href: '#' },
        { name: 'Terms', href: '#' },
        { name: 'Partners', href: '#' },
    ],
    social: [
        {
            name: 'Facebook',
            href: 'https://www.facebook.com/officiallaashof',
            icon: defineComponent({
                render: () =>
                    h('svg', { fill: 'currentColor', viewBox: '0 0 24 24' }, [
                        h('path', {
                            'fill-rule': 'evenodd',
                            d: 'M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z',
                            'clip-rule': 'evenodd',
                        }),
                    ]),
            }),
        },
        {
            name: 'Instagram',
            href: 'https://instagram.com/officiallaashof?igshid=YmMyMTA2M2Y=',
            icon: defineComponent({
                render: () =>
                    h('svg', { fill: 'currentColor', viewBox: '0 0 24 24' }, [
                        h('path', {
                            'fill-rule': 'evenodd',
                            d: 'M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z',
                            'clip-rule': 'evenodd',
                        }),
                    ]),
            }),
        },
        {
            name: 'Twitter',
            href: 'https://twitter.com/LAASHOFInc',
            icon: defineComponent({
                render: () =>
                    h('svg', { fill: 'currentColor', viewBox: '0 0 24 24' }, [
                        h('path', {
                            d: 'M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84',
                        }),
                    ]),
            }),
        },
        {
            name: 'LinkedIn',
            href: 'https://www.linkedin.com/in/laashofinc/',
            icon: defineComponent({
                render: () =>
                    h('svg', { fill: 'currentColor', viewBox: '0 0 256 256' }, [
                        h('path', {
                            d: 'M0 18.338C0 8.216 8.474 0 18.92 0h218.16C247.53 0 256 8.216 256 18.338v219.327C256 247.79 247.53 256 237.08 256H18.92C8.475 256 0 247.791 0 237.668V18.335z M77.796 214.238V98.986H39.488v115.252H77.8zM58.65 83.253c13.356 0 21.671-8.85 21.671-19.91-.25-11.312-8.315-19.915-21.417-19.915-13.111 0-21.674 8.603-21.674 19.914 0 11.06 8.312 19.91 21.169 19.91h.248zM99 214.238h38.305v-64.355c0-3.44.25-6.889 1.262-9.346 2.768-6.885 9.071-14.012 19.656-14.012 13.858 0 19.405 10.568 19.405 26.063v61.65h38.304v-66.082c0-35.399-18.896-51.872-44.099-51.872-20.663 0-29.738 11.549-34.78 19.415h.255V98.99H99.002c.5 10.812-.003 115.252-.003 115.252z',
                        }),
                    ]),
            }),
        },
    ],
};
</script>
