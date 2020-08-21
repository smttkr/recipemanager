<template>
  <div class="dish-box d-block bg-light" :class="matchLabelColor[0].class">
    <img :src="dish.src" alt="" />
    <div class="p-2">
      <h3 class="category mb-2">{{ dish.title }}</h3>
      <div class="description">{{ dish.description | maxLengthValidator }}</div>
    </div>
    <p>{{ matchLabelColor.class }}</p>
  </div>
</template>

<script>
export default {
  props: ["dish"],
  data() {
    return {
      labelColors: [
        { category: "salad", class: "salad-label" },
        { category: "meat", class: "meat-label" },
        { category: "fried", class: "fried-label" },
        { category: "dessert", class: "dessert-label" },
      ],
    };
  },

  computed: {
    matchLabelColor() {
      let result = [];
      result = this.labelColors.slice();
      result = result.filter((r) => {
        return r.category.indexOf(this.dish.category) > -1;
      });
      return result;
    },
  },
  filters: {
    maxLengthValidator(value) {
      var max = 60;
      var ommision = "...";
      if (value.length > max) {
        return value.substring(0, max) + ommision;
      }
      return value;
    },
  },
};
</script>

<style scoped>
.dish-box {
  height: 300px;
  overflow: hidden;
  border-radius: 8px;
  text-decoration: none;
  color: #43484d;
  box-shadow: 0 0 6px -1px rgba(0, 0, 0, 0.3);
  transition: all 0.5s;
  position: relative;
}
.dish-box::before {
  content: "";
  bottom: 0;
  right: 0;
  border-top: 2.5rem solid transparent;
  border-right: 2.5rem solid;
  position: absolute;
}
.salad-label::before {
  border-right-color: #76c047;
}
.meat-label::before {
  border-right-color: #ffc0cb;
}
.fried-label::before {
  border-right-color: #fff100;
}
.dessert-label::before {
  border-right-color: #c1efff;
}

.dish-box:hover {
  cursor: pointer;
  text-decoration: none;
  color: #43484d;
  opacity: 0.8;
  box-shadow: 0 0 6px -1px rgba(0, 0, 0, 0.9);
}
.dish-box h3 {
  font-size: 1.3rem;
}
.dish-box img {
  display: block;
  width: 100%;
  height: 40%;
}

.dish-box .description {
  height: 165px;
}
@media (max-width: 899px) {
  .dish-box {
    height: 300px;
  }
  .dish-box img {
    height: 55%;
  }
}
</style>
