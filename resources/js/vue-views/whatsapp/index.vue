<template lang="">
    <div>
        <card>
            <namepage>WhatsApp api</namepage>
        </card>
        <div class="grid sm:lg:grid-cols-2 gap-3">
            <card>
                <namepage>Add number</namepage>
                <form @submit.prevent="" class="my-3">
                    <div class="mb-3">
                        <label>name-user</label>
                        <input type="text" class="form-input" />
                    </div>
                    <div class="mb-3">
                        <label>phone number</label>
                        <input type="text" class="form-input" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        submit
                    </button>
                </form>
            </card>
            <card>
                <namepage>check auth</namepage>
                <button
                    class="btn btn-danger btn-block my-3"
                    @click="checkAuth()"
                >
                    cek authentication
                </button>

                <button class="btn btn-sky btn-block my-3" @click="checkAuth()">
                    cek QR
                </button>
            </card>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {};
    },

    methods: {
        checkAuth() {
            Swal.fire({
                icon: "success",
                title: "Authenticed",
                text: "WhatsApp terhubung.",
            });
        },
    },

    mounted() {
        console.log("whats run");
    },
};
</script>
<style lang=""></style>
