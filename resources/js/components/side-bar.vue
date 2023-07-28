<template lang="">
    <div>
        <aside
            id="logo-sidebar"
            class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-gray-900 border-r border-gray-900 sm:translate-x-0"
            aria-label="Sidebar"
        >
            <div
                class="h-full px-3 pb-4 overflow-y-auto no-scrollbar text-gray-400 bg-gray-900"
            >
                <ul class="space-y-2 font-medium">
                    <li v-for="page in pages">
                        <router-link
                            :to="page.path"
                            class="item-list"
                            :class="this.$theme.dark"
                        >
                            <vue-feather :type="page.logo"></vue-feather>
                            <span class="flex-1 ml-3 whitespace-nowrap">
                                {{ page.name }}
                            </span>

                            <span v-if="page.sp" class="attribute-list">
                                {{ page.sp }}
                            </span>
                        </router-link>
                    </li>
                </ul>
                <!-- <hr />
                <ul class="space-y-2 font-medium">
                    <li>
                        <div :class="this.$theme.dark" to="/" class="item-list">
                            e-commerce
                        </div>
                        <ul class="py-2 space-y-2">
                            <li>
                                <a class="!pl-11 item-list">Products</a>
                            </li>
                            <li>
                                <a class="!pl-11 item-list">Billing</a>
                            </li>
                            <li>
                                <a class="!pl-11 item-list">Invoice</a>
                            </li>
                        </ul>
                    </li>
                </ul> -->
            </div>
        </aside>
    </div>
</template>
<script>
import side from "./side-bar.json";
export default {
    data() {
        return {
            pages: side,
            help: [
                {
                    id: 1,
                },
                {
                    id: 2,
                    child: [
                        {
                            id: 11,
                        },
                        {
                            id: 12,
                        },
                        {
                            id: 13,
                        },
                    ],
                },
            ],
        };
    },

    mounted() {
        // this.help.map((d) => {
        //     let x = "child" in d ? d.child : false;
        //     if (x) {
        //         x.map((d) => console.log(d.id));
        //     }
        // });
    },
};
</script>
<style>
@tailwind components;
@layer components {
    .router-link-active,
    .router-link-exact-active {
        @apply !text-gray-50 !bg-gray-700;
    }
    .item-list {
        @apply flex items-center mb-1 p-2 rounded-md;
    }
    .attribute-list {
        @apply inline-flex items-center justify-center w-3 h-3 px-5 py-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-lg;
    }
}
</style>
