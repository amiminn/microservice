<template lang="">
    <div>
        <li v-for="page in pages">
            <router-link :to="page.path" class="item-list">
                <vue-feather :type="page.logo"></vue-feather>
                <span class="flex-1 ml-3 whitespace-nowrap">
                    {{ page.name }}
                </span>

                <span v-if="page.sp" class="attribute-list">
                    {{ page.sp }}
                </span>
            </router-link>
        </li>
    </div>
</template>
<script>
import side from "./side-bar.json";
export default {
    data() {
        return {
            pages: side,
        };
    },
};
</script>
<style>
@tailwind components;
@layer components {
    .router-link-active,
    .router-link-exact-active {
        @apply !text-rose-800 !bg-gray-50;
    }
    .item-list {
        @apply flex items-center mb-1 p-2 text-gray-500 rounded-lg hover:bg-gray-100;
    }
    .attribute-list {
        @apply inline-flex items-center justify-center w-3 h-3 px-5 py-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-lg;
    }
}
</style>
