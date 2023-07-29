<template lang="">
    <div>
        <card>
            <namepage>Vue-X</namepage>
        </card>
        <c-p></c-p>
        <c-r></c-r>
        <v-x></v-x>
    </div>
</template>
<script>
import CP from "./cookies.vue";
import CR from "./crypto.vue";
import VX from "./vue-x.vue";
export default {
    components: { CP, CR, VX },
};
</script>
<style lang=""></style>
