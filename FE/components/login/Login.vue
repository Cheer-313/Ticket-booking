<template>
    <div>
        <section class="bg-gray-900">
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
                <NuxtLink to="/" class="flex items-center mb-6">
                        <img class="max-w-xs" src="~/assets/brand.png" alt="logo">
                </NuxtLink>      
                <div class="w-full rounded-lg shadow border md:mt-0 sm:max-w-md xl:p-0 bg-gray-800 border-gray-700">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 class="text-xl font-bold leading-tight tracking-tight md:text-2xl text-white text-center">
                            Sign in to your account
                        </h1>
                        <LoginGoogleLogin />
                        <LoginForm />
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>