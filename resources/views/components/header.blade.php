<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                    <span class="sr-only">Open sidebar</span>
                    <vue-feather type="align-left"></vue-feather>
                </button>
                <router-link to="/" class="flex ml-2 md:mr-24">
                    <div class="h-8 mr-3 text-2xl">🌱</div>
                    <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap">
                        <platform />
                    </span>
                </router-link>
            </div>
            <header-page></header-page>
        </div>
    </div>
</nav>