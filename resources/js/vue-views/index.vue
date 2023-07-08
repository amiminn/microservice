<template lang="">
    <div>
        <div class="card">
            <div class="card-body">
                <h1>home {{ $var }}</h1>
                <p>{{ $filters.currencyIDR(2000) }}</p>
                {{ ex }}
                <br /><br />
                store: {{ this.$store.state.count }}
            </div>
        </div>
        <Child :message="ex" @clicked="onChild" @arg="nameHome" />
    </div>
</template>
<script>
import Child from "./child.vue";
export default {
    components: {
        Child,
    },
    data() {
        return {
            ex: "help",
        };
    },
    methods: {
        onChild(value) {
            this.ex = value;
        },
        nameHome(d) {
            this.ex = d;
        },
    },
};
</script>
