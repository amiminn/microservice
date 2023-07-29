import { createRouter, createWebHistory } from "vue-router";
import web from "./web.mjs";

let routes = [];
routes = web;

const router = createRouter({
    history: createWebHistory(import.meta.env.APP_URL),
    routes,
});

router.beforeEach((to, from, next) => {
    if (to.matched[0].meta.auth) {
        if (isAuth) {
            next();
        } else {
            next({ name: "login" });
        }
    } else {
        if (!isAuth) {
            next();
        } else {
            next({ name: "dashboard" });
        }
    }
});

export default router;
