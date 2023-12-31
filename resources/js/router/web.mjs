export default [
    {
        path: "/",
        name: "home",
        component: () => import("../vue-views/main/index.vue"),
        meta: { auth: false },
    },
    {
        path: "/login",
        name: "login",
        component: () => import("../vue-views/login.vue"),
        meta: { auth: false },
    },
    {
        path: "/dashboard",
        name: "dashboard",
        component: () => import("../vue-views/dashboard/dashboard.vue"),
        meta: { auth: true },
    },
    {
        path: "/profile",
        name: "profile",
        component: () => import("../vue-views/profile/profile.vue"),
        meta: { auth: true },
    },
    {
        path: "/setting",
        name: "setting",
        component: () => import("../vue-views/setting/index.vue"),
        meta: { auth: true },
    },
    {
        path: "/client",
        name: "client",
        component: () => import("../vue-views/client/client.vue"),
        meta: { auth: true },
        props: true,
    },
    {
        path: "/client-key/:key",
        name: "show-client",
        component: () => import("../vue-views/client/show-client.vue"),
        meta: { auth: true },
        props: true,
    },
    {
        path: "/create-client",
        name: "new client",
        component: () => import("../vue-views/client/create-client.vue"),
        meta: { auth: true },
    },
    {
        path: "/tailwind",
        name: "tailwind-component",
        meta: { auth: true },
        component: () => import("../vue-views/tailwind/index.vue"),
        meta: { auth: true },
    },
    {
        path: "/whatsapp-api",
        name: "whatsapp-api",
        meta: { auth: true },
        component: () => import("../vue-views/whatsapp/index.vue"),
        meta: { auth: true },
    },
    {
        path: "/kelola-user",
        name: "users",
        component: () => import("../vue-views/users/index.vue"),
        meta: { auth: true },
    },
    {
        path: "/kelola-user/:id",
        name: "show-users",
        component: () => import("../vue-views/users/showUser.vue"),
        meta: { auth: true },
    },
    {
        path: "/tambah-user",
        name: "add-users",
        component: () => import("../vue-views/users/createUser.vue"),
        meta: { auth: true },
    },
    {
        path: "/vue-x",
        name: "vue-x",
        component: () => import("../vue-views/vue/index.vue"),
        meta: { auth: true },
    },
    {
        path: "/:catchAll(.*)",
        name: "404 - not found",
        component: () => import("../components/404.vue"),
        meta: { auth: true },
    },
];
