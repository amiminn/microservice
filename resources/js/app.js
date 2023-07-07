import "./bootstrap";
import VueFeather from "vue-feather";
import { createApp } from "vue/dist/vue.esm-bundler.js";
import router from "./router";
import SideBar from "./vue-views/components/side-bar.vue";
const app = createApp({
    components: {
        SideBar,
    },
});

app.component(VueFeather.name, VueFeather);

app.use(router);
app.mount("#app");

app.config.globalProperties.$filters = {
    currencyUSD(value) {
        return "$ " + value;
    },
    currencyIDR(value) {
        return "IDR " + value;
    },
    status(data = null) {
        if (data == 1) return "Aktif";
        if (data == 0) return "Nonaktif";
    },
};

// variable
app.config.globalProperties.$var = "ini variable global";
