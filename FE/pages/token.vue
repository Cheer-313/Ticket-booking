<script setup lang="ts">
const headers = useRequestHeaders(['cookie']) as HeadersInit
const { data: token } = await useFetch('/api/token', { headers })
</script>

<template>
    <div>
        <pre>{{ token || 'No token present, are you logged in?'}}</pre>
    </div>
</template>