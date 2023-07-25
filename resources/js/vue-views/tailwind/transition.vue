<template lang="">
    <div>
        <card>
            <namepage>Transition</namepage>
            <button @click="open = !open" class="btn btn-danger">toggle</button>
            <Transition>
                <card v-if="open">content</card>
            </Transition>
        </card>
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
        @apply transition scale-y-0;
    }

    .v-enter-from,
    .v-leave-to {
        /* @apply ease-out; */
    }
}
</style>
