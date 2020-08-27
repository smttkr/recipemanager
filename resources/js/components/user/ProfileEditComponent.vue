<template>
  <div v-if="show" @click.self="close" class="edit-modal-bg">
    <p class="bg-white">hello {{ whichShow }}</p>
    <form
      v-if="whichShow == 'name'"
      :action="link"
      method="POST"
      class="edit-form"
    >
      <input type="hidden" name="_token" :value="csrf" />
      <input type="hidden" name="_method" value="PUT" />
      <input type="hidden" name="sign" value="name" />
      <label>ニックネーム</label>
      <input
        type="text"
        name="name"
        class="form-control"
        v-model="name"
        :class="{ 'is-invalid': name.length > 6 }"
        :placeholder="nameNote"
      />
      <div class="btn-box text-center">
        <button
          type="submit"
          :disabled="name.length > 6"
          class="btn btn-primary my-1"
        >
          送信
        </button>
      </div>
    </form>

    <form
      enctype="multipart/form-data"
      v-if="whichShow === 'image'"
      :action="link"
      method="POST"
      class="edit-form"
    >
      <input type="hidden" name="_token" :value="csrf" />
      <input type="hidden" name="_method" value="PUT" />
      <input type="hidden" name="sign" value="profile_image" />
      <label>プロフィール画像</label>
      <input
        type="file"
        name="profile_image"
        class="form-control"
        :placeholder="nameNote"
      />
      <div class="btn-box text-center">
        <button
          type="submit"
          :disabled="name.length > 6"
          class="btn btn-primary my-1"
        >
          送信
        </button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  props: {
    show: {
      type: Boolean,
    },
    whichShow: {
      type: String,
    },
    link: {
      type: String,
    },
    csrf: {
      type: String,
    },
    link: {
      type: String,
    },
  },
  data() {
    return {
      name: "",
      nameNote: "6文字以内で入力してください",
    };
  },
  methods: {
    close() {
      this.$emit("close");
    },
  },
};
</script>

<style scoped>
.edit-modal-bg {
  position: fixed;
  display: flex;
  background: rgba(0, 0, 0, 0.8);
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  justify-content: center;
  align-items: center;
}
.edit-form {
  display: block;
  min-width: 250px;
  width: 35%;
  background-color: white;
  border-radius: 6px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
}
@media (max-width: 899px) {
  .input-group {
    width: 100%;
  }
}
</style>
