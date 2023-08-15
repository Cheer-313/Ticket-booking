<script setup>
// definePageMeta({middleware: 'auth'})
const route = useRoute();
const router = useRouter();
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

// Check value exist in session
if (process.client && localStorage.getItem('booked-ticket')) {
    JSON.parse(localStorage.getItem('booked-ticket')).forEach(element => {
        let idx = ticketSlot.value.findIndex( o => o.id == element.id);
        ticketSlot.value[idx] = element;
    });
    localStorage.removeItem("booked-ticket");
}

function submitBuyTicketForm(isRenderChart = false, paymentId = null) {
    if (isRenderChart) {
        router.push({
            name: 'tickets-id-complete',
            params: {
                id: event.value.event_id,
            },
            query: {
                'payment_id': paymentId,
            }
        })
    } else {
        router.push({
            name: 'tickets-id-confirm',
            params: {
                id: event.value.event_id,
            }
        })
    }
}
</script>

<template>
    <div class="min-h-screen bg-gray-800 buy-ticket">
        <EventInfo :event="eventDetail[0]"/>
        <div v-if="eventDetail[0]['work_space_key'] != null && eventDetail[0]['event_key_chart'] != null">
            <SeatChart @submit-form="submitBuyTicketForm" :ticket-slot="ticketSlot"></SeatChart>
        </div>
        <div v-else>
            <BuyTicketForm :ticket-slot="ticketSlot" @submit-form="submitBuyTicketForm"/>
        </div>
    </div>
</template>

<style>
    .buy-ticket button.bg-red-600, .buy-ticket section.bg-gray-900 {
        display: none;
    }
</style>