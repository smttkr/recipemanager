new Vue({
  el: "#app",
  data: {
    postShow: false,
    editShow: false,
  },
  methods: {
    toggleEdit() {
      // if(this.editShow===false){
      //   alert("変更したい箇所をクリックして変更してください");
      // }
      this.editShow = !editShow;
    },
  },
});
