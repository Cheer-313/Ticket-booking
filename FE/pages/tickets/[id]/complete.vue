<script setup>
const route = useRoute();
const config = useRuntimeConfig();
const eventId = ref();
const paymentId = ref();
const eventDetail = ref([]);

eventId.value = route.params.id;
// Get data artist
const { data:event, error } = await useFetch(config.public.MS1_API_URL+"/api/detail/event/", {
    method: 'GET',
    query: {
        event_id: eventId.value, 
    },
});
eventDetail.value = event.value.event_detail;
paymentId.value = route.query?.payment_id;
</script>
<template>
    <div class="min-h-screen bg-gray-800">
        <EventInfo :event="eventDetail[0]"/>
        <div class="font-light sm:text-lg text-white mt-16">
            <div class="px-4 mx-auto max-w-screen-md border-b pb-4">
                <h2 class="mb-4 text-2xl tracking-tight font-bold text-center text-white uppercase">Ordering Completed</h2>
                <p class="mb-4 tracking-tight text-white">Please check your email to see your detail ticket.</p>
                <p class="mb-4 tracking-tight text-white font-bold">Payment Id: {{ paymentId }}</p>
            </div>
            <div class=" px-4 mx-auto max-w-xs mt-10">
                <NuxtLink :to="{name:'index'}">
                    <button class="w-full p-6 text-white text-xl bg-green-600 hover:bg-green-500 rounded-lg font-bold">
                        Home Page
                    </button>
                </NuxtLink>
            </div>
        </div>
    </div>
</template>