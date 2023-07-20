import { createStore } from "vuex";
import settings from "./settings.js";
const store = createStore({
    modules: {
        settings,
    },
});

export default store;
