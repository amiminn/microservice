import { createRouter, createWebHistory } from "vue-router";
import auth from "./auth.mjs";
// import nonAuth from "./non-auth.mjs";
let routes = [];

routes = auth;

const router = createRouter({
    history: createWebHistory(import.meta.env.APP_URL),
    routes,
});

router.beforeEach((to, from, next) => {
    // let nonAuth = ["login", "home"];
    // nonAuth.map((d) => {
    // });

    // const publicPages = ["/login", "/register", "/"];
    // const authRequired = !publicPages.includes(to.path);
    // const loggedIn = localStorage.getItem("_X");

    // console.log(authRequired);
    // trying to access a restricted page + not logged in
    // redirect to login page
    // if (authRequired && !loggedIn) {
    //     next({ name: "login" });
    // } else next();

    if (to.name !== "login" && !isAuth) next({ name: "login" });
    if (to.name === "login" && isAuth) next({ name: "dashboard" });
    else next();
});

export default router;
