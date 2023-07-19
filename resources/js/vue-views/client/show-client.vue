<template lang="">
    <div>
        <kembali></kembali>
        <card>
            <namepage>show client-key - si {{ dataClient.name }}</namepage>
        </card>
        <card>
            <namepage>
                update client-name
                <div class="alert">
                    <pengingat
                        >Merubah Nama client tidak akan merubah data
                        key</pengingat
                    >
                </div>

                <form @submit.prevent="updateClient">
                    <div class="mb-3 grid md:lg:grid-cols-3 gap-3">
                        <span class="label">nama client-key</span>
                        <input
                            type="text"
                            class="form-input col-span-2"
                            placeholder="name client-key"
                            v-model="dataClient.name"
                        />
                    </div>

                    <button type="submit" class="btn btn-sky btn-block">
                        update name client-key
                    </button>
                </form>
            </namepage>
        </card>
        <card>
            <namepage>client-key</namepage>
            <div class="alert">
                <pengingat
                    >Mereset client-secret tidak akan merubah client-id
                    <span class="italic"
                        >(hanya mengenerate client-id)</span
                    ></pengingat
                >
            </div>
            <form @submit.prevent="resetClient">
                <div class="mb-3 grid md:lg:grid-cols-3 gap-3">
                    <span class="label">client-id</span>
                    <input
                        type="text"
                        readonly
                        class="form-input col-span-2"
                        v-model="dataClient.client_id"
                    />
                    <span class="label">client-secret</span>
                    <input
                        type="text"
                        readonly
                        class="form-input col-span-2"
                        v-model="dataClient.client_secret"
                    />
                </div>
                <button class="btn btn-danger btn-block">
                    reset client-secret
                </button>
            </form>
        </card>
    </div>
</template>
<script>
export default {
    data() {
        return {
            dataClient: {},
        };
    },
    mounted() {
        this.getClient();
    },
    methods: {
        async updateClient() {},
        async getClient() {
            let url = this.$api.client + "/" + this.$route.params.key;
            let res = await axios.get(url);
            this.dataClient = res.data;
        },
        async resetClient() {},
    },
};
</script>
<style lang=""></style>
