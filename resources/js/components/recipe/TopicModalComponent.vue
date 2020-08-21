<template>
  <transition name="slide-y">
    <div class="zoom-topic-bg" v-if="popup">
      <div class="zoom-topic">
        <h3 class="border-bottom text-center w-100">NEWS</h3>
        <div class="zoom-topic-content">{{ modalTopicContent }}</div>
        <div class="zoom-topic-close">
          <button class="btn btn-dark" @click="$emit('close-modal')">
            OK
          </button>
        </div>
      </div>
    </div>
  </transition>
</template>

<script>
export default {
  props: ["popup", "modalTopicContent"],
};
</script>

<style>
.zoom-topic-bg {
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
.zoom-topic {
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
.zoom-topic h3 {
  height: 20%;
  line-height: 60px;
}
.zoom-topic-content {
  height: 60%;
}
.zoom-topic-close {
  height: 20%;
  background-color: #ededed;
  text-align: center;
  padding: 10px;
}
.zoom-topic-close button {
  letter-spacing: 2px;
  padding: 4px 20px;
  line-height: 30px;
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
</style>
