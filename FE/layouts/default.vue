<template>
    <div>
        <TheHeader />
        <slot />
        <TheFooter />
    </div>
</template>

<script>
import { onMounted } from 'vue'
import { initFlowbite, initDropdowns } from 'flowbite'

// initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
    initDropdowns();
})
</script>