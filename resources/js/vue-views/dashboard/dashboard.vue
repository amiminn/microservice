<template lang="">
    <div>
        <card>
            <namepage>Dahsboard</namepage>
            {{ this.$store.state.settings.count }}
            <button @click="console.log(this.$store)" class="btn btn-danger">
                +
            </button>
        </card>
        <div class="grid grid-cols-2 md:lg:grid-cols-4 gap-3">
            <card>2 total user</card>
            <card>6 total client-key</card>
            <card>surprize</card>
            <card>19:20 wib</card>
        </div>
        <div class="grid md:lg:grid-cols-2 gap-3">
            <card>chart A</card>
            <card>paay chart B</card>
        </div>
    </div>
</template>
<script>
export default {};
</script>
<style lang=""></style>
