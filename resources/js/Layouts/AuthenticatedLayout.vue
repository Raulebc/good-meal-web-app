<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/inertia-vue3';
import Footer from '@/Components/Footer.vue';

const showingNavigationDropdown = ref(false);
</script>

<template>
  <div class="flex flex-col h-screen">
    <div class="flex justify-between p-2 pt-4 items-start">
        <div class="w-5/6">
            <button class="w-full inline-flex items-center px-2 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 hover:bg-pink-200 focus:bg-pink-200 hover:text-pink-600 focus:outline-none transition duration-150 ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-6 h-6">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path strokeLinecap="round" strokeLinejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                </svg>

                <p class="ml-2 ">
                    <span class="font-bold">Vicuña mackena 54, ...</span>
                </p>
            </button>
        </div>
        <div class="w-1/6 flex items-center justify-end">
            <div class="p-2 text-gray-500 bg-white hover:text-pink-600 hover:bg-gray-100 focus:bg-pink-400 font-medium rounded-xl focus:outline-none transition duration-150 ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-6 h-6 ">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
                </svg>
            </div>
        </div>
    </div>
    <div class="items-center">
        <slot />

    </div>
    <!-- we fixed the next div to the bottom of the screen -->

    <!-- we import the footer -->
    <Footer />
  </div>
</template>
