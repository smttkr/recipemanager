<template>
  <div
    v-if="comments.length > 0"
    class="comment-box bg-white border-bottom p-0"
  >
    <table class="table mb-0">
      <tr
        class="p-2"
        v-for="comment in comments"
        :key="comment.id"
        :class="{ mine: userId === comment.shop_user.user.id }"
      >
        <td class="user">
          <img
            :src="
              '/home/xs055583/xs055583.xsrv.jp/public_html/storage/images/profile_images/' +
                comment.shop_user.user.profile_image
            "
            alt=""
          />
          <p class="mb-0">{{ comment.shop_user.user.name }}</p>
        </td>
        <td @click="confirmDelete(comment)" class="comment-content">
          {{ comment.comment }}
          <span class="day">{{ comment.created_at.slice(0, 10) }}</span>
        </td>
      </tr>
    </table>

    <form ref="commentDelete" action="" method="POST" id="form">
      <input type="hidden" name="_token" :value="csrf" />
      <input type="hidden" name="_method" value="DELETE" />
    </form>
  </div>
</template>

<script>
export default {
  props: {
    comments: {
      type: Array,
    },
    userId: {
      type: Number,
    },
    csrf: {
      type: String,
    },
  },

  methods: {
    confirmDelete(comment) {
      let form = document.querySelector(".comment-box form#form");

      if (this.userId === comment.shop_user.user.id) {
        if (this.processing === false) {
          this.startProcessing();
          if (confirm("コメントを削除しますか？") === true) {
            form.action = "/comments/" + comment.id;
            this.submitDeletion();
          } else {
            this.endProcessing();
          }
        }
      }
    },
    submitDeletion() {
      this.$refs.commentDelete.submit();
    },
  },
};
</script>

<style scoped>
table {
  table-layout: fixed;
}
.comment-box .mine {
  cursor: pointer;
  transition: all 0.2s;
}
.comment-box .mine:hover {
  background-color: rgba(0, 0, 0, 0.1);
}

.user {
  width: 172px;
  overflow: hidden;
}
.comment-content {
  padding: 5px 5px 25px 5px;
  position: relative;
}
.comment-content span {
  display: inline-block;
  width: 100%;
  text-align: right;
  position: absolute;
  bottom: 0;
  right: 5px;
}
.day {
  color: #6c757d;
  width: 17%;

  vertical-align: middle;
}

.user img {
  display: inline-block;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  box-shadow: 0 0 6px -1px rgba(0, 0, 0, 0.7);
}

.bookmark-box {
  width: 130px;
  top: 0%;
  left: 10%;
}

@media (max-width: 899px) {
  .user {
    width: 90px;
  }
  .user img {
    width: 50px;
    height: 50px;
  }
  .comment-content {
    height: 84px;
  }
  .user p {
    white-space: nowrap;
  }
  .day {
    font-size: 100%;
  }
}
</style>
