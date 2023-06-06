<script setup>
const data = ref([
    {
        category_code: '01',
        category_name: 'Concert',
        list_artist: [
            {
                artist_id: '1',
                genre_id: '1',
                artist_type: '01',
                artist_name: 'Taylor Swift',
                galerry_url: 'https://hips.hearstapps.com/hmg-prod/images/taylor-swift-memoir-clues-645847abad125.jpg?crop=0.502xw:1.00xh;0,0&resize=1200:*',
                total_event: 10,
            },
            {
                artist_id: '3',
                genre_id: '3',
                artist_type: '03',
                artist_name: 'Blackpink',
                galerry_url: 'https://www.rollingstone.com/wp-content/uploads/2022/05/R1364Blackpink-Opener.jpg',
                total_event: 10,
            },
            {
                artist_id: '4',
                genre_id: '4',
                artist_type: '04',
                artist_name: 'Pham Bang Bang (Fàn Bīngbīng)',
                galerry_url: 'https://cdnimg.vietnamplus.vn/uploaded/xpcwvovt/2015_05_12/20150512_phambangbang1_1.jpg',
                total_event: 10,
            },
            {
                artist_id: '5',
                genre_id: '5',
                artist_type: '05',
                artist_name: 'Song Ji-hyo',
                galerry_url: 'https://kenh14cdn.com/203336854389633024/2023/4/24/photo-2-16823288682061661165549.jpg',
                total_event: 10,
            },
        ]
    },
    {
        category_code: '02',
        category_name: 'Sport',
        list_artist: [
            {
                artist_id: '2',
                genre_id: '2',
                artist_type: '02',
                artist_name: 'Manchester United F.C.',
                galerry_url: 'https://khoinguonsangtao.vn/wp-content/uploads/2022/08/hinh-anh-logo-mu-hinh-nen-logo-mu.jpg',
                total_event: 10,
            },
            {
                artist_id: '6',
                genre_id: '6',
                artist_type: '06',
                artist_name: 'Manchester City F.C.',
                galerry_url: 'https://upload.wikimedia.org/wikipedia/en/thumb/e/eb/Manchester_City_FC_badge.svg/1200px-Manchester_City_FC_badge.svg.png',
                total_event: 10,
            },
            {
                artist_id: '7',
                genre_id: '7',
                artist_type: '07',
                artist_name: 'FC Bayern Munich',
                galerry_url: 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/FC_Bayern_M%C3%BCnchen_logo_%282017%29.svg/1200px-FC_Bayern_M%C3%BCnchen_logo_%282017%29.svg.png',
                total_event: 10,
            },
            {
                artist_id: '8',
                genre_id: '8',
                artist_type: '08',
                artist_name: 'Real Madrid CF',
                galerry_url: 'https://wallpaperaccess.com/full/1189938.jpg',
                total_event: 10,
            },
        ]
    },
    {
        category_code: '03',
        category_name: 'Art & Theater',
        list_artist: [
            {
                artist_id: '13',
                genre_id: '13',
                artist_type: '013',
                artist_name: 'Heather McMahan',
                galerry_url: 'https://s1.ticketm.net/dam/a/a29/86d310b4-c3b5-4c89-97e8-2eef99517a29_1816401_TABLET_LANDSCAPE_LARGE_16_9.jpg',
                total_event: 10,
            },
            {
                artist_id: '14',
                genre_id: '14',
                artist_type: '10',
                artist_name: 'Bert Kreischer',
                galerry_url: 'https://cdn1.sixthman.net/2023/bkc/images/artists/share/bertkreischer_257046.jpg',
                total_event: 10,
            },
            {
                artist_id: '15',
                genre_id: '15',
                artist_type: '11',
                artist_name: 'Ricky Gervais',
                galerry_url: 'https://dynamicmedia.livenationinternational.com/e/n/r/f52b0dba-ce15-4de2-9be3-9d979bd22377.jpg?auto=webp&width=1507.2',
                total_event: 10,
            },
            {
                artist_id: '16',
                genre_id: '16',
                artist_type: '016',
                artist_name: 'Cirque du Soleil : Corteo',
                galerry_url: 'https://www.cirquedusoleil.com/-/media/cds/images/shows/corteo/march_2023_assets/share/cirque-du-soleil-corteo-share-1200x630.jpg?db=web&vs=1&hash=C1A2827833E2460253FB53D8550B3BEFhttps://www.cirquedusoleil.com/-/media/cds/images/shows/corteo/march_2023_assets/share/cirque-du-soleil-corteo-share-1200x630.jpg?db=web&vs=1&hash=C1A2827833E2460253FB53D8550B3BEF',
                total_event: 10,
            },
        ]
    },
    {
        category_code: '04',
        category_name: 'Family',
        list_artist: [
            {
                artist_id: '9',
                genre_id: '9',
                artist_type: '09',
                artist_name: 'Disney On Ice presents Find Your Hero',
                galerry_url: 'https://www.scotiabankarena.com/assets/img/22406874-D33B-Toronto-Jakacki-Venue_Static_Kit_880x550-74a4610c13.jpg',
                total_event: 10,
            },
            {
                artist_id: '10',
                genre_id: '10',
                artist_type: '10',
                artist_name: 'Disney On Ice presents Into the Magic',
                galerry_url: 'https://www.sapcenter.com/assets/img/GOOGLE-970x250-80992ab69e.jpg',
                total_event: 10,
            },
            {
                artist_id: '11',
                genre_id: '11',
                artist_type: '11',
                artist_name: 'Jurassic World Live Tour',
                galerry_url: 'https://s1.ticketm.net/dam/a/dc9/924c09f2-3319-4ae8-9959-b05aeeffddc9_1667441_TABLET_LANDSCAPE_LARGE_16_9.jpg',
                total_event: 10,
            },
            {
                artist_id: '12',
                genre_id: '12',
                artist_type: '012',
                artist_name: 'Disney Land Tokyo',
                galerry_url: 'https://res-1.cloudinary.com/jnto/image/upload/w_2064,h_1300,c_fill,f_auto,fl_lossy,q_auto/v1645708829/chiba/H_00336_001',
                total_event: 10,
            },
        ]
    },
])
</script>
<template>
    <div>
        <section class="bg-gray-800">
            <div class="mx-auto max-w-screen-xl pt-10">
                <div class="mx-auto max-w-screen-sm text-center">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-white">Let's Make Live Happen</h2>
                    <p class="font-light text-gray-500 text-xl  sm:text-xltext-gray-400">Shop millions of live events and
                        discover
                        can't-miss concerts, games, theater and more.</p>
                </div>
            </div>
        </section>

        <!-- Category -->
        <Carousel v-for="category in data" :key="category['category_code']" :category="category"/>
        <NewsLetter />
    </div>
</template>