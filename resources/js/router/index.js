import { createRouter, createWebHistory } from "vue-router";
import Home from "../vue-views/index.vue";
import About from "../vue-views/about.vue";
import Profile from "../vue-views/profile/profile.vue";
import Basic from "../vue-views/basic/basic.vue";

const routes = [
    {
        path: "/",
        name: "home",
        component: Home,
    },
    {
        path: "/about",
        name: "about",
        component: About,
    },
    {
        path: "/profile",
        name: "profile",
        component: Profile,
    },
    {
        path: "/basic-vue",
        name: "basicvue",
        component: Basic,
    },
    {
        path: "/hell",
        name: "dashboard",
        children: [],
    },
];

export default createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes,
});
