<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/inertia-vue3';
import DetailHeader from '@/Layouts/Headers/DetailHeader.vue';
import { onMounted, ref } from 'vue';

const { store } = defineProps(['store']);

const products = ref([]);

const fetchData = async () => {
  // fetch the products of the store with the specified id
  const response = await axios.get(`/stores/${store.id}/products`);
  products.value = response.data;
};

// // fetch the data when the component is mounted
onMounted(fetchData);

</script>
<template>
    <Head title="Store" />

    <AuthenticatedLayout>
      <DetailHeader />

    <div class="flex flex-col pt-4 px-2">
      <div class="flex flex-col">
        <div class="max-h-20 pt-4 px-2 overflow-hidden rounded-t-md"> 
          <img src="/img/default-banner.png" alt="Default banner"/>
        </div>
        <div class="p-2">
          <div class="font-semibold text-sm">
            Acerca de la tienda
          </div>
          <div class="flex items-center space-x-2 pt-2">
            <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path strokeLinecap="round" strokeLinejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
              <path strokeLinecap="round" strokeLinejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
            </svg>
            <p class="underline text-pink-300 text-sm">
              Av nueva los leones 123, Providencia, Santiago (Caracol Los Leones) Zona de delivery Store central
            </p>
          </div>
          <div class="flex items-center space-x-2 mt-2">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
              <path strokeLinecap="round" strokeLinejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>

            <p class="text-sm font-semibold">Horario de retiro: Hoy de 09:00 a 21:00 hrs</p>
          </div>
          <div class="flex items-center space-x-2 mt-3">
            <p class="text-xs font-semibold">Calificación</p>
            <div class="flex items-center space-x-1">
              <svg class="w-4 h-4 fill-pink-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path fillRule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clipRule="evenodd" />
              </svg>

              <p class="text-xs">4.4 / 5,0</p>
            </div>
            <div class="">
              <a href="#" class="text-xs text-pink-500 flex items-center space-x-1">
                <p class="font-semibold">Ver más</p>
                <svg class="w-3 h-3 fill-pink-500 stroke" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                  <path fillRule="evenodd" d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z" clipRule="evenodd" />
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div>
        <div class="flex border-b border-b-gray-200 overflow-x-scroll whitespace-nowrap text-sm font-semibold">
          <div class="flex justify-center">
            <a href="#" class="border-b-pink-500 text-pink-500 font-bold border-b-4 w-full flex justify-center p-2">
              Ver Todo
            </a>
          </div>
          <div class="flex justify-center">
            <a href="#" class="w-full flex justify-center p-2">
              Snacks
            </a>
          </div>
          <div class="flex justify-center">
            <a href="#" class="w-full flex justify-center p-2">
              Lácteos y quesos
            </a>
	    		</div>
          <div class="flex justify-center">
            <a href="#" class="w-full flex justify-center p-2">
              Frutas y verduras
            </a>
	    		</div>
        </div>
        <div>
          <!-- build a grid with cards that can have maximum 3 cards per row -->
          <div class="grid grid-cols-3 gap-4 pt-2">
            <div class="bg-white rounded-2xl shadow-md p-2 max-h-52">
              <div class="flex justify-center p-2">
                <img src="/fake/products/cheese.png" alt="Default product" class="w-20 h-20"/>
              </div>
              <div class="flex justify-center space-x-1">
                <p class="text-sm font-semibold">$400</p>
                <p class="text-sm font-semibold line-through text-gray-300">$400</p>
              </div>
              <div class="flex justify-center items-center text-xs bg-blue-400 text-white rounded-full">
                😁 50% dcto
              </div>
              <div class="flex justify-center">
                <p class="text-xs text-gray-500">Pack 10 Mix Almendras Pasa y Maní.</p>
              </div>
            </div>

            <div class="bg-white rounded-2xl shadow-md p-2 max-h-52">
              <div class="flex justify-center p-2">
                <img src="/fake/products/lays.png" alt="Default product" class="w-20 h-20"/>
              </div>
              <div class="flex justify-center space-x-1">
                <p class="text-sm font-semibold">$400</p>
                <p class="text-sm font-semibold line-through text-gray-300">$400</p>
              </div>
              <div class="flex justify-center items-center text-xs bg-blue-400 text-white rounded-full">
                😁 50% dcto
              </div>
              <div class="flex justify-center">
                <p class="text-xs text-gray-500">Pack 10 Mix Almendras Pasa y Maní.</p>
              </div>
            </div>

            <div class="bg-white rounded-md shadow-md p-2">
              <div class="flex justify-center">
                <img src="/img/default-product.png" alt="Default product" class="w-20 h-20"/>
              </div>
              <div class="flex justify-center">
                <p class="text-sm font-semibold">Producto 3</p>
              </div>
              <div class="flex justify-center">
                <p class="text-xs">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.</p>
              </div>
              <div class="flex justify-center">
                <p class="text-xs font-semibold">$ 1.000</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    </AuthenticatedLayout>
</template>