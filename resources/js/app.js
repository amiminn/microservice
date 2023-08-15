import "./bootstrap";
import VueFeather from "vue-feather";
import { createApp } from "vue/dist/vue.esm-bundler.js";
import router from "./router/index.mjs";
import store from "./core/index.js";
import platform from "./components/inc/title.vue";
import Card from "./components/inc/card.vue";
import Namepage from "./components/inc/namepage.vue";
import Pengingat from "./components/inc/pengingat.vue";
import Kembali from "./components/inc/kembali.vue";
import MainApp from "./vue-views/app.vue";
import VT from "./components/inc/transition.vue";
import DCard from "./components/inc/dcard.vue";

const app = createApp(MainApp);

app.component(VueFeather.name, VueFeather);
app.component("card", Card);
app.component("dcard", DCard);
app.component("platform", platform);
app.component("namepage", Namepage);
app.component("pengingat", Pengingat);
app.component("kembali", Kembali);
app.component("VTransition", VT);

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
    role(data = null) {
        if (data == 1) return "Admin";
        if (data == 0) return "User";
    },
};

app.config.globalProperties.$theme = {
    dark: "text-gray-50 bg-gray-900 hover:bg-gray-700 hover:text-gray-50",
};

app.config.globalProperties.$api = {
    client: "/api/client",
    users: "/api/users",
    setting: "/api/setting",
};

app.mount("#app");
