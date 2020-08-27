<template>
  <div class="comment-box bg-white border-bottom p-0">
    <table class="table mb-0">
      <tr class="p-2" v-for="comment in comments" :key="comment.id">
        <td class="user">
          <!-- <img :src="comment.shop_user.user.image" alt="" /> -->
          <img :src="defaultImage" alt="" />
          <!-- ユーザーの画像をデフォルトでエイリアンにするからいずれ消す  -->
          <p class="mb-0">{{ comment.shop_user.user.name }}</p>
        </td>
        <td class="comment-content">
          {{ comment.comment }}
        </td>
        <td class="day">{{ comment.created_at.slice(0, 10) }}</td>
      </tr>
    </table>
  </div>
</template>

<script>
export default {
  props: {
    comments: {
      type: Array,
    },
  },
  data() {
    return {
      defaultImage: "http://homestead.recipemanager.test/images/user/alien.png",
    };
  },

};
</script>

<style scoped>

.comment table {
  table-layout: fixed;
  height: 112px;
}

.user {
  width: 172px;
}
.comment-content {
  overflow-y: auto;
  padding: 0;
  display: block;
  height: 112px;
  word-break: break-all;
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
    width: 80px;
  }
  .user img {
    width: 40px;
    height: 40px;
  }
  .comment-content {
    height: 84px;
  }
  .user p {
    white-space: nowrap;
    font-size: 100%;
  }
  .day {
    font-size: 100%;
  }
}
</style>
