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
                    <form @submit.prevent="updateUser">
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
                            <select
                                class="form-input"
                                v-model="dataUser.isAdmin"
                            >
                                <option value="0">tidak</option>
                                <option value="1">iya</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            simpan perubahan
                        </button>
                    </form>
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
                        @click="updateStatus"
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
                    <form @submit.prevent="updateEmail">
                        <div class="mb-3">
                            <span class="label">email</span>
                            <input
                                type="text"
                                class="form-input"
                                v-model="dataUser.email"
                            />
                        </div>
                        <button type="submit" class="btn btn-danger btn-block">
                            simpan perubahan
                        </button>
                    </form>
                </card>
                <card>
                    <namepage> password </namepage>
                    <div class="alert">
                        <pengingat> reset ulang password. </pengingat>
                    </div>
                    <button
                        @click="resetPassword"
                        class="btn btn-danger btn-block"
                    >
                        reset password
                    </button>
                </card>
            </div>
        </div>
        <card>
            <namepage>Hapus akun</namepage>
            <div class="alert">
                <pengingat>
                    akun yang terhapus tidak dapat dikembalikan seperti semula.
                </pengingat>
            </div>
            <button class="btn btn-danger btn-block" @click="deleteUser()">
                <div class="flex align-center justify-center">
                    <vue-feather type="trash-2"></vue-feather>
                    <span class="md:lg:text-base ml-2">Hapus</span>
                </div>
            </button>
        </card>
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
            urlApi: null,
        };
    },
    mounted() {
        this.getUser();
    },
    methods: {
        async getUser() {
            let url = this.$api.users + "/" + this.$route.params.id;
            let res = await axios.get(url);
            this.dataUser = res.data;
            this.urlApi = url;
        },
        async updateUser() {
            try {
                let res = await axios.put(this.urlApi, {
                    name: this.dataUser.name,
                    username: this.dataUser.username,
                    role: this.dataUser.role,
                    isAdmin: this.dataUser.isAdmin,
                });
                toast(res.data.msg);
                this.getUser();
            } catch (error) {
                toast(error.response.data.msg);
            }
        },
        async resetPassword() {
            console.log("reset password.");
        },
        async updateEmail() {
            try {
                await axios.put(this.urlApi, {
                    email: this.dataUser.email,
                });
                toast("email berhasil diupdate.");
            } catch (error) {
                toast(error.response.data.msg);
            }
        },
        async deleteUser() {
            let del = await hapus();
            if (del.isConfirmed) {
                Swal.fire("Deleted!", "data terhapus", "success");
            }
        },
        async updateStatus() {
            try {
                let res = await axios.get(
                    this.$api.users + "/status/" + this.$route.params.id
                );
                toast(res.data.msg);
                this.getUser();
            } catch (error) {
                toast(error.response.data.msg);
            }
        },

        async deleteUser() {
            let del = await hapus();
            if (del.isConfirmed) {
                try {
                    let res = await axios.delete(
                        this.$api.users + "/" + this.$route.params.id
                    );
                    Swal.fire("Deleted!", res.data.msg, "success");
                    this.$router.go(-1);
                } catch (error) {
                    toast(error.response.data.msg, "error");
                }
            }
        },
    },
};
</script>
<style lang=""></style>
