<script setup>

import { ref, onMounted, computed } from "vue";
import sala from "@/components/sala.vue";
import { useRouter } from "vue-router";
const router = useRouter();
const salaId = ref("");

const { id } = router.currentRoute.value.params;
salaId.value = id;

const options = {
  method: "GET",
  headers: { "User-Agent": "insomnia/8.6.0", Accept: "application/json" },
};

const salaData = ref([]);
onMounted(async () => {
  fetch(`http://127.0.0.1:8000/api/salas/${salaId.value}`, options)
    .then((response) => response.json())
    .then((response) => {
      salaData.value = response.message;
      console.log(salaData.value);
    })
    .catch((err) => console.error(err));
});
import { redirectLogin } from "@/utils/utils";

</script>

<template>
  <div class="flex flex-col items-center">
    <h1 class=" text-3xl font-bold z-10">Sala</h1>

    <div class="salas">
      <sala
        :nombre="salaData.nombre"
        :aforo="salaData.aforo"
        :minimo="salaData.minimo"
      ></sala>
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
</style>
