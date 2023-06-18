// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
    css: [
        '@fortawesome/fontawesome-svg-core/styles.css',
        "primevue/resources/themes/lara-light-blue/theme.css",
        "primevue/resources/primevue.css",
        '@/assets/css/input.css',
    ],
    postcss: {
        plugins: {
            tailwindcss: {},
            autoprefixer: {},
        },
    },
    modules: [
        '@nuxtjs/tailwindcss'
    ],
    build: {
        transpile: [
            '@vuepic/vue-datepicker',
            'primevue',
        ],

    },
    app: {
        head: {
            script: [
                {
                    src: "https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"
                }
            ],
            link: [
                {
                    rel: "stylesheet",
                    href: "https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap",
                },
            ],
        },
    },
})
