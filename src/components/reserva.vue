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
  border: none;
  border-radius: 25px;
  background-color: rgb(207, 204, 204);
  padding: 25px;
  width: 400px;
  height: 250px;

  margin: 25px;
}
</style>
