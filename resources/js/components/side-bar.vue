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
                    <li v-for="page in isUser">
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
                <div v-if="isRole">
                    <hr />
                    <ul class="space-y-2 font-medium">
                        <li v-for="page in isAdmin">
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
                </div>
            </div>
        </aside>
    </div>
</template>
<script>
import side from "./side-bar.json";
export default {
    data() {
        return {
            isUser: [],
            isAdmin: [],
            isRole: false,
        };
    },

    methods: {
        loadSideBar() {
            this.isAdmin = side
                .map((d) => {
                    if (d.isAdmin) {
                        return d;
                    }
                })
                .filter((d) => d);

            this.isUser = side
                .map((d) => {
                    if (!d.isAdmin) {
                        return d;
                    }
                })
                .filter((d) => d);
        },
    },

    mounted() {
        if (user.isAdmin) {
            this.isRole = true;
        }
        this.loadSideBar();
    },
};
</script>
<style>
@tailwind components;
@layer components {
    .router-link-active,
    .router-link-exact-active {
        @apply !text-gray-50 !bg-gray-700 border-l-4 border-white;
    }
    .item-list {
        @apply flex items-center mb-1 p-2 rounded;
    }
    .attribute-list {
        @apply inline-flex items-center justify-center w-3 h-3 px-5 py-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-lg;
    }
}
</style>
