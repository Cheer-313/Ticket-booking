<script setup>
defineProps(['artist'])
</script>
<template>
    <div class="items-center rounded-xl shadow bg-gray-900 border-gray-700">
        <a href="#">
            <img class=" rounded-lg sm:rounded-l-lg object-contain w-full h-48"
                :src="artist['galerry_url']"
                alt="">
        </a>
        <div class="p-4">
            <h3 class="text-xl font-bold tracking-tight text-white">
                <a href="#">{{ artist['artist_name'] }}</a>
            </h3>
            <span class="text-gray-400 pt-4">CTO</span>
            <p class="mt-3 mb-4 font-light text-gray-400">Jese drives the technical strategy of the
                flowbite platform and brand.</p>
        </div>
    </div>
</template>