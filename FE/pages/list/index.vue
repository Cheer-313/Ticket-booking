<script setup>
const route = useRoute();

// Get data search
const { data:list, error } = await useFetch("http://127.0.0.1:8000/api/list/", {
    method: 'GET',
});
</script>

<template>
    <div>
        <FilterEvent />
        <EventList :events="list['event'] ?? []"/>
    </div>
</template>