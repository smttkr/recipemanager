<template>
  <transition
    name="accordion"
    @before-enter="beforeEnter"
    @enter="enter"
    @before-leave="beforeLeave"
    @leave="leave"
  >
    <div class="bookmark-box" v-if="bookmarkShow">
      <ul v-if="bookmarks !== undefined">
        <li v-for="bookmark in bookmarks" :key="bookmark"></li>
      </ul>
      <p v-else>ブックマークがありません</p>
    </div>
  </transition>
</template>

<script>
export default {
  props: {
    bookmarks: {
      type: Array,
    },
    bookmarkShow: {
      type: Boolean,
    },
  },
  methods: {
    beforeEnter: function(el) {
      el.style.height = "0px";
    },
    enter: function(el) {
      el.style.height = el.scrollHeight + "px";
    },
    beforeLeave: function(el) {
      el.style.height = el.scrollHeight + "px";
    },
    leave: function(el) {
      el.style.height = "0";
    },
  },
};
</script>

<style scoped>
.bookmark-box {
  overflow: hidden;
  transition: 0.5s ease-in-out;
  background-color: #696969;
  color: white;
  border-radius: 8px;
  position: absolute;
}
.bookmark-box ul {
  margin: 0;
  padding: 5px 0px 3px 15px;
}
.bookmark-box li {
  list-style: none;
  font-size: 1rem;
}
.bookmark-box p {
  font-size: 0.9rem;
}
.accordion-body {
  overflow: hidden;
  transition: 1s ease-in-out;
}
@media (max-width: 900px) {
  .bookmark-box li,
  .bookmark-box p {
    font-size: 0.8rem;
  }
}
</style>
