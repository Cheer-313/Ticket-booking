import SeatsioSeatingChart from '@seatsio/seatsio-vue'

export default defineNuxtPlugin((nuxtApp) => {
  nuxtApp.vueApp.use(SeatsioSeatingChart)
})
