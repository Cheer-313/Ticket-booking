<script setup lang="ts">
definePageMeta({
    layout: false,
    auth: {
        unauthenticatedOnly: true,
        navigateAuthenticatedTo: '/protected'
    }
});
</script>

<template>
    <Login />
</template>



