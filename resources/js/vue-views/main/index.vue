<template lang="">
    <div class="relative">
        <nav
            class="fixed w-full h-14 flex items-center justify-between px-7 backdrop-blur bg-white/10 text-white"
        >
            <div class="text-3xl">
                🪸
                <span class="font-bold text-2xl sm:lg:text-3xl">@amiminn</span>
            </div>
            <div>
                <router-link
                    to="/login"
                    class="btn !rounded-full !text-white border-white !hover:text-gray-900 !hover:bg-white !hover:border-black"
                    >login</router-link
                >
            </div>
        </nav>
        <div
            class="pt-14 min-h-screen bg-gray-900 text-white text-center flex items-center"
        >
            <div class="container mx-auto grid gap-7">
                <span class="text-4xl sm:lg:text-7xl font-extrabold tracking"
                    >🐠 We Help
                    <span
                        class="text-white bg-sky-900 px-4 border-2 border-white rounded-xl"
                        >Bussiness</span
                    >
                    with Digital Issue</span
                >
                <div class="text-lg">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Ipsum excepturi quasi dolorem ad illum quas delectus
                    eligendi nobis aliquid reiciendis.
                </div>
                <div class="flex gap-3 justify-center">
                    <button
                        class="px-7 py-2 bg-gray-900 hover:scale-150 transition rounded-full border-2 border-white"
                    >
                        Get start
                    </button>
                    <button
                        class="px-7 py-2 bg-gray-900 hover:scale-150 transition rounded-full border-2 border-white"
                    >
                        Join now
                    </button>
                </div>
            </div>
        </div>
        <!-- <div class="min-h-screen pt-14">bag 2</div> -->
    </div>
</template>
<script>
export default {};
</script>
<style lang=""></style>
