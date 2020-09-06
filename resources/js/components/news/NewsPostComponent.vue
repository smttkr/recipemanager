<template>
  <transition name="slide-y">
    <div class="news-post-bg" v-if="show" @click.self="close">
      <div class="news-post py-2 px-1">
        <h3 class="text-center w-100">NEWS</h3>

        <form ref="newsPosts" action="/news/" method="POST">
          <input type="hidden" name="_token" :value="csrf" />
          <input type="hidden" name="_method" value="POST" />
          <small class="text-danger ">{{ errors }}</small>
          <textarea
            v-model.trim="content"
            name="content"
            rows="7"
            placeholder="内容を入力してください。300文字以内"
          ></textarea>
          <div class="news-post-close">
            <button type="button" class="btn btn-dark mx-2" @click.stop="close">
              キャンセル
            </button>
            <button
              :disabled="processing"
              @click.stop="validateNewsPosts"
              type="button"
              class="btn btn-primary"
            >
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
  props: ["show", "csrf"],
  data() {
    return {
      content: "",
      errors: "",
    };
  },
  methods: {
    close() {
      this.errors = "";
      this.$emit("close");
    },
    validateNewsPosts() {
      this.startProcessing();
      let co = this.content;
      //コピーしておいて、エラーがあれば写す
      var er = "";
      if (co.length < 1) {
        er = "未入力です";
      } else if (co.length > 300) {
        er = "300文字以内で入力してください";
      }

      // エラーがなければSubmit あれば、エラーを写す
      if (er.length < 1) {
        this.submitNews();
        this.close();
      } else {
        this.errors = er;
        this.endProcessing();
      }
    },
    submitNews() {
      this.$refs.newsPosts.submit();
    },
  },
};
</script>

<style scoped>
.news-post-bg {
  position: fixed;
  display: flex;
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  justify-content: center;
  align-items: center;
  z-index: 2;
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
