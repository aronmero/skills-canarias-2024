<script setup>
import { ref } from "vue";
const emit = defineEmits(["submit"]);
defineProps({
  error: String,
});
const nombre = ref("");
const fecha = ref("");
const comensales = ref("");

function submitFormulario() {
  if (nombre.value && comensales.value && fecha.value) {
    emit("submit", {
      nombre: nombre.value,
      comensales: comensales.value,
      fecha: fecha.value,
    });
  } else {
    console.warn("Invalido");
  }
}
</script>

<template>
  <div class="salas">
    <div class="form">
      <h2 class="text-white text-center">{{ titulo }}</h2>
      <form method="post" @submit.prevent="submitFormulario">
        <label class="text-white">Nombre</label>
        <input
          type="text"
          name="nombre"
          placeholder="Nombre"
          v-model="nombre"
        />
        <div>
          <label class="text-white">Comensales</label>
          <input
            type="number"
            name="comensales"
            placeholder="20"
            v-model="comensales"
          />
        </div>
        <div>
          <label class="text-white">Fecha</label>
          <input type="date" name="fecha" v-model="fecha" />
        </div>

        <div><input type="submit" /></div>
      </form>
      <div v-if="error" class="error-message">{{ error }}</div>
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
.form {
  background-color: #8b9baa;
  width: fit-content;
  border-radius: 15px;
  padding: 30px 40px;
}
h2 {
  font-size: 32px;
}
.error-message {
  color: red;
  margin-top: 10px;
}
form {
  display: flex;
  flex-direction: column;
  align-items: center;

  label {
    margin-left: 5px;
    margin-bottom: 5px;
    font-weight: bold;
    align-self: flex-start;
  }

  > div {
    margin: 5px;
    padding: 5px;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  input {
    box-sizing: border-box;
    padding: 15px 12px;
    width: 320px;
    border-radius: 12px;
    font-size: 15px;
    border: 1px solid #ffff;
  }

  div:has(input[type="submit"]) {
    margin-top: 20px;

    input {
      font-weight: 600;
      border-radius: 20px;
      background-color: #ffff;
      cursor: pointer;
      border-color: #ffff;
    }
  }
}
</style>
