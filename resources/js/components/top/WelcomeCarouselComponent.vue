<template>
  <div class="carousel row">
    <div class="col-md-2 col-sm-2 left" @click.prevent="left">
      <i class="fas fa-chevron-left"></i>
    </div>
    <div class="col-md-8 col-sm-12">
      <transition :name="style" mode="out-in" class="slider">
        <img :src="currentImg.src" :alt="currentImg.no" :key="currentImg.no" />
      </transition>
    </div>
    <div class="col-md-2 col-sm-2 right" @click.prevent="right">
      <i class="fas fa-chevron-right"></i>
    </div>
    <div class="hidden">
      <i class="fas fa-chevron-left"></i>
      <i class="fas fa-chevron-right"></i>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    images: {
      type: Array,
    },
  },
  data() {
    return {
      i: 0,
      style: "slide",
    };
  },
  computed: {
    currentImg() {
      return this.images[this.i];
    },
  },
  methods: {
    right() {
      this.style = "slide-left";
      if (this.i < 2) {
        this.i++;
      } else {
        this.i = 0;
      }
    },
    left() {
      this.style = "slide-right";
      if (this.i === 0) {
        this.i = 2;
      } else {
        this.i--;
      }
    },
  },
};
</script>

<style scoped>

.carousel {
  margin-top: 100px;
}

.carousel img {
  display: block;
  object-fit: contain;
  margin: 0 auto;
  box-shadow: 0px 0px 20px -5px rgba(0, 0, 0, 0.8);
}

.carousel i::before {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
}

.slide-right-leave-active,
.slide-right-enter-active,
.slide-left-leave-active,
.slide-left-enter-active {
  transition: 0.6s ease-in-out;
}

.slide-right-enter,
.slide-left-leave-to {
  transform: translateX(200%);
}

.slide-right-leave-to,
.slide-left-enter {
  transform: translateX(-200%);
}

@media (max-width: 767px) {
  .carousel .right,
  .carousel .left {
    display: none;
  }
}
</style>

​
