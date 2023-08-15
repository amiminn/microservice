<template lang="">
    <card>
        <div class="flex items-center flex-wrap">
            <img
                :src="'/assets/icons/' + logo"
                width="37"
                class="mr-3"
                :alt="text"
            />
            <div class="text-lg font-bold text-gray-700">
                <span class="text-sky-950 text-xl">{{ value }}</span> {{ text }}
            </div>
        </div>
        <template v-if="url">
            <router-link
                :to="url"
                class="block text-center bg-blue-400 rounded mt-3 text-white py-1 hover:bg-rose-400 transition"
            >
                lihat
            </router-link>
        </template>
    </card>
</template>
<script>
export default {
    props: ["logo", "text", "value", "url"],
};
</script>
<style lang=""></style>
