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
        body: `{"nombre":"${userData.nombre}","email":"${userData.email}","password":"${userData.password}"}`,
      };

      const response = await fetch('http://127.0.0.1:8000/api/usuarios', options)
      const data = await response.json();


      const options2 = {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "User-Agent": "insomnia/8.6.0",
          Accept: "application/json",
        },
        body: `{"email":"${userData.email}","password":"${userData.password}"}`,
      };

      const response2 = await fetch("http://127.0.0.1:8000/api/login", options2);
      const data2 = await response2.json();
      console.log(data);

      if (data.status) {
        const userData = {
          id: data.message.id,
          token: data2.message.token,
        };

        store.login(userData);
        errorMsg.value = "";
        router.push("/");
      } else {
        errorMsg.value = data.message
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
      titulo="Registro"
      @submit="tryAuthUser"
      :error="errorMsg"
      :registro="true"
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
