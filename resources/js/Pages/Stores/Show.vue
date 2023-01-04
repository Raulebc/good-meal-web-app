<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/inertia-vue3';


defineProps(['store']);

</script>

<template>
    <Head title="Store" />

    <AuthenticatedLayout>
		{{ store.name }}
    </AuthenticatedLayout>
</template>