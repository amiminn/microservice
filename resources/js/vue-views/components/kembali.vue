<template>
    <div>
        <button class="btn btn-sm" @click="kembali">
            <i class="fa fa-chevron-left" aria-hidden="true"></i>
            Kembali
        </button>
    </div>
</template>
<script>
export default {
    data() {
        return {};
    },
    mounted() {},
    methods: {
        kembali() {
            this.$router.go(-1);
        },
    },
    components: {},
};
</script>
