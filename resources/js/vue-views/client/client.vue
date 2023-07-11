<template lang="">
    <card>
        <namepage>Client-Sercret {{ $route.params.id }} - {{ id }}</namepage>
    </card>
</template>
<script>
export default {
    props: ["id"],
};
</script>
<style lang=""></style>
