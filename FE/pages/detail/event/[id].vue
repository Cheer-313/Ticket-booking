<script setup>
const route = useRoute();
const config = useRuntimeConfig();
const eventId = ref();
const eventDetail = ref([]);
const ticketSlot = ref([]);

eventId.value = route.params.id;
// Get data artist
const { data:event, error } = await useFetch(config.public.MS1_API_URL+"/api/detail/event/", {
    method: 'GET',
    query: {
        event_id: eventId.value, 
    },
});
eventDetail.value = event.value.event_detail;

// Get data slot of ticket
const { data:slots, error2 } = await useFetch(config.public.MS2_API_URL+"/api/ticket/slot/", {
    method: 'GET',
    query: {
        event_id: eventId.value, 
    },
});
ticketSlot.value = slots.value.ticket_slot;
</script>

<template>
    <div>
        <EventInfo :event="eventDetail[0]"/>
        <IntroduceEventInfo :event="eventDetail[0]"/>
        <EventTicketList :ticket-slot="ticketSlot"/>
        <!-- <EventList /> -->
    </div>
</template>