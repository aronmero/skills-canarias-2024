<script setup>
import { ref, onMounted, computed } from "vue";
import evento from "@/components/reserva.vue";
import { useRouter } from "vue-router";
const router = useRouter();
const salaId = ref("");

const { id } = router.currentRoute.value.params;
salaId.value = id;

const options = {
  method: "GET",
  headers: {
    "User-Agent": "insomnia/8.6.0",
    Accept: "application/json",
    Authorization: "Bearer 1|Bt2AouOvyB43T4NGpgsIzkvhgpjkhViFcEPB1iTjae618fd1",
  },
};

const salaData = ref({});
onMounted(async () => {
  fetch(`http://127.0.0.1:8000/api/reservas/${salaId.value}`, options)
    .then((response) => response.json())
    .then((response) => {
      salaData.value = response.message;
      console.log(salaData.value);
    })
    .catch((err) => console.error(err));
});
</script>

<template>
  <div class="flex flex-col items-center">
    <h1 class=" text-3xl font-bold underline z-10">Reserva</h1>

    <div class="salas">
      <!--<evento
        :evento="salaData.evento"
        :sala="salaData.sala"
        :fecha="salaData.fecha"
      ></evento>-->
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
