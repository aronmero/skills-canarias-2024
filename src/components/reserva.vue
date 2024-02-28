<script setup>
defineProps({
  sala: Array,
  evento: Array,
  fecha: String,
});
</script>
<template>

  <div class="card">
    <div class="display-flex">
      <h1 class="text-center">{{ evento.nombre }}</h1>
     <div>Sala: {{ sala.nombre }}</div>
     <div>{{ fecha }}</div>
    </div>

  </div>
</template>

<style scoped>
.card {
  gap: 15px;
    display: flex;
    border: none;
    border-radius: 25px;
    background-color:#a0aebb;
    padding: 25px;
    width: clamp(300px,24vw,400px);
    min-height: 250px;
    margin: 25px;
    flex-direction: column;
    align-items: center;
  h1{
    font-size: 32px;
  }
}
</style>
