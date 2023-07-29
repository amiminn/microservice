<template lang="">
    <card>
        <namepage>Cookies</namepage>
        data: {{ dataCookie }}
        <div class="flex mt-2">
            <button class="btn btn-primary" @click="save">set</button>
            <button class="btn btn-success" @click="getCookie">get</button>
            <button class="btn btn-danger" @click="hapusCookie">hapus</button>
            <button class="btn btn-sky" @click="consoleJson">
                console json
            </button>
        </div>
    </card>
</template>
<script>
export default {
    data() {
        return {
            dataCookie: null,
        };
    },
    methods: {
        save() {
            jsc.set(
                "namespace",
                JSON.stringify({
                    name: "ilham",
                    umur: 15,
                })
            );
            this.getCookie();
        },
        hapusCookie() {
            jsc.remove("namespace");
            this.getCookie();
        },
        getCookie() {
            try {
                this.dataCookie = jsc.get("namespace");
            } catch (error) {}
        },
        consoleJson() {
            try {
                console.log(JSON.parse(this.dataCookie));
            } catch (error) {}
        },
    },
};
</script>
<style lang=""></style>
