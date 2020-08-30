<template>
  <div class="container content-box mt-5">
    <transition-group name="slide-x" tag="div" class="row">
      <div
        class="recipe col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-4"
        v-for="recipe in matchRecipes"
        :key="recipe.id"
      >
        <a :href="'/recipes/' + recipe.id">
          <div
            class="recipe-box bg-light"
            :class="matchLabelColor(recipe.category)"
          >
            <img
              :src="
                'http://homestead.recipemanager.test/storage/images/dishes/' +
                  recipe.image
              "
              alt=""
            />
            <div class="p-2 text">
              <h3 class="name mb-2">{{ recipe.name }}</h3>
              <div class="description">
                {{ recipe.description }}
              </div>
            </div>
          </div>
        </a>
      </div>
    </transition-group>
  </div>
</template>

<script>
export default {
  props: {
    recipes: {
      type: Array,
    },
    category: {
      type: String,
    },
  },
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
    matchRecipes() {
      let result = this.recipes.slice();
      if (this.category.length > 0) {
        result = result.filter((d) => {
          return d.category.indexOf(this.category) > -1;
        });
      }
      return result;
    },
  },
  methods: {
    matchLabelColor(value) {
      let result = [];
      result = this.labelColors.slice();
      result = result.filter((r) => {
        return r.category.indexOf(value) > -1;
      });
      return result[0].class;
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
.container {
  max-width: 100%;
  padding: 0 30px;
}
a:hover {
  text-decoration: none;
}
.recipe-box {
  height: 300px;
  overflow: hidden;
  border-radius: 8px;
  text-decoration: none;
  color: #43484d;
  box-shadow: 0 0 6px -1px rgba(0, 0, 0, 0.3);
  transition: all 0.5s;
  position: relative;
}
.recipe-box::before {
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

.recipe-box:hover {
  text-decoration: none;
  color: #43484d;
  opacity: 0.8;
  box-shadow: 0 0 6px -1px rgba(0, 0, 0, 0.9);
}
.recipe-box h3 {
  font-size: 1.3rem;
}
.recipe-box img {
  object-fit: cover;
  display: block;
  width: 100%;
  height: 40%;
}

.recipe-box .description {
  height: 165px;
}

.slide-x-enter-active {
  animation: slide-x-in 0.6s;
}
.slide-x-leave-active {
  animation: slide-x-in 0.6s reverse;
}
.slide-x-leave,
.slide-x-leave-to {
  display: none;
}

.slide-x-move {
  transition: transform 0.6s;
}

@keyframes slide-x-in {
  from {
    transform: translateX(-600%);
  }

  to {
    transform: translateX(0%);
  }
}
@media (max-width: 899px) {
  .recipe-box {
    height: 300px;
  }
  .recipe-box img {
    height: 55%;
  }
}
</style>
