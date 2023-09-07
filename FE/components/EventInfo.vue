<script setup>
import { userLogout, userLoggedIn } from '~/composables/useAuth';

const props = defineProps(['event']);
const { event } = toRefs(props);
const dayjs = useDayjs();
const router = useRouter();

const initalCheck = await userLoggedIn()
const isLoggedIn = ref(initalCheck)
const onClickBuyTicket = () => {
    if (isLoggedIn.value) {
        router.push({
            name: 'tickets-id-buy',
            params: {
                id: event.value.event_id,
            }
        })
    } else {
        router.push({
            name: 'login'
        })
    }
}
</script>
<template>
    <div>
        <section class="bg-center bg-no-repeat bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/conference.jpg')] bg-gray-700 bg-blend-multiply">
            <div class="grid grid-cols-12 gap-10  p-1 py-8 px-4 mx-auto max-w-screen-xl lg:py-4 lg:px-2">
                <div class="flex rounded-lg sm:col-span-8 items-baseline">
                    <div class="text-center border ml-4 w-40 h-fit text-white">
                        <p class="text-xs bg-red-600 p-2 font-bold">{{ dayjs(event.event_date).format('MMMM') }}</p>
                        <p class="text-4xl">{{ dayjs(event.event_date).format('DD') }}</p>
                        <p class="mb-2">{{ dayjs(event.event_date).format('dddd') }}</p>
                    </div>
                    <div class=" flex flex-col justify-between p-4 leading-normal">
                        <h2 class="mb-4 text-xl tracking-tight font-extrabold text-white">{{ event.event_name }}</h2>
                        <p class="mb-4 font-light sm:text-x text-gray-400">
                            <font-awesome-icon :icon="['fa', 'clock']" />
                            {{ dayjs(event.event_date).format('dddd, MMMM DD, YYYY') + ' (' + dayjs(event.event_date + ' ' + event.start_time).format('hh:mm A') + '-' + dayjs(event.event_date + ' ' + event.end_time).format('hh:mm A') + ')' }}
                        </p>
                        <p class="mb-4 font-light sm:text-x text-gray-400">
                            <font-awesome-icon :icon="['fasr', 'location-dot']" />
                            {{ event.venue_name }}
                        </p>
                        <p class="mb-4 font-light sm:text-x text-gray-400">
                            <font-awesome-icon :icon="['fas', 'map']" />
                            {{ event.address }}
                        </p>
                    </div>
                </div>
                <div class="col-span-12 rounded-lg p-4 mx-auto sm:col-span-4 ">
                    <div v-if="isLoggedIn">
                        <button @click="onClickBuyTicket" type="button" class="w-full text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none font-medium rounded-lg text-xl px-5 py-2.5 text-center mr-2 mb-2">
                            BUY TICKET
                        </button>
                    </div>
                    <div v-else>
                        <button @click="onClickBuyTicket" type="button" class="w-full text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none font-medium rounded-lg text-xl px-5 py-2.5 text-center mr-2 mb-2">
                            SIGN IN TO BUY
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

