<script setup>
defineProps({
  nombre: String,
  comensales: String,
  fecha: String,
});
</script>
<template>
  <div class="test">
    <div>
      <h1 class="text-center">{{ nombre }}</h1>
    </div>
    <div>Num comensales: {{ comensales }}</div>
    <div>Fecha: {{ fecha }}</div>
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
