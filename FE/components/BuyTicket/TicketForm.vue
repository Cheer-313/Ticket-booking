<script setup>
import userData from '~/assets/ticket.json'
const users = userData

const counter = ref(0);

</script>

<template>
    <div>
        <section class="bg-gray-800">
            <div class="gap-16 py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-6 lg:py-16 lg:px-6">
                <div class="col-span-4 grid-cols-4 font-light sm:text-lg text-white">
                    <div class="col-span-4 flex border-b pb-5">
                        <p class="w-2/4 ">LOẠI VÉ</p>
                        <p class="w-1/4 text-right">GIÁ VÉ</p>
                        <p class="w-1/4 text-right">SỐ LƯỢNG</p>
                    </div>
                    <div v-for="user in users" :key="user.id">
                        <div class="col-span-4 flex pt-5">
                            <p class="w-2/4 ">{{ user.name }}</p>
                            <p class="w-1/4 text-right">{{ user.price }}</p>
                            <div class="w-1/4 text-right">
                                <div class="flex justify-end">
                                    <button @click="counter--" class="px-2 bg-gray-500  border border-gray-400 disabled:bg-gray-400"  :disabled="counter <= 0">-</button>
                                    <p class="w-10 text-center bg-gray-500 border border-gray-400"> {{ user.number }}</p>
                                    <button @click="counter++" class="px-2 bg-gray-500  border border-gray-400">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-4 flex items-center p-2 space-x-5 bg-gray-500 mt-5">
                            <font-awesome-icon :icon="['fas', 'circle-info']" />
                            <p>{{ user.info }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-span-2">
                    <div class="block max-w-sm p-6 border rounded-lg shadow bg-gray-600 border-gray-700 m-auto mt-5 lg:mt-0">
                        <buy-ticket-info-ticket-order />
                    </div>
                    <button class="w-full p-6 text-white text-xl bg-green-600 hover:bg-green-500 mt-5 rounded-lg">
                        Tiếp tục
                    </button>
                    <p class="hidden text-sm bg-red-600 p-2 m-auto mt-5 text-white w-fit">Xin hãy chọn vé cần mua</p>
                </div>
            </div>
        </section>
    </div>
</template>