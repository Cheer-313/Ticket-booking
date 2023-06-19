
<script setup>
import AutoComplete from 'primevue/autocomplete';
import { useForm, useField } from 'vee-validate';

const searchResult = ref();
const router = useRouter();
const { handleSubmit, resetForm } = useForm();
const { value, errorMessage } = useField('selectedItem');

const search = async (event) => {
    let paramSearch = event.query;
    let dataSearch = [];
    let { data: response, error } = await useFetch("http://127.0.0.1:8000/api/search-box", {
        method: 'GET',
        query: { search_param: paramSearch }
    });
    for (let value of response._rawValue) {
        if (value.items.length > 0) {
            dataSearch.push(value);
        }
    }
    searchResult.value = dataSearch;
};

const getSearchParam = (values) => {
    let searchParam = null;
    if (values.selectedItem) {
        if (values.selectedItem.artist_name) {
            searchParam = values.selectedItem.artist_name;
        } else if (values.selectedItem.event_name) {
            searchParam = values.selectedItem.event_name;
        } else if (values.selectedItem.venue_name) {
            searchParam = values.selectedItem.venue_name;
        }
    }
    return convertToKebabCase(searchParam);
}

const onSubmit = handleSubmit(values => {
    let searchParam = getSearchParam(values);
    let nameRoute = values.selectedItem? 'list-search' : 'list';
    router.push({
        name: nameRoute,
        params: {
            search: searchParam,
        }
    })
    resetForm();
});
</script>
<template>
    <section class="bg-gray-900 flex py-5 items-center">
        <div class="max-w-screen-xl mx-auto w-full">
            <!-- Start coding here -->
            <div class="relative shadow-md bg-gray-800 sm:rounded-lg">
                <div class="flex flex-col items-center justify-center p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                    <div class="w-full md:w-1/2">
                        <form @submit.prevent="onSubmit">
                            <div class="flex">
                                <div class="relative w-full">
                                    <AutoComplete :inputClass="'!block !p-2.5 !w-full !text-sm !rounded-r-lg !border-l-2 !border !focus:ring-blue-500 !bg-gray-700 !border-l-gray-700  !border-gray-600 !placeholder-gray-400 !text-white !focus:border-blue-500'" 
                                                v-model="value" 
                                                :suggestions="searchResult" 
                                                @complete="search" 
                                                optionLabel="item_label" 
                                                optionGroupLabel="group_label" 
                                                optionGroupChildren="items" 
                                                placeholder="Search for artists, venues and events">
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
                                        class="absolute right-0 w-16 h-full text-sm font-medium text-white rounded-r-md border border-gray-700 focus:ring-4 focus:outline-none bg-gray-700 hover:bg-gray-800">
                                        <svg aria-hidden="true" class="w-5 h-5 m-auto" fill="none" stroke="currentColor"
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