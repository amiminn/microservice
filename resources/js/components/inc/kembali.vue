<template>
    <div>
        <button class="italic text-sm flex items-center" @click="kembali">
            <vue-feather type="chevron-left"></vue-feather>
            <span>kembali</span>
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
