<script setup>
import userData from '~/assets/ticket.json'
const users = userData
const props = defineProps(['ticketInfo']);
const {ticketInfo} = toRefs(props);

watch(ticketInfo, (newVal, oldVal) => {
    console.log(newVal, 123456, oldVal);
})
</script>

<template>
    <div>
        <h5 class="mb-2 text-xl font-bold tracking-tight text-white">TICKET INFORMATION</h5>
        <div class="flex justify-between text-white border-t py-3">
            <p>Ticket</p>
            <p>Amount</p>
        </div>
        <div class="flex justify-between text-gray-300 border-dotted border-t pt-2">
            <div class="">
                <p>Early Bird</p>
                <p class="text-xs">699,000 VND</p>
            </div>
            <div class="text-right">
                <p class="">1</p>
                <p class="text-xs">699,000 VND</p>
            </div>
        </div>
        <div class="text-gray-300 text-lg bg-gray-500 -m-6 mt-6">
            <div class="flex justify-between mx-6 py-3 ">
                <p>Total</p>
                <p>699,000 VND</p>
            </div>
        </div>
    </div>
</template>
