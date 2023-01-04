<script setup> 
import { computed } from 'vue';
import dayjs from 'dayjs';

const props = defineProps(['store']);

/**
 * @returns {string}
 */
const storeHours = computed(() => {
	console.log(props.store.store_hours);
	console.log('====================');
	console.log(props.store);
	if (!props.store_hours) {
		return 'No hay good bags';
	}

	const { start_time, end_time } = props.store.store_hours[0];

	return `Hoy ${dayjs('2022-01-01 ' + start_time).format('HH:mm')} - ${dayjs('2022-01-01 ' + end_time).format('HH:mm')} hrs`;
});

/**
 * @returns {string}
 */
const bagNumber = computed(() => {
	return props.store.products_count > 10 
		? '10+'
		: props.store.products_count;
});

</script>

 <template>
	<div class="flex justify-center w-full px-4 pt-4">
		<a :href="route('stores.show', { store: store.id })"
			class="flex flex-col w-full border shadow-lg rounded-2xl max-w-2xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent"
		>
			<div class="flex justify-between w-full bg-gray-200 rounded-2xl">
				<div class="flex flex-col px-3 py-2 space-y-2">
					<p class="p-1 px-2 rounded-full bg-pink-500 text-sm font-bold text-white">
						{{ storeHours }}
						<!-- {{ storeHours ? '' : 'Nop' }} -->
					</p>
<!-- 
created_at:  null
day:  "3"
delivery_available:  1
end_time:  "17:00:00"
id:  3
pickup_available:  1
start_time:  "09:00:00"
store_id:  1
updated_at:  null -->

					<!-- retiro o delivery -->
					<p class="p-1 px-2 rounded-full bg-pink-200 text-sm font-bold text-pink-500">{{ store.store_hours?.pickup_available ?? 'Sin datos' }}</p>
				</div>
				<div class="pr-6 pt-2">
					<svg  class="w-6 h-6 fill-pink-200 stroke-none" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
						<path strokeLinecap="round" strokeLinejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
					</svg>
				</div>
			</div>
			<div class="pt-2 pl-3">
				<p class="font-semibold text-lg">{{ store.name }}</p>
				
				<div class="flex text-sm space-x-2">
					<p class="font-bold text-pink-500">Desde $2.400 </p>
					<p class="line-through text-gray-400">$5.000</p>
				</div>
			</div>
			<div class="flex justify-between">
				<div class="flex pl-3 space-x-1 text-sm">
					<div class="flex items-center space-x-1">
						<svg class="h-4 w-4 text-gray-600"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />  <circle cx="12" cy="7" r="4" /></svg>
						<p>45 min</p>
					</div>
					<div class="flex items-center space-x-1">
						<svg  class="h-4 w-4 text-gray-600 stroke-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
							<path strokeLinecap="round" strokeLinejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
							<path strokeLinecap="round" strokeLinejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
						</svg>
<!-- {{ props }} -->
						<p>3,83 km</p>
					</div>
				</div>
				<div class="flex p-2 space-x-1">
					<p class="text-lg font-semibold">{{ bagNumber }}</p>
					<svg class="w-6 h-6 stroke-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
						<path strokeLinecap="round" strokeLinejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
					</svg>
				</div>
			</div>
		</a>
	</div>
</template>


