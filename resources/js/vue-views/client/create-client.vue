<template lang="">
    <div>
        <card>
            <namepage>Create Client-Secret</namepage>
            <kembali></kembali>
        </card>
        <card>
            <namepage>New Client-secret</namepage>
            <form @submit.prevent="createClient">
                <div class="mb-3">
                    <label class="label">nama client-secret</label>
                    <input
                        type="text"
                        class="form-input"
                        placeholder="name client secret"
                        v-model="dataClient.name"
                    />
                </div>

                <button type="submit" class="btn btn-danger btn-block">
                    create
                </button>
            </form>
        </card>

        <card v-if="ready">
            <namepage>new client</namepage>
            <div class="grid grid-cols-1 md:lg:grid-cols-2 gap-2">
                <div class="mb-3">
                    <label class="label">name</label>
                    <input
                        type="text"
                        readonly
                        class="form-input"
                        v-model="newClient.name"
                    />
                </div>
                <div class="mb-3">
                    <label class="label">client-id</label>
                    <input
                        type="text"
                        readonly
                        class="form-input"
                        v-model="newClient.client_id"
                    />
                </div>
                <div class="mb-3 md:lg:col-span-2">
                    <label class="label">client-secret</label>
                    <input
                        type="text"
                        readonly
                        class="form-input"
                        v-model="newClient.client_secret"
                    />
                </div>
            </div>
        </card>
    </div>
</template>
<script>
export default {
    data() {
        return {
            dataClient: {
                name: null,
            },
            newClient: {
                client_id: null,
                client_secret: null,
                name: null,
            },
            ready: false,
        };
    },
    methods: {
        async createClient() {
            try {
                let res = await axios.post(
                    "/api/secret/client",
                    this.dataClient
                );
                this.newClient = res.data.data;
                toast(res.data.msg);
                this.ready = true;
            } catch (error) {
                toast(error.response.data.msg, "error");
            }
        },
    },
};
</script>
<style lang=""></style>
