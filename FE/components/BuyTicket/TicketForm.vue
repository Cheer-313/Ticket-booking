<script setup>
const props = defineProps(['ticketSlot']);
const {ticketSlot} = toRefs(props);


// Add new key to array
ticketSlot.value.forEach(element => {
    element.booked_slot = 0;
});

// Update selected ticket
const updateBookedTicket = (id, type) => {

}
</script>

<template>
    <div>
        <section class="bg-gray-800">
            <div class="gap-16 py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-6 lg:py-16 lg:px-6">
                <div class="col-span-4 grid-cols-4 font-light sm:text-lg text-white">
                    <div class="col-span-4 flex border-b pb-5">
                        <p class="w-2/4 ">TICKET</p>
                        <p class="w-1/4 text-right">PRICE</p>
                        <p class="w-1/4 text-right">AMOUNT</p>
                    </div>
                    <div v-for="ticket in ticketSlot" :key="ticket.id">
                        <div class="col-span-4 flex pt-5">
                            <p class="w-2/4 ">{{ ticket.seat_name }}</p>
                            <p class="w-1/4 text-right">{{ new Intl.NumberFormat({ style: 'currency', currency: 'VND' }).format(ticket.price) }} VND</p>
                            <div class="w-1/4 text-right">
                                <div class="flex justify-end">
                                    <button @click="ticket.booked_slot--" class="px-2 bg-gray-500  border border-gray-400 disabled:bg-gray-400"  :disabled="ticket.booked_slot <= 0">-</button>
                                    <p class="w-10 text-center bg-gray-500 border border-gray-400">{{ ticket.booked_slot }}</p>
                                    <button @click="ticket.booked_slot++" class="px-2 bg-gray-500  border border-gray-400 disabled:bg-gray-400" :disabled="ticket.booked_slot >= 10">+</button>
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
                    <button class="w-full p-6 text-white text-xl bg-green-600 hover:bg-green-500 mt-5 rounded-lg">
                        Continue
                    </button>
                    <p class="hidden text-sm bg-red-600 p-2 m-auto mt-5 text-white w-fit">Please select the ticket</p>
                </div>
            </div>
        </section>
    </div>
</template>