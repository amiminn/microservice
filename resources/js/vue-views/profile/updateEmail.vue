<template lang="">
    <card class="col-auto">
        <namepage class="text-lg">update email </namepage>
        <div class="mb-3">
            <div class="alert">
                <pengingat>
                    email berperan penting dalam mengatur akun anda. harap
                    hati-hati saat ada perubahan email.
                </pengingat>
            </div>
        </div>
        <form @submit.prevent="updateEmail">
            <div class="mb-3">
                <label>email</label>
                <input
                    type="email"
                    class="form-input"
                    v-model="formUser.email"
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
            formUser: {
                email: null,
            },
        };
    },
    mounted() {
        this.formUser = user;
    },
    methods: {
        async updateEmail() {
            try {
                let res = await axios.post("/api/update-email", {
                    email: this.formUser.email,
                });
                refreshUser();
                toast(res.data.msg);
            } catch (error) {
                toast(error.response.data.msg, "error");
            }
        },
    },
};
</script>
<style lang=""></style>
