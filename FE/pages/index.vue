<script setup>
const config = useRuntimeConfig()
const { data, error } = await useFetch(config.public.MS1_API_URL+"/api/home", {
    method: 'GET',
});
</script>
<template>
    <div>
        <section class="bg-gray-800">
            <div class="mx-auto max-w-screen-xl pt-10">
                <div class="mx-auto max-w-screen-sm text-center">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-white">Let's Make Live Happen</h2>
                    <p class="font-light text-gray-500 text-xl  sm:text-xltext-gray-400">Shop millions of live events and discover can't-miss concerts, games, theater and more.</p>
                </div>
            </div>
            </section>

        <!-- Category -->
        <div v-if="data != null">
            <Carousel v-for="category in data['listCategory']" :key="category['code']" :category="category" :artists="data['listArtist'][category['code']]" />
        </div>
        <NewsLetter />
    </div>
</template>