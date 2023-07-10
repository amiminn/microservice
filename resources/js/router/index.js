import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        name: "home",
        component: () => import("../vue-views/dashboard/dashboard.vue"),
    },
    {
        path: "/login",
        name: "login",
        component: () => import("../vue-views/login.vue"),
    },
    {
        path: "/about",
        name: "about",
        component: () => import("../vue-views/about.vue"),
    },
    {
        path: "/profile",
        name: "profile",
        component: () => import("../vue-views/profile/profile.vue"),
    },
    {
        path: "/client",
        name: "client",
        component: () => import("../vue-views/client/client.vue"),
    },
    {
        path: "/basic-vue",
        name: "basic-vue",
        component: () => import("../vue-views/vue/learnvue.vue"),
    },
    {
        path: "/kesehatan",
        name: "kesehatan",
        component: () => import("../vue-views/kesehatan/kesehatan.vue"),
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

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes,
});

router.beforeEach((to, from, next) => {
    if (to.name !== "login" && !isAuth) next({ name: "login" });
    if (to.name === "login" && isAuth) next({ name: "home" });
    else next();
});

export default router;
