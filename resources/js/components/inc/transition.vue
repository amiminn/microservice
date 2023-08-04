<template lang="">
    <Transition
        enter-active-class="animate__animated animate__zoomIn animate__faster"
        leave-active-class="animate__animated animate__zoomOut animate__faster"
    >
        <slot></slot>
        <!-- pass down slot content -->
    </Transition>
</template>
<script>
export default {};
</script>
<style lang=""></style>
