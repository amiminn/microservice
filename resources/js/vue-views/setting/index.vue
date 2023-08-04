<template lang="">
    <div>
        <card>
            <namepage>Setting</namepage>
        </card>
        <div class="grid md:lg:grid-cols-2 gap-3">
            <card>
                <form @submit.prevent="updateSetting">
                    <div class="mb-3">
                        <label class="label">Nama App</label>
                        <input
                            type="text"
                            placeholder="nama app"
                            class="form-input"
                            v-model="app.nama_app"
                        />
                    </div>
                    <div class="mb-3">
                        <label class="label">Email Owner</label>
                        <input
                            type="text"
                            placeholder="nama app"
                            class="form-input"
                            v-model="app.email"
                        />
                    </div>
                    <button type="submit" class="btn btn-danger btn-block">
                        Update
                    </button>
                </form>
            </card>
            <card>
                <div class="alert">
                    <pengingat> ip host wifi </pengingat>
                </div>
                <form @submit.prevent="updateIp">
                    <div class="mb-3">
                        <label class="label">ip host</label>
                        <input
                            type="text"
                            placeholder="ip host"
                            class="form-input"
                            v-model="app.ip"
                        />
                    </div>
                    <button type="submit" class="btn btn-sky btn-block">
                        Update
                    </button>
                </form>
            </card>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            app: {},
        };
    },
    methods: {
        async getSetting() {
            let res = await axios.get(this.$api.setting);
            this.app = res.data;
        },
        async updateSetting() {
            try {
                let res = await axios.post(this.$api.setting, this.app);
                this.getSetting();
                toast(res.data.msg);
            } catch (error) {}
        },
        async updateIp() {},
    },
    mounted() {
        this.getSetting();
    },
};
</script>
<style lang=""></style>
