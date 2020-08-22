<template>
  <div></div>
</template>

<script>
export default {
  methods: {
    right() {
      if (this.i < 2) {
        this.i++;
      } else {
        this.i = 0;
      }
    },
    left() {
      if (this.i === 0) {
        this.i = 2;
      } else {
        this.i--;
      }
    },
  },
};
</script>

<style></style>
