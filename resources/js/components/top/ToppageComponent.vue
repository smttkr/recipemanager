<template>
  <div class="detail">
    <div class="container">
      <div class="point-list row">
        <div class="col-sm-4 col-xs-12 point">
          <i class="fas fa-network-wired"></i>
          <div class="title">レシピをネット上で管理</div>
          <p>
            ネット上でレシピを管理することで、より確実に、スムーズにお店の業務を進めることができるようになります。<br />
            また、スタッフの勘違いや、レシピの変更を確実に共有できます
          </p>
        </div>
        <div class="col-sm-4 col-xs-12 point">
          <i class="fas fa-mobile-alt"></i>
          <div class="title">レスポンシブ対応</div>
          <p>
            スマートフォンにも対応しているので、就業中でなくても、レシピを見ることができます。<br />
            ホールのスタッフも、レシピを知っておくことで、お店の連携がよりスムーズになることが見込めます
          </p>
        </div>
        <div class="col-sm-4 col-xs-12 point">
          <i class="fas fa-comments"></i>
          <div class="title">ニュース・コメント機能</div>
          <p>
            新しいお料理や、イベントなどをニュースとして流せるので、情報の共有にに役立ちます。<br />
            また、コメント機能もついているので、レシピのアップデートにも繋がります
          </p>
        </div>
      </div>
      <div class="carousel row">
        <div class="col-md-2 col-sm-2 left" @click="left">
          <i class="fas fa-chevron-left"></i>
        </div>
        <div class="col-md-8 col-sm-12">
          <transition :name="style" mode="out-in" class="slider">
            <img
              :src="currentImg.src"
              :alt="currentImg.no"
              :key="currentImg.no"
            />
          </transition>
        </div>
        <div class="col-md-2 col-sm-2 right" @click="right">
          <i class="fas fa-chevron-right"></i>
        </div>
        <div class="hidden">
          <i class="fas fa-chevron-left"></i>
          <i class="fas fa-chevron-right"></i>
        </div>
      </div>
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
.container {
  max-width: 100%;
  margin-top: 100px;
}
.point-list {
  width: 95%;
  margin: 0 auto;
}
.point {
  text-align: center;
}
.point i::before {
  font-size: 6rem;
  color: #ffb549;
}
.point .title {
  margin-top: 10px;
  letter-spacing: 2px;
  font-size: 1.3rem;
  font-weight: 500;
}
.point p {
  font-size: 0.9rem;
  font-weight: 300;
  padding: 5px 10px;
  text-align: left;
}
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
