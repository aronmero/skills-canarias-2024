<script setup>
import { ref, onMounted, computed } from "vue";
import sala from "@/components/sala.vue";
const options = {
  method: "GET",
  headers: { "User-Agent": "insomnia/8.6.0", Accept: "application/json" },
};

const salas = ref([]);
onMounted(async () => {
  fetch("http://127.0.0.1:8000/api/salas/", options)
    .then((response) => response.json())
    .then((response) => {
      salas.value = response.message;
    })
    .catch((err) => console.error(err));
});
</script>

<template>
  <div class="flex flex-col items-center">
    <h1 class="text-3xl font-bold underline z-10">Salas</h1>

    <div class="salas">
      <router-link v-for="sala in salas" :to="'salas/' + sala.id" class="salas">
        <sala
          :nombre="sala.nombre"
          :aforo="sala.aforo"
          :minimo="sala.minimo"
        ></sala
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
