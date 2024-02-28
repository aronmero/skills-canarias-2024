<script setup>
defineProps({
  nombre: String,
  aforo: String,
  minimo: String,
});
</script>
<template>
  <div class="test">
    <div>
      <h1 class="text-center">{{ nombre }}</h1>
    </div>
    <div>Aforo: {{ aforo }}</div>
    <div>Minimo: {{ minimo }}</div>
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
