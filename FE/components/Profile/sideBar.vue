<template>
    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm rounded-lg sm:hidden focus:outline-none focus:ring-2 text-gray-400 hover:bg-gray-700 focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
           <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button>
    <aside id="default-sidebar" class="absolute top-16 left-0 z-40 w-64 pl-4 pt-4  transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-800 rounded-lg border-2 border-dashed border-gray-300">
            <ul class="space-y-2 -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                <li role="presentation">
                    <div href="#" class="flex items-center p-2 rounded-lg text-white hover:bg-gray-700">
                     <svg aria-hidden="true" class="w-6 h-6transition duration-75 text-gray-400 group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                     <button class="inline-block ml-3 rounded-t-lg" id="info-tab" data-tabs-target="#info" type="button" role="tab" aria-controls="info" aria-selected="false">Information</button>
                  </div>
               </li>
               <li role="presentation">
                  <div class="flex items-center p-2 rounded-lg text-white hover:bg-gray-700">
                     <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6transition duration-75 text-gray-4000 group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                     <button class="inline-block ml-3 rounded-t-lg" id="orders-tab" data-tabs-target="#orders" type="button" role="tab" aria-controls="orders" aria-selected="false">Orders</button>
                  </div>
               </li>
            </ul>
        </div>
    </aside>
</template>