<script setup>
import { useUsuarioStore } from "@/stores/usuario";
import { useReservaStore } from "@/stores/reserva";
import { useRouter } from "vue-router";
const router = useRouter();
const store = useUsuarioStore();
const reservaStore = useReservaStore();
defineProps({
  nombre: String,
  comensales: String,
  fecha: String,
  id: Number,
});
const reserva = async () => {
  const options = {
  method: 'GET',
  headers: {
    'User-Agent': 'insomnia/8.6.0',
    Accept: 'application/json',
    Authorization: "Bearer " + store.data.token,
  }
};

fetch('http://127.0.0.1:8000/api/reservas/find/3', options)
  .then(response => response.json())
  .then(response => {
    if(response.status){
      router.push(`/reservas/${response.message[0].id}`);
    }else{
      reservaStore.insert(router.currentRoute.value.params)
      router.push(`/reservas`);
    }})
  .catch(err => console.error(err));
};
</script>
<template>
  <div class="card">
    <div class="display-flex">
      <h1 class="text-center">{{ nombre }}</h1>
    </div>
    <div>Num comensales: {{ comensales }}</div>
    <div>Fecha: {{ fecha }}</div>
    <button  @click="reserva">Reserva</button>
  </div>
</template>

<style scoped>
.card {
  gap: 15px;
  display: flex;
  border: none;
  border-radius: 25px;
  background-color: #a0aebb;
  padding: 25px;
  width: clamp(300px, 24vw, 400px);
  min-height: 250px;
  margin: 25px;
  flex-direction: column;
  align-items: center;
  h1 {
    font-size: 32px;
  }
}
</style>
