<template lang="">
    <div>
        <div v-if="afterAuth">
            <div>
                <HeaderPage />
                <side-bar></side-bar>
            </div>
            <div class="p-4 sm:ml-64 bg-gray-100 min-h-screen">
                <div class="mt-14">
                    <router-view />
                </div>
            </div>
        </div>
        <div v-if="!afterAuth">
            <router-view />
        </div>
    </div>
</template>
<script>
import HeaderPage from "../components/header.vue";
import SideBar from "../components/side-bar.vue";
export default {
    components: {
        HeaderPage,
        SideBar,
    },
    data() {
        return {
            afterAuth: null,
        };
    },
    mounted() {
        if (isAuth) {
            this.afterAuth = true;
        } else {
            this.afterAuth = false;
        }
    },
};
</script>
<style lang=""></style>
