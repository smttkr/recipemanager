new Vue({
  el: "#app",
  data: {
    category: "",
    popup: false,
    modalTopicContent: "",
  },
  methods: {
    clear() {
      this.category = "";
    },
    topicModalOpen(value) {
      this.modalTopicContent = value;
      this.popup = true;
    },
    topicModalClose() {
      this.popup = false;
      this.modalTopicContent = "";
    },
  },
});
