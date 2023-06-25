<script setup>
const route = useRoute();
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
    <div>
        <EventInfo :event="eventDetail[0]"/>
        <IntroduceEventInfo :event="eventDetail[0]"/>
        <EventTicketList />
        <!-- <EventList /> -->
    </div>
</template>