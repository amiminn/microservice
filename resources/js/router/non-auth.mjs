export default [
    {
        path: "/*",
        component: () => import("../components/404.vue"),
        name: "notfound",
    },
];
