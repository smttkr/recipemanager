<template>
  <div class="user-box bg-light container">
    <div class="profile-box">
      <div class="image-box">
        <img
          @click="editClick('image')"
          :src="
            'http://homestead.recipemanager.test/storage/images/profile_images/' +
              user.profile_image
          "
          alt=""
        />
      </div>
      <div class="name-box">
        <p @click="editClick('name')" class="name">{{ user.name }}</p>
      </div>
    </div>

    <div class="row info-box bg-light">
      <div class="shop col-sm border">
        {{ user.shop_user.shop.name }}
      </div>
      <div class="position col-sm border">
        {{ user.shop_user.position }}
      </div>

      <div class="col-12">
        <button
          @click="deleteClick"
          type="button"
          class="btn btn-lg btn-outline-dark"
        >
          退会する
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    user: {
      type: Object,
    },
    belong: {
      type: Boolean,
    },
  },
  methods: {
    editClick(val) {
      this.$emit("edit-click", { link: this.user.shop_user.id, which: val });
    },
    deleteClick() {
      this.$emit("delete-click", this.user.shop_user.id);
    },
  },
};
</script>

<style scoped>
.user-box {
  width: 80%;
  height: 80vh;
  margin: 0 auto;
  margin-top: 30px;
  padding: 0;
  border-radius: 10px;
  overflow: hidden;
  position: relative;
}
.profile-box {
  background-color: #235789;
  text-align: center;
  height: 50%;
  padding: 15px;
}
.image-box {
  height: 50%;
}
.image-box img {
  height: 90%;
  width: auto;
  margin: 0 auto;
  background-color: white;
  border-radius: 50%;
}
.image-box img:hover {
  cursor: pointer;
  opacity: 0.7;
}

.name-box {
  height: 50%;
  position: relative;
}

.name-box p {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  font-size: 2rem;
  font-weight: 600;
  color: white;
  letter-spacing: 2px;
  cursor: pointer;
}

.profile-box .name:hover {
  opacity: 0.7;
}

.info-box div {
  font-size: 1.5rem;
  font-weight: 700;
  letter-spacing: 2px;
  color: #235789;
  padding: 3%;
  text-align: center;
}
.info-box button {
  width: 20%;
}

@media (max-width: 899px) {

  .info-box div {
    font-size: 1.2rem;
    padding: 15px 0;
  }
  .info-box button {
    width: 50%;
  }
}
</style>
