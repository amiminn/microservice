<template lang="">
    <div>
        <kembali></kembali>
        <card>
            <namepage>Show User - {{ dataUser.name }}</namepage>
        </card>
        <div class="grid md:lg:grid-cols-2 gap-3">
            <div>
                <card> avatar </card>
                <card>
                    <namepage>profile si {{ dataUser.name }}</namepage>
                    <div class="alert">
                        <pengingat>
                            data username sangat sensitive bagi user
                            bersangkutan, harap tidak sembarang merubah data.
                        </pengingat>
                    </div>
                    <div class="mb-3">
                        <span class="label">nama</span>
                        <input
                            type="text"
                            class="form-input"
                            placeholder="nama"
                            v-model="dataUser.name"
                        />
                    </div>
                    <div class="mb-3">
                        <span class="label">username</span>
                        <input
                            type="text"
                            class="form-input"
                            placeholder="username"
                            v-model="dataUser.username"
                        />
                    </div>
                    <div class="mb-3">
                        <span class="label">role?</span>
                        <select class="form-input" v-model="dataUser.role">
                            <option value="0">user</option>
                            <option value="1">admin</option>
                        </select>
                    </div>
                    <div class="mb-3" v-if="dataUser.role == 1">
                        <span class="label">super admin?</span>
                        <select class="form-input" v-model="dataUser.isAdmin">
                            <option value="0">tidak</option>
                            <option value="1">iya</option>
                        </select>
                    </div>
                    <button class="btn btn-primary btn-block">
                        simpan perubahan
                    </button>
                </card>
            </div>

            <div>
                <card>
                    <namepage
                        >status
                        <span
                            class="text-sm"
                            :class="
                                dataUser.isActive
                                    ? 'text-emerald-800'
                                    : 'text-rose-800'
                            "
                            >({{
                                this.$filters.status(dataUser.isActive)
                            }})</span
                        >
                    </namepage>
                    <div class="alert">
                        <pengingat>
                            jika status user non-aktif, user tersebut tidak
                            dapat login.
                        </pengingat>
                    </div>
                    <button
                        :class="
                            dataUser.isActive ? 'btn-success' : 'btn-danger'
                        "
                        class="btn btn-block"
                    >
                        {{ dataUser.isActive ? "de-aktifkan" : "aktifkan" }}
                    </button>
                </card>
                <card>
                    <namepage> email </namepage>
                    <div class="alert">
                        <pengingat>
                            email dapat digunakan untuk mereset ulang password,
                            harap diperhatikan dengan teliti.
                        </pengingat>
                    </div>
                    <div class="mb-3">
                        <span class="label">email</span>
                        <input
                            type="text"
                            class="form-input"
                            v-model="dataUser.email"
                        />
                    </div>
                    <button class="btn btn-danger btn-block">
                        simpan perubahan
                    </button>
                </card>
                <card>
                    <namepage> password </namepage>
                    <div class="alert">
                        <pengingat> reset ulang password. </pengingat>
                    </div>
                    <button class="btn btn-danger btn-block">
                        reset password
                    </button>
                </card>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            dataUser: {
                name: null,
                username: null,
                email: null,
                role: null,
                isActive: null,
                isAdmin: null,
            },
        };
    },
    mounted() {
        this.getUser();
    },
    methods: {
        async updateUser() {},
        async getUser() {
            let url = this.$api.users + "/" + this.$route.params.id;
            let res = await axios.get(url);
            this.dataUser = res.data;
            console.log(res);
        },
        async resetUser() {},
    },
};
</script>
<style lang=""></style>
