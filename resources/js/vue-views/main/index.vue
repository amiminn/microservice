<template lang="">
    <div class="relative">
        <nav
            class="fixed w-full h-14 flex items-center justify-between px-7 backdrop-blur bg-white/10 text-white"
        >
            <div class="text-3xl cursor-pointer">
                🪸
                <span class="font-bold text-2xl sm:lg:text-3xl">@amiminn</span>
            </div>
            <div>
                <vue-feather
                    @click="menu = !menu"
                    size="30"
                    type="align-right"
                    class="cursor-pointer"
                ></vue-feather>
            </div>
        </nav>
        <div class="pt-14 min-h-screen bg-gray-900 grid justify-items-center">
            <div class="text-white flex items-center max-w-sm text-center px-3">
                <div>
                    <div class="text-xl font-bold mb-5">Rules</div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing
                        elit. Necessitatibus error qui, harum ipsum quam maiores
                        asperiores sequi. Maxime atque, quia nulla dolores
                        tempore, doloremque optio nihil aut neque accusantium
                        aliquam?
                    </p>
                    <div class="mt-9">
                        <router-link
                            to="login"
                            class="rounded-md hover:bg-blue-800 py-2 px-10 border-white border-2 transition"
                        >
                            lanjut
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <Transition
        enter-active-class="animate__animated animate__zoomIn animate__faster"
        leave-active-class="animate__animated animate__zoomOut animate__faster"
    >
        <div
            v-if="menu"
            @click="menu = false"
            class="fixed top-0 left-0 right-0 z-50 w-full overflow-x-hidden overflow-y-auto md:inset-0 min-h-screen backdrop-blur-sm"
        >
            <div class="relative w-full min-h-screen grid justify-items-center">
                <div class="flex items-center text-center px-3">
                    <div
                        class="h-64 w-64 bg-gray-900 rounded-md border-2 border-white py-3 px-4 grid content-center text-white font-bold"
                    >
                        <div>
                            <div
                                class="text-blue-500 rounded-md border-2 border-white py-1 scale-105 transition my-1"
                            >
                                Home
                            </div>
                            <div class="my-1">About</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Transition>
</template>
<script>
export default {
    data() {
        return {
            menu: false,
        };
    },
};
</script>
<style lang=""></style>
