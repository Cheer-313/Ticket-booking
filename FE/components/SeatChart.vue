<script setup>
import { SeatsioClient, Region } from "seatsio"

const publicWorkSpaceKey = "c6f75c47-8d75-41ce-b0e4-e25ca0e9302a"
const eventKeyChart = "ccbdb384-fd0f-454b-a167-9bf3c2945e74"
const secretWorkSpaceKey = "fb329dc8-07ba-47e5-9b10-0757ca627f4d"
const config = useRuntimeConfig();
const errMsg = ref([]);

const messages = {
    clickToSelect : "Click to select"
}
const props = defineProps(['ticketSlot']);
const emit = defineEmits(['submitForm'])
const {ticketSlot} = toRefs(props);
// Config to enable filter categories
const categoryFilter = {
    enabled: true,
    multiSelect: true,
    zoomOnSelect: true,
}
const showError = ref(false);

// Get seats data
const pricing = ref([]);

ticketSlot.value.forEach(element => {
    pricing.value.push({
        category: element.seat_name,
        price: element.price,
    })
});

// Format number as currency
var priceFormatter = (price) => {
    return new Intl.NumberFormat("vi-VN", {
        style: "currency",
        currency: "VND",
    }).format(price)
}

var ticketsBooked = ref([])
function onObjectSelected(object, selectedTicketType) {
    ticketsBooked.value.push({
        id: object.id,
        price: object.pricing.price,
        category: {
            key: object.category.key,
            label: object.category.label,
        },
    })
}

function onObjectDeselected(object, selectedTicketType) {
    ticketsBooked.value = ticketsBooked.value.filter((e) => e.id !== object.id)
}

var isHandling = ref(false)
let client = new SeatsioClient(Region.SA(), secretWorkSpaceKey)
async function bookSeats() {
    isHandling.value = true
    
    if (ticketsBooked.length == 0) {
        showError.value = true;
        errMsg.value = 'Please choose your ticket.';
    } else {
        let slotIds = ticketSlot.value.map((s) => s.id)
        let seatIds = ticketsBooked.value.map((s) => s.id)
        await client.events.book(eventKeyChart, seatIds)

        let {data:dataUser} = useAuth();
        let body = {
            userId: 1, // Todo: Get id user from sesion
            email: dataUser?.value?.user.email ?? 'test' ,
            name: dataUser?.value?.user.name ?? 'test',
            ticket: ticketsBooked.value,
            submit_type: 2,
            slot_ids: slotIds,
        }
        let {data:response, error} = await useFetch(config.public.MS2_API_URL+"/api/ticket/booking/", {
            method: 'POST',
            body: body,
        });

        isHandling.value = false
        // Show error message return from api
        if (response.value.message) {
            await client.events.release(eventKeyChart, seatIds);
            showError.value = true;
            errMsg.value = response.value.message;
        } else if (response.value.status) {
            emit('submitForm', true, response.value.payment_id);
        }
    }
}
</script>

<template>
    <div>
        <div id="alert-2" :class="!showError ? 'hidden' : ''" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div v-for="(msg, idx) in errMsg" :key="'errMsg-' + idx">
                    {{ msg }}
            </div>
            <button @click="showError = !showError" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" aria-label="Close">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
        <div class="gap-10  p-1 py-8 px-4 mx-auto max-w-screen-xl lg:py-4 lg:px-2">
            <SeatsioSeatingChart
                :workspaceKey="publicWorkSpaceKey"
                :event="eventKeyChart"
                region="sa"
                language="en"
                loading="<div>Loading...</div>"
                :pricing="pricing"
                :priceFormatter="priceFormatter"
                :categoryFilter="categoryFilter"
                :messages="messages"
                :onChartRendered="onChartRendered"
                :onObjectSelected="onObjectSelected"
                :onObjectDeselected="onObjectDeselected"
            />
            <div class="card-booked text-white text-center" v-if="ticketsBooked.length > 0">
                <button @click="bookSeats()" :disabled="isHandling" class="w-50 p-6 text-white text-xl bg-green-600 hover:bg-green-500 mt-5 rounded-lg">
                    Continue
                </button>
                <!-- <li> Tickets have booked
                    <ul v-for="ticket in ticketsBooked" :key="ticket.id">
                        <li>id: {{ ticket.id }} || price: {{ ticket.price }} || ticketType: {{ ticket.ticketType }} || category(key, lable): {{ ticket.category.key }}, {{ ticket.category.label }}</li>
                    </ul>
                </li> -->
            </div>
        </div>
    </div>
</template>