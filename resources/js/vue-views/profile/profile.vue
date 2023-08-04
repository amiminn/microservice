<template lang="">
    <div>
        <div class="card">
            <div class="card-body">
                <namepage>Profile</namepage>
            </div>
        </div>
        <div class="grid grid-cols-1 md:lg:grid-cols-2 gap-3">
            <card class="col-auto">
                <namepage class="text-lg"> avatar </namepage>
                <div class="flex justify-center">
                    <img
                        class="w-24 h-2w-24 rounded-full"
                        :src="preview"
                        alt="user photo"
                    />
                </div>
                <form @submit.prevent="updateProfile">
                    <div class="mb-3">
                        <label>pilih gambar</label>
                        <input
                            type="file"
                            class="form-file"
                            @input="modelAvatar"
                        />
                    </div>
                    <!-- <button type="submit" class="btn btn-block btn-primary">
                        update
                    </button> -->
                    <div class="alert">
                        <pengingat> fitur belum tersedia. </pengingat>
                    </div>
                </form>
            </card>
            <card class="col-auto">
                <namepage class="text-lg"> update profile </namepage>

                <form @submit.prevent="updateProfile">
                    <div class="mb-3">
                        <label>name</label>
                        <input
                            type="text"
                            class="form-input"
                            v-model="formUser.name"
                        />
                    </div>
                    <div class="mb-3">
                        <label>phone</label>
                        <input
                            type="text"
                            class="form-input"
                            v-model="formUser.phone"
                        />
                    </div>
                    <button type="submit" class="btn btn-block btn-primary">
                        update
                    </button>
                </form>
            </card>
            <!-- pass -->
            <updatePass />
            <!-- pass -->
            <!-- email -->
            <updateEmail />
            <!-- email -->
        </div>
    </div>
</template>
<script>
import updatePass from "./updatePass.vue";
import updateEmail from "./updateEmail.vue";
export default {
    components: { updatePass, updateEmail },
    data() {
        return {
            formUser: {},
            preview: null,
            avatar: null,
        };
    },
    methods: {
        async updateProfile() {
            try {
                let res = await axios.post("/api/update-profile", {
                    name: this.formUser.name,
                    phone: this.formUser.phone,
                });
                refreshUser();
                toast(res.data.msg);
            } catch (error) {
                toast(error.response.data.msg, "error");
            }
        },

        modelAvatar(event) {
            this.avatar = event.target.files[0];
            this.fileToDataUrl(event, (src) => (this.preview = src));
        },

        fileToDataUrl(event, callback) {
            if (!event.target.files.length) return;

            let file = event.target.files[0],
                reader = new FileReader();

            reader.readAsDataURL(file);
            reader.onload = (e) => callback(e.target.result);
        },
    },
    mounted() {
        this.formUser = user;
        this.preview = user.avatar ?? "default.jpg";
    },
};
</script>
<style lang=""></style>
