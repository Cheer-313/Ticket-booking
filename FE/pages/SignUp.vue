<script setup lang="ts">
import { registerWithEmail } from "~/composables/useAuth"

const email = ref('');
const password = ref('');
const username = ref('');
const name = ref('');
const phone = ref('');
const hasError = ref('');
const errorMessage = ref('');

const postRegisterForm = async function () {
    await registerWithEmail(username.value, email.value, name.value,  password.value, phone.value)
    
}

definePageMeta({
    layout: false
})


</script>

<template>
    <section class="bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0 max-w-lg">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-white">
                <img class="max-w-xs" src="~/assets/brand.png" alt="logo">   
            </a>
            <div class="w-full rounded-lg shadow border md:mt-0 sm:max-w-xl xl:p-0 bg-gray-800 border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl text-center font-bold leading-tight tracking-tight md:text-2xl text-white">
                        Create and account
                    </h1>
                    <!-- <div v-if="response?.hasErrors && errors" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3" role="alert">
                        <ul class="block sm:inline">
                            <li v-for="[key, value] in errors">
                                {{ value.message }}
                            </li>
                        </ul>
                    </div> -->
                    <form class="space-y-4 md:space-y-6" action="#" method="POST">
                        <div>
                            <label for="username" class="block mb-2 text-sm font-medium text-white">Your Username</label>
                            <input v-model="username" type="text" name="username" id="username" class=" border sm:text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="bla bla bla" required>
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-white">Your email</label>
                            <input v-model="email" type="email" name="email" id="email" class=" border sm:text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="name@company.com" required>
                        </div>
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-white">Your full name</label>
                            <input v-model="name" type="text" name="name" id="name" class=" border sm:text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Full name" required>
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-white">Password</label>
                            <input  v-model="password" type="password" name="password" id="password" placeholder="••••••••" class="border sm:text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div>
                            <label for="phone" class="block mb-2 text-sm font-medium text-white">Your phone number</label>
                            <input v-model="phone" type="text" name="phone" id="phone" class=" border sm:text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="xxxxxxxxxx" required>
                        </div>
                        <button @click.prevent="postRegisterForm" class="w-full text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Create an account</button>
                        <p class="text-sm font-light text-gray-400">
                            Already have an account? <NuxtLink to="/login" class="font-medium hover:underline text-blue-500">Login here</NuxtLink>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>

<style>
    .dp__input {
        background-color: #374151;
        border-color: #4b5563;
        color: #fff;
    }
</style>