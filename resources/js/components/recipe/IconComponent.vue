<template>
  <div>
    <div class="icon-box bg-white border-top py-2">
      <i v-on:click="togglePostShow" class="far fa-comment mx-5"></i>
      <i v-on:click="addBookmark" class="far fa-folder-open"></i>
      <i v-on:click="jumpEdit(recipeId)" class="far fa-edit mx-5"></i>
      <i v-on:click="confirmRecipeDeletion" class="far fa-trash-alt"></i>
    </div>

    <comment-post-component
      :post-show="postShow"
      :recipe-id="recipeId"
      :csrf="csrf"
      v-on:close="postShow = false"
    >
    </comment-post-component>

    <form
      ref="bookmarkAddition"
      action="/bookmarks/"
      method="POST"
      class="hidden"
    >
      <input type="hidden" name="_token" :value="csrf" />
      <input type="hidden" name="recipe_id" :value="recipeId" />
    </form>

    <form
      ref="recipeDeletion"
      :action="'/recipes/' + recipeId"
      method="POST"
      class="hidden"
    >
      <input type="hidden" name="_token" :value="csrf" />
      <input type="hidden" name="_method" value="DELETE" />
    </form>
  </div>
</template>

<script>
export default {
  props: ["recipeId", "csrf"],
  data() {
    return {
      postShow: false,
    };
  },
  methods: {
    togglePostShow() {
      this.postShow = !this.postShow;
    },
    addBookmark(id) {
      this.$refs.bookmarkAddition.submit();
    },
    jumpEdit(id) {
      location.href = "/recipes/" + id + "/edit";
    },
    confirmRecipeDeletion(id) {
      if (confirm("この料理を削除しますか？") === true) {
        this.submitRecipeDeletion();
      }
    },
    submitRecipeDeletion() {
      this.$refs.recipeDeletion.submit();
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
  vertical-align: middle;
  font-size: 1.5rem;
  color: black;
}
.icon-box i:hover {
  cursor: pointer;
  opacity: 0.5;
}
.icon-box i a {
  display: inline;
}
@media (max-width: 899px) {
}
</style>
