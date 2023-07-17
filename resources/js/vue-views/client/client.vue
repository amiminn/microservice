<template lang="">
    <card>
        <namepage>Client-Sercret</namepage>
        <router-link to="/create-client" class="btn btn-primary btn-block">
            new client-secret
        </router-link>
    </card>
    <card>table</card>
</template>
<script>
export default {
    components: {},
    data() {
        return {
            dataClient: [],
        };
    },

    mounted() {
        this.getClient();
    },

    methods: {
        async getClient() {
            try {
                let res = await axios.get("/api/secret/client");
                this.dataClient = res.data.data;
                console.log(res.data.data);
            } catch (error) {}
        },
    },
};
</script>
<style lang=""></style>
