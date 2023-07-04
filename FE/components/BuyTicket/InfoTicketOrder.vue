<script setup>
import userData from '~/assets/ticket.json'
const users = userData
const props = defineProps(['ticketInfo']);
const {ticketInfo} = toRefs(props);

const priceOfBookedSlot = (price, slotBooked) => {
    return new Intl.NumberFormat({ style: 'currency', currency: 'VND' }).format(price * slotBooked);
}

const totalPrice = () => {
    let total = 0;
    ticketInfo.value.forEach(ticket => {
        if (ticket.booked_slot > 0) {
            total = total + ticket.booked_slot * ticket.price;
        }
    });
    return new Intl.NumberFormat({ style: 'currency', currency: 'VND' }).format(total);
}
</script>

<template>
    <div>
        <h5 class="mb-2 text-xl font-bold tracking-tight text-white">TICKET INFORMATION</h5>
        <div class="flex justify-between text-white border-t py-3">
            <p>Ticket</p>
            <p>Amount</p>
        </div>
        <div class="border-dotted border-t pt-2">
            <div v-for="ticket in ticketInfo" :key="'ticket-booked-'+ ticket.id">
                <div v-if="ticket.booked_slot > 0">
                    <div class="flex justify-between text-gray-300 pb-2">
                        <div class="">
                            <p>{{ ticket.seat_name }}</p>
                            <p class="text-xs">{{ new Intl.NumberFormat({ style: 'currency', currency: 'VND' }).format(ticket.price) }} VND</p>
                        </div>
                        <div class="text-right">
                            <p class="">{{ ticket.booked_slot }}</p>
                            <p class="text-xs">{{ priceOfBookedSlot(ticket.price, ticket.booked_slot) }} VND</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-gray-300 text-lg bg-gray-500 -m-6 mt-6">
            <div class="flex justify-between mx-6 py-3 ">
                <p>Total</p>
                <p>{{ totalPrice() }} VND</p>
            </div>
        </div>
    </div>
</template>
