export default [
    {
        path: "/",
        name: "home",
        component: () => import("../vue-views/index.vue"),
    },
    {
        path: "/dashboard",
        name: "dashboard",
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
        path: "/client-key/:key",
        name: "show-client",
        component: () => import("../vue-views/client/show-client.vue"),
        props: true,
    },
    {
        path: "/create-client",
        name: "new client",
        component: () => import("../vue-views/client/create-client.vue"),
    },
    {
        path: "/tailwind",
        name: "tailwind-component",
        component: () => import("../vue-views/tailwind/index.vue"),
    },
    {
        path: "/kelola-user",
        name: "users",
        component: () => import("../vue-views/users/index.vue"),
    },
    {
        path: "/kelola-user/:id",
        name: "show-users",
        component: () => import("../vue-views/users/showUser.vue"),
    },
    {
        path: "/tambah-user",
        name: "add-users",
        component: () => import("../vue-views/users/createUser.vue"),
    },
    {
        path: "/:catchAll(.*)",
        name: "404 - not found",
        component: () => import("../components/404.vue"),
    },
];
