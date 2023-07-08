import { createStore } from "vuex";
const store = createStore({
    state() {
        return {
            count: 0,
            app: {
                title: "microservice",
            },
        };
    },
    mutations: {
        increment(state) {
            state.count++;
        },
    },
});

export default store;
