<script setup>
import UserInfo from '~/components/Profile/UserInfo.vue';

</script>

<template>
   <div class="min-h-screen bg-gray-800">           
      <ProfileSideBar />
      <div class="p-4 sm:ml-64" id="myTabContent">
         <div class="p-4 border-2 min-h-screen border-dashed rounded-lg border-gray-300">
            <div id="myTabContent">
               <UserInfo />
               <ProfileOrderHistory />
            </div>
         </div>
      </div>
   </div>
</template>

<style>
    #searchBar {
        display: none;
    }
</style>
