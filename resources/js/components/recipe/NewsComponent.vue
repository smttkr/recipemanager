<template>
  <div class="bg-light">
    <h3 class="border-bottom text-danger m-0 pb-1">NEWS!</h3>
    <table class="table">
      <tr
        v-for="topic in news"
        :key="topic.id"
        @click="topicClick(topic.content)"
      >
        <td>{{ topic.created_at.slice(5,10) }}</td>
        <td>{{ topic.category }}</td>
        <td class="content">{{ topic.content | maxLengthValidator }}</td>
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
    topicClick(content) {
      this.$emit("topic-click", content);
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
  .zoom-topic {
    width: 80%;
    height: 200px;
  }
  .zoom-topic h3 {
    line-height: 40px;
  }
  .zoom-topic-close button {
    padding: 0px 10px;
    line-height: 20px;
  }
}
</style>
