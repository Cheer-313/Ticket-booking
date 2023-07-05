<script setup lang="ts">
const { signIn } = useAuth() 
</script>

<template>
    <div>
        <button class="w-1/2 text-center text-white bg-blue-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 hover:bg-blue-700 focus:ring-blue-800"
            @click= "$event => signIn('google', {callbackUrl: '/protected'})">
            Login with Google
        </button>
    </div>
</template>