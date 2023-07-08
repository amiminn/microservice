<template lang="">
    <div>
        <div class="card">
            <div class="card-body">
                child {{ text }}
                <br />
                message: <span>{{ message }}</span>

                <br />
                <button @click="clicked()">v-on</button>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <input type="text" @input="getInput" class="form-input" />
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ["message"],
    data() {
        return {
            text: "",
        };
    },
    methods: {
        clicked() {
            this.$emit("clicked", "halo dek,.");
        },
        getInput(e) {
            this.$emit("arg", e.target.value);
        },
    },
};
</script>
<style lang=""></style>
