<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/inertia-vue3';
import StoreCard from '@/Components/StoreCard.vue';
import GeneralHeader from '@/Layouts/Headers/Global.vue';

defineProps(['stores']);
</script>

<template>
    <Head title="Home" />

    <AuthenticatedLayout>
		<GeneralHeader />

        <div class="flex justify-between border-b border-b-gray-100">
            <div class="flex justify-center w-1/3">
				<button @click="$inertia.visit(`/stores?status=stock`)" class="border-b-pink-500 border-b-4 w-full flex justify-center p-2">
					Con stock
				</button>
			</div>
            <div class="flex justify-center w-1/3">
				<button @click="$inertia.visit(`/stores?status=sold_out`)" class="w-full flex justify-center p-2">
					Sin stock
				</button>
			</div>
            <div class="flex justify-center w-1/3">
				<button @click="$inertia.visit(`/stores?status=con-stock`)" class="w-full flex justify-center p-2">
					Favoritos
				</button>
			</div>
        </div>

		<StoreCard v-for="store in stores" :key="store.id" :store="store" />
    </AuthenticatedLayout>
</template>
