<script setup lang="ts">
definePageMeta({
    layout: false,
    auth: {
        unauthenticateOnly: true,
        navigateAuthenticatedTo: '/'
    }
});

</script>

<template>
    <Login />
</template>



