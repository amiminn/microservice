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
                    />
                    <span class="label">Username</span>
                    <input
                        type="text"
                        class="form-input col-span-2"
                        placeholder="username"
                    />
                    <span class="label">Email</span>
                    <input
                        type="text"
                        class="form-input col-span-2"
                        placeholder="***@mail.com"
                    />
                    <span class="label">Aktif</span>
                    <select class="form-input col-span-2">
                        <option disabled selected></option>
                        <option value="1">aktif</option>
                        <option value="0">non-aktif</option>
                    </select>
                    <span class="label">Role</span>
                    <select class="form-input col-span-2">
                        <option disabled selected></option>
                        <option value="1">admin</option>
                        <option value="0">user</option>
                    </select>
                    <span class="label">Password</span>
                    <input
                        type="password"
                        class="form-input col-span-2"
                        placeholder="***"
                    />
                    <span class="label">Konfirmasi Password</span>
                    <input
                        type="password"
                        class="form-input col-span-2"
                        placeholder="***"
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
            formUser: {},
        };
    },

    methods: {
        async createUser() {},
    },
};
</script>
<style lang=""></style>
