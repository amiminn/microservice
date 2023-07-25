<template lang="">
    <div>
        <card>
            <div class="grid grid-cols-2">
                <namepage @click="getDataUser">Daftar User</namepage>
                <div class="text-right">
                    <router-link to="/tambah-user" class="btn btn-dark"
                        >add +</router-link
                    >
                </div>
            </div>
        </card>
        <card>
            <div class="table-container">
                <table class="table">
                    <thead class="thead">
                        <tr>
                            <th class="th">#</th>
                            <th class="th">Name</th>
                            <th class="th">Email</th>
                            <th class="th">Role</th>
                            <th class="th">Status</th>
                            <th class="th">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="tr" v-for="(data, idx) in dataUser.data">
                            <td class="td">{{ idx + 1 }}</td>
                            <th class="th">{{ data.name }}</th>
                            <td class="td">{{ data.email }}</td>
                            <td class="td">
                                {{ this.$filters.role(data.role) }}
                            </td>
                            <td class="td">
                                {{ this.$filters.status(data.isActive) }}
                            </td>
                            <td class="td">
                                <router-link :to="'/kelola-user/' + data.id">
                                    <vue-feather type="eye"></vue-feather>
                                </router-link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-4 text-right">
                <paginate
                    :limit="1"
                    :data="dataUser"
                    @pagination-change-page="getResult"
                ></paginate>
            </div>
        </card>
    </div>
</template>
<script>
import paginate from "../../components/datatable/TailwindPagination.vue";
export default {
    components: { paginate },
    data() {
        return {
            dataUser: [],
        };
    },
    mounted() {
        this.getDataUser();
    },
    methods: {
        async getDataUser(page = this.$router.currentRoute.value.query.page) {
            try {
                let res = await axios.get(this.$api.users + "?page=" + page);
                this.dataUser = res.data;
            } catch (error) {}
        },

        loadPage(page) {
            this.$router.push({
                path: this.$router.currentRoute.value.fullPath,
                query: { page },
            });

            this.getDataUser(page);
        },

        getResult(page) {
            this.loadPage(page);
        },
    },
};
</script>
<style lang=""></style>
