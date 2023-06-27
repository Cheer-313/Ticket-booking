<script setup>
    
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
                    <div>
                        <div class="col-span-4 flex pt-5">
                            <p class="w-2/4 ">Early Bird (EB)</p>
                            <p class="w-1/4 text-right">699,000 VND</p>
                            <div class="w-1/4 text-right">
                                <buy-ticket-counter-button />
                            </div>
                        </div>
                        <div class="col-span-4 flex items-center p-2 space-x-5 bg-gray-500 mt-5">
                            <font-awesome-icon :icon="['fas', 'circle-info']" />
                            <p>Check-in, check-out mọi lúc</p>
                        </div>
                    </div>
                </div>
                <div class="col-span-2">
                    <div class="block max-w-sm p-6 border rounded-lg shadow bg-gray-600 border-gray-700 m-auto mt-5 lg:mt-0">
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-white">THÔNG TIN ĐẶT VÉ</h5>
                        <div class="flex justify-between text-white border-t py-3">
                            <p>Loại vé</p>
                            <p>Số lượng</p>
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
                                <p>Tổng cộng</p>
                                <p>699,000 VND</p>
                            </div>
                        </div>
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