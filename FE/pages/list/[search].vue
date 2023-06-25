<script setup>
const route = useRoute();
const code = ref();
const searchParam = ref();
const config = useRuntimeConfig()

code.value = route.query.code;
searchParam.value = route.params.search;

// Get data search
const { data:list, error } = await useFetch(config.public.MS1_API_URL+"/api/list/" + searchParam.value, {
    method: 'GET',
    query: {
        code: code.value,
    }
});
</script>

<template>
    <div>
        <FilterEvent />
        <EventList :events="list['event'] ?? []"/>
    </div>
</template>