// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
    css: [
        '@fortawesome/fontawesome-svg-core/styles.css',
        "primevue/resources/themes/lara-light-blue/theme.css",
        "primevue/resources/primevue.css",
    ],
    modules: [
        '@nuxtjs/tailwindcss'
    ],
    build: {
        transpile: [
            '@vuepic/vue-datepicker',
            'primevue',
        ]
    }
})
