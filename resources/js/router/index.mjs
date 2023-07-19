import { createRouter, createWebHistory } from "vue-router";
import auth from "./auth.mjs";
import nonAuth from "./non-auth.mjs";
let routes = [];

routes = auth;

const router = createRouter({
    history: createWebHistory(import.meta.env.APP_URL),
    routes,
});

router.beforeEach((to, from, next) => {
    if (to.name !== "login" && !isAuth) next({ name: "login" });
    if (to.name === "login" && isAuth) next({ name: "home" });
    else next();
});

export default router;
