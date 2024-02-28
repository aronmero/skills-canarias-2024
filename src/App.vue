<script setup>
import { RouterView } from "vue-router";
import Header from "@/components/header.vue";
</script>

<template>
  <template v-if="$route.path != '/'"> <Header></Header></template>
  <RouterView></RouterView>
</template>
