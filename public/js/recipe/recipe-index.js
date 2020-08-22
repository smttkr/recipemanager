new Vue({
  el: "#app",
  data: {
    category: "",
    popup: false,
    modalTopicContent: "",
    navItems: [
      { cate: "salad", name: "サラダ" },
      { cate: "meat", name: "お肉" },
      { cate: "fried", name: "揚げ物" },
      { cate: "dessert", name: "デザート" },
    ],
    news: [
      {
        id: 1,
        day: "0908",
        category: "salad",
        content:
          "No, you don't gotta fucking stab her three times! You gotta stab her once,",
      },
      {
        id: 2,
        day: "0907",
        category: "salad",
        content:
          "No, you don't gotta fucking stab her three times! You gotta stab her once,",
      },
    ],
    dishes: [
      {
        id: 1,
        src: "../images/dishes/greensalad.jpg",
        category: "salad",
        title: "salad",
        description:
          "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua",
      },
      {
        id: 2,
        src: "../images/dishes/firedpotato.jpg",
        category: "fried",
        title: "FriedPotato",
        description:
          "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua",
      },
      {
        id: 3,
        src: "../images/dishes/chocolatecake.jpg",
        category: "dessert",
        title: "Cake",
        description:
          "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua",
      },
      {
        id: 4,
        src: "../images/dishes/beefsteak.jpg",
        category: "meat",
        title: "BeefSteak",
        description:
          "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua",
      },
    ],
  },
  computed: {
    result() {
      let result = this.dishes.slice();
      if (this.category.length > 0) {
        result = result.filter((d) => {
          return d.category.indexOf(this.category) > -1;
        });
      }
      return result;
    },
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
