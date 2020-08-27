<template>
  <div class="bg-light">
    <div class="news-header cf border-bottom m-0 pb-1">
      <h3 class="text-danger d-inline-block">NEWS!</h3>
      <i
        class="fas fa-plus float-right d-inline-block"
        @click="newsPostClick"
      ></i>
    </div>
    <table class="table">
      <tr
        v-for="n in news"
        :key="n.id"
        @click="newsClick(n.content)"
      >
        <td>{{ n.created_at.slice(5, 10) }}</td>
        <td>{{ n.category }}</td>
        <td class="content">{{ n.content | maxLengthValidator }}</td>
        <td>
          <button
            type="button"
            class="ok btn btn-outline btn-light btn-sm py-0"
            @click.stop="popup = false"
          >
            OK
          </button>
        </td>
      </tr>
    </table>
  </div>
</template>

<script>
export default {
  props: {
    news: {
      type: Array,
    },
  },
  methods: {
    newsClick(content) {
      this.$emit("news-click", content);
    },
    newsPostClick() {
      this.$emit("news-post-click");
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
.news-header {
  position: relative;
}
h3 {
  cursor: default;
}
.news-header i::before {
  position: absolute;
  top: 20%;
  right: 2%;
  font-size: 1.5rem;
}
.news-header i:hover {
  cursor: pointer;
  opacity: 0.7;
}
table {
  table-layout: fixed;
}
table tr {
  cursor: pointer;
}
table tr:hover {
  background-color: rgba(0, 0, 0, 0.05);
}
table td {
  font-size: 0.8rem;
}
table .content {
  width: 65%;
}
table td .ok {
  font-size: 0.8rem;
}

@media (max-width: 899px) {
  .news table {
    width: 90%;
    margin: 0 auto;
  }
}
</style>
