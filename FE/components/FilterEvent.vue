<template>
    <section class="bg-gray-800 flex items-center pt-4">
        <div class="max-w-screen-xl px-4 mx-auto lg:px-12 w-full">
            <!-- Start coding here -->
            <div class="relative shadow-md bg-gray-800 sm:rounded-lg">
                <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                    <div class="w-full md:w-1/3">
                        <select id="locations"
                            class=" border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                            <option selected>Tất cả địa điểm</option>
                            <option value="US">Hồ Chí Minh</option>
                            <option value="CA">Hà Nội</option>
                            <option value="FR">Các địa điểm khác</option>

                        </select>
                    </div>
                    <div class="w-full md:w-1/3">
                        <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch"
                            class="text-left border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                            type="button">Tất cả các sự kiện</button>

                        <!-- Dropdown menu -->
                        <div id="dropdownSearch" class="z-10 hidden  rounded-lg shadow w-60 bg-gray-700">

                            <ul class="h-48 px-3 pb-3 overflow-y-auto text-sm  text-gray-200"
                                aria-labelledby="dropdownSearchButton">
                                <li>
                                    <div class="flex items-center p-2 rounded  hover:bg-gray-600">
                                        <input checked id="checkbox-item-11" type="checkbox" value=""
                                            class="w-4 h-4 text-blue-600  rounded  focus:ring-blue-600 ring-offset-gray-700 focus:ring-offset-gray-700 focus:ring-2 bg-gray-600 border-gray-500">
                                        <label for="checkbox-item-11"
                                            class="w-full ml-2 text-sm font-medium  rounded text-gray-300">Tất
                                            cả các sự kiện</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center p-2 rounded  hover:bg-gray-600">
                                        <input id="checkbox-item-11" type="checkbox" value=""
                                            class="w-4 h-4 text-blue-600  rounded focus:ring-blue-600 ring-offset-gray-700 focus:ring-offset-gray-700 focus:ring-2 bg-gray-600 border-gray-500">
                                        <label for="checkbox-item-11"
                                            class="w-full ml-2 text-sm font-medium  rounded text-gray-300">Bonnie
                                            Green</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center p-2 rounded  hover:bg-gray-600">
                                        <input id="checkbox-item-12" type="checkbox" value=""
                                            class="w-4 h-4 text-blue-600 rounded  focus:ring-blue-600 ring-offset-gray-700 focus:ring-offset-gray-700 focus:ring-2 bg-gray-600 border-gray-500">
                                        <label for="checkbox-item-12"
                                            class="w-full ml-2 text-sm font-medium  rounded text-gray-300">Jese
                                            Leos</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center p-2 rounded  hover:bg-gray-600">
                                        <input id="checkbox-item-13" type="checkbox" value=""
                                            class="w-4 h-4 text-blue-600  rounded  focus:ring-blue-600 ring-offset-gray-700 focus:ring-offset-gray-700 focus:ring-2 bg-gray-600 border-gray-500">
                                        <label for="checkbox-item-13"
                                            class="w-full ml-2 text-sm font-medium rounded text-gray-300">Michael
                                            Gough</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center p-2 rounded  hover:bg-gray-600">
                                        <input id="checkbox-item-14" type="checkbox" value=""
                                            class="w-4 h-4 text-blue-600  rounded  focus:ring-blue-600 ring-offset-gray-700 focus:ring-offset-gray-700 focus:ring-2 bg-gray-600 border-gray-500">
                                        <label for="checkbox-item-14"
                                            class="w-full ml-2 text-sm font-medium  rounded text-gray-300">Robert
                                            Wall</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center p-2 rounded  hover:bg-gray-600">
                                        <input id="checkbox-item-15" type="checkbox" value=""
                                            class="w-4 h-4 text-blue-600 rounded  focus:ring-blue-600 ring-offset-gray-700 focus:ring-offset-gray-700 focus:ring-2 bg-gray-600 border-gray-500">
                                        <label for="checkbox-item-15"
                                            class="w-full ml-2 text-sm font-medium rounded text-gray-300">Joseph
                                            Mcfall</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center p-2 rounded  hover:bg-gray-600">
                                        <input id="checkbox-item-16" type="checkbox" value=""
                                            class="w-4 h-4 text-blue-600  rounded  focus:ring-blue-600 ring-offset-gray-700 focus:ring-offset-gray-700 focus:ring-2 bg-gray-600 border-gray-500">
                                        <label for="checkbox-item-16"
                                            class="w-full ml-2 text-sm font-medium  rounded text-gray-300">Leslie
                                            Livingston</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center p-2 rounded  hover:bg-gray-600">
                                        <input id="checkbox-item-17" type="checkbox" value=""
                                            class="w-4 h-4 text-blue-600  rounded focus:ring-blue-600 ring-offset-gray-700 focus:ring-offset-gray-700 focus:ring-2 bg-gray-600 border-gray-500">
                                        <label for="checkbox-item-17"
                                            class="w-full ml-2 text-sm font-mediumrounded text-gray-300">Roberta
                                            Casas</label>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="w-full md:w-1/3">
                        <select id="times"
                            class=" border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                            <option selected>Tất cả các ngày</option>
                            <option value="US">Tuần này</option>
                            <option value="CA">Tháng này</option>
                            <option value="CA">Năm này</option>
                        </select>
                    </div>

                </div>

            </div>
        </div>
    </section>
</template>

<script setup>
import { onMounted } from 'vue'
import { initFlowbite, initDropdowns } from 'flowbite'



// initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
    initDropdowns();
})
</script>