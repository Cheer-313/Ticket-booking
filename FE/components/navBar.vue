<script setup lang="ts">
import { userLogout, userLoggedIn } from '~/composables/useAuth';
import { IUser } from '~/types/IUser';

const user = useState<IUser>('user')
const logout = userLogout
const initalCheck = await userLoggedIn()
const isLoggedIn = ref(initalCheck)
// const { data, status, signOut } = useAuth()
// const loggedIn = computed(() => status.value === 'authenticated')

// async function handleSignOut() {
//     await signOut()
// }

</script>

<template>
    <nav class="bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <NuxtLink to="/" class="flex items-center">
                <img src="../assets/brand.svg" class="h-8 mr-3" alt="Flowbite Logo" />
            </NuxtLink>
            <button data-collapse-toggle="navbar-dropdown" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden focus:outline-none focus:ring-2 hover:bg-gray-700 focus:ring-gray-600"
                aria-controls="navbar-dropdown" aria-expanded="false">
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto bg-gray-500" id="navbar-dropdown">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 md:flex-row md:space-x-8 md:mt-0 md:border-0 bg-gray-800 md:bg-gray-900 border-gray-700">
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbarSport" data-dropdown-trigger="hover"
                            class="flex items-center justify-between w-full py-2 pl-3 pr-4 rounded md:border-0 md:p-0 md:w-auto text-white md:hover:text-gray-400 focus:text-white border-gray-700 hover:bg-gray-700 md:hover:bg-transparent">Thể
                            thao
                            <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbarSport"
                            class="z-10 hidden font-normal divide-y rounded-lg shadow md:w-44 bg-gray-800 divide-gray-600 w-full">
                            <ul class="py-2 text-sm text-gray-400 " aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="#" class="block px-10 md:px-4 py-2 hover:bg-gray-600 hover:text-white">Bóng
                                        đá</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-10 md:px-4 py-2 hover:bg-gray-600 hover:text-white">Bóng
                                        rổ</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-10 md:px-4 py-2 hover:bg-gray-600 hover:text-white">Bóng
                                        bàn</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbarConcert" data-dropdown-trigger="hover"
                            class="flex items-center justify-between w-full py-2 pl-3 pr-4 rounded md:border-0 md:p-0 md:w-auto text-white md:hover:text-gray-400 focus:text-white border-gray-700 hover:bg-gray-700 md:hover:bg-transparent">Concert
                            <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbarConcert"
                            class="z-10 hidden font-normal divide-y rounded-lg shadow md:w-44 bg-gray-800 divide-gray-600 w-full">
                            <ul class="py-2 text-sm text-gray-400 " aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="#" class="block px-10 md:px-4 py-2 hover:bg-gray-600 hover:text-white">Bóng
                                        đá</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-10 md:px-4 py-2 hover:bg-gray-600 hover:text-white">Bóng
                                        rổ</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-10 md:px-4 py-2 hover:bg-gray-600 hover:text-white">Bóng
                                        bàn</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 rounded md:border-0 md:p-0 text-white md:hover:text-gray-400 hover:bg-gray-700 hover:text-white md:hover:bg-transparent">Sell</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 rounded md:border-0 md:p-0 text-white md:hover:text-gray-400 hover:bg-gray-700 hover:text-white md:hover:bg-transparent">My
                            Ticket</a>
                    </li>
                    <li>
                        <div v-if="isLoggedIn">
                            <li>
                                <button id="dropdownUser" data-dropdown-toggle="dropdownNavbarUser" data-dropdown-trigger="hover"
                                    class="flex items-center justify-between w-full py-2 pl-3 pr-4 rounded md:border-0 md:p-0 md:w-auto text-white md:hover:text-gray-400 focus:text-white border-gray-700 hover:bg-gray-700 md:hover:bg-transparent">
                                    {{ user.username }}
                                    <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg></button>
                                <div id="dropdownNavbarUser"
                                    class="z-10 hidden font-normal divide-y rounded-lg shadow md:w-44 bg-gray-800 divide-gray-600 w-full">
                                    <ul class="py-2 text-sm text-gray-400 " aria-labelledby="dropdownLargeButton">
                                        <li>
                                            <NuxtLink to="/Profile" class="block px-10 md:px-4 py-2 hover:bg-gray-600 hover:text-white">Profile</NuxtLink>
                                        </li>
                                        <li>
                                            <a @click="logout" class="cursor-pointer block px-10 md:px-4 py-2 hover:bg-gray-600 hover:text-white">Sign out</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </div>
                        <div v-if="!isLoggedIn" class="">
                            <NuxtLink to="/login" class="block py-2 pl-3 pr-4 rounded md:border-0 md:p-0 text-white md:hover:text-gray-400 hover:bg-gray-700 hover:text-white md:hover:bg-transparent">
                                Sign In
                            </NuxtLink>   
                        </div> 
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>
