<script setup>
import FootLink from '@/Components/FootLink.vue';
</script>

<template>
    <div class="fixed bottom-0 w-full bg-white shadow-lg">
        <div class="flex justify-between ml-8 mr-8 p-1">
            <div class="flex flex-col items-center w-full px-1">
				<FootLink :href="route('stores')"
                    :active="route().current('stores')"
                    name="home"
                >Inicio</FootLink>
            </div>
            <div class="flex flex-col items-center w-full px-1">
				<FootLink :href="route('purchase-orders')" 
                    :active="route().current('purchase-orders')"
                    name="purchase-orders">Ordenes</FootLink>
            </div>
            <div class="flex flex-col items-center w-full px-1">
				<FootLink :href="route('profile')" 
                    :active="route().current('profile')"
                    name="profile"
                >Perfil</FootLink>
            </div>
        </div>
    </div> 
</template>
