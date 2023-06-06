<script setup>
defineProps(['category'])
</script>
<template>
    <section class="bg-gray-800">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-4 lg:px-2 ">
            <div class="flex justify-between mb-5">
                <h2 class="text-gray-200 text-xl">{{ category['category_name'] }}</h2>
                <a href="#" class="text-gray-200 text-xl hover:text-gray-50">View all {{ category['category_name'] }}</a>
            </div>
            <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-4">
                <Card v-for="artist in category['list_artist']" :key="artist['artist_id']" :artist="artist"/>
            </div>
        </div>
    </section>
</template>