<template>
  <div class="icon-box bg-white border-top py-2">
    <i @click="post" class="far fa-comment mx-5"></i>
    <i @click="bookmark" class="far fa-folder-open"></i>
    <i @click="edit" class="far fa-edit mx-5"></i>
    <i @click="destroy" class="far fa-trash-alt"></i>
  </div>
</template>

<script>
export default {
  props: {
    csrf: {
      type: String,
    },
  },
  methods: {
    post() {
      this.$emit("post");
    },
    edit() {
      this.$emit("edit");
    },
    bookmark() {
      this.$emit("bookmark");
    },
    destroy() {
      this.$emit("destroy");
    },
  },
};
</script>

<style scoped>
.icon-box {
  position: relative;
}
.icon-box form {
  display: inline-block;
}
.icon-box form button {
  border: none;
  background-color: transparent;
}
.icon-box form button:focus {
  outline: 0;
  background-color: transparent;
  cursor: pointer;
}

.icon-box i::before {
  font-size: 1.5rem;
  color: black;
}
.icon-box i:hover {
  cursor: pointer;
  opacity: 0.8;
}
@media (max-width: 899px) {
}
</style>
