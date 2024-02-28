<script setup>
import { useUsuarioStore } from "@/stores/usuario";
import { ref, onMounted, computed } from "vue";
import evento from "@/components/reserva.vue";
const store = useUsuarioStore();
const options = {
  method: "GET",
  headers: {
    "User-Agent": "insomnia/8.6.0",
    Accept: "application/json",
    Authorization: "Bearer " + store.data.token,
  },
};
const error = ref("");
const salas = ref([]);
onMounted(async () => {
  fetch(`http://127.0.0.1:8000/api/reservas/user/${store.data.id}`, options)
    .then((response) => response.json())
    .then((response) => {
      if (response.status &&response.message.length>0) {
        salas.value = response.message;
      }else{
        error.value=response.message;
      }
    })
    .catch((err) => console.error(err));
});
import { redirectLogin } from "@/utils/utils";
redirectLogin();
</script>

<template>
  <div class="flex flex-col items-center">
    <h1 class="text-3xl font-bold underline z-10">Reservas</h1>
   
    <div class="salas">
      <template v-if="salas.length > 0">
        <router-link v-for="sala in salas" :to="'reservas/' + sala.id" class="salas">
          <evento :evento="sala.evento" :sala="sala.sala" :fecha="sala.fecha"></evento>
        </router-link>
      </template>
      <template v-else>{{error}}</template>
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
