<template>
  <div class="icon-box bg-white border-top">
    <i class="far fa-comment mx-5" @click="postShow = !postShow"></i>

    <form action="/bookmarks/" method="POST">
      <input type="number" name="bookmark_id" :value="recipeId" class="hidden" />
      <button type="submit"><i class="far fa-folder-open"></i></button>
    </form>

    <comment-post-component
      :postShow="postShow"
      :recipe-id="recipeId"
      v-on:close="postShow = false"
    ></comment-post-component>
  </div>
</template>

<script>
export default {
  props: {
    recipeId: {
      type: Number,
    },
  },
  data() {
    return { postShow: false };
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

i::before {
  font-size: 1.5rem;
}
i:hover {
  cursor: pointer;
  opacity: 0.8;
}
@media (max-width: 899px) {
}
</style>
