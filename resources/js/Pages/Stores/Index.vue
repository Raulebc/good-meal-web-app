<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/inertia-vue3';
import StoreCard from '@/Components/StoreCard.vue';

defineProps(['stores']);

</script>

<template>
    <Head title="Home" />

    <AuthenticatedLayout>
        <div class="flex justify-between border-b border-b-gray-100">
            <div class="flex justify-center w-1/3">
				<a href="#" class="border-b-pink-500 border-b-4 w-full flex justify-center p-2">
					Con stock
				</a>
			</div>
            <div class="flex justify-center w-1/3">
				<a href="#" class="w-full flex justify-center p-2">
					Sin stock
				</a>
			</div>
            <div class="flex justify-center w-1/3">
				<a href="#" class="w-full flex justify-center p-2">
					Favoritos
				</a>
			</div>
        </div>

		<StoreCard v-for="store in stores" :key="store.id" :store="store" />
    </AuthenticatedLayout>
</template>
