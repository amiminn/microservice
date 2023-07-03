import "./bootstrap";
import { createApp } from "vue/dist/vue.esm-bundler.js";
import router from "./router";
const app = createApp({
    components: {},
});

app.use(router);
app.mount("#app");

app.config.globalProperties.$filters = {
    currencyUSD(value) {
        return "$ " + value;
    },
    currencyIDR(value) {
        return "IDR " + value;
    },
};
