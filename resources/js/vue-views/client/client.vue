<template lang="">
    <card>
        <namepage>Client-Sercret</namepage>
        <router-link to="/create-client" class="btn btn-primary btn-block">
            new client-secret
        </router-link>
    </card>
    <card>
        <div class="table-container">
            <table class="table">
                <thead class="thead">
                    <tr>
                        <th class="th">#</th>
                        <th class="th">Name</th>
                        <th class="th">Clien-ID</th>
                        <th class="th">status</th>
                        <th class="th">action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="bg-white border-b"
                        v-for="(data, id) in dataClient.data"
                    >
                        <th class="th">{{ id + 1 }}</th>
                        <th class="td">{{ data.name }}</th>
                        <td class="td">{{ data.client_id }}</td>
                        <td class="td">
                            {{ this.$filters.status(data.status) }}
                        </td>
                        <td class="td">
                            <router-link :to="`/client-key/` + data.client_id"
                                >view</router-link
                            >
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-4 text-right">
            <paginate
                :limit="1"
                :data="dataClient"
                @pagination-change-page="getResult"
            ></paginate>
        </div>
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
