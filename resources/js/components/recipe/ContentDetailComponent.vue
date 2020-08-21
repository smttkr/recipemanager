<template>
  <div class="dish-box">
    <h2 class="title text-center">{{ dish.title }}</h2>
    <span>{{ dish.category }}</span>
    <img :src="dish.src" alt="" />
    <div class="description bg-white mt-3 border rounded">
      <h3 class="border-bottom">説明</h3>
      <div>
        {{ dish.description }}
      </div>
    </div>
    <p>hahaha</p>
  </div>
</template>

<script>
export default {
  props: {
    dish: {
      type: Object,
    },
  },
};
</script>

<style scoped>
h2 {
  font-size: 1.8rem;
}
h3 {
  font-size: 1.3rem;
}
.title::before,
.title::after {
  content: "";
  display: inline-block;
  width: 100px;
  border: 2px solid;
  margin: 0 6px;
  vertical-align: 50%;
}
img {
  display: block;
  margin: 0 auto;
  margin-top: 10px;
  width: 60%;
}
.description {
  width: 80%;
  margin: 0 auto;
  height: 400px;
}
@media (max-width: 899px) {
  img {
    width: 100%;
  }
  .title::before,
  .title::after {
    width: 50px;
    margin: 0 3px;
  }
  .description {
    height: 300px;
  }
}
</style>
