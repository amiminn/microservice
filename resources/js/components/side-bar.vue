<template lang="">
    <div>
        <li v-for="page in pages">
            <router-link
                :to="page.path"
                class="flex items-center mb-1 p-2 text-gray-500 rounded-lg hover:bg-gray-100"
            >
                <vue-feather :type="page.logo"></vue-feather>
                <span class="flex-1 ml-3 whitespace-nowrap">
                    {{ page.name }}
                </span>

                <span
                    v-if="page.sp"
                    class="inline-flex items-center justify-center w-3 h-3 px-5 py-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-lg"
                >
                    {{ page.sp }}
                </span>
            </router-link>
        </li>
    </div>
</template>
<script>
export default {
    data() {
        return {
            pages: [
                {
                    path: "/",
                    name: "dashboard",
                    logo: "command",
                    sp: "2",
                },
                {
                    path: "/about",
                    name: "about",
                    logo: "cloud-rain",
                    sp: "",
                },
                {
                    path: "/basic-vue",
                    name: "basic vue3",
                    logo: "book-open",
                    sp: "new",
                },
                {
                    path: "/tailwind",
                    name: "tailwind-component",
                    logo: "box",
                    sp: "",
                },
                {
                    path: "/kesehatan",
                    name: "kesehatan",
                    logo: "heart",
                    sp: "",
                },
                {
                    path: "/client",
                    name: "client",
                    logo: "key",
                    sp: "",
                },
            ],
        };
    },
    mounted() {
        // console.log($route.matched);
    },
};
</script>
<style lang="">
/* router-link-active,
router-link-exact-active : {
    color: red;
} */
</style>
