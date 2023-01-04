<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/inertia-vue3';
import DetailHeader from '@/Layouts/Headers/DetailHeader.vue';


defineProps(['store']);

</script>

<template>
    <Head title="Store" />

    <AuthenticatedLayout>
      <DetailHeader />

      <div>banner</div>
      <div>Acerca de la tienda</div>
      <div>
        <div>location icon</div>
        <div>direccino</div>
      </div>
      <div>
        <div>clock icon</div>
        <div>Horario de retiro: Hoy de 09:00 a 21:00 hrs</div>
      </div>
      <div>
        <div>Calificatino</div>
        <div>4.4 / 5,0</div>
        <div>Ver mas</div>
      </div>

    </AuthenticatedLayout>
</template>