import { createRouter, createWebHistory } from "vue-router";
import Home from "../vue-views/index.vue";
import About from "../vue-views/about.vue";
import Profile from "../vue-views/profile/profile.vue";

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
        path: "/tailwind",
        name: "tailwind-component",
        component: () => import("../vue-views/tailwind/index.vue"),
    },
    {
        path: "/:catchAll(.*)",
        name: "404 - not found",
        component: () => import("../components/404.vue"),
    },
];

export default createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes,
});
