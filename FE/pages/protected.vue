<script setup lang="ts">
definePageMeta({middleware: 'auth'})

const { data } = useAuth()

</script>

<template>
    <h1>Hi! I'm protected</h1>
    <pre>{{ data }}</pre>
</template>