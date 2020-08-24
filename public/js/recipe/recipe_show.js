new Vue({
  el: "#app",
  data: {
    dish: {
      title: "salad",
      src: "../images/dishes/greensalad.jpg",
      category: "salad",
      description:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua",
    },
    comments: [
      {
        id: 1,
        userName: "Beckham",
        userImg: "../images/user/alien.png",
        comment: "hello byebye",
        created: "2020 0801",
      },
      {
        id: 2,
        userName: "Kaka",
        userImg: "../images/user/alien.png",
        comment: "this is a pen",
        created: "2020 0801",
      },
    ],
  },
});
