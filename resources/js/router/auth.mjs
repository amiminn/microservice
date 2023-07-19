export default [
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
        path: "/profile",
        name: "profile",
        component: () => import("../vue-views/profile/profile.vue"),
    },
    {
        path: "/client",
        name: "client",
        component: () => import("../vue-views/client/client.vue"),
        props: true,
    },
    {
        path: "/create-client",
        name: "new client",
        component: () => import("../vue-views/client/create-client.vue"),
    },
    {
        path: "/basic-vue",
        name: "basic-vue",
        component: () => import("../vue-views/vue/learnvue.vue"),
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
