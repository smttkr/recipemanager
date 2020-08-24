<template>
  <div class="comment-box border-bottom py-2 px-0">
    <i class="far fa-comment mx-5" @click="postShow = !postShow"></i>
    <i class="far fa-folder-open" @click="openBookmark"></i>
    <table class="table">
      <tr class="p-2" v-for="comment in comments" :key="comment.id">
        <td class="user">
          <img :src="comment.userImg" alt="" />
          <p>{{ comment.userName }}</p>
        </td>
        <td class="comment-content">{{ comment.comment }}</td>
        <td class="day">{{ comment.created }}</td>
      </tr>
    </table>

    <post-comment-component
      :postShow="postShow"
      v-on:close="postShow = false"
    ></post-comment-component>
    <bookmark-component :bookmark-show="bookmarkShow"></bookmark-component>
  </div>
</template>

<script>
import PostCommentComponent from "./PostCommentComponent.vue";
export default {
  props: {
    comments: {
      type: Array,
    },
  },
  data() {
    return {
      postShow: false,
      bookmarkShow: false,
    };
  },
  methods: {
    openBookmark() {
      if (this.bookmarkShow === false) {
        this.bookmarkShow = true;
        setTimeout(this.closeBookmark, 4000);
      } else {
        this.bookmarkShow = false;
      }
    },
    closeBookmark() {
      this.bookmarkShow = false;
    },
  },
  components: {
    "post-comment-component": PostCommentComponent,
  },
};
</script>

<style scoped>
.comment-box {
  position: relative;
}
i::before {
  font-size: 1.5rem;
}
i:hover {
  cursor: pointer;
  opacity: 0.8;
}
.comment table {
  table-layout: fixed;
}
.user {
  width: 172px;
}
.comment-content {
  overflow: auto;
  vertical-align: middle;
}
.day {
  color: #6c757d;
  width: 18%;
  vertical-align: middle;
}

.user img {
  display: inline-block;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  box-shadow: 0 0 6px -1px rgba(0, 0, 0, 0.7);
}
.user p {
  width: 60px;
  text-align: center;
}
.bookmark-box {
  width: 130px;
  top: 0%;
  left: 10%;
}

@media (max-width: 899px) {
  .user {
    width: 80px;
  }
  .user img {
    width: 40px;
    height: 40px;
  }
  .user p {
    width: 40px;
  }
  .bookmark-box {
    top: 22%;
    width: 80px;
    min-height: 60px;
  }
}
</style>
