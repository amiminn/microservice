<template lang="">
    <card class="col-auto">
        <namepage class="text-lg"> update password </namepage>
        <div class="mb-3">
            <div class="alert">
                <pengingat
                    >Harap untuk selalu mengingat sandi anda setelah
                    perubahan.</pengingat
                >
            </div>
        </div>
        <form @submit.prevent="updatePassword">
            <div class="mb-3">
                <label>password lama</label>
                <input
                    type="password"
                    class="form-input"
                    placeholder="***"
                    v-model="upPass.passLama"
                />
            </div>
            <div class="mb-3">
                <label>password baru</label>
                <input
                    type="password"
                    class="form-input"
                    placeholder="***"
                    v-model="upPass.passBaru"
                />
            </div>
            <div class="mb-3">
                <label>confirm password baru</label>
                <input
                    type="password"
                    class="form-input"
                    placeholder="***"
                    v-model="upPass.confirmPassBaru"
                />
            </div>
            <button type="submit" class="btn btn-block btn-danger mb-3">
                submit
            </button>
        </form>
    </card>
</template>
<script>
export default {
    data() {
        return {
            upPass: {
                passLama: null,
                passBaru: null,
                confirmPassBaru: null,
            },
        };
    },
    methods: {
        async updatePassword() {
            try {
                let res = await axios.post("/api/update-password", {
                    password_lama: this.upPass.passLama,
                    password: this.upPass.passBaru,
                    password_confirmation: this.upPass.confirmPassBaru,
                });
                toast(res.data.msg);
            } catch (error) {
                toast(error.response.data.msg, "error");
            }
        },
    },
};
</script>
<style lang=""></style>
