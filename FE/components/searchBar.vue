<template>
    <section class="bg-gray-900 flex py-5 items-center">
        <div class="max-w-screen-xl mx-auto w-full">
            <!-- Start coding here -->
            <div class="relative shadow-md bg-gray-800 sm:rounded-lg">
                <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                    <div class="w-full md:w-1/2">
                        <form>
                            <div class="flex">
                                <label for="search-dropdown" class="mb-2 text-sm font-medium sr-only text-white">Your
                                    Email</label>
                                <button id="dropdown-button" data-dropdown-toggle="dropdown"
                                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center border rounded-l-lg focus:ring-4 focus:outline-none bg-gray-700 hover:bg-gray-600 focus:ring-gray-700 text-white border-gray-600"
                                    type="button">All categories <svg aria-hidden="true" class="w-4 h-4 ml-1"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg></button>
                                <div id="dropdown"
                                    class="z-10 hidden divide-y divide-gray-100 rounded-lg shadow w-44 bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-200" aria-labelledby="dropdown-button">
                                        <li>
                                            <button type="button"
                                                class="inline-flex w-full px-4 py-2 hover:bg-gray-600 hover:text-white">Mockups</button>
                                        </li>
                                        <li>
                                            <button type="button"
                                                class="inline-flex w-full px-4 py-2 hover:bg-gray-600 hover:text-white">Templates</button>
                                        </li>
                                        <li>
                                            <button type="button"
                                                class="inline-flex w-full px-4 py-2 hover:bg-gray-600 hover:text-white">Design</button>
                                        </li>
                                        <li>
                                            <button type="button"
                                                class="inline-flex w-full px-4 py-2 hover:bg-gray-600 hover:text-white">Logos</button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="relative w-full">
                                    <input type="search" id="search-dropdown"
                                        class="block p-2.5 w-full z-20 text-sm rounded-r-lg border-l-2 border focus:ring-blue-500 bg-gray-700 border-l-gray-700  border-gray-600 placeholder-gray-400 text-white focus:border-blue-500"
                                        placeholder="Search Mockups, Logos, Design Templates..." required>
                                    <button type="submit"
                                        class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white rounded-r-lg border border-blue-700 focus:ring-4 focus:outline-none bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                        <span class="sr-only">Search</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div
                        class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                        <div class="flex items-center w-full space-x-3 md:w-auto">
                            <select id="dates"
                                class=" border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                                <option selected>All dates</option>
                                <option value="TD">Today</option>
                                <option value="TW">This Weekend</option>
                                <option value="TM<">This Month</option>
                            </select>
                            <div id="actionsDropdown"
                                class="z-10 hidden divide-y  rounded shadow w-44 bg-gray-700 divide-gray-600">
                                <ul class="py-1 text-sm text-gray-200" aria-labelledby="actionsDropdownButton">
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-600 hover:text-white">Today</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm hover:bg-gray-600 text-gray-200 hover:text-white">This
                                            weekend</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm hover:bg-gray-600 text-gray-200 hover:text-white">This
                                            weekend</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm hover:bg-gray-600 text-gray-200 hover:text-white">This
                                            Month</a>
                                    </li>
                                </ul>


                            </div>
                            <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
                                class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium border rounded-lg md:w-auto focus:outline-none hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-700 bg-gray-800 text-gray-400 border-gray-600 hover:text-white hover:bg-gray-700"
                                type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                    class="w-4 h-4 mr-2 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                        clip-rule="evenodd" />
                                </svg>
                                Filter
                                <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="filterDropdown" class="z-10 hidden w-48 p-3 rounded-lg shadow bg-gray-700">
                                <h6 class="mb-3 text-sm font-medium text-white">
                                    Category
                                </h6>
                                <ul class="space-y-2 text-sm" aria-labelledby="dropdownDefault">
                                    <li class="flex items-center">
                                        <input id="apple" type="checkbox" value=""
                                            class="w-4 h-4 rounded text-primary-600 focus:ring-primary-500 focus:ring-primary-600 ring-offset-gray-700 focus:ring-2 bg-gray-600 border-gray-500" />
                                        <label for="apple" class="ml-2 text-sm font-medium text-gray-100">
                                            Apple (56)
                                        </label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="fitbit" type="checkbox" value=""
                                            class="w-4 h-4 rounded text-primary-600 focus:ring-primary-500 focus:ring-primary-600 ring-offset-gray-700 focus:ring-2 bg-gray-600 border-gray-500" />
                                        <label for="fitbit" class="ml-2 text-sm font-medium text-gray-100">
                                            Fitbit (56)
                                        </label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="dell" type="checkbox" value=""
                                            class="w-4 h-4 rounded text-primary-600 focus:ring-primary-500 focus:ring-primary-600 ring-offset-gray-700 focus:ring-2 bg-gray-600 border-gray-500" />
                                        <label for="dell" class="ml-2 text-sm font-medium text-gray-100">
                                            Dell (56)
                                        </label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="asus" type="checkbox" value="" checked
                                            class="w-4 h-4 rounded text-primary-600 focus:ring-primary-500 focus:ring-primary-600 ring-offset-gray-700 focus:ring-2 bg-gray-600 border-gray-500" />
                                        <label for="asus" class="ml-2 text-sm font-medium text-gray-100">
                                            Asus (97)
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
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
