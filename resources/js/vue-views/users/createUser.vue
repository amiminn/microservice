<template lang="">
    <div>
        <kembali></kembali>
        <card>
            <namepage>Tambah User Baru</namepage>
        </card>
        <card>
            <div class="alert">
                <pengingat> Harap ingat selalu password. </pengingat>
            </div>
            <form @submit.prevent="createUser">
                <div class="grid md:lg:grid-cols-3 gap-3">
                    <span class="label">Name</span>
                    <input
                        type="text"
                        class="form-input col-span-2"
                        placeholder="Nama"
                        v-model="formUser.name"
                    />
                    <span class="label">Username</span>
                    <input
                        type="text"
                        class="form-input col-span-2"
                        placeholder="username"
                        v-model="formUser.username"
                    />
                    <span class="label">Email</span>
                    <input
                        type="text"
                        class="form-input col-span-2"
                        placeholder="***@mail.com"
                        v-model="formUser.email"
                    />
                    <span class="label">Aktif</span>
                    <select
                        class="form-input col-span-2"
                        v-model="formUser.isActive"
                    >
                        <option value="0">non-aktif</option>
                        <option selected value="1">aktif</option>
                    </select>
                    <span class="label">Role</span>
                    <select
                        class="form-input col-span-2"
                        v-model="formUser.role"
                    >
                        <option value="0">user</option>
                        <option selected value="1">admin</option>
                    </select>
                    <span class="label">Password</span>
                    <input
                        type="password"
                        class="form-input col-span-2"
                        placeholder="***"
                        v-model="formUser.password"
                    />
                    <span class="label">Konfirmasi Password</span>
                    <input
                        type="password"
                        class="form-input col-span-2"
                        placeholder="***"
                        v-model="formUser.password_confirmation"
                    />
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-3">
                    Simpan User
                </button>
            </form>
        </card>
    </div>
</template>
<script>
export default {
    data() {
        return {
            formUser: {
                name: null,
                username: null,
                email: null,
                role: null,
                isActive: null,
                password: null,
                password_confirmation: null,
            },
        };
    },

    methods: {
        async createUser() {
            try {
                let res = await axios.post(this.$api.users, this.formUser);
                toast(res.data.msg);
            } catch (error) {
                toast(error.response.data.msg, "error");
            }
        },
    },
};
</script>
<style lang=""></style>
