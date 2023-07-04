<script setup>
const route = useRoute();
const router = useRouter();
const config = useRuntimeConfig();
const eventId = ref();
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

</script>
<template>
    <div class="min-h-screen bg-gray-800">
        <EventInfo :event="eventDetail[0]"/>
        <BuyTicketConfirmUserInfo :event-id="eventId"/>
    </div>
</template>

<style>
    button.bg-red-600, section.bg-gray-900 {
        display: none;
    }
</style>