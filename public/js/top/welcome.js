new Vue({
  el: "#app",
  data: {
    images: [
      {
        no: 0,
        src:
          "http://homestead.recipemanager.test/storage/images/top-modal/home.png",
      },
      {
        no: 1,
        src:
          "http://homestead.recipemanager.test/storage/images/top-modal/show.png",
      },
      {
        no: 2,
        src:
          "http://homestead.recipemanager.test/storage/images/top-modal/users.png",
      },
    ],
  },
  methods: {
    logout() {
      this.$refs.logout.submit();
    },
  },
});
