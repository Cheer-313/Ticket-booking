<script setup>
const props = defineProps(['event']);
const { event } = toRefs(props);
</script>
<template>
    <div>
        <section class="items-center bg-gray-900 py-5 divide-y-0">
            <div class="flex">
                <div class="w-full max-w-screen-xl px-4 mx-auto lg:px-12">
                    <div class="relative overflow-hidden shadow-md bg-gray-800 border border-gray-700 hover:bg-gray-700 cursor-pointer">
                        <div class="flex-row items-center justify-between p-4 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
                            <div class="flex ">
                                <div class="text-center px-4 py-2 text-sm font-medium text-white">
                                    <h3>JUN 20</h3>
                                    <span>Tue - 7:30pm</span>
                                </div>
                                <div>
                                    <div class="ml-10">
                                        <h4 class="mr-3 font-semibold text-white">{{ event.event_name }}</h4>
                                        <h5 class="mr-3 font-semibold text-white">{{ event.address }}</h5>
                                        <p class="text-gray-400">{{ event.artist_name }}</p>
                                    </div>   
                                </div>
                            </div>
                            <NuxtLink :to="{name:'detail-event-id', params:{id: event.event_id}}">
                                <button type="button" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg focus:ring-4  bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-blue-800">
                                    See Tickets
                                </button>
                            </NuxtLink>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
