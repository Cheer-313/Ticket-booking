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

const bookingTicket = async () => {
    let {data:dataUser} = useAuth();
    let body = {
        userId: 1,
        email: dataUser.value.user.email,
        name: dataUser.value.user.name,
        ticket: JSON.parse(localStorage.getItem('booked-ticket')),
    }
    
    let {data:response, error} = await useFetch(config.public.MS2_API_URL+"/api/ticket/booking/", {
        method: 'POST',
        body: body,
    });

}
</script>
<template>
    <div class="min-h-screen bg-gray-800">
        <EventInfo :event="eventDetail[0]"/>
        <BuyTicketConfirmUserInfo :event-id="eventId" @submit-form="bookingTicket"/>
    </div>
</template>

<style>
    button.bg-red-600, section.bg-gray-900 {
        display: none;
    }
</style>