<script setup>
const props = defineProps(['ticketSlot']);
const emit = defineEmits(['submitForm'])
const {ticketSlot} = toRefs(props);
const showError = ref(false);
// Add new key to array
ticketSlot.value.forEach(element => {
    if (!('booked_slot' in element)) {
        element.booked_slot = 0;
    }
});

// Update selected ticket
const updateBookedTicket = (id, type) => {
    if (type == 'plus') {
        ticketSlot.value[id].booked_slot++;
    } else {
        ticketSlot.value[id].booked_slot--;
    }
}

const submitTicketBooked = () => {
    let bookedTicket = ticketSlot.value.filter(o => o.booked_slot > 0);
    if (bookedTicket.length == 0) {
        showError.value = true;
    } else {
        localStorage.setItem('booked-ticket', JSON.stringify(bookedTicket));
        emit('submitForm');
    }
}
</script>

<template>
    <div>
        <section class="bg-gray-800 py-8 lg:py-16 px-4 lg:px-6">
            <div id="alert-2" :class="!showError ? 'hidden' : ''" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium">
                    Please choose your ticket.
                </div>
                <button @click="showError = !showError" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" aria-label="Close">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
            <div class="gap-16 mx-auto max-w-screen-xl lg:grid lg:grid-cols-6 ">
                <div class="col-span-4 grid-cols-4 font-light sm:text-lg text-white">
                    <div class="col-span-4 flex border-b pb-5">
                        <p class="w-2/4 ">TICKET</p>
                        <p class="w-1/4 text-right">PRICE</p>
                        <p class="w-1/4 text-right">AMOUNT</p>
                    </div>
                    <div v-for="(ticket, idx) in ticketSlot" :key="ticket.id">
                        <div class="col-span-4 flex pt-5">
                            <p class="w-2/4 ">{{ ticket.seat_name }}</p>
                            <p class="w-1/4 text-right">{{ new Intl.NumberFormat({ style: 'currency', currency: 'VND' }).format(ticket.price) }} VND</p>
                            <div class="w-1/4 text-right">
                                <div class="flex justify-end">
                                    <button @click="updateBookedTicket(idx, 'minus')" class="px-2 bg-gray-500  border border-gray-400 disabled:bg-gray-400"  :disabled="ticket.booked_slot <= 0">-</button>
                                    <p class="w-10 text-center bg-gray-500 border border-gray-400">{{ ticket.booked_slot }}</p>
                                    <button @click="updateBookedTicket(idx, 'plus')" class="px-2 bg-gray-500  border border-gray-400 disabled:bg-gray-400" :disabled="ticket.booked_slot >= 10">+</button>
                                </div>
                            </div>
                        </div>
                        <hr class="border-gray-500 mt-3">
                    </div>
                </div>
                <div class="col-span-2">
                    <div class="block max-w-sm p-6 border rounded-lg shadow bg-gray-600 border-gray-700 m-auto mt-5 lg:mt-0">
                        <buy-ticket-info-ticket-order :ticketInfo="ticketSlot"/>
                    </div>
                    <button @click="submitTicketBooked" class="w-full p-6 text-white text-xl bg-green-600 hover:bg-green-500 mt-5 rounded-lg">
                        Continue
                    </button>
                    <p class="hidden text-sm bg-red-600 p-2 m-auto mt-5 text-white w-fit">Please select the ticket</p>
                </div>
            </div>
        </section>
    </div>
</template>