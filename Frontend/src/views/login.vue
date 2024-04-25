<script setup>
import AuthUsuario from "@/components/Auth/AuthUsuario.vue";
import { useRouter } from "vue-router";
import { useUsuarioStore } from "@/stores/usuario";
import { ref } from "vue";
const router = useRouter();
const store = useUsuarioStore();

let errorMsg = ref(null);
const tryAuthUser = async (userData) => {
  if (userData.email && userData.password) {
    try {
      const options = {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "User-Agent": "insomnia/8.6.0",
          Accept: "application/json",
        },
        body: `{"email":"${userData.email}","password":"${userData.password}"}`,
      };

      const response = await fetch("http://127.0.0.1:8000/api/login", options);
      const data = await response.json();

      if (data.status) {
        const userData = {
          id: data.message.id,
          token: data.message.token,
        };

        store.login(userData);
        errorMsg.value = "";
        router.push("/");
      } else {
        errorMsg.value = "Email o contraseña incorrectos.";
      }
    } catch (error) {
      errorMsg.value = "Error";
    }
  }
};
</script>
<template>
  <div class="login">
    <AuthUsuario
      titulo="Iniciar sesion"
      @submit="tryAuthUser"
      :error="errorMsg"
    />
  </div>
</template>
<style scoped>
.login {
  display: flex;
  height: 100vh;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
</style>
