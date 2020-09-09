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
      <button
        v-if="!doesBookmark"
        @click="addBookmark"
        :disabled="processing"
        class="btn-clear"
      >
        <i class="far fa-folder-open"></i>
      </button>
      <button
        v-else
        @click="deleteBookmark(doesBookmark)"
        :disabled="processing"
        class="btn-clear"
      >
        <i class="far fa-folder-open does-bookmark"></i>
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
      :show="postShow"
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
      action=""
      ref="bookmarkdeletion"
      method="POST"
      class="hidden"
      id="bookmarkdeletion"
    >
      <input type="hidden" name="_token" :value="csrf" />
      <input type="hidden" name="_method" value="DELETE" />
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
  props: ["recipeId", "csrf", "doesBookmark", "isOwner"],
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
    deleteBookmark(bookmark) {
      let form = document.getElementById("bookmarkDeletion");
      if (confirm("この料理をブックマークを削除しますか？") === true) {
        form.action = "/bookmarks/" + bookmark.id;
        this.$refs.bookmarkdeletion.submit();
      }
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
  width: 80%;
  margin: 0 auto;
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
.icon-box .does-bookmark::before {
  color: cornflowerblue;
}

@media (max-width: 575.5px) {
  .icon-box {
    width: 100%;
  }
}
</style>
