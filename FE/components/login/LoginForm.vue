<script setup lang="ts">
const { signIn } = useAuth()
const email = ref('')
const password = ref('')

definePageMeta({
    auth: {
        navigateAuthenticatedTo: '/protected'
    }
})

</script>
<template>
    <form class="space-y-4 md:space-y-6" @submit.prevent="$event => signIn('credentials', { redirect: true, email, password })">
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-white">Your
                email</label>
            <input v-model="email" type="email" name="email" id="email"
                class="border sm:text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                placeholder="name@company.com" >
        </div>
        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-white">Password</label>
            <input v-model="password" type="password" name="password" id="password" placeholder="••••••••"
                class=" border sm:text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                >
        </div>
        <div class="flex items-center justify-between">
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="remember" aria-describedby="remember" type="checkbox"
                        class="w-4 h-4 border rounded focus:ring-3 bg-gray-700 border-gray-600 focus:ring-blue-600 ring-offset-gray-800"
                        >
                </div>
                <div class="ml-3 text-sm">
                    <label for="remember" class="text-gray-300">Remember me</label>
                </div>
            </div>
            <a href="#" class="text-sm font-medium hover:underline text-blue-500">Forgot
                password?</a>
        </div>

        <button
            class="w-full text-white bg-blue-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center hover:bg-blue-700 focus:ring-blue-800">
            Sign in
        </button>
        <!-- <a href="" type="submit"
            class="w-full text-white bg-blue-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-primari hover:bg-blue-700 focus:ring-blue-800">Log
            in with Google</a> -->
        <p class="text-sm font-light text-gray-400">
            Don’t have an account yet? <a href="#" class="font-medium hover:underline text-blue-500">Sign
                up</a>
        </p>
    </form>
</template>