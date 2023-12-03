import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";
import Interface from "./components/Interface.vue";
import Router from "./components/Router.vue";
import ActiveUsers from "./components/ActiveUsers.vue";
import Error from "./components/Error.vue"

const routes = [
    {
        path: "/",
        redirect: { path: "/main" },
        component: Router,
    },
    {
        path: "/main",
        component: Interface,
    },
    {
        path: "/activeUsers",
        component: ActiveUsers,
    },
    {
        path: "/:pathMatch(.*)*",
        component: Error,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});


const app = createApp({});

app.component("router", Router).use(router);

app.mount("#app");
