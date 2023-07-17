<template>
    <div>
        <button class="!py-1 btn btn-sky flex items-center" @click="kembali">
            <vue-feather type="chevron-left"></vue-feather>
            <span>back</span>
        </button>
    </div>
</template>
<script>
export default {
    methods: {
        kembali() {
            this.$router.go(-1);
        },
    },
    components: {},
};
</script>
