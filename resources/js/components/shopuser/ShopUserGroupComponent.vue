<template>
  <table class="table ">
    <tr v-for="user in shopUsers" :key="user.id">
      <td class="img">
        <img
          :src="
            'http://xs055583.xsrv.jp/storage/images/profile_images/' +
              user.user.profile_image
          "
          alt=""
        />
      </td>
      <td class="name">{{ user.user.name }}</td>
      <td class="day">{{ user.created_at.slice(0, 10) }}</td>
    </tr>
  </table>
</template>

<script>
export default {
  props: ["shopUsers"],
};
</script>

<style scoped>
tr {
  height: 4rem;
  transition: all 0.3s;
}
tr:hover {
  cursor: default;
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
  width: 50%;
  vertical-align: middle;
}
tr .day {
  color: #6c757d;
  width: 30%;
  vertical-align: middle;
}
@media (max-width: 899px) {
  td img {
    width: 40px;
    height: 40px;
  }
}
</style>
