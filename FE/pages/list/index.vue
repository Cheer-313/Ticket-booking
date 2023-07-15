<script setup>
const route = useRoute();
const config = useRuntimeConfig()

// Get data search
const { data:list, error } = await useFetch(config.public.MS1_API_URL+"/api/list/", {
    method: 'GET',
});
</script>

<template>
    <div>
        <FilterEvent />
        <EventList :events="list['event'] ?? []"/>
    </div>
</template>