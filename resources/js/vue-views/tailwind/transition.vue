<template lang="">
    <div>
        <card>
            <namepage>Transition</namepage>
            <button @click="open = !open" class="btn btn-danger">toggle</button>
        </card>
        <Transition
            enter-active-class="animate__animated animate__zoomIn animate__faster"
            leave-active-class="animate__animated animate__zoomOut animate__faster"
        >
            <card v-if="open">content</card>
        </Transition>
    </div>
</template>
<script>
export default {
    data() {
        return {
            open: true,
        };
    },
};
</script>
<style>
@tailwind components;
@layer components {
    .v-enter-active,
    .v-leave-active {
        /* @apply animate__animated animate__slideInDown; */
    }

    .v-enter-from,
    .v-leave-to {
        /* @apply animate__animated animate__slideOutDown; */
    }
}
</style>
