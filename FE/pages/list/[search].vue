<script setup>
const route = useRoute();
const code = ref();
const searchParam = ref();

code.value = route.query.code;
searchParam.value = route.params.search;

// Get data search
const { data:list, error } = await useFetch("http://127.0.0.1:8000/api/list/" + searchParam.value, {
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