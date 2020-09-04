<template>
  <transition name="slide-y">
    <div v-if="postShow" @click.self="close" class="new-comment-bg">
      <div class="new-comment-box">
        <form ref="newCommentForm" action="/comments/" method="POST" class="cf">
          <input type="hidden" name="_token" :value="csrf" />
          <input
            type="number"
            name="recipe_id"
            :value="recipeId"
            class="hidden"
          />
          <div class="form-group mb-2">
            <label>コメント</label>
            <div v-show="error">
              <small class="text-danger">{{ error }}</small>
            </div>
            <textarea
              type="text"
              name="comment"
              class="form-control"
              rows="6"
              v-model="comment"
              autofocus
              placeholder="コメントを入力してください。300文字以内"
            />
            <small class="form-text text-muted"></small>
            <div class="btn-box ml-2">
              <button
                type="button"
                class="btn btn-outline-dark mt-1"
                @click="$emit('close')"
              >
                キャンセル
              </button>
              <button
                @click.stop="validate"
                type="button"
                class="btn btn-primary mt-1 mx-2"
              >
                送信
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </transition>
</template>

<script>
export default {
  props: ["postShow", "recipeId", "csrf"],
  data() {
    return {
      comment: "",
      error: "",
    };
  },
  methods: {
    close() {
      this.error = "";
      this.$emit("close");
    },
    validate() {
      let com = this.comment;
      let er = "";
      if (com.length < 1) {
        er = "未入力です";
      }
      if (com.length > 300) {
        er = "300文字を超えています";
      }
      if (er.length > 0) {
        this.error = er;
      } else {
        this.submitNewComment();
      }
    },
    submitNewComment() {
      this.$refs.newCommentForm.submit();
    },
  },
};
</script>

<style scoped>
.new-comment-bg {
  position: fixed;
  display: flex;
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  justify-content: center;
  align-items: center;
}
.new-comment-box {
  overflow: hidden;
  background-color: #fff;
  box-shadow: 0 0 6px -1px rgba(0, 0, 0, 0.6);
  border-radius: 5px;
  width: 40%;
  position: absolute;
  top: 60%;
  left: 50%;
  transform: translate(-50%, -50%);
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
}
.new-comment-box form {
  width: 100%;
}

.slide-y-enter-active {
  animation: slide-y-in 0.3s;
}
.slide-y-leave-active {
  animation: slide-y-in 0.3s reverse;
}

@keyframes slide-y-in {
  from {
    transform: translateY(300%);
  }

  to {
    transform: translateY(0%);
  }
}
@media (max-width: 899px) {
  .new-comment-box {
    width: 70%;
  }
}
</style>
