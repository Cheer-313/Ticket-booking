<script setup>
const props = defineProps(['ticketSlot']);
const {ticketSlot} = toRefs(props);
</script>
<template>
    <section class=" pt-8 lg:pb-8 bg-gray-800">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue format-invert text-gray-200">
                <h1 class="mb-4 text-3xl font-extrabold leading-tightlg:mb-6 lg:text-4xl border-b-2 p-4">Ticket Information</h1>
                <div v-for="ticket in ticketSlot">
                    <div class="flex items-center justify-between w-full p-5 font-medium text-left border focus:ring-4 focus:ring-gray-800 border-gray-700 text-gray-400 hover:bg-gray-800">
                        <h3>{{ ticket.seat_name }}</h3>
                        <div class="text-center">
                            <p class="font-bold">{{ new Intl.NumberFormat({ style: 'currency', currency: 'VND' }).format(ticket.price) }} VND</p>
                            <p v-if="ticket.total_slot - ticket.slot_booked < 1" class="border border-red-600 text-red-600 px-2 hidden">SOLD OUT</p>
                            <!-- <p class="border border-gray-200 px-2">Vé chưa mở bán</p> -->
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
</template>

