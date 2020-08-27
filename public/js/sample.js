function reset() {
  return {
    csrf: document
      .querySelector('meta[name="csrf-token"]')
      .getAttribute("content"),
    whichShow: "",
    deleteShow: false,
    deleteLink: "",
    editShow: false,
    editLink: "",
  };
}

new Vue({
  el: "#app",
  data: {
    csrf: document
      .querySelector('meta[name="csrf-token"]')
      .getAttribute("content"),
    whichShow: "",
    deleteShow: false,
    deleteLink: "",
    editShow: false,
    editLink: "",
  },
  methods: {
    deletePop(value) {
      this.deleteShow = true;
      this.deleteLink = "/shopusers/" + value;
    },
    close() {
      Object.assign(this.$data, reset());
    },
    editPop(value) {
      this.editShow = true;
      this.editLink = "/users/" + value.link;
      this.whichShow = value.which;
    },
  },
});
