<template lang="">
    <card class="col-auto">
        <namepage class="text-lg"> update password </namepage>

        <form @submit.prevent="updatePassword">
            <div class="mb-3">
                <label>password lama</label>
                <input type="password" class="form-input" placeholder="***" />
            </div>
            <div class="mb-3">
                <label>password baru</label>
                <input type="password" class="form-input" placeholder="***" />
            </div>
            <div class="mb-3">
                <label>confirm password baru</label>
                <input type="password" class="form-input" placeholder="***" />
            </div>
            <div class="mb-3">
                <pengingat
                    >Harap untuk selalu mengingat sandi anda setelah
                    perubahan.</pengingat
                >
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
        updatePassword() {
            console.log("up pass");
        },
    },
};
</script>
<style lang=""></style>
