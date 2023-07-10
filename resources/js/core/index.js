import { createStore } from "vuex";
const store = createStore({
    state() {
        return {
            count: 0,
            isAuth: false,
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
