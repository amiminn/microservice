<template lang="">
    <card>
        <div class="flex justify-between">
            <namepage>Client-Sercret</namepage>
            <div>
                <vue-feather
                    @click="menu = !menu"
                    :type="menu ? 'x' : 'align-right'"
                    class="cursor-pointer"
                ></vue-feather>
            </div>
        </div>
        <v-transition>
            <router-link
                v-if="menu"
                to="/create-client"
                class="btn btn-dark btn-block"
            >
                new client-secret
            </router-link>
        </v-transition>
    </card>
    <card>
        <div class="table-container">
            <table class="table">
                <thead class="thead">
                    <tr>
                        <th class="th">#</th>
                        <th class="th">Name</th>
                        <th class="th">Client-ID</th>
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
                        <td class="td select-all">{{ data.client_id }}</td>
                        <td class="td">
                            {{ this.$filters.status(data.status) }}
                        </td>
                        <td class="td flex gap-2">
                            <router-link :to="`/client-key/` + data.id">
                                <vue-feather type="eye"></vue-feather>
                            </router-link>
                            <div
                                class="cursor-pointer"
                                @click="deleteClient(data.id)"
                            >
                                <vue-feather type="trash-2"></vue-feather>
                            </div>
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
import axios from "axios";
import paginate from "../../components/datatable/TailwindPagination.vue";
export default {
    components: { paginate },
    data() {
        return {
            menu: false,
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

        async deleteClient(id) {
            let del = await hapus();
            if (del.isConfirmed) {
                try {
                    let res = await axios.delete(this.$api.client + "/" + id);
                    Swal.fire("Deleted!", res.data.msg, "success");
                    this.getClient();
                } catch (error) {
                    toast(error.response.data.msg, "error");
                }
            }
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
