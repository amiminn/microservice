<template lang="">
    <card>
        <namepage>VueX</namepage>
        count: {{ $store.getters.getCount }}
        <br />
        gettersCount: {{ $store.getters.stopState }}
        <div class="flex">
            <button @click="decrement" class="btn">-</button>
            <button @click="increment" class="btn">+</button>
        </div>
        <button @click="settime" class="mt-4 btn">setTime</button>
    </card>
</template>
<script>
export default {
    methods: {
        increment() {
            this.$store.commit("increment");
        },
        decrement() {
            this.$store.commit("decrement");
        },
        settime() {
            setTimeout(() => {
                console.log("ok");
            }, 5000);
        },
    },
};
</script>
<style lang=""></style>
