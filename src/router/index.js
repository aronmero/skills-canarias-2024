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
  {
    path: "/salas/:id",
    component: () => import("@/views/sala.vue"),
  },
  { path: "/eventos", component: () => import("@/views/eventos.vue") },
  {
    path: "/eventos/:id",
    component: () => import("@/views/evento.vue"),
  },
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
