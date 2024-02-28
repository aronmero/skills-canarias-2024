<script setup>
import { ref, onMounted, computed } from "vue";
import evento from "@/components/reserva.vue";
const options = {
  method: 'GET',
  headers: {
    'User-Agent': 'insomnia/8.6.0',
    Accept: 'application/json',
    Authorization: 'Bearer 1|GRe8DKdTmf1CPIvC0NU0uNAzJVCfcnYUXuQD18oP08835d5e'
  }
};

const salas = ref([]);
onMounted(async () => {
  fetch("http://127.0.0.1:8000/api/reservas/", options)
    .then((response) => response.json())
    .then((response) => {
      salas.value = response.message;
      console.log(salas.value);
    })
    .catch((err) => console.error(err));
});
</script>

<template>
  <div class="flex flex-col items-center">
    <h1 class=" text-3xl font-bold underline z-10">Reservas</h1>

    <div class="salas">
      <router-link v-for="sala in salas" :to="'reservas/' + sala.id" class="salas">
        <evento
          :evento="sala.evento"
          :sala="sala.sala"
          :fecha="sala.fecha"
        ></evento
      ></router-link>
    </div>
  </div>
</template>

<style scoped>
.salas {
  display: flex;
  flex-wrap: wrap;
  flex-direction: row;
  justify-content: center;
}
</style>
