<script setup>
import { useUsuarioStore } from "@/stores/usuario";
const store = useUsuarioStore();
</script>

<template>
  <header>
    <div class="enlaces">
      <router-link to="/" class="link">Salas </router-link>
      <router-link v-if="store.isActivo" to="/reservas" class="link">Reservas </router-link>
      <router-link v-if="store.isActivo" to="/eventos" class="link">Eventos </router-link>
      <router-link v-if="!store.isActivo" to="/login" class="link">Iniciar sesion </router-link>
      <router-link v-if="!store.isActivo" to="/registro" class="link">Registro</router-link>
    </div>
  </header>
</template>
<style scoped>
header {
  display: flex;
  padding: 15px;
  height: 50px;
  width: -webkit-fill-available;
  justify-content: flex-end;
}
.enlaces {
  gap: 15px;
  display: flex;
  flex-direction: row;
}
</style>
