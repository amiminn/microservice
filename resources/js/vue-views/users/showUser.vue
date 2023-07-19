<template lang="">
    <div>
        <kembali></kembali>
        <card>
            <namepage>Show User - {{ dataUser.name }}</namepage>
        </card>
    </div>
</template>
<script>
export default {
    data() {
        return {
            dataUser: {},
        };
    },
    mounted() {
        this.getUser();
    },
    methods: {
        async updateUser() {},
        async getUser() {
            let url = this.$api.users + "/" + this.$route.params.id;
            let res = await axios.get(url);
            this.dataUser = res.data;
            console.log(res);
        },
        async resetUser() {},
    },
};
</script>
<style lang=""></style>
