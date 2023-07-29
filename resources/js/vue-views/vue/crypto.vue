<template lang="">
    <card>
        <namepage>Encrypt</namepage>
        target : {{ dataTarget }}
        <div class="flex my-3">
            <button class="btn btn-danger" @click="enkripsi">encrypt</button>
            <button class="btn btn-primary" @click="dekripsi">decrypt</button>
        </div>
        <div class="grid gap-3">
            <div>encrypt: {{ showEncrypt }}</div>
            <div>decrypt: {{ showDecrypt }}</div>
        </div>
    </card>
</template>
<script>
export default {
    data() {
        return {
            dataTarget: {
                name: "ilhamGod",
                kelas: 5,
            },
            showEncrypt: null,
            showDecrypt: null,
        };
    },
    methods: {
        enkripsi() {
            this.showEncrypt = encryptData(JSON.stringify(this.dataTarget));
        },
        dekripsi() {
            this.showDecrypt = decryptData(this.showEncrypt);
        },
    },
};
</script>
<style lang=""></style>
