<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/inertia-vue3';
import Footer from '@/Layouts/Footer.vue';

const showingNavigationDropdown = ref(false);
</script>

<template>
  <div class="flex flex-col h-screen">
    <!-- we add the header depending on the page, it could be GeneralHeader or DetailHeader -->



    <div class="items-center">
        <slot />
    </div>
    
    <Footer />
  </div>
</template>
