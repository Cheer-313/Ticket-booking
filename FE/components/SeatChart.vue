<script setup>
import { SeatsioClient, Region } from "seatsio"

const publicWorkSpaceKey = "c6f75c47-8d75-41ce-b0e4-e25ca0e9302a"
const eventKeyChart = "ccbdb384-fd0f-454b-a167-9bf3c2945e74"
const secretWorkSpaceKey = "fb329dc8-07ba-47e5-9b10-0757ca627f4d"

const messages = {
    clickToSelect : "Click to select"
}

// Config to enable filter categories
const categoryFilter = {
    enabled: true,
    multiSelect: true,
    zoomOnSelect: true,
}

// Get seats data
const pricing = [
    {
        category: 1,
        price: 110000,
    },
    {
        category: 2,
        price: 90000,
    },
    {
        category: 3,
        price: 110000,
    },
]

// Format number as currency
var priceFormatter = (price) => {
    return new Intl.NumberFormat("vi-VN", {
        style: "currency",
        currency: "VND",
    }).format(price)
}

function onChartRendered() {
  console.log("The chart is rendered!")
}

var ticketsBooked = ref([])
function onObjectSelected(object, selectedTicketType) {
    console.log(object);
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
    let seatIds = ticketsBooked.value.map((s) => s.id)
    await client.events.changeObjectStatus(eventKeyChart, seatIds, "booked")
    isHandling.value = false
}
</script>

<template>
    <div>
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
            <div class="card-booked text-white" v-if="ticketsBooked.length > 0">
                <button @click="bookSeats()" :disabled="isHandling">Book</button>
                <li> Tickets have booked
                    <ul v-for="ticket in ticketsBooked" :key="ticket.id">
                        <li>id: {{ ticket.id }} || price: {{ ticket.price }} || ticketType: {{ ticket.ticketType }} || category(key, lable): {{ ticket.category.key }}, {{ ticket.category.label }}</li>
                    </ul>
                </li>
            </div>
        </div>
    </div>
</template>