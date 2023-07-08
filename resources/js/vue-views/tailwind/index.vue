<template lang="">
    <div>
        <badge></badge>
        <Button></Button>
        <form-input></form-input>
        <modal></modal>
    </div>
</template>
<script>
import Button from "./button.vue";
import FormInput from "./form.vue";
import Badge from "./badge.vue";
import Modal from "./modal.vue";
export default {
    components: {
        Button,
        FormInput,
        Badge,
        Modal,
    },
};
</script>
<style lang=""></style>
