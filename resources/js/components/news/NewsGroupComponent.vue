<template>
  <div class="news-box">
    <div class="news-header cf border-bottom m-0 pb-1">
      <h3 class="text-danger d-inline-block pl-2">NEWS!</h3>
      <button v-if="isOwner" @click="togglePostShow" class="btn-clear">
        <i class="fas fa-plus"></i>
      </button>
    </div>
    <div class="news-body">
      <table v-if="news.length > 0">
        <tr
          v-for="n in news"
          :key="n.id"
          @click="openModalShow(n)"
          class="border-top border-bottom"
        >
          <td class="day text-center">{{ n.created_at.slice(5, 10) }}</td>
          <td class="content">{{ n.content }}</td>
        </tr>
      </table>

      <div v-else>
        ニュースがありません
      </div>
    </div>

    <news-modal-component
      :show="modalShow"
      :isOwner="isOwner"
      :news="selectedNews"
      :csrf="csrf"
      @close="closeModalShow"
    ></news-modal-component>

    <news-post-component
      :show="postShow"
      :csrf="csrf"
      @close="togglePostShow"
    ></news-post-component>

  </div>
</template>

<script>
export default {
  props: ["news", "csrf", "isOwner"],
  data() {
    return {
      modalShow: false,
      postShow: false,
      selectedNews: "",
    };
  },
  methods: {
    openModalShow(news) {
      this.selectedNews = news;
      this.modalShow = true;
    },
    closeModalShow() {
      this.selectedNews = "";
      this.modalShow = false;
    },
    togglePostShow() {
      this.postShow = !this.postShow;
    },
  },
};
</script>

<style scoped>
.news-box {
  height: 100%;
}
.news-header {
  position: relative;
}
h3 {
  cursor: default;
}
.news-header button {
  display: inline-block;
  padding: 0;
  position: absolute;
  top: 20%;
  right: 2%;
}
.news-header button:hover {
  cursor: pointer;
  opacity: 0.7;
}
.news-header i::before {
  font-size: 1.5rem;
}
.news-body {
  overflow-x: hidden;
  overflow-y: auto;
  max-height: 200px;
}
.news-body::-webkit-scrollbar {
  width: 5px;
}
.news-body::-webkit-scrollbar-thumb {
  background: #ccc;
  border-radius: 10px;
}
.news-body table {
  table-layout: fixed;
  width: 100%;
}
.news-body table tr {
  cursor: pointer;
}
.news-body table tr:hover {
  background-color: rgba(0, 0, 0, 0.05);
}
.news-body table td {
  font-size: 0.9rem;
}
.news-body table .day {
  font-weight: 500;
  letter-spacing: 1px;
}
.news-body table .content {
  width: 80%;

  padding: 8px 0;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
</style>
