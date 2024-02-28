<script setup>
import { ref } from "vue";
const emit = defineEmits(["submit"]);
defineProps({
  titulo: String,
  descripcion: String,
  grupos: Array,
  profesores: Array,
  error: String,
});

const email = ref("");
const password = ref("");

function submitFormulario() {
  if (email.value && password.value) {
    emit("submit", { email: email.value, password: password.value });
  } else {
    console.warn("Invalido");
  }
}
</script>

<template>
  <div class="form">
    <h2 class="text-white text-center">{{ titulo }}</h2>
    <form method="post" @submit.prevent="submitFormulario">
      <div>
        <label class="text-white">Email</label>
        <input
          type="email"
          name="email"
          placeholder="email@email.com"
          v-model="email"
        />
      </div>
      <div>
        <label class="text-white">Contraseña</label>
        <input
          type="password"
          name="password"
          placeholder="Tu contraseña"
          v-model="password"
        />
      </div>
      <div><input type="submit" /></div>
    </form>
    <div v-if="error" class="error-message">{{ error }}</div>
  </div>
</template>
<style scoped>
.form{
  background-color: #8b9baa;
  width: fit-content;
  border-radius: 15px;
  padding: 30px 40px;
}
h2{
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
