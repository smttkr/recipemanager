new Vue({
  el: "#app",
  data: {
    radio: [],
    inputMessage: "validate error red",
  },
  computed: {
    shopMessage() {
      if (this.radio === "owner") {
        return "新しいshopIDを入力してください";
      } else if (this.radio === "staff") {
        return "働いているお店のshopIDを入力してください";
      } else {
        return "";
      }
    },
  },
});
