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
  "user-list-component",
  require("./components/user/UserListComponent.vue").default
);

Vue.component(
  "nav-component",
  require("./components/recipe/NavComponent.vue").default
);

Vue.component(
  "news-component",
  require("./components/recipe/NewsComponent.vue").default
);
Vue.component(
  "topic-modal-component",
  require("./components/recipe/TopicModalComponent.vue").default
);

Vue.component(
  "content-group-component",
  require("./components/recipe/ContentGroupComponent.vue").default
);

Vue.component(
  "content-detail-component",
  require("./components/recipe/ContentDetailComponent.vue").default
);

Vue.component(
  "comment-component",
  require("./components/comment/CommentComponent.vue").default
);

Vue.component(
  "welcome-points-component",
  require("./components/top/WelcomePointsComponent.vue").default
);
Vue.component(
  "welcome-carousel-component",
  require("./components/top/WelcomeCarouselComponent.vue").default
);

// const app = new Vue({
//   el: "#app",
// });
