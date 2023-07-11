import "./bootstrap";
import VueFeather from "vue-feather";
import { createApp } from "vue/dist/vue.esm-bundler.js";
import router from "./router";
import SideBar from "./components/side-bar.vue";
import store from "./core/index.js";
import platform from "./components/inc/title.vue";
import Card from "./components/inc/card.vue";
import Namepage from "./components/inc/namepage.vue";
const app = createApp({
    components: {
        SideBar,
        platform,
    },
});

app.component(VueFeather.name, VueFeather);
app.component("card", Card);
app.component("namepage", Namepage);

app.use(router);
app.use(store);

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

app.config.globalProperties.$var = "ini variable global";

app.mount("#app");
