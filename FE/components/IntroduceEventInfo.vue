<script setup>
const props = defineProps(['event']);
const { event } = toRefs(props);
</script>
<template>
    <section class="pb-8 pt-8  bg-gray-800">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue format-invert text-gray-200">
                <h1 class="mb-4 text-3xl font-extrabold leading-tightlg:mb-6 lg:text-4xl border-b-2 p-4">Giới thiệu</h1>
                <h2 class="mb-8 text-xl font-bold leading-tightlg:mb-6 lg:text-3xl text-center">{{ event.event_name }}</h2>
                <p class="mb-4 text-lg">{{ event.event_description }}</p>
            </article>
        </div>
    </section>
</template>

