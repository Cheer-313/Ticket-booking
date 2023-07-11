<script setup>
const { data } = useAuth()
const props = defineProps(['eventId']);
const ticketSlot = ref([]);
const emit = defineEmits(['submitForm'])

if (process.client) {
    ticketSlot.value = JSON.parse(localStorage.getItem('booked-ticket'));
}

const bookingTicket = () => {
    emit('submitForm');
}
</script>

<template>
    <div>
        <section class="bg-gray-800">
            <div class="gap-16 py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-6 lg:py-16 lg:px-6">
                <div class="col-span-4 font-light sm:text-lg text-white">
                    <div class=" px-4 mx-auto max-w-screen-md border-b pb-10">
                        <h2 class="mb-4 text-2xl tracking-tight font-bold text-center text-white uppercase">User Information</h2>
                        <div class="space-y-8">
                            <div>
                                <h5 class="block mb-2 text-sm font-medium text-gray-300">Full Name</h5>
                                <p class="border ext-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white shadow-sm-light">{{ data?.user?.name }}</p>
                            </div>
                            <div>
                                <h5 class="block mb-2 text-sm font-medium text-gray-300">Email</h5>
                                <p class="border ext-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white shadow-sm-light">{{ data?.user?.email }}</p>
                            </div>
                        </div>
                    </div>
                    <div class=" px-4 mx-auto max-w-screen-md mt-10">
                        <h2 class="mb-4 text-2xl tracking-tight font-bold text-center text-white uppercase">Payment Method</h2>
                    </div>
                </div>
                <div class="col-span-2">
                    <div class="block max-w-sm p-6 border rounded-lg shadow bg-gray-600 border-gray-700 m-auto mt-5 lg:mt-0">
                        <buy-ticket-info-ticket-order :ticket-info="ticketSlot"/>
                    </div>
                    <button @click="bookingTicket()" class="w-full p-6 text-white text-xl bg-green-600 hover:bg-green-500 mt-5 rounded-lg">
                        Submit
                    </button>
                    <NuxtLink :to="{name:'tickets-id-buy', params:{id: eventId}}">
                        <button class="w-full p-6 text-white text-xl bg-green-600 hover:bg-green-500 mt-5 rounded-lg">
                            Back
                        </button>
                    </NuxtLink>
                </div>
            </div>
        </section>
    </div>
</template>