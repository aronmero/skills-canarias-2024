import { createRouter, createWebHistory } from "vue-router";

/**
 * Definición de las rutas del enrutador.
 */
const routes = [
  { path: "/", component: () => import("@/views/login.vue"),
  path: "/salas", component: () => import("@/views/login.vue"),
  path: "/eventos", component: () => import("@/views/login.vue"),
  path: "/reservas", component: () => import("@/views/login.vue") }
];

/**
 * Crea y configura un enrutador utilizando las rutas definidas.
 */
const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
