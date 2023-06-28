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
        '@nuxtjs/tailwindcss',
        '@sidebase/nuxt-auth'
    ],
    // auth: {
    //     enableGlobalAppMiddleware: true,
    // },
    runtimeConfig: {
        GOOGLE_CLIENT_SECRET: process.env.GOOGLE_CLIENT_SECRET,
        API_ROUTE_SECRET: process.env.API_ROUTE_SECRET,
        public: {
            GOOGLE_CLIENT_ID: process.env.GOOGLE_CLIENT_ID
        },
    },
    build: {
        transpile: [
            '@vuepic/vue-datepicker',
            'primevue',
            '@fortawesome/vue-fontawesome',
        ],
    },
    runtimeConfig: {
        public: {
            MS1_API_URL: process.env.MS1_API_URL,
            MS2_API_URL: process.env.MS2_API_URL,
            EMAIL: process.env.EMAIL,
        }
    },
})
