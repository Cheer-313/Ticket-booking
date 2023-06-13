
<script setup>
import { FilterMatchMode, FilterService } from 'primevue/api';
import AutoComplete from 'primevue/autocomplete';

const selectedItem = ref();
const searchResult = ref();

const search = async (event) => {
    let paramSearch = event.query;
    let dataSearch = [];
    let { data: response, error } = await useFetch("http://127.0.0.1:8000/api/search-box", {
        method: 'GET',
        query: {search_param: paramSearch}
    });
    for (let value of response._rawValue) {
        if (value.items.length > 0) {
            dataSearch.push(value);
        }
    }
    searchResult.value = dataSearch;
};
</script>
<template>
    <section class="bg-gray-900 flex py-5 items-center">
        <div class="max-w-screen-xl mx-auto w-full">
            <!-- Start coding here -->
            <div class="relative shadow-md bg-gray-800 sm:rounded-lg">
                <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                    <div class="w-full md:w-1/2">
                        <form>
                            <div class="flex">
                                <div class="relative w-full">
                                    <!-- <input type="search" id="searchBar"
                                        class="block p-2.5 w-full z-20 text-sm rounded-r-lg border-l-2 border focus:ring-blue-500 bg-gray-700 border-l-gray-700  border-gray-600 placeholder-gray-400 text-white focus:border-blue-500"
                                        placeholder="Search Mockups, Logos, Design Templates..." required> -->
                                    <AutoComplete :inputClass="'w-full'" 
                                            v-model="selectedItem" :suggestions="searchResult" @complete="search" optionLabel="item_label" optionGroupLabel="group_label" optionGroupChildren="items" placeholder="Search for artists, venues and events">
                                        <!-- Layout Group -->
                                        <template #optiongroup="slotProps">
                                            <div class="flex align-items-center country-item">
                                                <div>{{ slotProps.option.group_label }}</div>
                                            </div>
                                        </template>
                                        <!-- Layout Option -->
                                        <template #option="slotProps">
                                            <div class="flex align-items-center">
                                                <div>{{ slotProps.option.item_label }}</div>
                                            </div>
                                        </template>
                                    </AutoComplete>
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
                    <!-- <div
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
                            <select id="countries"
                                class="border text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                                <option selected>Choose a country</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="FR">France</option>
                                <option value="DE">Germany</option>
                            </select>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
</template>

<style>
.p-autocomplete.p-component {
    width: 100% !important;
}
</style>