<script setup>
const props = defineProps(['category', 'artists'])
</script>
<template>
    <section class="bg-gray-800">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-4 lg:px-2 ">
            <div class="flex justify-between mb-5">
                <h2 class="text-gray-200 text-x3">{{ category['code_name'] }}</h2>
                <a href="#" class="text-gray-200 text-xl hover:text-gray-50">View all {{ category['code_name'] }}</a>
            </div>
            <div v-if="artists != undefined" class="grid gap-8 mb-6 lg:mb-16 lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2">
                <Card v-for="artist in artists['list_artist']" :key="artist['id']" :artist="artist"/>
            </div>
            <div v-else class="">
                <p class="font-light text-gray-500 text-xl  sm:text-xltext-gray-400">Sorry... there are currently no upcoming events.</p>
            </div>
        </div>
    </section>
</template>