<script setup>
const props = defineProps(['artist'])
</script>
<template>
    <div class="items-center rounded-xl shadow bg-gray-900 border-gray-700">
        <a href="#">
            <img class=" rounded-lg sm:rounded-l-lg object-contain w-full h-48"
                :src="'data:image/jpeg;base64,'+ artist['artist_img']"
                alt="">
        </a>
        <div class="p-4">
            <h3 class="text-xl font-bold tracking-tight text-white">
                <a href="#">{{ artist['artist_name'] }}</a>
            </h3>
        </div>
    </div>
</template>