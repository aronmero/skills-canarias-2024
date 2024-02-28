<script setup></script>
<template>
  <header>
    <div class="enlaces">
      <router-link to="/salas" class="link">Salas </router-link>
      <router-link to="/reservas" class="link">Reservas </router-link>
      <router-link to="/eventos" class="link">Eventos </router-link>
      <router-link to="/" class="link">Logout </router-link>
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
