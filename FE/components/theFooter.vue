<template>
    <div>
        <div class="shadow bg-gray-900">
            <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
                <div class="sm:flex sm:items-center sm:justify-between">
                    <NuxtLink to="/" class="flex items-center mb-4 sm:mb-0">
                        <img src="../assets/brand.svg" class="h-8 mr-3" alt="Flowbite Logo" />
                    </NuxtLink>
                    <ul class="flex flex-wrap items-center mb-6 text-sm font-medium sm:mb-0 text-gray-400">
                        <li>
                            <a href="#" class="mr-4 hover:text-gray-200 md:mr-6 ">About</a>
                        </li>
                        <li>
                            <a href="#" class="mr-4 hover:text-gray-200 md:mr-6">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#" class="mr-4 hover:text-gray-200 md:mr-6 ">Licensing</a>
                        </li>
                        <li>
                            <a href="#" class="hover:text-gray-200">Contact</a>
                        </li>
                    </ul>
                </div>
                <hr class="my-6 sm:mx-auto border-gray-700 lg:my-8" />
                <span class="block text-sm  sm:text-center text-gray-400">© 2023 
                    <NuxtLink to="/" class="hover:text-gray-200">Ticket Line™</NuxtLink>. All Rights Reserved.</span>
            </div>
        </div>
    </div>
</template>
