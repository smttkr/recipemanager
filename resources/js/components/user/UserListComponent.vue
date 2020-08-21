<template>
  <table class="table ">
    <tr v-for="user in users" :key="user.id" @click="confirm(user.name)">
      <td class="img">
        <img :src="user.src" alt="" />
      </td>
      <td class="name">{{ user.name }}</td>
      <td class="day">{{ user.created }}</td>
    </tr>
  </table>
</template>

<script>
export default {
  props: {
    users: {
      type: Array,
    },
  },

  methods: {
    confirm(name) {
      confirm(name + "を削除しますか？");
    },
  },
};
</script>

<style>
tr {
  height: 4rem;
  transition: all 0.3s;
}
tr:hover {
  background-color: rgba(0, 0, 0, 0.05);
  cursor: pointer;
}

td img {
  display: block;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  box-shadow: 0 0 6px -1px rgba(0, 0, 0, 0.7);
}
tr .name {
  font-size: 1.2rem;
  width: 60%;
  vertical-align: middle;
}
tr .day {
  color: #6c757d;
  width: 25%;
  vertical-align: middle;
}
@media (max-width: 899px) {
  td img {
    width: 40px;
    height: 40px;
  }
}
</style>
