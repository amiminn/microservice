<template lang="">
    <card>
        <namepage>Client-Sercret</namepage>
        <router-link to="/create-client" class="btn btn-primary btn-block">
            new client-secret
        </router-link>
    </card>
    <card>
        <div @click="ke">ke</div>
        <ul>
            <li v-for="item in dataClient.data">{{ item.name }}</li>
        </ul>
        <paginate
            :limit="1"
            :data="dataClient"
            @pagination-change-page="getResult"
        ></paginate>
    </card>
</template>
<script>
import paginate from "../../components/datatable/TailwindPagination.vue";
export default {
    components: { paginate },
    data() {
        return {
            dataClient: [],
            queryUrlIfExist: "",
        };
    },

    mounted() {
        this.getClient();
    },

    methods: {
        async getClient(page = this.$router.currentRoute.value.query.page) {
            try {
                let res = await axios.get(this.$api.client + "?page=" + page);
                this.dataClient = res.data;
            } catch (error) {}
        },

        loadPage(page) {
            this.$router.push({
                path: this.$router.currentRoute.value.fullPath,
                query: { page },
            });

            this.getClient(page);
        },

        getResult(page) {
            this.loadPage(page);
        },

        ke() {
            // console.log(this.$api.client);
            // console.log(this.$router.currentRoute.value.fullPath);
            console.log(this.$router.currentRoute.value.query);
            // this.$router.push({ path: "/", query: { page: "private" } }); /?page=private
        },
    },
};
</script>
<style lang=""></style>
