
<script setup>
import AutoComplete from 'primevue/autocomplete';
import { useForm, useField } from 'vee-validate';

const searchResult = ref();
const router = useRouter();
const { handleSubmit, resetForm } = useForm();
const { value, errorMessage } = useField('selectedItem');
const config = useRuntimeConfig()

const search = async (event) => {
    let paramSearch = event.query;
    let dataSearch = [];
    let { data: response, error } = await useFetch(config.public.MS1_API_URL+"/api/search-box", {
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
        } else {
            searchParam = values.selectedItem;
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
    <section id="searchBar" class="bg-gray-900 flex py-5 items-center">
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
                                        class="absolute right-0 w-16 h-full text-sm font-medium text-white  border border-blue-700 focus:ring-4 focus:outline-none bg-blue-700 hover:bg-blue-800">
                                        <font-awesome-icon :icon="['fas', 'magnifying-glass']" />
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