<script setup>
const config = useRuntimeConfig();
const route = useRoute();
const artistId = ref();
const artistDetail = ref([]);
const artistImg = ref([]);


artistId.value = route.params.id;
// Get data artist
const { data:artist, error } = await useFetch(config.public.MS1_API_URL+"/api/detail/artist/", {
    method: 'GET',
    query: {
        artist_id: artistId.value, 
    },
});
artistDetail.value = artist.value.artist_detail;
artistImg.value = artist.value.artist_galerry;

</script>
<template>
    <div>
        <div v-if="artistDetail.length >= 1 && artistDetail[0].text_about != null">
            <section class="bg-gray-800 py-5 ">
                <h1 class="text-white text-4xl px-4 lg:px-6 text-center">About <span class="text-[#2DC275]">{{ artistDetail[0].artist_name }}</span></h1>
                <div class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
                    <img class="w-full dark:hidden object-contain max-h-[30rem] h-fit aspect-square" :src="'data:image/jpeg;base64,'+ artistDetail[0]['artist_img']" :alt="artistDetail[0].artist_name">
                    <div class="mt-4 md:mt-0 ">
                        <p class="mb-6 font-light md:text-lg text-gray-400">{{ artistDetail[0].text_about }}</p>
                    </div>
                </div>
            </section>
        </div>
        <section class="flex items-center bg-gray-900 py-5">
            <div class="m-auto text-4xl font-medium text-white rounded-lg">
                All events of <span class="text-[#2DC275]">{{ artistDetail[0].artist_name }}</span>
            </div>
        </section>
        <div v-if="artistDetail.length > 1 || artistDetail[0].event_id != null">
            <ArtistEvent v-for="event in artistDetail" :event="event"/>
            <section class="flex items-center bg-gray-900 py-5">
                <button type="button" class="m-auto px-12 py-2 text-lg font-medium text-white rounded-lg focus:ring-4 bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-blue-800">
                    Load more
                </button>
            </section>
        </div>
        <div v-else class="">
            <section class="items-center bg-gray-900 py-5 divide-y-0">
                <div class="flex">
                    <div class="w-full max-w-screen-xl px-4 mx-auto lg:px-12 text-center">
                        <p class="font-light text-gray-500 text-xl  sm:text-xltext-gray-400">Sorry... there are currently no upcoming events.</p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</template>
