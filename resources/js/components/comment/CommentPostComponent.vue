<template>
  <transition name="slide-y">
    <div class="new-comment-bg" v-if="postShow">
      <div class="new-comment-box">
        <form action="/comments/" method="post" class="cf">
          <input type="number" name="bookmark_id" :value="recipeId" class="hidden" />
          <div class="form-group">
            <label>コメント</label>
            <i class="fas fa-times float-right p-1" @click="$emit('close')"></i>
            <textarea type="text" class="form-control" rows="6" />
            <small class="form-text text-muted"></small>
            <div class="btn-box">
              <button
                type="button"
                class="cancel btn btn-outline-dark mt-1"
                @click="$emit('close')"
              >
                キャンセル
              </button>
              <button type="submit" class="btn btn-primary mt-1 mx-2">
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
  props: {
    postShow: {
      type: Boolean,
    },
    recipeId: {
      type: Number,
    },
  },
};
</script>

<style scoped>
i {
  cursor: pointer;
}
i:hover {
  opacity: 0.8;
}
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
.new-comment-box .btn-box {
  float: right;
}
.new-comment-box .btn-box .cancel:hover {
  color: #343a40;
  background: #fff;
  opacity: 0.8;
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
