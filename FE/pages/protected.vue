<script setup lang="ts">
definePageMeta({ middleware: 'auth' })

const { data, status } = useAuth()

status.value;
data.value

</script>

<template>
    <h1>Hi! I'm protected</h1>
    <pre>{{ data }}</pre>
</template>