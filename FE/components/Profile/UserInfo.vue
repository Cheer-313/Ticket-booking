<template>
    <div class="hidden p-4 rounded-lg bg-gray-800" id="info" role="tabpanel" aria-labelledby="info-tab">
        <div class="space-y-8">
            <h2 class="mb-4 text-2xl tracking-tight font-bold text-white uppercase">Thông tin cá nhân</h2>
            <form action="#" class="space-y-8">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-300">Họ và tên</label>
                <input disabled type="text" name="name" id="name" class="border cursor-text ext-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white shadow-sm-light" value="Mạch Trung Tín" required>
            </div>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-300">Email</label>
                <input disabled type="email" name="email" id="email" class="border cursor-text ext-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white shadow-sm-light" value="machtrungtin2x@gmail.com" required>
            </div>
            </form>
        </div>
    </div>
</template>