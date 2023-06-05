<template>
    <div class="bg-gray-900">
        <form>
            <div class="max-w-screen-lg  flex items-center justify-between mx-auto p-4">
                <label for="search-dropdown" class="mb-2 text-sm font-medium sr-only text-white">Your
                    Email</label>
                <button id="dropdown-button" data-dropdown-toggle="dropdown"
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center border rounded-l-lg focus:ring-4 focus:outline-none bg-gray-700 hover:bg-gray-600 focus:ring-gray-700 text-white border-gray-600"
                    type="button">Tất cả<svg aria-hidden="true" class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg></button>
                <div id="dropdown"
                    class="z-10 hidden font-normal divide-y md:rounded-lg shadow md:w-44 w-full bg-gray-700 divide-gray-600">
                    <ul class="py-2 text-sm text-gray-200" aria-labelledby="dropdown-button">
                        <li>
                            <button type="button"
                                class="inline-flex w-full px-4 py-2 hover:bg-gray-600 hover:text-white">Thể thao</button>
                        </li>
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-600 hover:text-white">Âm
                                nhạc</button>
                        </li>
                        <li>
                            <button type="button"
                                class="inline-flex w-full px-4 py-2 hover:bg-gray-600 hover:text-white">Tên nghệ sĩ</button>
                        </li>
                        <li>
                            <button type="button"
                                class="inline-flex w-full px-4 py-2 hover:bg-gray-600 hover:text-white">Tên sự kiện</button>
                        </li>
                    </ul>
                </div>
                <div class="relative w-full">
                    <input type="search" id="search-dropdown"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                        placeholder="Tìm kiếm sự kiện thể thao, âm nhạc,..." required>
                    <button type="submit"
                        class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-gray-600 rounded-r-lg border border-gray-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
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
