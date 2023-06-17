<template>
    <div>
        <section
            class="bg-center bg-no-repeat bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/conference.jpg')] bg-gray-700 bg-blend-multiply">
            <div class="grid grid-cols-12 gap-10  p-1 py-8 px-4 mx-auto max-w-screen-xl lg:py-4 lg:px-2">
                <div class="flex rounded-lg sm:col-span-8 items-baseline">

                    <div class="text-center border ml-4 w-40 h-fit text-white">
                        <p class="text-xs bg-red-600 p-2 font-bold">THÁNG 7</p>
                        <p class="text-4xl">01</p>
                        <p class="mb-2">Thứ 7</p>
                    </div>
                    <div class=" flex flex-col justify-between p-4 leading-normal">
                        <h2 class="mb-4 text-xl tracking-tight font-extrabold text-white">[LULULOLA SHOW] LAM TRƯỜNG
                            &
                            TIÊU CHÂU NHƯ QUỲNH FT. HOÀNG NHÃ BAND | VÌ SAO SÁNG</h2>
                        <p class="mb-4 font-light sm:text-x text-gray-400">
                            <font-awesome-icon :icon="['fa', 'clock']" />
                            Thứ 7, 01 Tháng 7 2023 (05:00 PM - 07:00 PM)
                        </p>
                        <p class="mb-4 font-light sm:text-x text-gray-400">
                            <font-awesome-icon :icon="['fasr', 'location-dot']" />
                            Lululola Coffee
                        </p>
                        <p class="mb-4 font-light sm:text-x text-gray-400">
                            <font-awesome-icon :icon="['fas', 'map']" />
                            Đường 3/4, Đồi Cà Ri Dê, Phường 3, Thành phố Đà Lạt
                        </p>
                    </div>


                </div>
                <div class="col-span-12 rounded-lg p-4 mx-auto sm:col-span-4 ">
                    <button type="button"
                        class="w-full text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none font-medium rounded-lg text-xl px-5 py-2.5 text-center mr-2 mb-2">
                        MUA VÉ NGAY
                    </button>
                </div>
            </div>
        </section>
    </div>
</template>

