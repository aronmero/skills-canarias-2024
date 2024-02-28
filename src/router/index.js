import { createRouter, createWebHistory } from "vue-router";

/**
 * Definición de las rutas del enrutador.
 */
const routes = [
  {
    path: "/",
    component: () => import("@/views/login.vue"),
  },
  {
    path: "/salas",
    component: () => import("@/views/salas.vue"),
  },
  { path: "/eventos", component: () => import("@/views/eventos.vue") },
  {
    path: "/reservas",
    component: () => import("@/views/reservas.vue"),
  },
];

/**
 * Crea y configura un enrutador utilizando las rutas definidas.
 */
const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
