<template>
    <aside aria-label="Related articles" class="py-8 lg:py-24  bg-gray-800">
        <div class="px-4 mx-auto max-w-screen-xl">
            <h2 class="mb-8 text-2xl font-bold  text-white">Sự kiện khác</h2>
            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4 md:grid-cols-3">
                <div v-for="i in 4">
                    <NuxtLink to="/event-detail">
                        <article class="max-w-xs text-white border rounded-lg border-gray-500">
                            <a href="#">
                                <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/article/blog-1.png"
                                    class="mb-5 rounded-lg w-full" alt="Image 1">
                            </a>
                            <div class="px-2">
                                <h2 class="mb-2 text-xl font-bold leading-tight ">
                                    <a href="#">[Bến Thành] MINISHOW UYÊN LINH & VŨ</a>
                                </h2>
                                <div class="flex justify-between py-2">
                                    <div>
                                        <span>Từ </span>
                                        <strong class="text-[#2DC275]">
                                            900.000 VNĐ
                                        </strong>
                                    </div>
                                    
                                    <p>
                                        <font-awesome-icon :icon="['fas', 'user-secret']" />
                                        29.06.2023
                                    </p>
                                </div>
                                <div class="flex justify-between py-2">
                                    <div>
                                        <font-awesome-icon icon="table-cells" />
                                        <a href="#" class=" inline-flex items-center underline-offset-4 hover:underline">
                                            Concert
                                        </a>
                                    </div>
                                        <p class="border rounded-lg p-1">
                                            <font-awesome-icon :icon="['fas', 'location-dot']" />
                                            HO CHI MINH
                                        </p>
                                </div>
                            </div>
                        </article>
                    </NuxtLink>
                </div>
            </div>
        </div>
    </aside>
</template>

