<script setup>
defineProps({
  sala: Array,
  evento: Array,
  fecha: String,
});
</script>
<template>

  <div class="test">
    <div class="display-flex">
      <h1 class="text-center">{{ evento.nombre }}</h1>
     <div>Sala: {{ sala.nombre }}</div>
     <div>{{ fecha }}</div>
    </div>

  </div>
</template>

<style scoped>
.test {
  gap: 15px;
    display: flex;
    border: none;
    border-radius: 25px;
    background-color: rgb(224, 219, 203);
    padding: 25px;
    width: 400px;
    height: 250px;
    margin: 25px;
    flex-direction: column;
    align-items: center;
  h1{
    font-size: 40px;
  }
}
</style>
