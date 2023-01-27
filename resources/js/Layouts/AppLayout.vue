<script setup>
import Nav from '@/Components/Nav.vue';
import Footer from '@/Components/Footer.vue';
</script>

<template>
    <div class="bg-gray-100">
        <Nav />
        <slot />
    </div>
    <Footer />
</template>
