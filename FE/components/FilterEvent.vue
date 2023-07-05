<script setup>
import MultiSelect from 'primevue/multiselect';

const categories = ref(
    [
        {name: 'Concert'},
        {name: 'Sport'},
        {name: 'Movie'}
    ]
);
const selectedCategories = ref();
const selectAll = ref(false);
</script>

<template>
    <div>
        <section class="bg-gray-800 flex items-center">
            <div class="max-w-screen-xl px-4 mx-auto lg:px-12 w-full">
                <!-- Start coding here -->
                <div class="relative shadow-md bg-gray-800 sm:rounded-lg">
                    <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                        <div class="w-full md:w-1/3">
                            <select id="locations"
                                class=" border text-sm rounded-lg block w-full p-3.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                                <option selected>Tất cả địa điểm</option>
                                <option value="US">Hồ Chí Minh</option>
                                <option value="CA">Hà Nội</option>
                                <option value="FR">Các địa điểm khác</option>

                            </select>
                        </div>
                        <div class="w-full md:w-1/3">
                            <MultiSelect v-model="selectedCategories" display="chip" :options="categories" optionLabel="name" placeholder="Tất cả sự kiện"
                                :maxSelectedLabels="3" class="w-full md:w-20rem"/>
                        </div>
                        <div class="w-full md:w-1/3">
                            <select id="times"
                                class=" border text-sm rounded-lg block w-full p-3.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
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
    </div>
</template>

<style>
.p-multiselect {
    background-color: #374151;
    border-color: #4b5563;
}
</style>

