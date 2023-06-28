<script setup>
    const counter = ref(0);
    console.log(counter.value)
</script>

<template>
    <div class="flex justify-end">
        <button @click="counter--" class="px-2 bg-gray-500  border border-gray-400 disabled:bg-gray-400"  :disabled="counter <= 0">-</button>
        <p  class="w-10 text-center bg-gray-500 border border-gray-400">{{ counter }}</p>
        <button @click="counter++" class="px-2 bg-gray-500  border border-gray-400">+</button>
    </div>
</template>



