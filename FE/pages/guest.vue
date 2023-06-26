<script setup lang="ts">
definePageMeta({
    unauthenticatedOnly: true,
    navigateAuthenticatedTo: '/protected',
})

</script>


<template>
    <h1>Hi! I'm for guests only.</h1>
</template>