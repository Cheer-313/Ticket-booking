<template>
    <section class="bg-gray-800">
        <div class="px-4 mx-auto max-w-screen-xl lg:py-8 lg:px-6">
            <div class="mx-auto max-w-screen-md sm:text-center">
                <p class="mx-auto max-w-2xl font-light mb-6 text-2xl text-white">Epic events and incredible
                    deals straight to your inbox</p>
                <form action="#">
                    <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
                        <div class="relative w-full">
                            <label for="email" class="hidden mb-2 text-sm font-medium text-gray-300">Email
                                address</label>
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                </svg>
                            </div>
                            <input
                                class="block p-3 pl-10 w-full text-sm rounded-lg border sm:rounded-none sm:rounded-l-lg bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Enter your email" type="email" id="email" required="">
                        </div>
                        <div>
                            <button type="submit"
                                class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer border-blue-600 sm:rounded-none sm:rounded-r-lg focus:ring-4 bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Join
                            </button>
                        </div>
                    </div>
                    <div class="mt-6 mx-auto max-w-screen-sm text-sm text-center newsletter-form-footer text-gray-300">
                        By signing up, you acknowledge and accept our privacy policy and consent to receiving emails.</div>
                </form>
            </div>
        </div>
    </section>
</template>

<script>

</script>

<style></style>