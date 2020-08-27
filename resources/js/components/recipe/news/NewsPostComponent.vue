<template>
  <transition name="slide-y">
    <div class="news-post-bg" v-if="show">
      <div class="news-post">
        <h3 class="border-bottom text-center w-100">NEWS</h3>

        <form action="/news" method="POST">
          <textarea name="mews_content" rows="7"></textarea>
          <div class="news-post-close">
            <button
              type="button"
              class="btn btn-dark"
              @click="$emit('close-post')"
            >
              キャンセル
            </button>
            <button type="submit" class="btn btn-primary">送信</button>
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
}
.news-post {
  background-color: #fff;
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
  border: 1px solid;
  border-radius: 2px;
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
