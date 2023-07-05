<script setup>
const props = defineProps(['events'])
</script>

<template>
    <div>
        <aside aria-label="Related articles" class="py-8 lg:py-24  bg-gray-800">
            <div class="px-4 mx-auto max-w-screen-xl">
                <h2 class="mb-8 text-2xl font-bold  text-white">Sự kiện khác</h2>
                <div v-if="events.length > 0" class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    <article v-for="event in events" class="max-w-xs text-white border rounded-lg border-gray-500">
                        <a href="#">
                            <img :src="'data:image/jpeg;base64,'+ event['event_img']"
                                class="mb-5 rounded-lg w-full" alt="Image 1">
                        </a>
                        <div class="px-2">
                            <h2 class="mb-2 text-xl font-bold leading-tight ">
                                <NuxtLink :to="{name:'detail-event-id', params:{id: event['id']}}">{{ event['event_name']}}</NuxtLink>
                            </h2>
                            <div class="flex justify-between py-2">
                                <div class="invisible">
                                    <span>From </span>
                                    <strong class="text-[#2DC275]">
                                        900.000 VNĐ
                                    </strong>
                                </div>

                                <div class="flex justify-end items-center">
                                    <font-awesome-icon :icon="['fasr', 'calendar-days']" />
                                    <div class="ms-2">{{ event['event_date'] }}</div>

                                </div>
                            </div>
                            <div class="flex justify-between py-2">
                                <div>
                                    <font-awesome-icon icon="table-cells" class="me-2" />
                                    <label class=" inline-flex items-center underline-offset-4 ">{{ event['genre_name'] }}</label>
                                </div>
                                <p class="invisible border rounded-lg p-1">
                                    <font-awesome-icon :icon="['fas', 'location-dot']" />
                                    HO CHI MINH
                                </p>
                            </div>
                        </div>
                    </article>
                </div>
                <div v-else class="">
                    <p class="font-light text-gray-500 text-xl  sm:text-xltext-gray-400">Sorry... there are currently no upcoming events.</p>
                </div>
            </div>
        </aside>
    </div>
</template>

