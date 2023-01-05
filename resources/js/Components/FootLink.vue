<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';
import Icon from '@/Components/Icon.vue';

const props = defineProps(['href', 'active', 'name']);

const classes = computed(() =>
	props.active
		? 'flex flex-col focus:bg-gray-100 items-center px-4 py-2 rounded-full text-sm text-pink-500 font-bold'
		: 'flex flex-col focus:bg-gray-100 items-center px-4 py-2 rounded-full text-sm text-gray-500 hover:text-pink-500'
);

</script>

<template>
	<Link :href="href" :class="classes">
		<Icon :name="name" :active="active" />
		<slot />
	</Link>
</template>

