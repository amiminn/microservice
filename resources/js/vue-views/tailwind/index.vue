<template lang="">
    <div>
        <badge></badge>
        <Button></Button>
        <form-input></form-input>
        <modal></modal>
        <toast></toast>
        <d-table></d-table>
    </div>
</template>
<script>
import Button from "./button.vue";
import FormInput from "./form.vue";
import Badge from "./badge.vue";
import Modal from "./modal.vue";
import DTable from "./table.vue";
import Toast from "./toast.vue";
export default {
    components: {
        Button,
        FormInput,
        Badge,
        Modal,
        DTable,
        Toast,
    },
};
</script>
<style lang=""></style>
