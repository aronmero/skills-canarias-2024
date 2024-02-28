<script setup>
import { RouterView } from "vue-router";
</script>

<template>
  <header>
    <div class="enlaces fixed top-0 ">
      <router-link to="/salas" class="link">salas </router-link>
      <router-link to="/reservas" class="link">reservas </router-link>
      <router-link to="/eventos" class="link">eventos </router-link>
    </div>
  </header>
  <RouterView></RouterView>
</template>

<style scoped></style>
