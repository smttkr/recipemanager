require("./bootstrap");

window.Vue = require("vue");

Vue.component(
  "header-component",
  require("./components/common/HeaderComponent.vue").default
);
Vue.component(
  "bookmark-component",
  require("./components/common/BookmarkComponent.vue").default
);

Vue.component(
  "shop-user-group-component",
  require("./components/shopuser/ShopUserGroupComponent.vue").default
);

Vue.component(
  "nav-component",
  require("./components/recipe/NavComponent.vue").default
);

Vue.component(
  "news-group-component",
  require("./components/news/NewsGroupComponent.vue").default
);
Vue.component(
  "news-modal-component",
  require("./components/news/NewsModalComponent.vue").default
);

Vue.component(
  "recipe-group-component",
  require("./components/recipe/RecipeGroupComponent.vue").default
);

Vue.component(
  "recipe-detail-component",
  require("./components/recipe/RecipeDetailComponent.vue").default
);

Vue.component(
  "comment-group-component",
  require("./components/comment/CommentGroupComponent.vue").default
);

Vue.component(
  "welcome-points-component",
  require("./components/top/WelcomePointsComponent.vue").default
);
Vue.component(
  "welcome-carousel-component",
  require("./components/top/WelcomeCarouselComponent.vue").default
);

Vue.component(
  "icon-component",
  require("./components/recipe/IconComponent.vue").default
);

Vue.component(
  "comment-post-component",
  require("./components/comment/CommentPostComponent.vue").default
);

Vue.component(
  "news-post-component",
  require("./components/news/NewsPostComponent.vue").default
);

Vue.component(
  "user-show-component",
  require("./components/user/UserShowComponent.vue").default
);

Vue.component(
  "profile-edit-component",
  require("./components/user/ProfileEditComponent.vue").default
);

// const app = new Vue({
//   el: "#app",
// });
