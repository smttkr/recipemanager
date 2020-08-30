<template>
  <transition name="slide-y">
    <div class="news-post-bg" @click.self="close" v-if="show">
      <div class="news-post py-2 px-1">
        <h3 class="text-center w-100">NEWS</h3>

        <form ref="form" action="/news/" method="POST">
          <input type="hidden" name="_token" :value="csrf" />
          <small class="text-danger ">{{ errors.category }}</small>
          <select v-model="category" class="custom-select" name="category">
            <option>選択してください</option>
            <option value="salad">サラダ</option>
            <option value="meat">お肉</option>
            <option value="fried">揚げ物</option>
            <option value="dessert">デザート</option>
            <option value="other">その他</option>
          </select>
          <small class="text-danger ">{{ errors.content }}</small>
          <textarea
            v-model.trim="content"
            name="content"
            rows="7"
            placeholder="内容を入力してください"
          ></textarea>
          <div class="news-post-close">
            <button
              type="button"
              class="btn btn-dark mx-2"
              @click="$emit('close')"
            >
              キャンセル
            </button>
            <button @click="validate" type="button" class="btn btn-primary">
              送信
            </button>
          </div>
        </form>
      </div>
    </div>
  </transition>
</template>

<script>
export default {
  props: {
    show: {
      type: Boolean,
    },
    csrf: {
      type: String,
    },
  },
  data() {
    return {
      category: "選択してください",
      content: "",
      errors: {
        category: null,
        content: null,
      },
    };
  },
  methods: {
    close() {
      this.$emit("close");
      this.errors = {
        category: null,
        content: null,
      };
    },
    validate() {
      let ca = this.category;
      let co = this.content;
      //コピーしておいて、エラーがあれば写す
      var errors = { ...this.errors };
      if (
        (ca === "salad") |
        (ca === "meat") |
        (ca === "fried") |
        (ca === "dessert") |
        (ca === "other")
      ) {
        errors.category = null;
      } else {
        errors.category = "選択されていません";
      }
      co.length > 0 ? (errors.content = null) : (errors.content = "未入力です");

      // エラーがなければSubmit あれば、エラーを写す
      if (errors.category === null && errors.content === null) {
        this.submits();
      } else {
        this.errors = errors;
      }
    },
    submits() {
      this.$refs.form.submit();
    },
  },
};
</script>

<style scoped>
.news-post-bg {
  position: fixed;
  display: flex;
  /* background: rgba(0, 0, 0, 0.8); */
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  justify-content: center;
  align-items: center;
}
.news-post {
  background-color: #fff;
  box-shadow: 0 0 6px -1px rgba(0, 0, 0, 0.7);
  overflow: hidden;
  border-radius: 8px;
  position: absolute;
  width: 50%;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
}
.news-post textarea {
  width: 100%;
  height: 80%;
  margin-top: 10px;
  border: 1px solid;
  border-radius: 3px;
}

.slide-y-enter-active {
  animation: slide-y-in 0.3s;
}
.slide-y-leave-active {
  animation: slide-y-in 0.3s reverse;
}
@keyframes slide-y-in {
  from {
    transform: translateY(-100%);
  }

  to {
    transform: translateY(0%);
  }
}
@media (max-width: 899px) {
  .news-post {
    width: 90%;
  }
}
</style>
