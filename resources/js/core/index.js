import { createStore } from "vuex";

const store = createStore({
    state() {
        return {
            count: 0,
        };
    },
    mutations: {
        increment(state) {
            state.count++;
        },
        decrement(state) {
            state.count--;
        },
        async login(state, form) {
            try {
                let res = await axios.post("login", form);
                toast("Login success.");
                jsc.set("_u", encryptData(JSON.stringify(res.data.user)), {
                    expires: 1,
                });
                jsc.set("_x", encryptData(JSON.stringify(res.data.token)), {
                    expires: 1,
                });
                window.location = "/dashboard";
            } catch (error) {
                toast(error.response.data.msg, "error");
            }
        },
        logout(state) {
            if (jsc.get("_x")) {
                jsc.remove("_x");
                jsc.remove("_u");
                window.location = "logout";
            } else {
            }
        },
    },
    getters: {
        getCount(state) {
            return state.count;
        },
        stopState(state, getter) {
            if (getter.getCount >= 10) {
                return 10;
            }
            return getter.getCount;
        },
    },
});

export default store;
