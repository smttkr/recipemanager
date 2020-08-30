<template>
  <transition name="slide-y">
    <div class="news-modal-bg" v-if="show" @click.self="$emit('close')">
      <div class="news-modal">
        <h3 class="border-bottom text-center w-100">NEWS</h3>
        <div class="news-modal-content p-2">{{ news.content }}</div>
        <div class="news-modal-footer cf">
          <button class="btn btn-dark" @click="$emit('close')">
            OK
          </button>
          <i @click="$emit('delete')" class="far fa-trash-alt"></i>
        </div>
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
    news: {
      type: Object,
    },
  },
};
</script>

<style scoped>
.news-modal-bg {
  position: fixed;
  display: flex;
  background-color: rgba(0, 0, 0, 0.8);
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  justify-content: center;
  align-items: center;
}
.news-modal {
  background-color: #fff;
  overflow: hidden;
  border-radius: 8px;
  position: absolute;
  width: 50%;
  height: 300px;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
}
.news-modal h3 {
  height: 20%;
  line-height: 60px;
}
.news-modal-content {
  height: 60%;
  overflow-y: auto;
}
.news-modal-footer {
  height: 20%;
  background-color: #ededed;
  padding: 10px;
  position: relative;
}
.news-modal-footer button {
  display: block;
  margin: 0 auto;
  letter-spacing: 2px;
  padding: 4px 20px;
  line-height: 30px;
}

.news-modal-footer i::before {
  font-size: 2rem;
  position: absolute;
  top: 15%;
  right: 5%;
  cursor: pointer;
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
  .news-modal {
    width: 90%;
  }
}
</style>
