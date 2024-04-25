import { defineStore } from "pinia";
import { ref } from "vue";
export const useReservaStore = defineStore("reserva", () => {
  const isActivo = ref(false);
  const data = ref(null);

  /**
   * Inicia la sesion de un usuario
   * @date 2/23/2024 - 4:01:19 PM
   * @author Aaron Medina Rodriguez
   *
   * @param {Object} userData
   * @returns
   */
  function insert(userData) {
    this.isActivo = true;
    this.data = userData;
  }

  /**
   * Cierra la sesion de un usuario
   * @date 2/23/2024 - 4:01:23 PM
   * @author Aaron Medina Rodriguez
   *
   * @returns
   */
  function del() {
    this.isActivo = false;
    this.data = null;
  }

  return { isActivo, data, insert, del };
});
