<template>
  <div v-if="show" @click.self="close" class="delete-modal-bg">
    <form :action="link" method="POST" class="delete-form">
      <input type="hidden" name="_token" :value="csrf" />
      <input type="hidden" name="_method" value="DELETE" />
      <button type="submit" class="btn btn-lg btn-danger">
        {{ shopName }}を <br />
        本当に退会しますか？
      </button>
    </form>
  </div>
</template>

<script>
export default {
  props: {
    show: {
      type: Boolean,
    },
    shopName: {
      type: String,
    },
    link: {
      type: String,
    },
    csrf: {
      type: String,
    },
    link: {
      type: String,
    },
  },
  methods: {
    close() {
      this.$emit("close");
    },
  },
};
</script>

<style scoped>
.delete-modal-bg {
  position: fixed;
  display: flex;
  background: rgba(0, 0, 0, 0.8);
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  justify-content: center;
  align-items: center;
}
.delete-form {
  border-radius: 6px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
}
</style>
