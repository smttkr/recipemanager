<template>
  <div>
    <div class="icon-box bg-white border-top py-2">
      <button
        @click="togglePostShow"
        :disabled="processing"
        class="btn-clear mx-5"
      >
        <i class="far fa-comment"></i>
      </button>
      <button @click="addBookmark" :disabled="processing" class="btn-clear">
        <i class="far fa-folder-open"></i>
      </button>
      <button
        v-if="isOwner"
        @click="jumpEdit(recipeId)"
        :disabled="processing"
        class="btn-clear mx-5"
      >
        <i class="far fa-edit"></i>
      </button>
      <button
        v-if="isOwner"
        @click="confirmRecipeDeletion"
        :disabled="processing"
        class="btn-clear"
      >
        <i class="far fa-trash-alt"></i>
      </button>
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
      action="/bookmarks"
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
  props: ["recipeId", "csrf", "isOwner"],
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
      this.startProcessing();
      this.$refs.bookmarkAddition.submit();
    },
    jumpEdit(id) {
      this.startProcessing();
      location.href = "/recipes/" + id + "/edit";
    },
    confirmRecipeDeletion(id) {
      if (confirm("この料理を削除しますか？") === true) {
        this.startProcessing();
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
.icon-box button {
  display: inline-block;
  padding: 0;
}
.icon-box button:hover {
  cursor: pointer;
  opacity: 0.6;
}

.icon-box i::before {
  vertical-align: middle;
  font-size: 1.5rem;
}

@media (max-width: 899px) {
}
</style>
