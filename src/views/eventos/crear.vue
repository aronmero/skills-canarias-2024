<script setup>
import { useUsuarioStore } from "@/stores/usuario";
import { ref, onMounted, computed } from "vue";

import crear from "@/components/crear/crearReserva.vue";
import { useRouter } from "vue-router";
const router = useRouter();
const store = useUsuarioStore();

const errorMsg = ref(null);
const tryCreateEvent = async (userData) => {
  if (userData.eventos_id && userData.salas_id && userData.fecha) {
    try {
      const options = {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "User-Agent": "insomnia/8.6.0",
          Accept: "application/json",
          Authorization: "Bearer " + store.data.token,
        },
        body: `{"eventos_id":"${userData.eventos_id}","salas_id":"${userData.salas_id}",
        "fecha":"${userData.fecha}","usuario_id":${store.data.id}}`,
      };

      const response = await fetch(
        "http://127.0.0.1:8000/api/eventos",
        options
      );
      const data = await response.json();

      console.log(data);

      if (data.status) {
        errorMsg.value = "";
         router.push(`/eventos/${data.message}`);
      } else {
        errorMsg.value = data.message;
      }
    } catch (error) {
      errorMsg.value = "Error";
    }
  }
};

import { redirectLogin } from "@/utils/utils";
redirectLogin();
</script>

<template>
  <div class="flex flex-col items-center gap-10">
    <h1 class="text-3xl font-bold underline z-10">Crear Evento</h1>
    <div class="login">
      <crear @submit="tryCreateEvent" :error="errorMsg" />
    </div>
  </div>
</template>
<style scoped>
.login {
  display: flex;
  height: 100vh;
  flex-direction: column;
  align-items: center;
}
</style>
