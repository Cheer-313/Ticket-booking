<script setup>
const route = useRoute();
const router = useRouter();
const config = useRuntimeConfig();
const eventId = ref();
const eventDetail = ref([]);
const showError = ref(false);
const errMsg = ref([]);
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
        userId: 1, // Todo: Get id user from sesion
        email: dataUser.value.user.email,
        name: dataUser.value.user.name,
        ticket: JSON.parse(localStorage.getItem('booked-ticket')),
    }
    
    let {data:response, error} = await useFetch(config.public.MS2_API_URL+"/api/ticket/booking/", {
        method: 'POST',
        body: body,
    });

    // Show error message return from api
    if (response.value.message) {
        showError.value = true;
        errMsg.value = response.value.message;
    } else if (response.value.status) {
        localStorage.removeItem("booked-ticket");
        router.push({
            name: 'tickets-id-complete',
            params: {
                id: event.value.event_id,
            },
            query: {
                'payment_id': response.value.payment_id,
            }
        })
    }

}
</script>
<template>
    <div class="min-h-screen bg-gray-800 confirm-page">
        <EventInfo :event="eventDetail[0]"/>
        <div id="alert-2" :class="!showError ? 'hidden' : ''" class="flex items-center p-4 mt-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 flex-column" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium">
                <div v-for="(msg, idx) in errMsg" :key="'errMsg-' + idx">
                    {{ msg }}
                </div>
            </div>
            <button @click="showError = !showError" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" aria-label="Close">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
        <BuyTicketConfirmUserInfo :event-id="eventId" @submit-form="bookingTicket"/>
    </div>
</template>

<style>
    button.bg-red-600, .confirm-page.bg-gray-900 {
        display: none;
    }
</style>