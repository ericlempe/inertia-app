<template>
  <v-snackbar v-model="show" :color="color" :timeout="timeout">
    {{ message }}
    <template v-slot:action="{ attrs }">
      <v-btn
        color="white"
        text
        v-bind="attrs"
        @click="show = false"
      >
        x
      </v-btn>
    </template>
  </v-snackbar>
</template>

<script>
export default {
  data() {
    return {
      show: false,
      message: '',
      color: null,
      timeout: null,
    }
  },
  created() {
     this.$root.$on('snackbar', (message, color, timeout) => {
      this.message = message;
      this.color = color || 'black';
      this.show = true;
      this.timeout = timeout || 4000;
    })
  }
}
</script>
